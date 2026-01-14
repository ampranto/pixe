document.addEventListener("DOMContentLoaded", function () {
    gsap.registerPlugin(ScrollTrigger);

    const triggerElement2 = document.querySelector(".home-animated-text-section");
    const textElement2 = document.querySelector(".home-animated-text-content p");


    if (triggerElement2 && textElement2) {
        const split = new SplitType(textElement2, {
            types: "words, chars",
        });

        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: triggerElement2,
                start: "top 75%",
                end: "+=65%",
                markers: false,
                scrub: 0.5,
            },
        });

        tl.set(split.chars, {
            color: "#fff",
            stagger: 0.1,
        }, 0.5);
    }
});

const lenis = new Lenis({
    duration: 2,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
    orientation: 'vertical',
    gestureOrientation: 'vertical',
    smoothWheel: true,
    smooth: true,
    wheelMultiplier: 0.8,
    infinite: false,
    // lerp: 0.05,
});

function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
}

requestAnimationFrame(raf);

lenis.on('scroll', ScrollTrigger.update);

gsap.ticker.add((time) => {
    lenis.raf(time * 500);
});

gsap.ticker.lagSmoothing(0);


jQuery(document).ready(function ($) {

    document.querySelectorAll(".anime-btn").forEach((btn) => {
        // Grab inner elements (some may be missing)
        const text = btn.querySelector(".btn--text");
        const icon = btn.querySelector(".btn--icon");
        const bg = btn.querySelector(".btn--bg");

        // Get button size
        const {
            width,
            height
        } = btn.getBoundingClientRect();

        // Default position (center)
        const baseX = 0;
        const baseY = 0;

        // --- Animation functions ---
        function animateText(e) {
            if (!text) return; // stop if text not found
            const offsetX = e.offsetX - width / 4;
            const offsetY = e.offsetY - height / 4;
            anime({
                targets: text,
                translateX: -0.1 * offsetX,
                translateY: -0.1 * offsetY,
                duration: 500,
            });
        }

        function animateIcon(e) {
            if (!icon) return; // stop if icon not found
            const offsetX = e.offsetX - width / 4;
            const offsetY = e.offsetY - height / 4;
            anime({
                targets: icon,
                translateX: -0.1 * offsetX,
                translateY: -0.1 * offsetY,
                duration: 500,
            });
        }

        function animateBackground(e) {
            if (!bg) return; // stop if background not found
            const offsetX = e.offsetX - width / 4;
            const offsetY = e.offsetY - height / 4;
            anime({
                targets: bg,
                translateX: 0.05 * offsetX,
                translateY: 0.05 * offsetY,
                duration: 500,
            });
        }

        // --- Reset animations ---
        function resetAnimations() {
            const targets = [text, icon, bg].filter(Boolean); // remove nulls
            anime({
                targets: targets,
                translateX: baseX,
                translateY: baseY,
                duration: 700,
                easing: "easeOutElastic",
            });
        }

        // --- Event Listeners ---
        btn.addEventListener("pointerenter", (e) => {
            animateText(e);
            animateBackground(e);
            animateIcon(e);
        });

        btn.addEventListener("pointermove", (e) => {
            animateText(e);
            animateBackground(e);
            animateIcon(e);
        });

        btn.addEventListener("pointerleave", () => {
            resetAnimations();
        });
    });

    AOS.init({
        duration: 1000,
        offset: 80,
        once: true
    });
});