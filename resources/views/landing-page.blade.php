<!DOCTYPE html>
<html lang="es-PE">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Academia Preuniversitaria Newton – Prepárate para ingresar a la universidad con los mejores docentes, métodos innovadores y resultados comprobados en Trujillo.">
    <meta name="robots" content="noindex, nofollow">
    <title>Academia Newton | Propuesta de portafolio</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->

    <!-- Bootstrap 5 CDN -->

    <!-- Font Awesome -->

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="landing-page">
<div class="demo-banner">Propuesta de portafolio · Contenido ficticio · Sin inscripciones ni envíos reales</div>

<!-- TOP BAR -->
<div class="topbar d-none d-md-block">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-4">
                <span><i class="fas fa-phone-alt me-2" style="color: var(--amarillo);"></i>
                    <a href="#contacto">Contacto de demostración</a>
                </span>
                <span><i class="fas fa-envelope me-2" style="color: var(--amarillo);"></i>
                    <a href="#contacto">academia@example.test</a>
                </span>
            </div>
            <div class="d-flex align-items-center gap-3 topbar-right">
                <span style="font-size:0.78rem;">Canales propuestos:</span>
                <div class="social-icons">
                    <a href="#contacto" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#contacto" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#contacto" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
                    <a href="#contacto" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    <a href="#contacto" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- NAVBAR -->
<header>
    <nav class="navbar-newton" id="mainNav">
        <div class="container">
            <div class="nav-container">
                <!-- Logo -->
                <a href="/" class="navbar-brand-newton d-flex align-items-center gap-3">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo Academia Newton">
                    <div>
                        <div class="brand-text">Isaí <span>Newton</span></div>
                        <div class="brand-sub">Preuniversitaria</div>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <ul class="nav-menu">
                    <li><a href="#inicio">Inicio</a></li>
                    <li><a href="#nosotros">Nosotros</a></li>
                    <li class="has-dropdown">
                        <a href="#programas">Ciclos</a>
                        <ul class="dropdown-nav">
                            <li><a href="#programas-preuni">Preuniversitarios</a></li>
                            <li><a href="#programas-escolares">Escolares</a></li>
                        </ul>
                    </li>
                    <li><a href="#ingresantes">Ingresantes</a></li>
                    <li><a href="#inscripciones">Inscripciones</a></li>
                    <li><a href="#contacto">Contacto</a></li>
                </ul>

                <!-- Actions -->
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ url('/login') }}" class="btn-ingresar">
                        <i class="fas fa-lock"></i>
                        Ingresar al Sistema
                    </a>
                    <button class="navbar-toggler-newton d-lg-none" id="navToggler" aria-label="Menú" aria-expanded="false" aria-controls="mobileNav">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Nav -->
        <div class="mobile-nav" id="mobileNav">
            <ul>
                <li><a href="#inicio">Inicio</a></li>
                <li><a href="#nosotros">Nosotros</a></li>
                <li><a href="#programas" style="color: var(--gris-oscuro); font-size:0.78rem; padding:6px 12px;">Ciclos</a></li>
                <ul class="mobile-sub">
                    <li><a href="#programas-preuni">Preuniversitarios</a></li>
                    <li><a href="#programas-escolares">Escolares</a></li>
                </ul>
                <li><a href="#ingresantes">Ingresantes</a></li>
                <li><a href="#inscripciones">Inscripciones</a></li>
                <li><a href="#contacto">Contacto</a></li>
                <li style="margin-top: 10px;">
                    <a href="{{ url('/login') }}" style="background: var(--verde-principal); color: #fff; border-radius: 50px; text-align:center; display:block; padding: 11px 18px;">
                        <i class="fas fa-lock me-2"></i>Ingresar al Sistema
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<p class="proposal-disclaimer mb-0">Exploración de diseño: programas, beneficios, testimonios y cifras son ejemplos de presentación.</p>
<!-- HERO -->
<section id="inicio" class="hero">
    <div class="hero-bg"></div>
    <div class="hero-overlay"></div>
    <div class="hero-shapes"></div>

    <div class="container py-5">
        <div class="row align-items-end">
            <!-- Contenido -->
            <div class="col-lg-6 hero-content">
                <h1 class="reveal">
                    Tu camino hacia la<br>
                    <span class="highlight">Universidad</span><br>
                    comienza aquí
                </h1>
                <p class="reveal">
                    En <strong>Academia Newton</strong> formamos a los mejores estudiantes con métodos pedagógicos innovadores, docentes altamente calificados y un seguimiento personalizado para que logres ingresar a la universidad de tus sueños.
                </p>
                <div class="hero-actions reveal">
                    <a href="#programas" class="btn-newton btn-newton-amarillo">
                        <i class="fas fa-rocket"></i>
                        Ver Programas
                    </a>
                    <a href="#contacto" class="btn-newton btn-newton-outline">
                        <i class="fab fa-whatsapp"></i>
                        Consultar ahora
                    </a>
                </div>
                <div class="hero-stats reveal">
                    <div class="hero-stat-item">
                        <div class="stat-num">+800</div>
                        <div class="stat-label">Estudiantes</div>
                    </div>
                    <div class="hero-stat-item">
                        <div class="stat-num">+300</div>
                        <div class="stat-label">Ingresantes</div>
                    </div>
                    <div class="hero-stat-item">
                        <div class="stat-num">+15</div>
                        <div class="stat-label">Años de experiencia</div>
                    </div>
                </div>
            </div>

            <!-- Imagen -->
            <div class="col-lg-6 hero-image-col">
                <div class="hero-image-wrap">
                    <img src="{{ asset('img/demo/aprendizaje.svg') }}" alt="Aprender, practicar y avanzar">

                    <!-- Tarjeta flotante 1 -->
                    <div class="hero-card-float card-top">
                        <div class="card-icon" style="background: rgba(46,175,31,0.12);">
                            <i class="fas fa-trophy" style="color: var(--verde-principal);"></i>
                        </div>
                        <div class="card-text">
                            <div class="num">#1</div>
                            <div class="lbl">En ingresantes locales</div>
                        </div>
                    </div>

                    <!-- Tarjeta flotante 2 -->
                    <div class="hero-card-float card-bottom">
                        <div class="card-icon" style="background: rgba(248,188,16,0.15);">
                            <i class="fas fa-star" style="color: var(--amarillo);"></i>
                        </div>
                        <div class="card-text">
                            <div class="num">98%</div>
                            <div class="lbl">Satisfacción estudiantil</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Divisor diagonal -->
    <div class="hero-divider">
        <svg viewBox="0 0 1440 80" preserveAspectRatio="none" fill="white" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,80 L1440,0 L1440,80 Z"/>
        </svg>
    </div>
