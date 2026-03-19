# Dashboard Deep Dive Notebook (All Dashboards)

This notebook is your detailed study and presentation guide for every dashboard surface currently in scope.


## Visual Map



![Dashboard layout map](../assets/dashboard-layout-map.svg)


## Capture Checklist

Before a client call, capture and save these screenshots in `../assets/screenshots/`:

- `dashboard-widget-summary.png`
- `overview-control-row.png`
- `overview-origin-snapshot.png`
- `overview-today-operations.png`
- `overview-upcoming-arrivals.png`
- `overview-action-board.png`
- `overview-kpi-tiles.png`
- `overview-pipeline-snapshot.png`
- `overview-data-quality-radar.png`
- `overview-breakdowns.png`



### WP Dashboard Widget: Chama Ops Summary

**Purpose**  
Quick at-a-glance context directly on the default WordPress dashboard.

**Primary Users**  
Owner, manager, or operator logging in for a fast check.

**Inputs / Dependencies**  
- Published guest/stay counts
- Most recent guest records
- Most recent stay records

**Logic / Formula Notes**  
- No derived math; direct post counts and latest lists.

**Operator Actions**  
- Open recent guest/stay records from links.

**Healthy Signal**  
Counts and recent links reflect expected activity.

**Risk Signal**  
No records or stale recency indicates process adoption gap.

**Client Value Story**  
Shows immediate software utility without leaving dashboard home.

**Screenshot Target**  
`../assets/screenshots/dashboard-widget-summary.png`




**Missing WP Dashboard Widget: Chama Ops Summary**

Expected path: `../assets/screenshots/dashboard-widget-summary.png`



### Overview: Control and Action Row

**Purpose**  
Centralized controls for scenario loading, data lifecycle actions, and exports.

**Primary Users**  
Demo lead, operator, owner.

**Inputs / Dependencies**  
- Seed/clear/promote actions
- CSV export actions
- Queue shortcuts

**Logic / Formula Notes**  
- Action links are nonce-protected admin-post actions.

**Operator Actions**  
- Generate/Regenerate demo scenarios
- Keep sample records as persistent
- Export guests/stays CSV

**Healthy Signal**  
Operators can reset or preserve demo state intentionally.

**Risk Signal**  
Regenerate without preserve can wipe edited sample records.

**Client Value Story**  
Strong demo control translates to stronger sales and onboarding confidence.

**Screenshot Target**  
`../assets/screenshots/overview-control-row.png`




**Missing Overview: Control and Action Row**

Expected path: `../assets/screenshots/overview-control-row.png`



### Overview: Record Origin Snapshot

**Purpose**  
Visual separation of sample vs persistent records.

**Primary Users**  
Operator, implementation lead.

**Inputs / Dependencies**  
- Sample record marker meta
- Current guest/stay totals

**Logic / Formula Notes**  
- Persistent count = total count - sample count

**Operator Actions**  
- Open sample-only and persistent-only queues.

**Healthy Signal**  
Persistent counts rise after promote action.

**Risk Signal**  
High sample ratio in late-stage rollout indicates migration not completed.

**Client Value Story**  
Prevents data trust confusion and supports safer demos.

**Screenshot Target**  
`../assets/screenshots/overview-origin-snapshot.png`




**Missing Overview: Record Origin Snapshot**

Expected path: `../assets/screenshots/overview-origin-snapshot.png`



### Overview: Today Operations Board

**Purpose**  
Day-of command surface for arrivals, departures, and readiness risk signals.

**Primary Users**  
Front desk, operations manager.

**Inputs / Dependencies**  
- Stay status
- Check-in/check-out dates
- Guest contact fields

**Logic / Formula Notes**  
- In-house = check_in <= today < check_out and status in booked/checked_in
- Contact ready (48h) = (booked arrivals in 48h - contact gaps) / booked arrivals in 48h

**Operator Actions**  
- Open arrivals/departures queues
- Open contact-gap queue
- Open 48h arrivals queue

**Healthy Signal**  
High contact-ready rate and low overdue arrivals.

**Risk Signal**  
High contact gaps or overdue arrivals before peak check-in windows.

**Client Value Story**  
Directly protects guest experience and front-desk calm.

**Screenshot Target**  
`../assets/screenshots/overview-today-operations.png`




**Missing Overview: Today Operations Board**

Expected path: `../assets/screenshots/overview-today-operations.png`



### Overview: Upcoming Arrivals (14 days)

**Purpose**  
Forward-looking readiness cards per upcoming booked stay.

**Primary Users**  
Operations planning and owner review.

**Inputs / Dependencies**  
- Booked stays
- Guest linkage
- Dates
- Nights
- Revenue

**Logic / Formula Notes**  
- Readiness = no missing guest/date/nights/revenue issues

**Operator Actions**  
- Open stay or guest directly
- Open booked and quality queues

**Healthy Signal**  
Most cards show Ready with no issues.

