import { animate, inView, stagger } from 'motion'

const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches

if (!prefersReduced) {
    const boot = () => {
        const main = document.querySelector('main')
        const firstSection = main?.querySelector('section')
        const isInFirstSection = (el) => !!(firstSection && firstSection.contains(el))

        // Best practice: set initial sync (duration:0) sebelum observer — anti FOUC sesuai docs initial
        document.querySelectorAll('[data-reveal], [data-reveal-group] > *').forEach((el) => {
            if (el.dataset.initialized) return
            el.dataset.initialized = '1'
            animate(el, { opacity: 0, y: 16 }, { duration: 0 })
        })

        document.querySelectorAll('[data-reveal]').forEach((el) => {
            if (el.dataset.revealed) return
            const delay = (parseFloat(el.dataset.revealDelay) || 0) / 1000
            const run = () => {
                if (el.dataset.revealed === '1') return
                el.dataset.revealed = '1'
                animate(el, { opacity: [0, 1], y: [16, 0] }, { duration: 0.55, ease: [0.16, 1, 0.3, 1], delay })
            }
            // Generik above-the-fold: first section atau sudah di viewport saat boot → langsung tanpa nunggu inView
            if (isInFirstSection(el) || el.getBoundingClientRect().top < window.innerHeight * 0.9) {
                run()
                return
            }
            inView(el, run, { amount: 0.12, margin: '-8% 0px -12% 0px' })
        })

        document.querySelectorAll('[data-reveal-group]').forEach((group) => {
            if (group.dataset.revealed) return
            const base = (parseFloat(group.dataset.revealDelay) || 0) / 1000
            const run = () => {
                if (group.dataset.revealed === '1') return
                group.dataset.revealed = '1'
                animate(
                    [...group.children],
                    { opacity: [0, 1], y: [16, 0] },
                    { duration: 0.55, ease: [0.16, 1, 0.3, 1], delay: stagger(0.08, { startDelay: base }) },
                )
            }
            if (isInFirstSection(group) || group.getBoundingClientRect().top < window.innerHeight * 0.9) {
                run()
                return
            }
            inView(group, run, { amount: 0.1 })
        })
    }

    boot()
    document.addEventListener('livewire:navigated', boot)
} else {
    // Reduced motion: hanya opacity, tanpa translate — sesuai docs useReducedMotion
    const bootReduced = () => {
        document.querySelectorAll('[data-reveal]').forEach((el) => {
            if (el.dataset.revealed) return
            el.dataset.revealed = '1'
            const delay = (parseFloat(el.dataset.revealDelay) || 0) / 1000
            animate(el, { opacity: [0, 1] }, { duration: 0.4, ease: [0.16, 1, 0.3, 1], delay })
        })
        document.querySelectorAll('[data-reveal-group]').forEach((group) => {
            if (group.dataset.revealed) return
            group.dataset.revealed = '1'
            const base = (parseFloat(group.dataset.revealDelay) || 0) / 1000
            animate(
                [...group.children],
                { opacity: [0, 1] },
                { duration: 0.4, ease: [0.16, 1, 0.3, 1], delay: stagger(0.06, { startDelay: base }) },
            )
        })
    }
    bootReduced()
    document.addEventListener('livewire:navigated', bootReduced)
}
