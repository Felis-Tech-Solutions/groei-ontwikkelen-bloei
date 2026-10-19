// Header: verbergen bij naar beneden scrollen, compact tonen bij omhoog scrollen.
const header = document.querySelector('[data-site-header]');
const mobileMenu = document.querySelector('[data-mobile-menu]');
const menuButton = document.querySelector('[data-menu-open]');

let menuOpen = false;

if (header) {
    let lastY = window.scrollY;
    let ticking = false;

    const update = () => {
        const y = Math.max(window.scrollY, 0);
        const pastHeader = y > header.offsetHeight;

        header.classList.toggle('is-compact', pastHeader);

        // Kleine bewegingen negeren, zodat de header niet gaat knipperen.
        if (Math.abs(y - lastY) > 4) {
            header.classList.toggle('is-hidden', pastHeader && y > lastY && !menuOpen);
            lastY = y;
        }

        ticking = false;
    };

    window.addEventListener('scroll', () => {
        if (!ticking) {
            window.requestAnimationFrame(update);
            ticking = true;
        }
    }, { passive: true });

    // Header altijd tonen als er met het toetsenbord in genavigeerd wordt.
    header.addEventListener('focusin', () => header.classList.remove('is-hidden'));

    update();
}

// Melding "Website in ontwikkeling": alleen tonen tot de bezoeker hem wegklikt.
const notice = document.querySelector('[data-site-notice]');

if (notice) {
    const key = 'gob-site-notice-gezien';
    const seen = () => {
        try {
            return window.localStorage.getItem(key) === '1';
        } catch {
            return false;
        }
    };

    if (!seen()) {
        const close = () => {
            notice.classList.add('hidden');
            notice.classList.remove('flex');
            try {
                window.localStorage.setItem(key, '1');
            } catch {
                // Opslag niet beschikbaar (privévenster): melding komt bij de volgende pagina terug.
            }
        };

        notice.classList.remove('hidden');
        notice.classList.add('flex');
        notice.querySelector('[data-site-notice-close]')?.focus();

        notice.querySelector('[data-site-notice-close]')?.addEventListener('click', close);
        notice.addEventListener('click', (event) => {
            if (event.target === notice) {
                close();
            }
        });
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && !notice.classList.contains('hidden')) {
                close();
            }
        });
    }
}

// Mobiel menu openen en sluiten.
if (mobileMenu && menuButton) {
    const setMenu = (open) => {
        menuOpen = open;
        mobileMenu.classList.toggle('hidden', !open);
        menuButton.setAttribute('aria-expanded', String(open));
        document.documentElement.classList.toggle('overflow-hidden', open);

        if (open) {
            header?.classList.remove('is-hidden');
            mobileMenu.querySelector('[data-menu-close]:not(.fixed)')?.focus();
        } else {
            menuButton.focus();
        }
    };

    menuButton.addEventListener('click', () => setMenu(true));

    mobileMenu.querySelectorAll('[data-menu-close]').forEach((el) => {
        el.addEventListener('click', () => setMenu(false));
    });

    mobileMenu.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => setMenu(false));
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && menuOpen) {
            setMenu(false);
        }
    });
}
