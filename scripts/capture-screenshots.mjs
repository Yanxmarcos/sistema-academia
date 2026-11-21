import { chromium } from '@playwright/test';
import { spawn, spawnSync } from 'node:child_process';
import { randomBytes } from 'node:crypto';
import { mkdir, writeFile, unlink } from 'node:fs/promises';
import path from 'node:path';

const root = process.cwd();
const output = path.join(root, 'docs', 'screenshots');
const privateDir = path.join(root, '.portfolio-private');
await mkdir(output, { recursive: true });
await mkdir(privateDir, { recursive: true });
const database = path.join(privateDir, `capture-${process.pid}.sqlite`);
await writeFile(database, '');
const password = randomBytes(24).toString('base64url');
const port = process.env.SCREENSHOT_PORT || '8765';
const baseURL = `http://127.0.0.1:${port}`;
const env = {
    ...process.env,
    APP_ENV: 'local', APP_DEBUG: 'false', APP_URL: baseURL,
    APP_KEY: `base64:${randomBytes(32).toString('base64')}`,
    DB_CONNECTION: 'sqlite', DB_DATABASE: database, DB_URL: '',
    SESSION_DRIVER: 'database', SESSION_SECURE_COOKIE: 'false',
    CACHE_STORE: 'file', MAIL_MAILER: 'array', QUEUE_CONNECTION: 'sync',
    DEMO_MODE: 'true', DEMO_PASSWORD: password,
};
const php = process.env.PHP_BINARY || 'php';
function artisan(args) {
    const result = spawnSync(php, ['artisan', ...args], { cwd: root, env, encoding: 'utf8', windowsHide: true });
    if (result.status !== 0) throw new Error(`Artisan ${args[0]} failed: ${result.stderr || result.stdout}`);
}
let server;
let browser;
const errors = [];
try {
    artisan(['migrate', '--force', '--no-interaction', '--quiet']);
    artisan(['demo:seed', '--quiet']);
    server = spawn(php, ['artisan', 'serve', '--host=127.0.0.1', `--port=${port}`, '--no-reload'], { cwd: root, env, stdio: 'ignore', windowsHide: true });
    let ready = false;
    for (let i = 0; i < 80; i++) {
        try { if ((await fetch(baseURL)).ok) { ready = true; break; } } catch {}
        await new Promise(resolve => setTimeout(resolve, 250));
    }
    if (!ready) throw new Error('The isolated screenshot server did not start.');
    const channel = process.env.PLAYWRIGHT_CHANNEL || (process.platform === 'win32' ? 'msedge' : 'chromium');
    browser = await chromium.launch({ headless: true, ...(channel === 'chromium' ? {} : { channel }) });
    async function pageFor(viewport = { width: 1440, height: 1000 }) {
        const context = await browser.newContext({ viewport, deviceScaleFactor: 1, reducedMotion: 'reduce' });
        const page = await context.newPage();
        page.setDefaultTimeout(10000);
        page.on('pageerror', error => errors.push(error.message));
        page.on('response', response => {
            if (response.status() >= 400 && response.status() !== 403) errors.push(`${response.status()} ${response.url()}`);
        });
        page.on('request', request => {
            if (!request.url().startsWith(baseURL) && !request.url().startsWith('data:')) errors.push(`External request: ${request.url()}`);
        });
        return page;
    }
    async function settle(page) {
        await page.waitForLoadState('networkidle');
        await page.evaluate(() => document.fonts.ready);
        const overflow = await page.evaluate(() => document.documentElement.scrollWidth > innerWidth + 2 ? { viewport: innerWidth, document: document.documentElement.scrollWidth, offenders: [...document.querySelectorAll('body *')].filter(el => el.getBoundingClientRect().right > innerWidth + 2).slice(0, 6).map(el => el.className) } : null);
        if (overflow) errors.push(`Horizontal overflow: ${page.url()} ${JSON.stringify(overflow)}`);
    }
    async function capture(page, filename, fullPage = false) {
        await settle(page);
        await page.screenshot({ path: path.join(output, filename), fullPage });
    }
    const landing = await pageFor();
    await landing.goto(baseURL);
    await capture(landing, '01-portada-desktop.png');
    await capture(landing, '02-propuesta-completa.png', true);
    await landing.locator('#programas').screenshot({ path: path.join(output, '03-programas.png') });
    await landing.locator('#contacto').screenshot({ path: path.join(output, '04-contacto-demo.png') });
    await landing.locator('#contactName').fill('Consulta de muestra');
    await landing.locator('#contactEmail').fill('consulta@example.test');
    await landing.locator('#contactProgram').selectOption({ label: 'Preuniversitario Intensivo' });
    await landing.getByRole('button', { name: 'Probar solicitud' }).click();
    if (!(await landing.locator('#contactFeedback').innerText()).includes('No se envió')) throw new Error('Demo form feedback missing.');

    async function login(account) {
        const page = await pageFor();
        await page.goto(`${baseURL}/login`);
        await page.locator('#email').fill(`${account}@example.test`);
        await page.locator('#password').fill(password);
        await page.getByRole('button', { name: 'Ingresar al sistema' }).click();
        await page.waitForURL(/\/(dashboard|seleccionar-rol)$/);
        return page;
    }
    const loginPage = await pageFor();
    await loginPage.goto(`${baseURL}/login`);
    await capture(loginPage, '05-login.png');
    const multi = await login('multirrol');
    await capture(multi, '06-seleccion-rol.png');
    await multi.getByRole('button', { name: /Secretaria/ }).click();
    await multi.waitForURL('**/dashboard');
    const director = await login('director');
    await capture(director, '07-panel-director.png', true);
    await director.goto(`${baseURL}/alumnos`);
    await capture(director, '08-modulo-alumnos.png');
    const student = await login('estudiante');
    await capture(student, '09-panel-estudiante.png');
    const denied = await student.goto(`${baseURL}/deudas`);
    if (denied.status() !== 403) throw new Error('Student accessed restricted module.');
    await capture(student, '10-acceso-restringido.png');
    const mobile = await pageFor({ width: 390, height: 844 });
    await mobile.goto(baseURL);
    await capture(mobile, '11-portada-mobile.png');
    await mobile.getByRole('button', { name: 'Menú' }).click();
    if (await mobile.getByRole('button', { name: 'Menú' }).getAttribute('aria-expanded') !== 'true') throw new Error('Mobile navigation did not open.');
    await mobile.getByRole('link', { name: 'Contacto', exact: true }).last().click();
    await settle(mobile);
    await mobile.goto(`${baseURL}/login`);
    await capture(mobile, '12-login-mobile.png');
    await student.setViewportSize({ width: 390, height: 844 });
    await student.goto(`${baseURL}/dashboard`);
    await student.getByRole('button', { name: 'Abrir menú' }).click();
    await student.getByRole('button', { name: 'Cerrar menú' }).click();
    await settle(student);
    if (errors.length) throw new Error([...new Set(errors)].join('\n'));
    console.log('12 screenshots created. Desktop, mobile, login, roles, restricted access and demo form verified.');
} finally {
    await browser?.close();
    if (server && !server.killed) {
        if (process.platform === 'win32') spawnSync('taskkill', ['/pid', String(server.pid), '/T', '/F'], { windowsHide: true, stdio: 'ignore' });
        else server.kill();
    }
    // Only this script's isolated database files are eligible for cleanup.
    if (path.dirname(database) !== privateDir) throw new Error('Unexpected database path.');
    for (const suffix of ['', '-wal', '-shm']) {
        try { await unlink(database + suffix); } catch (error) { if (error.code !== 'ENOENT') throw error; }
    }
}