</section>

<!-- POR QUÉ NEWTON — FEATURES -->
<section class="features-section" id="nosotros-features">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <span class="section-label">¿Por qué elegirnos?</span>
            <h2 class="section-title">Lo que nos hace <span>diferentes</span></h2>
            <p class="text-muted mt-3" style="max-width: 520px; margin: auto; font-size:0.92rem; line-height:1.7;">
                Academia especializada en la preparación de estudiantes para ingresar a las carreras <strong>MÉDICAS</strong>, <strong>INGENIERÍAS</strong> y <strong>LETRAS</strong>.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3 reveal">
                <div class="feature-card">
                    <div class="feature-icon" style="background: rgba(46,175,31,0.10);">
                        <i class="fas fa-chalkboard-teacher fa-2x" style="color: var(--verde-principal);"></i>
                    </div>
                    <h3>Docentes Calificados</h3>
                    <p>Contamos con un equipo de profesores especializados con amplia experiencia en preparación preuniversitaria y universitaria.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 reveal" style="transition-delay: 0.1s;">
                <div class="feature-card">
                    <div class="feature-icon" style="background: rgba(248,188,16,0.12);">
                        <i class="fas fa-file-alt fa-2x" style="color: var(--naranja);"></i>
                    </div>
                    <h3>Exámenes Especializados</h3>
                    <p>Preparamos a nuestros estudiantes con simulacros y evaluaciones diseñadas para replicar los exámenes de admisión reales.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 reveal" style="transition-delay: 0.2s;">
                <div class="feature-card">
                    <div class="feature-icon" style="background: rgba(204,0,0,0.08);">
                        <i class="fas fa-brain fa-2x" style="color: var(--rojo);"></i>
                    </div>
                    <h3>Asesoría Integral</h3>
                    <p>Orientación académica y psicológica para el desarrollo completo del estudiante, más allá de las matemáticas y las ciencias.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 reveal" style="transition-delay: 0.3s;">
                <div class="feature-card">
                    <div class="feature-icon" style="background: rgba(9,71,8,0.10);">
                        <i class="fas fa-chart-line fa-2x" style="color: var(--verde-oscuro);"></i>
                    </div>
                    <h3>Seguimiento Personalizado</h3>
                    <p>Monitoreamos el avance de cada alumno y ajustamos el plan de estudios para maximizar sus posibilidades de ingreso.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- NOSOTROS — ABOUT -->
