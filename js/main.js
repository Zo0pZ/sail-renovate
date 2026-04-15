// ── Active nav link ─────────────────────────────────────
const currentPath = window.location.pathname;
document.querySelectorAll('.nav__links a, .mobile-link').forEach(link => {
  const href = link.getAttribute('href');
  const isHome = href === '/sail-renovate/' || href === '/sail-renovate';
  if (isHome ? currentPath === href || currentPath === '/sail-renovate'
              : currentPath.startsWith(href)) {
    link.setAttribute('aria-current', 'page');
  }
});
// Highlight Services trigger on any /services/ sub-page
if (currentPath.startsWith('/sail-renovate/services')) {
  const trigger = document.querySelector('.nav__mega-trigger');
  if (trigger) trigger.setAttribute('aria-current', 'page');
}

// ── Sticky nav ──────────────────────────────────────────
const nav = document.getElementById('nav');
const onScroll = () => {
  nav.classList.toggle('scrolled', window.scrollY > 40);
};
window.addEventListener('scroll', onScroll, { passive: true });
onScroll();

// ── Mobile menu ─────────────────────────────────────────
const burger = document.getElementById('burger');
const mobileMenu = document.getElementById('mobileMenu');
const mobileLinks = document.querySelectorAll('.mobile-link, .mobile-menu .nav__cta');

burger.addEventListener('click', () => {
  const isOpen = mobileMenu.classList.toggle('open');
  burger.classList.toggle('open', isOpen);
  burger.setAttribute('aria-expanded', isOpen);
  burger.setAttribute('aria-label', isOpen ? 'Close menu' : 'Open menu');
  document.body.style.overflow = isOpen ? 'hidden' : '';
});
mobileLinks.forEach(link => {
  link.addEventListener('click', () => {
    mobileMenu.classList.remove('open');
    burger.classList.remove('open');
    burger.setAttribute('aria-expanded', 'false');
    burger.setAttribute('aria-label', 'Open menu');
    document.body.style.overflow = '';
  });
});

// ── FAQ accordion ────────────────────────────────────────
document.querySelectorAll('.faq-question').forEach(btn => {
  btn.addEventListener('click', () => {
    const item = btn.closest('.faq-item');
    const isOpen = item.classList.contains('open');
    document.querySelectorAll('.faq-item').forEach(i => {
      i.classList.remove('open');
      i.querySelector('.faq-question').setAttribute('aria-expanded', 'false');
    });
    if (!isOpen) {
      item.classList.add('open');
      btn.setAttribute('aria-expanded', 'true');
    }
  });
});

// ── Scroll fade-in ───────────────────────────────────────
const fadeEls = document.querySelectorAll('.fade-in');
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
      observer.unobserve(entry.target);
    }
  });
}, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });
fadeEls.forEach(el => observer.observe(el));

// ── Form submit UX ──────────────────────────────────────
const form = document.querySelector('form');
form && form.addEventListener('submit', () => {
  const btn = form.querySelector('.form-submit');
  if (btn) {
    btn.textContent = 'Sending…';
    setTimeout(() => { btn.textContent = 'Send Enquiry →'; }, 3000);
  }
});

// ── Mega nav ─────────────────────────────────────────────
const megaItem = document.querySelector('.nav__item--has-mega');
const megaNavPanel = document.getElementById('megaNav');
const megaTriggerBtn = document.querySelector('.nav__mega-trigger');

if (megaItem && megaNavPanel && megaTriggerBtn) {
  const openMega = () => {
    megaItem.classList.add('open');
    megaNavPanel.classList.add('open');
    megaTriggerBtn.setAttribute('aria-expanded', 'true');
  };
  const closeMega = () => {
    megaItem.classList.remove('open');
    megaNavPanel.classList.remove('open');
    megaTriggerBtn.setAttribute('aria-expanded', 'false');
  };

  megaTriggerBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    megaItem.classList.contains('open') ? closeMega() : openMega();
  });

  // Close on outside click
  document.addEventListener('click', (e) => {
    if (!megaItem.contains(e.target) && !megaNavPanel.contains(e.target)) {
      closeMega();
    }
  });

  // Close on Escape
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeMega();
  });

  // Close when a link inside mega nav is clicked
  megaNavPanel.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', closeMega);
  });
}

// ── Mobile services accordion ────────────────────────────
const mobileServicesEl = document.querySelector('.mobile-services');
const mobileServicesTrigger = document.querySelector('.mobile-services__trigger');
if (mobileServicesEl && mobileServicesTrigger) {
  mobileServicesTrigger.addEventListener('click', () => {
    const isOpen = mobileServicesEl.classList.toggle('open');
    mobileServicesTrigger.setAttribute('aria-expanded', isOpen);
  });
}
