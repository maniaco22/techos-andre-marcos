const API_URL = '../index.php?rota=';
let token = localStorage.getItem('techos_token') || '';
let usuario = JSON.parse(localStorage.getItem('techos_user') || 'null');
let listaClientes = [];
let listaEquipamentos = [];
let listaOS = [];

const $ = (id) => document.getElementById(id);

async function apiFetch(rota, options = {}) {
  const headers = { 'Content-Type': 'application/json', ...(options.headers || {}) };
  if (token) headers['Authorization'] = `Bearer ${token}`;
  const res = await fetch(API_URL + rota, { ...options, headers });
  const data = await res.json();
  if (res.status === 401 && rota !== 'login') {
    logout();
    throw new Error('Sessão expirada. Faça login novamente.');
  }
  if (!res.ok) throw new Error(data.erro || 'Erro na requisição.');
  return data;
}

function logout() {
  token = '';
  usuario = null;
  localStorage.removeItem('techos_token');
  localStorage.removeItem('techos_user');
  $('app-screen').classList.add('hidden');
  $('login-screen').classList.remove('hidden');
}

function iniciarApp() {
  $('login-screen').classList.add('hidden');
  $('app-screen').classList.remove('hidden');
  $('user-info').textContent = `${usuario.nome} (${usuario.perfil})`;
  carregarTudo();
}

async function carregarTudo() {
  try {
    const [resCli, resEq, resOS] = await Promise.all([
      apiFetch('clientes'),
      apiFetch('equipamentos'),
      apiFetch('os')
    ]);
    listaClientes = resCli.dados || [];
    listaEquipamentos = resEq.dados || [];
    listaOS = resOS.dados || [];
    renderKpis(resOS.indicadores);
    renderClientes();
    renderEquipamentos();
    renderOS();
  } catch (err) {
    alert(err.message);
  }
}

function renderKpis(ind) {
  $('kpi-abertas').textContent = ind.abertas;
  $('kpi-andamento').textContent = ind.em_andamento;
  $('kpi-concluidas').textContent = ind.concluidas;
  $('kpi-faturamento').textContent = Number(ind.faturamento_total).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
}

function renderClientes() {
  $('tabela-clientes').innerHTML = listaClientes.map(c => `
    <tr><td>#${c.id}</td><td>${c.nome}</td><td>${c.telefone}</td><td>${c.email || '-'}</td></tr>
  `).join('');

  const opts = '<option value="">Selecione o Cliente...</option>' +
    listaClientes.map(c => `<option value="${c.id}">${c.nome} (${c.telefone})</option>`).join('');
  $('os-cliente').innerHTML = opts;
  $('eq-cliente').innerHTML = opts;
}

function renderEquipamentos() {
  $('tabela-equipamentos').innerHTML = listaEquipamentos.map(e => `
    <tr><td>#${e.id}</td><td>${e.cliente_nome}</td><td>${e.modelo}</td><td><code>${e.numero_serie}</code></td></tr>
  `).join('');
  atualizarSelectEquipamentosOS();
}

function atualizarSelectEquipamentosOS() {
  const cliId = Number($('os-cliente').value);
  const filtrados = cliId ? listaEquipamentos.filter(e => Number(e.cliente_id) === cliId) : listaEquipamentos;
  $('os-equipamento').innerHTML = '<option value="">Selecione o Equipamento...</option>' +
    filtrados.map(e => `<option value="${e.id}">${e.modelo} — S/N: ${e.numero_serie}</option>`).join('');
}

