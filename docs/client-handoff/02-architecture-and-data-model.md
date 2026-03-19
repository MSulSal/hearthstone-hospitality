# 02) Architecture and Data Model (Client-Facing)

## Delivery shape
- Current platform: WordPress admin + custom operations plugin.
- Current goal: production-grade prototype that proves daily operator workflow.
- Transition goal: promote high-frequency staff workflows into a dedicated PWA layer.

## Why this architecture is practical
For a boutique inn, this staged model reduces risk:
1. Validate operations logic quickly in the existing stack.
2. Stabilize data model and staff workflow language.
3. Move high-frequency tasks to PWA screens without losing data continuity.

## Core data model

### Guest record
Purpose: preserve guest identity, contact readiness, preferences, and source context.

Key fields:
- `_chama_guest_email`
- `_chama_guest_phone`
- `_chama_guest_marketing_source`
- `_chama_guest_preferred_room`
- `_chama_guest_vip`
- `_chama_guest_marketing_consent`

### Stay record
Purpose: track stay lifecycle from lead to completion with operational readiness.

Key fields:
- `_chama_stay_guest_id`
- `_chama_stay_check_in`
- `_chama_stay_check_out`
- `_chama_stay_status`
- `_chama_stay_revenue`
- `_chama_stay_nights`

## Logic quality controls
- Nights are derived from valid dates.
- Revenue per night is derived only from valid values.
- Quality checks identify missing links, missing contact fields, invalid ranges, and missing revenue.
- Scenario loaders create repeatable review states for stakeholder feedback.

## Security and reliability posture
- Capability checks protect admin actions.
- Nonce checks protect action endpoints.
- Inputs are sanitized before save.
- Output is escaped before render.

## PWA transition intent
Keep WordPress as control-plane and data authority while adding a PWA for:
- desk and ops rapid workflows
- same-day operational boards
- mobile-first execution and eventual realtime feed behavior
