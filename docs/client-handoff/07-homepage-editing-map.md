# Homepage Editing Map (WP-Native)

This guide shows exactly where inn staff can edit homepage content without developer help.

## Auto-created core pages
The theme now auto-creates these pages if they do not exist:
- Home
- Stay / Rooms
- Dining
- Weddings & Events
- Explore Chama
- About / Our Story
- Contact / Book / Inquire

It also sets Home as the static front page and assigns the primary menu.

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

## Quick Start Layout Pattern (Recommended)
- In homepage editor, click `+` (block inserter).
- Go to `Patterns -> Chama Inn`.
- Insert **Inn Conversion Page (Light)**.
- Replace placeholder copy with inn-specific messaging.

## Interior Page Starter Patterns
In any interior page editor, click `+ -> Patterns -> Chama Inn` and choose:
- **Interior: Stay and Rooms**
- **Interior: Dining**
- **Interior: Weddings and Events**
- **Interior: Explore Chama**
- **Interior: About and Story**
- **Interior: Contact and Inquiry**

## 5) Logo
- Go to `Appearance -> Customize -> Site Identity`.
- Upload or replace the site logo.
- It appears in the hero area.

## 6) Footer Copyright
- Footer now auto-generates year and site title.
- Site title can be edited in `Settings -> General`.

## 7) Color Scheme Switcher (Fast Demo Mode)
- Go to `Appearance -> Customize -> Chama Inn Design`.
- Change **Color Scheme** to one of:
  - Exterior Stucco (Default)
  - Dusty Sage
  - Moonstone Calm (Cool)
  - Alpine Stillness (Cool)
  - Terracotta Dawn (Warm)
  - Heritage Garnet (Accent)
  - Desert Contrast (Neutral)
- Publish to apply instantly site-wide.

This lets you compare client preferences without touching CSS.

## 8) Header Navigation and Book CTA
- Go to `Appearance -> Menus`.
- Assign your menu to **Primary Menu**.
- Recommended order:
  - Home
  - Stay / Rooms
  - Dining
  - Weddings & Events
  - Explore Chama
  - About
  - Contact / Inquire

The header button currently routes to `/contact`. Keep that page published for the CTA to work.

Optional control:
- Go to `Appearance -> Customize -> Chama Inn Design`.
- Set **Header CTA Page** and **Header CTA Label** to choose the exact route and button text.

## Recommended Content Blocks

For this inn profile (small, premium, spa-like), homepage should usually include:

1. Hero with clear booking CTA
2. Positioning intro (restored + modernized + railroad context)
3. Stay/Rooms preview
4. Courtyard/grounds atmosphere section
5. Dining preview
6. Weddings & events preview
7. Explore Chama highlights
8. Guest trust signal section
9. Final booking/inquiry CTA

## Handoff Notes

- No plugin or code edits are required for normal homepage updates.
- Content editors can safely handle copy, imagery, and CTA changes in wp-admin.
- Developer support is only needed for deeper layout/system changes.
- Responsive behavior is handled in theme CSS, so edited content reflows across mobile/tablet/desktop automatically.
