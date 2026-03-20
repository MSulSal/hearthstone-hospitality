# Homepage Editing Map (WP-Native)

This guide shows exactly where inn staff can edit homepage content without developer help.

## What We Changed

The homepage now uses WordPress-native editable fields instead of hardcoded template text.
The visual system is currently **light-theme first** (no dark/light toggle), to keep handoff simple and predictable.

## Where To Edit Each Part

## 1) Hero Background Image
- Go to `Pages -> Home` (or whichever page is set as homepage).
- Set the **Featured image**.
- That image becomes the hero background.

## 2) Hero Headline
- In the same page, edit the **page title**.
- The title is displayed as the main hero heading.

## 3) Hero Supporting Text
- Edit the **Excerpt** field on the homepage.
- That text appears under the hero heading.

If Excerpt is hidden:
- Click top-right `Screen Options` and enable Excerpt.

## 4) Main Homepage Sections
- Edit homepage body content with the block editor.
- Add or update sections using standard blocks:
  - Heading
  - Paragraph
  - Columns
  - Buttons
  - Group
  - Separator

## 5) Logo
- Go to `Appearance -> Customize -> Site Identity`.
- Upload or replace the site logo.
- It appears in the hero area.

## 6) Footer Copyright
- Footer now auto-generates year and site title.
- Site title can be edited in `Settings -> General`.

## Recommended Content Blocks

For this inn profile (small, premium, spa-like), homepage should usually include:

1. Calm luxury positioning statement
2. Room-theme or experience highlights
3. Operations reliability + guest communication trust signals
4. Direct call to action (tour, booking, consultation)

## Handoff Notes

- No plugin or code edits are required for normal homepage updates.
- Content editors can safely handle copy, imagery, and CTA changes in wp-admin.
- Developer support is only needed for deeper layout/system changes.
- Responsive behavior is handled in theme CSS, so edited content reflows across mobile/tablet/desktop automatically.
