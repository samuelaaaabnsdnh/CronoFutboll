import '../css/app.css';

// ====== Configuración (cambia aquí tus contactos) ======
const API = import.meta.env.VITE_API_URL || '/api';
const CONTACTOS = [
  ['WhatsApp', 'https://wa.me/573000000000', '#25D366', 'M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z'],
  ['Instagram', 'https://instagram.com/cronofutbol', 'linear-gradient(45deg,#F58529,#DD2A7B,#8134AF)', 'M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077'],
  ['Facebook', 'https://facebook.com/cronofutbol', '#1877F2', 'M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103a8.68 8.68 0 0 1 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.733-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.386 2.103-.287 1.564h-3.246v8.245C19.396 23.238 24 18.179 24 12.044c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.628 3.874 10.35 9.101 11.647Z'],
  ['TikTok', 'https://tiktok.com/@cronofutbol', '#000', 'M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z'],
];

// Datos de ejemplo: se usan solo si la API no responde
const hoy = new Date().toISOString().slice(0, 10);
const MOCK = {
  torneos: [
    { id: 1, nombre: 'Copa Crono 2026', categoria: 'Sub-17', descripcion: 'Torneo relámpago de fin de año', fecha_inicio: '2026-11-01', fecha_fin: '2026-12-10', estado: 'en_curso' },
    { id: 2, nombre: 'Liga Barrial', categoria: 'Libre', descripcion: 'Temporada regular', fecha_inicio: '2026-03-01', fecha_fin: '2026-06-30', estado: 'finalizado' },
  ],
  equipos: [{ id: 1, nombre: 'Halcones FC' }, { id: 2, nombre: 'Titanes' }, { id: 3, nombre: 'Real Barrio' }, { id: 4, nombre: 'Rayo Verde' }],
  jugadores: [
    { id: 1, equipo_id: 1, nombre: 'Luis', apellido: 'Mora', posicion: 'Delantero', numero_camiseta: 9, estado: 'activo' },
    { id: 2, equipo_id: 2, nombre: 'Andrés', apellido: 'Pino', posicion: 'Portero', numero_camiseta: 1, estado: 'activo' },
    { id: 3, equipo_id: 3, nombre: 'Diego', apellido: 'Rey', posicion: 'Mediocampista', numero_camiseta: 8, estado: 'activo' },
  ],
  partidos: [
    { id: 1, torneo_id: 1, equipo_local_id: 1, equipo_visitante_id: 2, fecha: '2026-11-05', hora: '16:00', lugar: 'Cancha Central', estado: 'programado' },
    { id: 2, torneo_id: 1, equipo_local_id: 3, equipo_visitante_id: 4, fecha: hoy, hora: '18:00', lugar: 'Cancha Norte', estado: 'en_curso' },
    { id: 3, torneo_id: 2, equipo_local_id: 2, equipo_visitante_id: 3, fecha: '2026-06-20', lugar: 'Cancha Sur', goles_local: 3, goles_visitante: 1, estado: 'finalizado' },
  ],
  'estadisticas-jugadores': [
    { jugador_id: 1, partido_id: 3, goles: 2, asistencias: 1, tarjetas_amarillas: 0, tarjetas_rojas: 0, minutos_jugados: 90 },
    { jugador_id: 3, partido_id: 3, goles: 1, asistencias: 2, tarjetas_amarillas: 1, tarjetas_rojas: 0, minutos_jugados: 85 },
    { jugador_id: 2, partido_id: 3, goles: 0, asistencias: 0, tarjetas_amarillas: 0, tarjetas_rojas: 0, minutos_jugados: 90 },
  ],
};