<section class="about-section" id="nosotros">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5 reveal-left">
                <div class="about-img-wrap">
                    <div class="about-experience-badge">
                        <div class="years">+15</div>
                        <div class="label">Años<br>formando<br>líderes</div>
                    </div>
                    <img src="{{ asset('img/demo/aprendizaje.svg') }}" alt="Propuesta de aprendizaje" class="about-img-main">
                    <img src="{{ asset('img/demo/aprendizaje.svg') }}" alt="Identidad gráfica de la propuesta" class="about-img-accent d-none d-sm-block">
                </div>
            </div>
            <div class="col-lg-7 reveal-right">
                <span class="section-label">Nuestra Historia</span>
                <h2 class="section-title mb-3">Comprometidos con tu <span>éxito académico</span></h2>
                <p style="font-size:0.93rem; color: var(--gris-oscuro); line-height:1.75; margin-bottom: 1rem;">
                    Academia Newton nació con un propósito claro: brindar a cada estudiante las herramientas, el conocimiento y la confianza necesarios para alcanzar sus metas universitarias. Creemos que cada alumno tiene el potencial de lograrlo con la guía correcta.
                </p>
                <p style="font-size:0.93rem; color: var(--gris-oscuro); line-height:1.75;">
                    Nuestro equipo pedagógico trabaja de manera coordinada para ofrecer una enseñanza de calidad, con materiales actualizados, sesiones de práctica intensiva y una cultura de superación constante.
                </p>
                <ul class="about-list">
                    <li><i class="fas fa-check-circle"></i> Currículo alineado con los exámenes de admisión de las principales universidades</li>
                    <li><i class="fas fa-check-circle"></i> Aulas modernas y materiales didácticos de primer nivel</li>
                    <li><i class="fas fa-check-circle"></i> Ciclos intensivos, regulares y especiales según tu disponibilidad</li>
                    <li><i class="fas fa-check-circle"></i> Plataforma virtual de apoyo con recursos adicionales</li>
                </ul>
                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="#contacto" class="btn-newton btn-newton-primary">
                        <i class="fas fa-info-circle"></i>
                        Conoce más sobre Newton
                    </a>
                    <a href="#contacto" class="btn-newton" style="color: var(--verde-principal); border: 2px solid var(--verde-principal); background: transparent; border-radius: 50px; padding: 11px 24px; font-weight:700; font-size:0.9rem; display:inline-flex; align-items:center; gap:8px;">
                        <i class="fab fa-whatsapp"></i>
                        Habla con nosotros
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PROGRAMAS -->
<section class="programs-section" id="programas">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <span class="section-label">Programas</span>
            <h2 class="section-title">Prepárate en nuestros <span>ciclos disponibles</span></h2>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- Preuniversitario -->
            <div class="col-md-6 col-lg-5 reveal" id="programas-preuni">
                <div class="program-card">
                    <div class="program-img">
                        <img src="{{ asset('img/demo/preuniversitario.svg') }}" alt="Ciclo Preuniversitario Newton">
                        <span class="program-badge">Preuniversitario</span>
                    </div>
                    <div class="program-body">
                        <h3>Ciclos Preuniversitarios</h3>
                        <p>Preparación intensiva y rigurosa para los exámenes de admisión a las universidades públicas y privadas más importantes de la región.</p>
                        <ul class="program-features">
                            <li><i class="fas fa-check-circle"></i> Ciclo intensivo (3 meses) y regular (6 meses)</li>
                            <li><i class="fas fa-check-circle"></i> Simulacros de examen semanales</li>
                            <li><i class="fas fa-check-circle"></i> Cobertura completa de todas las áreas de evaluación</li>
                            <li><i class="fas fa-check-circle"></i> Tutoría y seguimiento individual</li>
                        </ul>
                        <a href="#contacto" class="btn-link-verde">
                            Ver más información <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Escolares -->
            <div class="col-md-6 col-lg-5 reveal" style="transition-delay: 0.15s;" id="programas-escolares">
                <div class="program-card">
                    <div class="program-img">
                        <img src="{{ asset('img/demo/escolar.svg') }}" alt="Ciclo Escolar Newton">
                        <span class="program-badge" style="background: var(--amarillo); color: var(--negro);">Escolar</span>
                    </div>
                    <div class="program-body">
                        <h3>Ciclos Escolares</h3>
                        <p>Reforzamiento académico para estudiantes de secundaria, potenciando su rendimiento escolar y construyendo las bases para el ingreso universitario.</p>
                        <ul class="program-features">
                            <li><i class="fas fa-check-circle"></i> Para alumnos de 3.°, 4.° y 5.° de secundaria</li>
                            <li><i class="fas fa-check-circle"></i> Refuerzo en Matemáticas, Ciencias y Letras</li>
                            <li><i class="fas fa-check-circle"></i> Preparación para exámenes COAR</li>
                            <li><i class="fas fa-check-circle"></i> Horarios flexibles (mañana y tarde)</li>
                        </ul>
                        <a href="#contacto" class="btn-link-verde">
                            Ver más información <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- STATS CONTADORES -->
