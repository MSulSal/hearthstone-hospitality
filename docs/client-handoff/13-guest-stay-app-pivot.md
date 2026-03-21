# Guest-Stay App Pivot (QR-First)

## Why this pivot happened
The product direction is now explicit: this is **not** a brochure-first website.

Primary usage is:
1. Guest arrives at the inn.
2. Guest scans a QR code.
3. Guest opens the app on phone.
4. Guest uses in-stay actions (restaurant, gift shop, requests, support).

Prospective-guest pages still exist, but they are secondary.

## What changed in this commit
- Homepage copy direction now frames the experience as an in-stay guest app.
- Core auto-created pages now prioritize:
  - Guest Hub
  - My Stay
  - Restaurant Orders
  - Gift Shop
  - Service Requests
  - Front Desk / Contact
- Navigation order now prioritizes in-stay actions before brochure pages.
- New Gutenberg starter patterns were added for:
  - `Guest Hub`
  - `My Stay`
  - `Service Requests`
- Header CTA default changed from booking-first to **Open Guest Hub**.
- Room service now has a live guest submission flow via `[chama_room_service_app]`, creating `Room Service Orders` records in wp-admin.

## What this means for client demos
Demo flow should now start with:
1. "Guest scans QR and opens Guest Hub."
2. "Guest places a restaurant order."
3. "Guest browses gift shop."
4. "Guest submits a service request."
5. "Front desk/ops side handles the request in WordPress admin."

This tells a stronger operational story than a generic hospitality brochure and aligns with point-of-sale workflows.

## Immediate next steps
1. Bind each guest action button to live pages/routes.
2. Add a visible QR entry point section on Home and Front Desk pages.
3. Add lightweight auth/session plan for "My Stay" context.
4. Connect Service Requests to real submissions (form plugin first, custom endpoint later).

## Current live room-service capability
- Guest page now supports live order submission via shortcode: `[chama_room_service_app]`.
- Orders are saved to the `Room Service Orders` post type in wp-admin.
- Starter menu items are auto-seeded (including Filet Mignon) for immediate demo use.
