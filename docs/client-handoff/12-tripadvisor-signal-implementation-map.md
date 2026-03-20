# Tripadvisor Signal Implementation Map

This map shows exactly where guest reviews, insider tips, and listing details are currently used in the prototype frontend.

## Where 5-star review content is used

### Home -> Trust section
File: `app/public/wp-content/themes/chama-inn/patterns/inn-conversion-page.php`

- Named quote block 1: Jacqueline F (Oct 2023)
- Named quote block 2: NealA913 (Sep 2023)
- Named quote block 3: Christine P (Jul 2022)
- Additional review proof lines:
  - Liana R (Jul 2023)
  - Kate M (May 2023)
  - Robert D (Jul 2022)
  - Diamond_D (Oct 2022)
  - Julie E (Sep 2022)
  - Noemi W (Jun 2023)

## Where insider tips are used

### Home -> "Guest tips before you book"
File: `app/public/wp-content/themes/chama-inn/patterns/inn-conversion-page.php`

- First-floor request if stairs are a concern
- Fireplace rooms are limited
- Upstairs preference for extra quiet
- Book early in peak train season

### Stay / Rooms page
File: `app/public/wp-content/themes/chama-inn/patterns/stay-rooms-page.php`

- Repeats and operationalizes room-selection tips
- Adds guest voices tied to room quality and walkability

### Explore Chama page
File: `app/public/wp-content/themes/chama-inn/patterns/explore-chama-page.php`

- Uses planning-oriented tips in "Need help planning?" section

## Where listing/about info is used

### About / Our Story page
File: `app/public/wp-content/themes/chama-inn/patterns/about-story-page.php`

- "Across from the Cumbres and Toltec Scenic Railroad"
- Practical base for local dining/hiking/outdoor plans
- Guest-experience framing from recurring review themes

### Explore Chama page
File: `app/public/wp-content/themes/chama-inn/patterns/explore-chama-page.php`

- Address and location context (423 Terrace Ave framing)
- Walkable downtown dining/shop framing
- Depot-first trip planning

## Where listing metrics are used

### Home -> trust metrics chips
File: `app/public/wp-content/themes/chama-inn/patterns/inn-conversion-page.php`

- 4.4/5 rating
- 115 reviews
- #2 of 7 hotels

## Image sourcing approach tied to your instruction

- Current source set: `app/public/wp-content/themes/chama-inn/assets/images/csi-assets/`
- Building/facade shots that may show legacy red are either:
  - avoided, or
  - tinted to stucco-like tone using CSS classes (`is-stucco-tint`)
- Hero now uses a subtle vignette + stucco tone treatment instead of a heavy overlay.

## Still pending for final polish

- Replace any quoted lines with owner-approved final set if needed.
- Reconfirm live review metrics before launch.
- Do a final pass to remove any remaining legacy-red visuals that survive tinting.
