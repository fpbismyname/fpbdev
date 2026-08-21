---
paths:
  - 'resources/views/components/sections/**'
---

# Sections

## Pricing section conventions
Highlighted plan = slug 'landing-page' (border-primary + 'Paling Populer' badge). listPricings() reorders so the highlighted plan sits in the middle of the grid. No promo logic (finished_at was dropped). Plan features are a JSON array rendered as o-check-circle checklist.