<section class="stats-section">
    <div class="container position-relative" style="z-index:2;">
        <div class="row g-0">
            <div class="col-6 col-lg-3 reveal">
                <div class="stat-block">
                    <div class="stat-icon"><i class="fas fa-users"></i></div>
                    <div class="stat-number">
                        <span class="counter" data-target="800">0</span>
                        <span class="counter-suffix">+</span>
                    </div>
                    <div class="stat-desc">Estudiantes</div>
                </div>
            </div>
            <div class="col-6 col-lg-3 reveal" style="transition-delay:0.1s;">
                <div class="stat-block">
                    <div class="stat-icon"><i class="fas fa-university"></i></div>
                    <div class="stat-number">
                        <span class="counter" data-target="300">0</span>
                        <span class="counter-suffix">+</span>
                    </div>
                    <div class="stat-desc">Ingresantes</div>
                </div>
            </div>
            <div class="col-6 col-lg-3 reveal" style="transition-delay:0.2s;">
                <div class="stat-block">
                    <div class="stat-icon"><i class="fas fa-medal"></i></div>
                    <div class="stat-number">
                        <span class="counter" data-target="15">0</span>
                        <span class="counter-suffix">+</span>
                    </div>
                    <div class="stat-desc">Años de trayectoria</div>
                </div>
            </div>
            <div class="col-6 col-lg-3 reveal" style="transition-delay:0.3s;">
                <div class="stat-block">
                    <div class="stat-icon"><i class="fas fa-award"></i></div>
                    <div class="stat-number">
                        <span class="counter" data-target="10">0</span>
                        <span class="counter-suffix">+</span>
                    </div>
                    <div class="stat-desc">Primeros puestos</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- INGRESANTES DESTACADOS -->