**Risk Signal**  
Issue backlog close to arrival dates.

**Client Value Story**  
Shifts operations from reactive to proactive.

**Screenshot Target**  
`../assets/screenshots/overview-upcoming-arrivals.png`




**Missing Overview: Upcoming Arrivals (14 days)**

Expected path: `../assets/screenshots/overview-upcoming-arrivals.png`



### Overview: Action Board

**Purpose**  
Prioritized recommendations generated from pipeline, quality, and readiness metrics.

**Primary Users**  
Owner and operator lead.

**Inputs / Dependencies**  
- Pipeline metrics
- Data quality counts
- Today-ops contact readiness

**Logic / Formula Notes**  
- Rule-based recommendation thresholds; top three recommendations shown.

**Operator Actions**  
- Click recommended queue to resolve top risks first.

**Healthy Signal**  
Recommendations become On Track style when risk is low.

**Risk Signal**  
Repeated high-priority recommendations indicate unresolved workflow bottleneck.

**Client Value Story**  
Converts metrics into clear next actions without analytics expertise.

**Screenshot Target**  
`../assets/screenshots/overview-action-board.png`




**Missing Overview: Action Board**

Expected path: `../assets/screenshots/overview-action-board.png`



### Overview: KPI Tiles

**Purpose**  
Quick business health snapshot (volume + value).

**Primary Users**  
Owner, manager.

**Inputs / Dependencies**  
- Guest/stay totals
- Nights
- Revenue data

**Logic / Formula Notes**  
- Booked/Active Nights aggregated across booked, checked-in, checked-out
- Average Revenue/Stay and Revenue/Night from valid values only

**Operator Actions**  
- Scan trend direction before diving into detailed queues.

**Healthy Signal**  
Nights and average values trend predictably with occupancy.

**Risk Signal**  
N/A values suggest missing revenue or invalid date data.

**Client Value Story**  
Gives leadership confidence in operating and financial hygiene.

**Screenshot Target**  
`../assets/screenshots/overview-kpi-tiles.png`




**Missing Overview: KPI Tiles**

Expected path: `../assets/screenshots/overview-kpi-tiles.png`



### Overview: Pipeline Snapshot

**Purpose**  
Booking lifecycle quality view (conversion/cancellation/lead backlog).

**Primary Users**  
Owner and marketing/ops coordination.

**Inputs / Dependencies**  
- Stay status summary

**Logic / Formula Notes**  
- Booked-or-later rate = (booked + checked_in + checked_out) / total mix
- Lead backlog rate = leads / total mix
- Cancellation rate = cancelled / total mix

**Operator Actions**  
- Jump to booked/lead/cancelled queues for remediation.

**Healthy Signal**  
Booked-or-later healthy, lead backlog and cancellations controlled.

**Risk Signal**  
High lead backlog or cancellations indicate conversion/policy problems.

**Client Value Story**  
Connects operational system to growth and retention outcomes.

**Screenshot Target**  
`../assets/screenshots/overview-pipeline-snapshot.png`




**Missing Overview: Pipeline Snapshot**

Expected path: `../assets/screenshots/overview-pipeline-snapshot.png`



### Overview: Data Quality Radar

**Purpose**  
Single source for missing data that harms service and reporting.

**Primary Users**  
Operator and QA owner.

**Inputs / Dependencies**  
- Guest and stay meta completeness checks

**Logic / Formula Notes**  
- Issue totals grouped by specific quality queue categories.

**Operator Actions**  
- Open filtered list for each issue class.

**Healthy Signal**  
Issue totals trend down over time.

**Risk Signal**  
Persistent issue counts create hidden operational debt.

**Client Value Story**  
Prevents silent data drift and protects dashboard trust.

**Screenshot Target**  
`../assets/screenshots/overview-data-quality-radar.png`




**Missing Overview: Data Quality Radar**

Expected path: `../assets/screenshots/overview-data-quality-radar.png`



### Overview: Stay Status + Guest Source Breakdowns

**Purpose**  
Current distribution context for operational and acquisition analysis.

**Primary Users**  
Owner, manager.

**Inputs / Dependencies**  
- Stay statuses
- Guest marketing source

**Logic / Formula Notes**  
- Count-based distributions from current records.

**Operator Actions**  
- Compare source mix and status mix against expectations.

**Healthy Signal**  
Mix aligns with business strategy and seasonality.

**Risk Signal**  
Unexpected source or status skew may indicate workflow breakage.

**Client Value Story**  
Adds planning context without requiring external BI tooling.

**Screenshot Target**  
`../assets/screenshots/overview-breakdowns.png`




**Missing Overview: Stay Status + Guest Source Breakdowns**

Expected path: `../assets/screenshots/overview-breakdowns.png`


## Study Drill

For each section above, practice answering:

1. What decision does this section support?
2. What data dependency could make it wrong?
3. What exact click should the client take next?