// ====== Utilidades ======
const $ = (s) => document.querySelector(s);
const esc = (v) => String(v ?? '').replace(/[&<>"']/g, (c) => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));
const S = { tab: 'torneos', act: 1, q: '', mode: 'login', roles: [], d: {}, token: localStorage.getItem('t'), user: JSON.parse(localStorage.getItem('u') || 'null') };
const d = (k) => S.d[k] || [];
const day = (f) => String(f || '').slice(0, 10);
const eqN = (id) => (d('equipos').find((e) => e.id == id) || {}).nombre || 'Equipo ' + id;
const torN = (id) => { const t = d('torneos').find((x) => x.id == id); return t ? t.nombre : 'Sin torneo'; };
const jugN = (id) => { const j = d('jugadores').find((x) => x.id == id); return j ? j.nombre + ' ' + j.apellido : 'Jugador ' + id; };
const est = (e) => (e === true || e === 1 || e === '1' ? 'activo' : e === false || e === 0 || e === '0' ? 'inactivo' : e);
const bd = (e0) => { const e = est(e0); return `<span class="bd ${esc(e)}">${e === 'en_curso' ? ' EN VIVO' : esc(String(e).replace('_', ' '))}</span>`; };
const card = (h, b) => `<article class="card"><h3>${h}</h3>${b}</article>`;
const grid = (a) => (a.length ? `<div class="grid">${a.join('')}</div>` : '<p class="empty">No hay registros para mostrar.</p>');
const toast = (m) => { const t = $('#toast'); t.textContent = m; t.classList.remove('hide'); setTimeout(() => t.classList.add('hide'), 3500); };

async function api(p, o = {}) {
  const r = await fetch(API + p, {
    method: o.method || 'GET',
    headers: { 'Content-Type': 'application/json', Accept: 'application/json', ...(S.token ? { Authorization: 'Bearer ' + S.token } : {}) },
    body: o.body ? JSON.stringify(o.body) : undefined,
  });
  const j = await r.json().catch(() => ({}));
  if (!r.ok) { if (r.status === 401 && S.token) logout(true); throw j; }
  return j.data !== undefined ? j.data : j;
}

// ====== Sesión ======
const save = () => { localStorage.setItem('t', S.token); localStorage.setItem('u', JSON.stringify(S.user)); };
function logout(local) {
  if (!local && S.token) api('/auth/logout', { method: 'POST' }).catch(() => {});
  S.token = S.user = null; localStorage.removeItem('t'); localStorage.removeItem('u'); ui();
}
function formAuth() {
  const r = S.mode === 'register';
  $('#fa').innerHTML = `<h3 style="font-size:1.4rem;font-weight:700">${r ? ' Crear cuenta' : ' Iniciar sesión'}</h3>`
    + (r ? '<input name=nombre class=inp placeholder=Nombre required><input name=apellido class=inp placeholder=Apellido required>' : '')
    + '<input name=email type=email class=inp placeholder=Correo required><input name=password type=password class=inp placeholder=Contraseña minlength=8 required>'
    + (r ? '<input name=password_confirmation type=password class=inp placeholder="Confirmar contraseña" required>' : '')
    + `<p id=er class=er></p><button class=btn>${r ? 'Registrarme' : 'Entrar'}</button><a href=# data-m=${r ? 'login' : 'register'}>${r ? 'Ya tengo cuenta' : 'Crear cuenta nueva'}</a><a href=# data-x>Cerrar</a>`;
}
$('#fa').addEventListener('submit', async (e) => {
  e.preventDefault();
  try {
    const r = await api('/auth/' + S.mode, { method: 'POST', body: Object.fromEntries(new FormData(e.target)) });
    S.token = r.token; S.user = r.usuario; save(); $('#dlg').close(); ui(); toast('¡Bienvenido, ' + r.usuario.nombre + '!');
  } catch (x) { $('#er').textContent = Object.values(x.errors || {})[0]?.[0] || x.message || 'No se pudo conectar con el servidor'; }
});

// ====== Vistas ======
const tCard = (t) => card(esc(t.nombre) + bd(t.estado), `<p>Categoría: ${esc(t.categoria || 'General')}</p><p class=mut>${esc(t.descripcion)}</p><p>Periodo: ${day(t.fecha_inicio)} → ${day(t.fecha_fin) || '—'}</p>`);
const mCard = (p) => card(esc(torN(p.torneo_id)) + bd(p.estado),
  `<div class=vs><b>${esc(eqN(p.equipo_local_id))}</b><span class=sc>${p.goles_local ?? '-'} : ${p.goles_visitante ?? '-'}</span><b>${esc(eqN(p.equipo_visitante_id))}</b></div><p>Lugar: ${esc(p.lugar || 'Por definir')}</p><p class=mut> ${day(p.fecha)} ${esc(String(p.hora || '').slice(0, 5))}</p>`);
const byDate = (a) => [...a].sort((x, y) => day(x.fecha).localeCompare(day(y.fecha)));
const jCards = () => {
  const q = S.q.toLowerCase();
  return grid(d('jugadores').filter((j) => `${j.nombre} ${j.apellido} ${eqN(j.equipo_id)} ${j.posicion}`.toLowerCase().includes(q)).map((j) =>
    card(`<span>${esc(j.nombre)} ${esc(j.apellido)}</span><span class=sc>#${esc(j.numero_camiseta ?? '-')}</span>`, `<p>Equipo: ${esc(eqN(j.equipo_id))}</p><p>Posición: ${esc(j.posicion || 'Sin posición')}</p>${bd(j.estado)}`)));
};
const info = (h, b) => `<div class=card>${`<h3>${h}</h3>`}${b}</div>`;

const V = {
  torneos: () => grid(d('torneos').map(tCard)),
  mine: () => (S.user ? grid(d('torneos').map(tCard)) : info(' Inicia sesión', '<p>Entra para ver tus torneos.</p>')),
  jugadores: () => `<input id=q class=inp placeholder=" Buscar jugador, equipo o posición…" value="${esc(S.q)}"><div id=gj>${jCards()}</div>`,
  stats: () => {
    const m = {};
    d('estadisticas-jugadores').forEach((s) => { const a = (m[s.jugador_id] ??= { g: 0, a: 0, y: 0, r: 0, m: 0 }); a.g += +s.goles; a.a += +s.asistencias; a.y += +s.tarjetas_amarillas; a.r += +s.tarjetas_rojas; a.m += +s.minutos_jugados; });
    const rows = Object.entries(m).sort((x, y) => y[1].g - x[1].g), max = Math.max(1, ...rows.map((r) => r[1].g));
    return rows.length ? `<div class=card><div class=tw><table><tr><th>#</th><th>Jugador</th><th>G</th><th>A</th><th>TA</th><th>TR</th><th>Min</th><th></th></tr>${rows.map(([id, a], i) =>
      `<tr><td>${i + 1}</td><td>${esc(jugN(id))}</td><td>${a.g}</td><td>${a.a}</td><td>${a.y}</td><td>${a.r}</td><td>${a.m}'</td><td style="min-width:90px"><div class=bar><i style="width:${(a.g / max) * 100}%"></i></div></td></tr>`).join('')}</table></div></div>` : grid([]);
  },
  activos: () => `<p><button class="btn ${S.act ? '' : 'alt'}" data-a=1> Activos</button> <button class="btn ${S.act ? 'alt' : ''}" data-a=0> Inactivos</button></p><br>`
    + grid(d('torneos').filter((t) => (['en_curso', 'programado'].includes(t.estado) ? 1 : 0) == S.act).map(tCard)),
  proximos: () => grid(byDate(d('partidos').filter((p) => ['programado', 'en_curso'].includes(p.estado))).map(mCard)),
  jugados: () => grid(byDate(d('partidos').filter((p) => p.estado === 'finalizado')).reverse().map(mCard)),
  perfil: () => info(' Mi perfil', S.user ? `<p>${esc(S.user.nombre)} ${esc(S.user.apellido)}</p><p>Correo: ${esc(S.user.email)}</p><p>Rol: ${esc(S.user.rol?.nombre || '—')}</p>` : '<p>Inicia sesión.</p>'),
  config: () => info(' Configuración', '<p>Usa  para plegar la barra lateral.</p><p class=mut>Las preferencias de cuenta llegarán pronto.</p>'),
  about: () => info(' Sobre nosotros', '<p>CronoFutbol organiza torneos de fútbol: inscripciones, partidos, resultados y estadísticas, todo en un solo lugar.</p>'),
  who: () => info(' Quiénes somos', '<p>Un equipo de desarrolladores apasionados por el fútbol que quiere que cada torneo, grande o barrial, se viva como una final.</p>'),
  guide: () => info(' Cómo usar CronoFutbol', '<p>1. Explora torneos, jugadores y partidos con las pestañas.</p><p>2. Regístrate o inicia sesión arriba a la derecha.</p><p>3. Consulta tus torneos en la barra lateral.</p><p>4. Revisa estadísticas y goleadores.</p>'),
};
const TABS = { torneos: ' Torneos', jugadores: 'Equipo: Jugadores', stats: ' Estadísticas de jugador', activos: ' Torneos activos/inactivos', proximos: ' Próximos partidos', jugados: ' Partidos jugados' };
const SIDE = [['torneos', 'torneos', 'Menú'], ['stats', 'stats', 'Estadísticas'], ['mine', 'mine', 'Torneos creados', 1], ['config', 'config', 'Configuración'], ['about', 'about', 'Sobre nosotros'], ['who', 'who', 'Quiénes somos'], ['guide', 'guide', 'Cómo usar']];
const ICO = { torneos: '<path d="M3 11l9-8 9 8M5 10v10h14V10"/>', stats: '<path d="M4 20V10M10 20V4M16 20v-7M22 20H2"/>', mine: '<path d="M8 21h8M12 17v4M7 4h10v5a5 5 0 01-10 0zM7 6H4v2a3 3 0 003 3M17 6h3v2a3 3 0 01-3 3"/>', config: '<circle cx="12" cy="12" r="3"/><path d="M12 2v3M12 19v3M2 12h3M19 12h3M5 5l2 2M17 17l2 2M19 5l-2 2M7 17l-2 2"/>', about: '<circle cx="12" cy="12" r="9"/><path d="M12 11v6M12 7v.5"/>', who: '<circle cx="9" cy="8" r="3.5"/><path d="M2 20c0-4 3-6 7-6s7 2 7 6M17 5a3 3 0 010 6M22 20c0-3-2-5-4-5.5"/>', guide: '<path d="M4 5a2 2 0 012-2h13v16H6a2 2 0 00-2 2zM4 19V5M8 8h7"/>' };
const ico = (k) => `<svg class=ic viewBox="0 0 24 24" width=18 height=18 fill=none stroke=currentColor stroke-width=2 stroke-linecap=round stroke-linejoin=round>${ICO[k] || ''}</svg>`;

function render() {
  $('#tabs').innerHTML = Object.entries(TABS).map(([k, v]) => `<button class="tab ${S.tab === k ? 'on' : ''}" data-t=${k}>${v}</button>`).join('');
  $('#sn').innerHTML = SIDE.filter((s) => !s[3] || S.user).map((s) => `<button class="${S.tab === s[0] ? 'on' : ''}" data-t=${s[0]} title="${s[2]}">${ico(s[1])}<span>${s[2]}</span></button>`).join('');
  $('#title').textContent = TABS[S.tab] || { mine: ' Torneos creados', perfil: ' Perfil', config: ' Configuración', about: ' Sobre nosotros', who: ' Quiénes somos', guide: ' Guía rápida' }[S.tab];
  $('#view').innerHTML = V[S.tab]();
}
function renderUser() {
  const u = S.user;
  $('#user').innerHTML = u
    ? `<button id=ub class=ubtn><span class=av>${esc(u.nombre.charAt(0).toUpperCase())}</span>${esc(u.nombre)} ▾</button><div id=um class="um hide"><button data-t=perfil> Perfil</button><button data-t=config> Configuración</button><p>Rol: <span class=bd>${esc(u.rol?.nombre || '—')}</span></p><label>Cambiar de rol<select id=rs>${S.roles.map((r) => `<option value=${r.id} ${u.rol?.id == r.id ? 'selected' : ''}>${esc(r.nombre)}</option>`).join('')}</select></label><button data-out> Cerrar sesión</button></div>`
    : '<button class=btn data-m=login>Iniciar sesión</button><button class="btn alt" data-m=register>Registrarse</button>';
}
const ui = () => { renderUser(); render(); };

// ====== Eventos ======
document.addEventListener('click', async (e) => {
  const t = e.target.closest('[data-t],[data-m],[data-x],[data-out],[data-a],#burger,#ub');
  if (!t) { if (!e.target.closest('#um')) $('#um')?.classList.add('hide'); return; }
  e.preventDefault();
  if (t.dataset.t) { S.tab = t.dataset.t; $('#um')?.classList.add('hide'); document.body.classList.remove('open'); render(); }
  else if (t.dataset.m) { S.mode = t.dataset.m; formAuth(); if (!$('#dlg').open) $('#dlg').showModal(); }
  else if (t.dataset.x !== undefined) $('#dlg').close();
  else if (t.dataset.a) { S.act = +t.dataset.a; render(); }
  else if (t.dataset.out !== undefined) logout();
  else if (t.id === 'burger') document.body.classList.toggle(innerWidth < 800 ? 'open' : 'mini');
  else if (t.id === 'ub') {
    if (!S.roles.length) { try { S.roles = await api('/roles'); renderUser(); } catch {} }
    $('#um').classList.toggle('hide');
  }
});
document.addEventListener('input', (e) => { if (e.target.id === 'q') { S.q = e.target.value; $('#gj').innerHTML = jCards(); } });
document.addEventListener('change', async (e) => {
  if (e.target.id !== 'rs') return;
  try { await api('/usuarios/' + S.user.id, { method: 'PUT', body: { rol_id: +e.target.value } }); S.user = await api('/auth/me'); save(); ui(); toast('Rol actualizado'); }
  catch (x) { toast(Object.values(x.errors || {})[0]?.[0] || 'No se pudo cambiar el rol'); }
});

// ====== Arranque ======
$('#ct').innerHTML = CONTACTOS.map(([n, u, c, d]) => `<a href="${u}" target=_blank rel=noopener title="${n}"><b class=ci style="background:${c}"><svg viewBox="0 0 24 24" width=16 height=16 fill=#fff><path d="${d}"/></svg></b><span>${n}</span></a>`).join('');
$('#toast').classList.add('hide');
(async () => {
  ui(); $('#view').innerHTML = '<p class=empty><span class=spin></span> Cargando…</p>';
  const k = ['torneos', 'equipos', 'jugadores', 'partidos', 'estadisticas-jugadores'];
  try { (await Promise.all(k.map((x) => api('/' + x)))).forEach((r, i) => (S.d[k[i]] = r)); S.live = 1; }
  catch (x) { S.d = MOCK; S.live = 0; toast('Sin conexión con la API: mostrando datos de ejemplo'); }
  $('#cx').innerHTML = S.live ? '<i></i>API conectada' : '<i class=off></i>Modo demostración';
  if (S.token) api('/auth/me').then((u) => { S.user = u; save(); ui(); }).catch(() => {});
  render();
})();