<section class="ingresantes-section" id="ingresantes">
    <p class="text-center pt-4 px-3 text-secondary">Perfiles, resultados y cifras ilustrativos. No representan registros de estudiantes.</p>
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-md-8 reveal">
                <span class="section-label">Ingresantes</span>
                <h2 class="section-title">Nuestros <span>Ingresantes y Cómputos</span></h2>
            </div>
            <div class="col-md-4 text-md-end reveal">
                <a href="#contacto" class="btn-newton btn-newton-primary">
                    Ver todos <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="row g-4" id="ingresantes-uni">
            <!-- Card 1 -->
            <div class="col-6 col-md-4 col-lg-2dot4 reveal">
                <div class="ingresante-card">
                    <div class="ingresante-img">
                        <img src="{{ asset('img/demo/perfil-1.svg') }}" alt="Perfil ficticio de la propuesta">
                        <div class="ingresante-ribbon">
                            <span class="faculty-badge">1.° puesto</span>
                        </div>
                    </div>
                    <div class="ingresante-body">
                        <div class="ingresante-name">Estudiante A</div>
                        <div class="ingresante-place">Ingresante Excelencia 2026-II - Arquitectura</div>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-6 col-md-4 col-lg-2dot4 reveal" style="transition-delay:0.08s;">
                <div class="ingresante-card">
                    <div class="ingresante-img">
                        <img src="{{ asset('img/demo/perfil-2.svg') }}" alt="Perfil ficticio de la propuesta">
                        <div class="ingresante-ribbon">
                            <span class="faculty-badge">4° puesto</span>
                        </div>
                    </div>
                    <div class="ingresante-body">
                        <div class="ingresante-name">Estudiante B</div>
                        <div class="ingresante-place">Ingresante Excelencia 2026-II - Ing. Industrial</div>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-6 col-md-4 col-lg-2dot4 reveal" style="transition-delay:0.16s;">
                <div class="ingresante-card">
                    <div class="ingresante-img">
                        <img src="{{ asset('img/demo/perfil-3.svg') }}" alt="Perfil ficticio de la propuesta">
                        <div class="ingresante-ribbon">
                            <span class="faculty-badge">3.° puesto</span>
                        </div>
                    </div>
                    <div class="ingresante-body">
                        <div class="ingresante-name">Estudiante C</div>
                        <div class="ingresante-place">Ingresante Excelencia 2026-II - Ing. Mecánica</div>
                    </div>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="col-6 col-md-4 col-lg-2dot4 reveal" style="transition-delay:0.24s;">
                <div class="ingresante-card">
                    <div class="ingresante-img">
                        <img src="{{ asset('img/demo/perfil-4.svg') }}" alt="Perfil ficticio de la propuesta">
                        <div class="ingresante-ribbon">
                            <span class="faculty-badge">2.° puesto</span>
                        </div>
                    </div>
                    <div class="ingresante-body">
                        <div class="ingresante-name">Estudiante D</div>
                        <div class="ingresante-place">Ingresante 2026-II - Ing. Informática</div>
                    </div>
                </div>
            </div>
            <!-- Card 5 -->
            <div class="col-6 col-md-4 col-lg-2dot4 reveal" style="transition-delay:0.32s;">
                <div class="ingresante-card">
                    <div class="ingresante-img">
                        <img src="{{ asset('img/demo/perfil-5.svg') }}" alt="Perfil ficticio de la propuesta">
                        <div class="ingresante-ribbon">
                            <span class="faculty-badge">1° Puesto</span>
                        </div>
                    </div>
                    <div class="ingresante-body">
                        <div class="ingresante-name">Estudiante E</div>
                        <div class="ingresante-place">Ingresante 2026-II - Ing. Informática</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TESTIMONIOS -->
