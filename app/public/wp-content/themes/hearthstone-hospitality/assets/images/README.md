Place the client logo here as one of:
- `client-logo.webp` (preferred)
- `client-logo.png`
- `client-logo.jpg`
- `client-logo.jpeg`
- `client-logo.svg`

Optional color-spectrum variants can live in:
- `assets/images/logo_color_spectrum/`
- `assets/images/logo_bg_extremes/`

Context-aware logo order:
1. Header/Footer: `soft_charcoal.png` -> `iron_brown.png`
2. Hero (image background): `logo_bg_extremes/warm_white.png` -> `dusty_sage.png` -> `golden_adobe.png` -> `honey_oak.png`
3. Admin bar: `golden_adobe.png` -> `honey_oak.png` -> `trim_blue_green.png`
4. Login screen: `soft_charcoal.png` -> `iron_brown.png`
5. Fallback: `assets/images/client-logo.*`
6. Last fallback in templates: WordPress custom logo, then site title text
