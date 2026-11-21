<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>CronoFutbol · Gestor de torneos</title>
<link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@500;700;800&display=swap" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<header class="banner">
  <button id="burger" aria-label="Plegar menú">☰</button>
  <a class="logo" href="/" aria-label="CronoFutbol">
    <svg viewBox="0 0 48 48" width="44" height="44" aria-hidden="true">
      <rect x="19" y="1" width="10" height="5" rx="2" fill="#fff"/>
      <circle cx="24" cy="27" r="19" fill="#fff" stroke="#050D1F" stroke-width="3"/>
      <polygon points="24,16 32,22 29,31 19,31 16,22" fill="#050D1F"/>
      <path d="M24 16V9M32 22l7-3M29 31l5 7M19 31l-5 7M16 22l-7-3" stroke="#050D1F" stroke-width="2.5"/>
      <path d="M24 26V18" stroke="#22c55e" stroke-width="3" stroke-linecap="round"/>
    </svg>
    <span class="logo-t">Crono<b>Futbol</b></span>
  </a>
  <div id="cx"></div>
  <div id="user"></div>
</header>
<div class="shell">
  <aside id="side"><nav id="sn"></nav><div id="ct"></div></aside>
  <main>
    <nav id="tabs"></nav>
    <h2 id="title"></h2>
    <section id="view"></section>
  </main>
</div>
<dialog id="dlg"><form id="fa"></form></dialog>
<div id="toast"></div>
</body>
</html>