<section class="testimonials-section">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <span class="section-label">Testimonios</span>
            <h2 class="section-title">Así se presentarían los <span>testimonios</span></h2>
            <p class="mt-3 text-secondary">Textos y perfiles ficticios para mostrar el diseño de la propuesta.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4 reveal">
                <div class="testimonial-card">
                    <div class="quote-icon">"</div>
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">
                        "Gracias a los profesores de Newton pude ingresar a Medicina en mi primer intento. La metodología es increíble y el seguimiento que te dan es muy diferente a otras academias."
                    </p>
                    <div class="testimonial-author">
                        <img src="{{ asset('img/demo/perfil-1.svg') }}" alt="Perfil ficticio" class="author-avatar">
                        <!-- <div class="author-initial">KM</div> -->
                        <div>
                            <div class="author-name">Testimonio A</div>
                            <div class="author-info">Ingresante UNT – Medicina 2025</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 reveal" style="transition-delay:0.12s;">
                <div class="testimonial-card">
                    <div class="quote-icon">"</div>
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">
                        "Newton me cambió la perspectiva. Llegué con muchas dudas y salí con una beca universitaria. Los simulacros semanales me prepararon perfectamente para el examen real."
                    </p>
                    <div class="testimonial-author">
                        <!-- <div class="author-initial">LP</div> -->
                        <img src="{{ asset('img/demo/perfil-3.svg') }}" alt="Perfil ficticio" class="author-avatar">
                        <div>
                            <div class="author-name">Testimonio B</div>
                            <div class="author-info">Ingresante UNT – Ingeniería 2025</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 reveal" style="transition-delay:0.24s;">
                <div class="testimonial-card">
                    <div class="quote-icon">"</div>
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="testimonial-text">
                        "El apoyo psicológico y académico que te dan en Newton es invaluable. No solo aprendes la materia, te enseñan a manejar la presión del examen. Quedé en el primer puesto de Administración."
                    </p>
                    <div class="testimonial-author">
                        <!-- <div class="author-initial">SR</div> -->
                        <img src="{{ asset('img/demo/perfil-2.svg') }}" alt="Perfil ficticio" class="author-avatar">
                        <div>
                            <div class="author-name">Testimonio C</div>
                            <div class="author-info">Ingresante UNT – Administración 2025</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Inscripciones — CTA BANNER -->
<section class="cta-section" id="inscripciones">
    <div class="container position-relative" style="z-index:2;">
        <div class="row align-items-center">
            <div class="col-lg-8 reveal">
                <h2 class="mb-2">¡Inscripciones abiertas para el nuevo ciclo!</h2>
                <p class="mb-0">No dejes pasar la oportunidad. Cupos limitados. Contáctanos ahora y asegura tu lugar en el próximo ciclo preuniversitario de Newton.</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0 reveal" style="transition-delay:0.15s;">
                <a href="#contacto" class="btn-whatsapp me-2">
                    <i class="fab fa-whatsapp fa-lg"></i>
                    Inscríbete ahora
                </a>
            </div>
        </div>
    </div>
</section>

