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
