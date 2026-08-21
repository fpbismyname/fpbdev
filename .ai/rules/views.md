---
paths:
  - 'resources/views/**'
---

# Views

## image-full cards use raw daisyUI markup, not Mary x-card
Mary's x-card does not render a `.card-body` element, which daisyUI's `image-full` modifier needs to auto-apply `neutral-content` text color over the background image (CSS: `.image-full > .card-body`). For full-background-image cards, use the official daisyUI markup directly (`div.card.image-full > figure > img` + `div.card-body > h4.card-title`), as in sections/⚡services.blade.php. User-approved exception to the "always Mary UI" rule. Without media, the figure fallback must be `bg-neutral` (dark) so the auto-white card-body text stays readable.