function renderOS() {
  const filtro = $('filtro-status').value;
  const filtradas = filtro ? listaOS.filter(o => o.status === filtro) : listaOS;

  $('tabela-os').innerHTML = filtradas.map(o => {
    let acoes = '-';
    if (o.status === 'ABERTA') {
      acoes = `<button class="btn btn-sm btn-warn" onclick="mudarStatus(${o.id}, 'EM_ANDAMENTO')">Iniciar</button>
               <button class="btn btn-sm btn-ok" onclick="concluirOS(${o.id})">Concluir</button>`;
    } else if (o.status === 'EM_ANDAMENTO') {
      acoes = `<button class="btn btn-sm btn-ok" onclick="concluirOS(${o.id})">Concluir</button>`;
    }
    const valorFmt = Number(o.valor_servico).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
    return `<tr>
      <td><strong>${o.protocolo}</strong></td>
      <td>${o.cliente_nome}<br><small>${o.cliente_telefone}</small></td>
      <td>${o.equipamento_modelo}<br><small>${o.numero_serie}</small></td>
      <td>${o.defeito_relatado}</td>
      <td><span class="status-pill st-${o.status}">${o.status.replace('_', ' ')}</span></td>
      <td>${valorFmt}</td>
      <td>${acoes}</td>
    </tr>`;
  }).join('');
}

window.mudarStatus = async (id, status, valor = 0) => {
  try {
    await apiFetch('os/status', { method: 'PATCH', body: JSON.stringify({ id, status, valor_servico: valor }) });
    carregarTudo();
  } catch (err) { alert(err.message); }
};

window.concluirOS = (id) => {
  const valorStr = prompt('Informe o valor final do serviço (R$):', '150.00');
  if (valorStr === null) return;
  const valor = parseFloat(valorStr.replace(',', '.'));
  if (isNaN(valor) || valor <= 0) return alert('Informe um valor válido maior que zero.');
  mudarStatus(id, 'CONCLUIDA', valor);
};

$('form-login').addEventListener('submit', async (e) => {
  e.preventDefault();
  $('login-erro').textContent = '';
  try {
    const res = await apiFetch('login', {
      method: 'POST',
      body: JSON.stringify({ email: $('login-email').value, senha: $('login-senha').value })
    });
    token = res.token;
    usuario = res.usuario;
    localStorage.setItem('techos_token', token);
    localStorage.setItem('techos_user', JSON.stringify(usuario));
    iniciarApp();
  } catch (err) {
    $('login-erro').textContent = err.message;
  }
});

$('form-cliente').addEventListener('submit', async (e) => {
  e.preventDefault();
  try {
    await apiFetch('clientes', {
      method: 'POST',
      body: JSON.stringify({ nome: $('cli-nome').value, telefone: $('cli-telefone').value, email: $('cli-email').value })
    });
    e.target.reset();
    carregarTudo();
  } catch (err) { alert(err.message); }
});

$('form-equipamento').addEventListener('submit', async (e) => {
  e.preventDefault();
  try {
    await apiFetch('equipamentos', {
      method: 'POST',
      body: JSON.stringify({ cliente_id: Number($('eq-cliente').value), modelo: $('eq-modelo').value, numero_serie: $('eq-serie').value })
    });
    e.target.reset();
    carregarTudo();
  } catch (err) { alert(err.message); }
});

$('form-os').addEventListener('submit', async (e) => {
  e.preventDefault();
  try {
    await apiFetch('os', {
      method: 'POST',
      body: JSON.stringify({
        cliente_id: Number($('os-cliente').value),
        equipamento_id: Number($('os-equipamento').value),
        defeito_relatado: $('os-defeito').value
      })
    });
    e.target.reset();
    carregarTudo();
  } catch (err) { alert(err.message); }
});

$('cli-telefone').addEventListener('input', (e) => {
  let v = e.target.value.replace(/\D/g, '').slice(0, 11);
  if (v.length > 6) v = `(${v.slice(0, 2)}) ${v.slice(2, 7)}-${v.slice(7)}`;
  else if (v.length > 2) v = `(${v.slice(0, 2)}) ${v.slice(2)}`;
  e.target.value = v;
});

$('os-cliente').addEventListener('change', atualizarSelectEquipamentosOS);
$('filtro-status').addEventListener('change', renderOS);
$('btn-logout').addEventListener('click', logout);

document.querySelectorAll('.tab-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    document.querySelectorAll('.tab-content').forEach(c => c.classList.add('hidden'));
    btn.classList.add('active');
    $(btn.dataset.tab).classList.remove('hidden');
  });
});

if (token && usuario) iniciarApp();