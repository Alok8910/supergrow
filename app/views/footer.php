

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const alerts = document.querySelectorAll('.auth-alert');
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.classList.add('fade-out');
                setTimeout(() => {
                    alert.remove();
                }, 400);

            }, 6000);
        });
    });
    const btn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    btn.addEventListener('click', () => {
        mobileMenu.classList.toggle('is-open');
        btn.classList.toggle('is-active');
        const isExpanded = btn.getAttribute('aria-expanded') === 'true';
        btn.setAttribute('aria-expanded', !isExpanded);
    });
    const mobileLinks = document.querySelectorAll('.mobile-link');
    mobileLinks.forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.remove('is-open');
            btn.classList.remove('is-active');
            btn.setAttribute('aria-expanded', 'false');
        });
    });
    const sections = document.querySelectorAll('section');
    const navItems = document.querySelectorAll('.nav-item');
    window.addEventListener('scroll', () => {
        let current = '';

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            if (pageYOffset >= (sectionTop - 250)) {
                current = section.getAttribute('id');
            }
        });
        navItems.forEach(item => {
            item.classList.remove('active');
            if (item.getAttribute('href') === `#${current}`) {
                item.classList.add('active');
            }
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        const reveals = document.querySelectorAll('.reveal');
        const revealOptions = {
            threshold: 0.15,
            rootMargin: "0px 0px -50px 0px"
        };
        const revealOnScroll = new IntersectionObserver(function(entries, observer) {
            entries.forEach(entry => {
                if (!entry.isIntersecting) {
                    return;
                } else {
                    entry.target.classList.add('active');
                    observer.unobserve(entry.target);
                }
            });
        }, revealOptions);
        reveals.forEach(reveal => {
            revealOnScroll.observe(reveal);
        });
        setTimeout(() => {
            reveals.forEach(reveal => {
                const rect = reveal.getBoundingClientRect();
                if (rect.top < window.innerHeight) {
                    reveal.classList.add('active');
                }
            });
        }, 100);
    });
</script>

</body>

</html>