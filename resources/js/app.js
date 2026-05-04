import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('counterStat', () => ({
    shown: false,
    current: 0,
    target: 0,
    duration: 1600,
    suffix: '',

    init() {
        this.target = Number(this.$el.dataset.target || 0);
        this.suffix = this.$el.dataset.suffix || '';

        const observer = new IntersectionObserver((entries) => {
            const entry = entries[0];

            if (entry.isIntersecting && !this.shown) {
                this.shown = true;
                this.animateCounter();
                observer.disconnect();
            }
        }, {
            threshold: 0.35,
        });

        observer.observe(this.$el);
    },

    animateCounter() {
        const startTime = performance.now();
        const startValue = 0;
        const endValue = this.target;

        const step = (now) => {
            const progress = Math.min((now - startTime) / this.duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            this.current = Math.floor(startValue + (endValue - startValue) * eased);

            if (progress < 1) {
                requestAnimationFrame(step);
            } else {
                this.current = endValue;
            }
        };

        requestAnimationFrame(step);
    },

    formatted() {
        return new Intl.NumberFormat('id-ID').format(this.current) + this.suffix;
    },
}));

Alpine.start();