<!-- CONTACTO — UBICACIÓN -->
<section class="about-section" id="contacto" style="background: var(--bg-light); padding: 80px 0;">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <span class="section-label">Contáctanos</span>
            <h2 class="section-title">¿Listo para comenzar? <span>Hablemos</span></h2>
        </div>

        <div class="row g-4 align-items-start">
            <!-- Formulario de demostración; sin envío ni persistencia -->
            <div class="col-lg-6 reveal-left">
                <form id="demoContactForm" style="background: var(--blanco); border-radius: 16px; padding: 36px; box-shadow: var(--sombra-suave);">
                    <h4 style="font-family: var(--font-titulo); font-weight:800; margin-bottom:1.5rem; color: var(--negro);">
                        Prueba el formulario
                    </h4>
                    <div class="mb-3">
                        <label for="contactName" class="form-label">Nombre completo</label>
                        <input id="contactName" type="text" required maxlength="100" autocomplete="off" placeholder="Tu nombre completo"
                            style="width:100%; padding: 11px 16px; border: 1.5px solid var(--gris-claro); border-radius: 10px; font-size:0.9rem; font-family: var(--font-cuerpo); outline:none; transition: border-color 0.2s;"
                            onfocus="this.style.borderColor='var(--verde-principal)'"
                            onblur="this.style.borderColor='var(--gris-claro)'">
                    </div>
                    <div class="mb-3">
                        <label for="contactEmail" class="form-label">Correo electrónico</label>
                        <input id="contactEmail" type="email" required maxlength="254" autocomplete="off" placeholder="tucorreo@ejemplo.com"
                            style="width:100%; padding: 11px 16px; border: 1.5px solid var(--gris-claro); border-radius: 10px; font-size:0.9rem; font-family: var(--font-cuerpo); outline:none; transition: border-color 0.2s;"
                            onfocus="this.style.borderColor='var(--verde-principal)'"
                            onblur="this.style.borderColor='var(--gris-claro)'">
                    </div>
                    <div class="mb-3">
                        <label for="contactProgram" class="form-label">Programa de interés</label>
                        <select id="contactProgram" required style="width:100%; padding: 11px 16px; border: 1.5px solid var(--gris-claro); border-radius: 10px; font-size:0.9rem; font-family: var(--font-cuerpo); outline:none; background:white; transition: border-color 0.2s;"
                            onfocus="this.style.borderColor='var(--verde-principal)'"
                            onblur="this.style.borderColor='var(--gris-claro)'">
                            <option value="">Selecciona un programa</option>
                            <option>Preuniversitario Intensivo</option>
                            <option>Preuniversitario Regular</option>
                            <option>Escolar – Secundaria</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="contactMessage" class="form-label">Mensaje (opcional)</label>
                        <textarea id="contactMessage" maxlength="1000" rows="3" placeholder="Cuéntanos tu consulta..."
                            style="width:100%; padding: 11px 16px; border: 1.5px solid var(--gris-claro); border-radius: 10px; font-size:0.9rem; font-family: var(--font-cuerpo); outline:none; resize:vertical; transition: border-color 0.2s;"
                            onfocus="this.style.borderColor='var(--verde-principal)'"
                            onblur="this.style.borderColor='var(--gris-claro)'"></textarea>
                    </div>
                    <button type="submit" class="btn-newton btn-newton-primary w-100" style="justify-content:center; padding: 13px;">
                        <i class="fas fa-paper-plane"></i>
                        Probar solicitud
                    </button>
                    <p id="contactFeedback" role="status" class="mt-3 mb-0">Formulario de muestra. No envía ni guarda tus datos; usa información ficticia.</p>
                </form>
            </div>

            <!-- Info de contacto + mapa -->
            <div class="col-lg-6 reveal-right">
                <div class="footer-contact-item mb-4">
                    <div class="icon" style="background:rgba(46,175,31,0.12); width:48px; height:48px; font-size:1rem; color:var(--verde-principal);">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="info">
                        <strong style="color:var(--negro); font-size:0.9rem;">Dirección</strong><br>
                        <span style="color:var(--negro); font-size:0.8rem;">Sede ilustrativa · Trujillo, Perú</span>
                    </div>
                </div>
                <div class="footer-contact-item mb-4">
                    <div class="icon" style="background:rgba(46,175,31,0.12); width:48px; height:48px; font-size:1rem; color:var(--verde-principal);">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="info">
                        <strong style="color:var(--negro); font-size:0.9rem;">Teléfono / WhatsApp</strong><br>
                        <span style="color:var(--negro); font-size:0.8rem;">Contacto de demostración</span>
                    </div>
                </div>
                <div class="footer-contact-item mb-4">
                    <div class="icon" style="background:rgba(46,175,31,0.12); width:48px; height:48px; font-size:1rem; color:var(--verde-principal);">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="info">
                        <strong style="color:var(--negro); font-size:0.9rem;">Correo electrónico</strong><br>
                        <span style="color:var(--negro); font-size:0.8rem;">academia@example.test</span>
                    </div>
                </div>
                <div class="footer-contact-item mb-4">
                    <div class="icon" style="background:rgba(46,175,31,0.12); width:48px; height:48px; font-size:1rem; color:var(--verde-principal);">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="info">
                        <strong style="color:var(--negro); font-size:0.9rem;">Horario de atención</strong><br>
                        <span style="color:var(--negro); font-size:0.8rem;">Lun – Sáb: 7:00 am – 8:00 pm</span>
                    </div>
                </div>

                <!-- Mapa placeholder -->
                <div style="border-radius: 14px; overflow: hidden; height: 290px; background: var(--gris-claro); position:relative;">
                    <div class="demo-location"><i class="fas fa-map-marker-alt" aria-hidden="true"></i><strong>Espacio para la ubicación</strong><span>La propuesta contempla un mapa de la sede. Esta demo no enlaza una dirección real.</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="pre-footer">
    <div class="container">
        <div class="row g-4">
            <!-- Columna 1 – Logo y descripción -->
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <img src="{{ asset('img/logo_v2.png') }}" alt="Logo Newton" style="height:48px;">
                    <div>
                        <div class="footer-logo-text">Academia <span>Newton</span></div>
                        <div class="footer-tagline">Preuniversitaria</div>
                    </div>
                </div>
                <p style="font-size:0.85rem; color:rgba(255,255,255,0.55); line-height:1.7; max-width:280px;">
                    Formando a los ingresantes del mañana con excelencia académica, valores y un compromiso real con el éxito de cada estudiante.
                </p>
                <div class="footer-social-links">
                    <a href="#contacto" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#contacto" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#contacto" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
                    <a href="#contacto" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    <a href="#contacto" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>

            <!-- Columna 2 – Links rápidos -->
            <div class="col-lg-2 col-md-6 col-6">
                <h5>Menú</h5>
                <ul class="footer-links">
                    <li><a href="#inicio"><i class="fas fa-chevron-right"></i> Inicio</a></li>
                    <li><a href="#nosotros"><i class="fas fa-chevron-right"></i> Nosotros</a></li>
                    <li><a href="#programas-preuni"><i class="fas fa-chevron-right"></i> Preuniversitario</a></li>
                    <li><a href="#programas-escolares"><i class="fas fa-chevron-right"></i> Escolares</a></li>
                    <li><a href="#ingresantes"><i class="fas fa-chevron-right"></i> Ingresantes</a></li>
                    <li><a href="#inscripciones"><i class="fas fa-chevron-right"></i> Inscripciones</a></li>
                </ul>
            </div>

            <!-- Columna 3 – Programas -->
            <div class="col-lg-2 col-md-6 col-6">
                <h5>Programas</h5>
                <ul class="footer-links">
                    <li><a href="#programas-preuni"><i class="fas fa-chevron-right"></i> Ciclo Intensivo</a></li>
                    <li><a href="#programas-preuni"><i class="fas fa-chevron-right"></i> Ciclo Regular</a></li>
                    <li><a href="#programas-escolares"><i class="fas fa-chevron-right"></i> Ciclo Escolar</a></li>
                    <li><a href="{{ url('/login') }}" style="color: var(--verde-menta); font-weight:700;">
                        <i class="fas fa-lock"></i> Ingresar al Sistema
                    </a></li>
                </ul>
            </div>

            <!-- Columna 4 – Contacto -->
            <div class="col-lg-4 col-md-6">
                <h5>Contacto</h5>
                <div class="footer-contact-item">
                    <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="info">Sede ilustrativa · Trujillo, Perú</div>
                </div>
                <div class="footer-contact-item">
                    <div class="icon"><i class="fas fa-phone-alt"></i></div>
                    <div class="info"><a href="#contacto">Contacto de demostración</a></div>
                </div>
                <div class="footer-contact-item">
                    <div class="icon"><i class="fas fa-envelope"></i></div>
                    <div class="info"><a href="#contacto">academia@example.test</a></div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Footer Bottom -->
<div class="footer-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                &copy; {{ date('Y') }} Academia Preuniversitaria Newton. Propuesta académica para portafolio.
            </div>
            <div class="col-md-6 text-md-end mt-2 mt-md-0">
                Diseñado con <i class="fas fa-heart" style="color: var(--rojo);"></i> para los estudiantes de Trujillo
            </div>
        </div>
    </div>
</div>

<!-- Back to top -->
<a href="#inicio" class="back-to-top" id="backToTop" aria-label="Volver arriba">
    <i class="fas fa-arrow-up"></i>
</a>

<!-- Bootstrap JS -->

</body>
</html>