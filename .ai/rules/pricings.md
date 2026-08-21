---
paths:
  - 'app/Filament/Resources/Pricings/**'
---

# Pricings

## Pricing features must stay a flat string array
Pricing 'features' is a flat JSON array of strings in the DB. Use Repeater::simple() in the form (NOT ->components()) or the values get saved as nested {feature: ...} objects and break the checklist render in the pricing section.
