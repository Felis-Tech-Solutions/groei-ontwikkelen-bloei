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

// Slider (testimonials): schuift per kaart en stopt bij de laatste volledig zichtbare kaart.
document.querySelectorAll('[data-slider]').forEach((slider) => {
    const track = slider.querySelector('[data-slider-track]');
    const items = [...slider.querySelectorAll('[data-slider-item]')];
    const prev = slider.querySelector('[data-slider-prev]');
    const next = slider.querySelector('[data-slider-next]');

    if (!track || !items.length || !prev || !next) {
        return;
    }

    let index = 0;

    const layout = () => {
        const gap = parseFloat(getComputedStyle(track).columnGap) || 0;
        const step = items[0].getBoundingClientRect().width + gap;
        const visible = Math.max(1, Math.round((track.parentElement.clientWidth + gap) / step));
        const maxIndex = Math.max(0, items.length - visible);

        index = Math.min(index, maxIndex);
        track.style.transform = `translateX(${-index * step}px)`;

        const nodig = maxIndex > 0;
        prev.classList.toggle('hidden', !nodig);
        next.classList.toggle('hidden', !nodig);
        prev.disabled = index === 0;
        next.disabled = index === maxIndex;

        items.forEach((item, i) => item.setAttribute('aria-hidden', String(i < index || i >= index + visible)));
    };

    prev.addEventListener('click', () => { index = Math.max(0, index - 1); layout(); });
    next.addEventListener('click', () => { index += 1; layout(); });
    window.addEventListener('resize', layout);
    layout();
});

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
