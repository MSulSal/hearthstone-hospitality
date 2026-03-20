# 08) Frontend Theme Lock and UX System (Live Reference Synthesis)

## Final direction (locked for implementation)
Chama Station Inn will be presented as a **restored railroad-adjacent New Mexico inn** with a **light, calm, quietly luxurious** guest experience.  
This is not a dark lodge, not a kitschy railroad theme build, and not a full destination spa resort.

One-line target:

**A restored Chama railroad inn, lightened and modernized into a calm, quietly luxurious New Mexico stay with courtyard charm, regional soul, and genuine hospitality.**

## Ground truth content to preserve from current Chama signal
Current public/about-site messaging should be treated as source material for the redesign:
- restoration and renovation narrative is active
- deep tie to the Cumbres & Toltec Scenic Railroad
- downtown Chama walkable convenience
- future-facing hospitality hub intent: dining, weddings/events, market, fuller food-and-beverage offering
- mission language around community, history, and sustainability

## Reference weighting (for design decisions)
- **40% Hotel Willa** - calm adobe-modern boutique tone  
  https://www.hotelwilla.com/
- **30% Los Poblanos** - bright stucco luxury and clean section rhythm  
  https://lospoblanos.com/
- **20% Ojo Santa Fe** - restorative vocabulary and pace  
  https://ojosparesorts.com/ojo-santa-fe/
- **10% El Rey Court** - reimagined heritage positioning  
  https://elreycourt.com/
- **Casa Cody (structural helper only)** - boutique page architecture cues  
  https://www.casacody.com/

## Real-world trust signal to preserve
Review themes (from the existing project signal + available TripAdvisor snippets) should remain central:
- clean and comfortable rooms
- quiet stays and restful sleep
- friendly, accommodating service
- train-station convenience and downtown proximity
- courtyard/flowers/outdoor seating appeal

Design implication: the redesign must feel elevated **without** losing comfort, friendliness, or convenience.

## Review-signal integration rules (frontend copy)
- Use review-backed proof points inside section copy ("clean, quiet, welcoming, convenient for rail travelers").
- Curate quotes manually; do not inject raw review widgets across the page.
- Keep claims factual and specific to this property size/context (about 9-room boutique scale).
- Reuse trust points in hero subhead, stay preview microcopy, and final CTA support line.
- Use `09-review-signal-and-proof-points.md` as the source file for numeric claims and launch-day verification.

## Visual system (v1 lock)

### Color palette
- Warm Plaster: `#F3EADF`
- Soft Stucco: `#E9DECF`
- Sandstone: `#D8C7AF`
- Adobe Blush: `#C99B86`
- Clay Accent: `#B9735A`
- Rail Burgundy: `#6B2E37`
- Sagebrush: `#7B8575`
- Charcoal Iron: `#2E2C2A`
- Weathered Brass: `#A88659`

Rules:
- light backgrounds by default
- burgundy used as anchor/accent, not full-page wash
- dark tones used for text, footer, strong CTA moments
- no blue spa cliches

### Typography (chosen)
- **Headlines:** Fraunces
- **Body/UI:** Inter

Rules:
- editorial, place-based headline tone
- clear legible body copy
- no novelty western fonts

### Material/texture cues
- stucco/limewash feel
- warm wood and iron details
- woven textile softness
- sunlight + courtyard calm

Avoid:
- dark lodge heaviness
- leather/antler faux-rustic styling

### Theme mode
**Light mode only in v1.**  
No dark/light toggle in v1 to keep implementation simple and owner-manageable.

## Required sitemap (implementation target)
- Home
- Stay / Rooms
- Dining
- Weddings & Events
- Explore Chama
- About / Our Story
- Contact / Book / Inquire

Optional later:
- Offers
- Gallery
- FAQ

## Homepage wireframe (exact order for build)
1. Hero (history + calm luxury + Chama + railroad context, Book CTA)
2. Positioning intro
3. Stay/Rooms preview (max 3 featured room categories on homepage)
4. Grounds/courtyard/restoration atmosphere
5. Dining preview (current + modular future expansion)
6. Weddings & Events preview
7. Explore Chama (railroad first, then curated local highlights)
8. Guest trust signal section (curated review themes, not widget clutter)
9. Final booking/inquiry CTA

## Interior templates (minimum requirements)

### Stay / Rooms
- room category clarity
- premium but plainspoken room descriptions
- concise amenity formatting
- strong image-first layout
- repeated booking CTA

### Dining
- current operating reality first
- modular sections for breakfast/dinner/market/full bar expansion
- no over-promising

### Weddings & Events
- intimate and romantic tone
- small wedding/rehearsal/private gathering focus
- low-friction inquiry path

### Explore Chama
- railroad anchor first
- curated outdoor/culture additions
- concise, non-directory format

### About / Our Story
- restoration narrative
- railroad-town identity
- ownership vision and modernization goals

### Contact / Book / Inquire
- clear primary CTA + secondary inquiry
- fast contact method visibility
- mobile-first clarity

## WordPress implementation plan (owner-safe)

### Authoring approach
- Gutenberg-native blocks + custom block patterns
- minimal plugin footprint
- no page-builder lock-in required

### Content modeling
- Keep major pages as standard WordPress pages.
- For rooms in v1, use a parent "Stay / Rooms" page with child pages (one per room or room category) for maximum owner editability.
- Reassess CPT only if room inventory or metadata complexity materially grows.

### Editing guarantees
Every major homepage section must remain editable by non-technical owners via:
- page title/excerpt/featured image
- block editor sections
- reusable patterns where appropriate

### Keep out of scope for v1
- custom login/member systems
- heavy animation frameworks
- fragile custom admin tooling

## Owner handoff plan
- Deliver a section-by-section homepage editing map (already started in `07-homepage-editing-map.md`).
- Provide one-page "how to update each core page" checklists.
- Keep nouns/verbs easily swappable for client terminology changes.
- Keep plugin/theme settings centralized and documented.

## Launch cleanup checklist (current placeholder-site risk removal)
- remove "Coming Soon" placeholder copy from all surfaced pages
- replace temporary images with approved daylight photo set
- remove unused template/demo content
- verify nav/menu routes match final IA
- verify CTA links route correctly on desktop + mobile
- verify contact forms and booking/inquiry handoff path
- run final copy pass for over-claims (especially spa language)

## Conflict resolution with prior project direction
- Existing operations prototype direction is retained.
- New frontend direction upgrades brand expression while staying WP-native and handoff-safe.
- "Spa-like feel" is implemented as **restorative tone + visual calm**, not as false full-spa claims.
