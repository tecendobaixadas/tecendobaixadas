<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tecendo Baixadas — Home</title>

  <!-- Bootstrap CSS (latest stable) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Font (to match bold modern look) -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">

  <style>
    :root{
      --brand-black: #0b0b0b;
      --muted: #6b6b6b;
      --card-bg: #f1f2f3;
      --accent: #0d2b3a; /* dark blue for buttons */
    }

    body {
      font-family: "Poppins", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
      color: #111;
      background: #fff;
    }

    /* Top bar and header */
    .topbar {
      background: var(--brand-black);
      color: #fff;
    }
    .site-logo {
      font-weight: 800;
      letter-spacing: 0.02em;
      font-size: 1.25rem;
    }

    /* Hero */
    .hero {
      background: #f3f4f5;
      padding: 4.5rem 0;
    }
    .hero .hero-title {
      font-weight: 800;
      font-size: clamp(1.6rem, 3vw, 2.6rem);
      line-height: 1.05;
    }
    .hero .hero-lead {
      color: var(--muted);
      margin-top: 1rem;
      max-width: 42rem;
    }
    .btn-outline-brand {
      border: 2px solid #111;
      color: #111;
      background: transparent;
      border-radius: 0.5rem;
      padding: 0.6rem 1.25rem;
    }
    .btn-brand {
      background: #111;
      color: #fff;
      border-radius: 0.5rem;
      padding: 0.6rem 1.25rem;
    }

    /* small nav dots/arrows on hero sides */
    .hero .side-arrow {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      border: 1px solid #d2d4d6;
      background: #fff;
      display:flex;
      align-items:center;
      justify-content:center;
    }

    /* "what you can do" cards */
    .feature-card {
      background: #f6f6f7;
      border-radius: 0.75rem;
      padding: 1.25rem;
      min-height: 8.2rem;
      box-shadow: none;
    }
    .feature-card h6 { font-weight: 700; margin-bottom: .5rem; }

    /* content two-column */
    .media-placeholder {
      background: #ececec;
      border-radius: 0.6rem;
      min-height: 18rem;
    }

    /* "Quem faz parte da rede" cards */
    .profile-card {
      background: #fafafa;
      border-radius: .6rem;
      padding: 1.25rem;
      box-shadow: none;
      min-height: 11.5rem;
      display:flex;
      flex-direction:column;
      justify-content:space-between;
    }
    .profile-card .badge-arrow {
      width:32px;height:32px;border-radius:50%;
      background:#000;color:#fff;display:flex;align-items:center;justify-content:center;
      position:absolute; right:1rem; top:-0.75rem;
    }
    .profile-card .card-title { font-weight:700; font-size:1rem; }

    /* partners strip */
    .partners {
      background: #0b0b0b; color: #fff;
      padding: 1.5rem 0;
    }
    .partner-logo {
      opacity: 0.95;
      filter: grayscale(100%);
      width: 120px;
      max-width: 100%;
    }

    /* map placeholder section */
    .map-placeholder {
      background: #eaeaea;
      border-radius: .6rem;
      min-height: 14rem;
    }

    /* CTA */
    .final-cta {
      padding: 3rem 0;
      text-align: center;
    }
    .final-cta .btn-cta {
      background: #000;
      color: #fff;
      border-radius: .5rem;
      padding: .6rem 1.4rem;
    }

    /* footer */
    footer {
      background:#0b0b0b;color:#fff;padding:2.5rem 0;
    }

    /* responsive tweaks to match image spacing */
    @media (min-width: 992px){
      .hero { padding: 5.5rem 0; }
      .hero .hero-title { font-size: 3rem; }
    }

  </style>
