import 'bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const mainNav = document.getElementById('mainNav');
    const mobileNav = document.getElementById('mobileNav');
    const toggler = document.getElementById('navToggler');
    const backToTop = document.getElementById('backToTop');
    window.addEventListener('scroll', () => {
        mainNav?.classList.toggle('scrolled', window.scrollY > 60);
        backToTop?.classList.toggle('show', window.scrollY > 400);
    }, { passive: true });
    toggler?.addEventListener('click', () => {
        const open = mobileNav?.classList.toggle('open') ?? false;
        toggler.setAttribute('aria-expanded', String(open));
    });
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', event => {
            const id = anchor.getAttribute('href').slice(1);
            const target = id ? document.getElementById(id) : null;
            if (!target) return;
            event.preventDefault();
            target.scrollIntoView({ behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'instant' : 'smooth' });
            mobileNav?.classList.remove('open');
            toggler?.setAttribute('aria-expanded', 'false');
        });
    });
    document.getElementById('demoContactForm')?.addEventListener('submit', event => {
        event.preventDefault();
        document.getElementById('contactFeedback').textContent = 'Prueba completada. No se envió ni se guardó ningún dato.';
        event.currentTarget.reset();
    });
    document.getElementById('togglePassword')?.addEventListener('click', event => {
        const input = document.getElementById('password');
        const visible = input.type === 'password';
        input.type = visible ? 'text' : 'password';
        event.currentTarget.setAttribute('aria-pressed', String(visible));
        event.currentTarget.setAttribute('aria-label', visible ? 'Ocultar contraseña' : 'Mostrar contraseña');
    });
    document.getElementById('sidebarClose')?.addEventListener('click', () => {
        document.body.classList.remove('sidebar-open');
        document.getElementById('sidebarToggle')?.setAttribute('aria-expanded', 'false');
    });
    document.getElementById('sidebarToggle')?.addEventListener('click', event => {
        const open = document.body.classList.toggle('sidebar-open');
        event.currentTarget.setAttribute('aria-expanded', String(open));
    });
});
