import { animate, inView, stagger } from "motion";

const prefersReduced = window.matchMedia(
  "(prefers-reduced-motion: reduce)",
).matches;

if (!prefersReduced) {
  const boot = () => {
    const main = document.querySelector("main");
    const firstSection = main?.querySelector("section");
    const isInFirstSection = (el) =>
      !!(firstSection && firstSection.contains(el));

    // Initialize: set initial state for group members only
    document.querySelectorAll("[data-reveal-group] > *").forEach((el) => {
      if (el.dataset.initialized) return;
      el.dataset.initialized = "1";
      animate(el, { opacity: 0, y: 16 }, { duration: 0 });
    });

    // Group-based reveal: each section triggers as one unit
    document.querySelectorAll("[data-reveal-group]").forEach((group) => {
      if (group.dataset.revealed) return;

      const base = (parseFloat(group.dataset.revealDelay) || 0) / 1000;

      const run = () => {
        if (group.dataset.revealed === "1") return;
        group.dataset.revealed = "1";
        const children = group.querySelectorAll("> *");

        animate(
          children,
          { opacity: [0, 1], y: [16, 0] },
          {
            duration: 0.75,
            ease: [0, 0.51, 0.25, 1],
            delay: stagger(0.08, { startDelay: base }),
          },
        );
      };

      // Trigger when 25% of the group is visible
      if (isInFirstSection(group)) {
        run();
        return;
      }

      inView(group, run, { amount: 0.25, margin: "-30% 0px -30% 0px" });
    });

    // Fallback: standalone elements (for backward compatibility)
    document.querySelectorAll("[data-reveal]:not([data-reveal-group])").forEach((el) => {
      if (el.dataset.revealed) return;
      const delay = (parseFloat(el.dataset.revealDelay) || 0) / 1000;

      const run = () => {
        if (el.dataset.revealed === "1") return;
        el.dataset.revealed = "1";
        animate(el, { opacity: [0, 1], y: [16, 0] }, { duration: 0.75, ease: [0, 0.51, 0.25, 1], delay });
      };

      if (isInFirstSection(el)) {
        run();
        return;
      }

      inView(el, run, { amount: 0.25, margin: "-30% 0px -30% 0px" });
    });
  };

  boot();
  document.addEventListener("livewire:navigated", boot);
} else {
  const bootReduced = () => {
    document.querySelectorAll("[data-reveal-group]").forEach((group) => {
      if (group.dataset.revealed) return;
      group.dataset.revealed = "1";
      const base = (parseFloat(group.dataset.revealDelay) || 0) / 1000;
      animate([...group.children], { opacity: [0, 1] }, {
        duration: 0.5,
        ease: [0.16, 1, 0.3, 1],
        delay: stagger(0.06, { startDelay: base }),
      });
    });

    document.querySelectorAll("[data-reveal]:not([data-reveal-group])").forEach((el) => {
      if (el.dataset.revealed) return;
      el.dataset.revealed = "1";
      const delay = (parseFloat(el.dataset.revealDelay) || 0) / 1000;
      animate(el, { opacity: [0, 1] }, { duration: 0.5, ease: [0.16, 1, 0.3, 1], delay });
    });
  };
  bootReduced();
  document.addEventListener("livewire:navigated", bootReduced);
}