</head>
<body>

  <!-- TOP thin header with logo + search area -->
  <div class="topbar py-2">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center gap-3">
        <div class="site-logo text-white">TECENDO<br>BAIXADAS</div>
      </div>

      <div class="d-flex align-items-center gap-3">
        <nav class="d-none d-md-flex gap-3 align-items-center">
          <a class="text-white text-decoration-none">Início</a>
          <a class="text-white text-decoration-none">Sobre o projeto</a>
          <a class="text-white text-decoration-none">Como funciona</a>
          <a class="text-white text-decoration-none">Oportunidades</a>
          <a class="text-white text-decoration-none">Parceiros</a>
          <a class="text-white text-decoration-none">Contato</a>
        </nav>

        <form class="d-flex align-items-center">
          <input class="form-control form-control-sm me-2" style="width:220px;" type="search" placeholder="Pesquisar...">
        </form>

        <div class="d-flex gap-2">
          <a class="btn btn-sm btn-light" href="{{ route('login') }}">Entrar</a>
          <a class="btn btn-sm btn-dark" href="{{ route('register') }}">Cadastrar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- HERO -->
  <header class="hero">
    <div class="container">
      <div class="row align-items-center">
        <!-- left arrow -->
        <div class="col-1 d-flex justify-content-center d-none d-lg-flex">
          <div class="side-arrow"><i class="bi bi-chevron-left"></i></div>
        </div>

        <div class="col-lg-10">
          <div class="row gy-4">
            <div class="col-lg-6">
              <h2 class="hero-title">Conecte-se a oportunidades verdes aqui</h2>
              <p class="hero-lead">Através do Tecendo Baixadas, você encontra cursos, empregos e projetos socioambientais que unem sustentabilidade, tecnologia e impacto social</p>

              <div class="d-flex gap-3 mt-3">
                <button class="btn-outline-brand">Encontre oportunidades</button>
                <a class="btn-brand" href="{{ route('register') }}" style="text-decoration:none;">Cadastrar</a>
              </div>
            </div>

            <div class="col-lg-6 d-flex justify-content-center">
              <!-- big circular logo overlapping the banner as in image -->
              <div class="rounded-circle bg-white d-flex align-items-center justify-content-center shadow" style="width:160px;height:160px;margin-top:1rem;">
                <img src="https://via.placeholder.com/120" alt="logo" style="width:120px;height:120px;border-radius:50%;">
              </div>
            </div>
          </div>
        </div>

        <!-- right arrow -->
        <div class="col-1 d-flex justify-content-center d-none d-lg-flex">
          <div class="side-arrow"><i class="bi bi-chevron-right"></i></div>
        </div>
      </div>
    </div>
  </header>

  <!-- small horizontal tag list under hero -->
  <section class="py-3">
    <div class="container text-center">
      <div class="d-flex flex-wrap justify-content-center gap-3 small text-uppercase" style="color:#333;">
        <span>• ALIMENTAÇÃO</span>
        <span>• HOSPEDAGEM</span>
        <span>• MAPA</span>
        <span>• PASSEIOS</span>
        <span>• PRAIAS</span>
        <span>• TRILHAS</span>
      </div>
    </div>
  </section>

  <!-- "O que você pode fazer por aqui" cards -->
  <section class="py-4">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h5 class="mb-4">O que você pode fazer por aqui</h5>
        </div>

        <div class="col-md-4 mb-3">
          <div class="feature-card">
            <h6>Empregos verdes</h6>
            <p class="mb-0 text-muted">Descubra empresas comprometidas com sustentabilidade e encontre vagas que fazem sentido para você.</p>
          </div>
        </div>

        <div class="col-md-4 mb-3">
          <div class="feature-card">
            <h6>Cursos e formações</h6>
            <p class="mb-0 text-muted">Aprenda sobre meio ambiente, inovação e sustentabilidade. Gratuitos ou pagos, todos com propósito.</p>
          </div>
        </div>

        <div class="col-md-4 mb-3">
          <div class="feature-card">
            <h6>Projetos socioambientais</h6>
            <p class="mb-0 text-muted">Participe de projetos e ações de voluntariado que transformam a sua comunidade.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- two-column section: media left, text right -->
  <section class="py-5 bg-white">
    <div class="container">
      <div class="row g-4 align-items-center">
        <div class="col-lg-6">
          <div class="media-placeholder"></div>
        </div>

        <div class="col-lg-6">
          <h3 class="mb-3">Acreditamos em um futuro que seja verde e justo para nossas baixadas e periferias</h3>
          <p class="text-muted">O Tecendo Baixadas nasceu para transformar realidades e criar pontes entre quem sonha e quem faz acontecer.</p>
          <p class="text-muted">Nas comunidades de baixada, onde a força das pessoas é tão grande quanto os desafios, acreditamos que o conhecimento e a conexão são as chaves para gerar mudanças duradouras.</p>
          <p class="text-muted">Aqui, jovens encontram caminhos com propósito; empresas descobrem talentos comprometidos com o meio ambiente; e organizações fortalecem suas redes de impacto.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Quem faz parte da rede -->
  <section class="py-5">
    <div class="container">
      <div class="row mb-4">
        <div class="col-12 text-center">
          <h4>Quem faz parte da rede</h4>
        </div>
      </div>

      <div class="row g-4 justify-content-center">
        <div class="col-6 col-md-3">
          <div class="position-relative profile-card">
            <div class="position-absolute" style="left:1rem; top:-1rem;">
              <span class="badge bg-white text-dark border">↗</span>
            </div>
            <div>
              <h5 class="card-title">Sou juventude</h5>
              <p class="small text-muted">Quero aprender, treinar, trabalhar e fazer parte da mudança.</p>
            </div>
            <div class="mt-2">
              <button class="btn btn-outline-dark btn-sm w-100">Criar meu perfil</button>
            </div>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="position-relative profile-card">
            <div class="position-absolute" style="left:1rem; top:-1rem;">
              <span class="badge bg-white text-dark border">↗</span>
            </div>
            <div>
              <h5 class="card-title">Sou empresa</h5>
              <p class="small text-muted">Quero contratar jovens talentos e fortalecer meu compromisso com o meio ambiente.</p>
            </div>
            <div class="mt-2">
              <button class="btn btn-outline-dark btn-sm w-100">Cadastrar vagas</button>
            </div>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="position-relative profile-card">
            <div class="position-absolute" style="left:1rem; top:-1rem;">
              <span class="badge bg-white text-dark border">↗</span>
            </div>
            <div>
              <h5 class="card-title">Sou Instituição de Ensino</h5>
              <p class="small text-muted">Formo pessoas em áreas socioambientais e quero divulgar minhas formações.</p>
            </div>
            <div class="mt-2">
              <button class="btn btn-outline-dark btn-sm w-100">Oferecer cursos</button>
            </div>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="position-relative profile-card">
            <div class="position-absolute" style="left:1rem; top:-1rem;">
              <span class="badge bg-white text-dark border">↗</span>
            </div>
            <div>
              <h5 class="card-title">Sou ONG</h5>
              <p class="small text-muted">Busco voluntários e parcerias para projetos socioambientais.</p>
            </div>
            <div class="mt-2">
              <button class="btn btn-outline-dark btn-sm w-100">Cadastrar projetos</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Partners strip -->
  <section class="partners">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 text-center mb-3">
          <h5 style="color:#fff; font-weight:600; margin-bottom:1rem;">Parceiros e apoiadores</h5>
        </div>
        <div class="col-12">
          <div class="d-flex flex-wrap justify-content-center align-items-center gap-4">
            <!-- replace these placeholders with real logos -->
            <img src="https://via.placeholder.com/140x40?text=Logo+1" alt="" class="partner-logo">
            <img src="https://via.placeholder.com/120x40?text=Logo+2" alt="" class="partner-logo">
            <img src="https://via.placeholder.com/140x40?text=Logo+3" alt="" class="partner-logo">
            <img src="https://via.placeholder.com/120x40?text=Logo+4" alt="" class="partner-logo">
            <img src="https://via.placeholder.com/120x40?text=Logo+5" alt="" class="partner-logo">
            <img src="https://via.placeholder.com/120x40?text=Logo+6" alt="" class="partner-logo">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Map + CTA left -->
  <section class="py-5">
    <div class="container">
      <div class="row g-4 align-items-center">
        <div class="col-lg-5">
          <h4>Explore o mapa e encontre oportunidades perto de você</h4>
          <p class="text-muted">Descubra onde estão os projetos, cursos e vagas sustentáveis que estão transformando as baixadas.</p>
          <button class="btn btn-outline-dark">Criar meu perfil</button>
        </div>
        <div class="col-lg-7">
          <div class="map-placeholder"></div>
        </div>
      </div>
    </div>
  </section>

  <!-- final CTA -->
  <section class="final-cta">
    <div class="container">
      <h3>Comece a tecer as baixadas agora</h3>
      <p class="text-muted">Faça parte de uma rede que conecta pessoas e oportunidades para transformar o planeta e as comunidades.</p>
      <button class="btn btn-cta">Quero participar</button>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row align-items-start">
        <div class="col-md-3 mb-3">
          <div style="font-weight:800; font-size:1.1rem;">TECENDO<br>BAIXADAS</div>
        </div>
        <div class="col-md-9">
          <ul class="list-unstyled d-flex gap-3 flex-wrap" style="color:#d0d0d0;">
            <li class="me-3">Início</li>
            <li class="me-3">Sobre o projeto</li>
            <li class="me-3">Como funciona</li>
            <li class="me-3">Oportunidades</li>
            <li class="me-3">Parceiros</li>
            <li class="me-3">Contato</li>
            <li class="me-3">Empresas e Ongs</li>
            <li class="me-3">Blog</li>
          </ul>
          <p class="text-muted small mt-3">© 2025 Tecendo Baixadas — todos os direitos reservados.</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap Bundle (JS + Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
