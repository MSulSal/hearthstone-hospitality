# Client Presentation Notebooks

These notebooks are prepared for client-facing walkthroughs and for your personal study/rehearsal.

## Notebooks
- `01-prototype-presentation.ipynb`
  - Present current prototype value and operational readiness signals.
- `02-finished-app-vision-presentation.ipynb`
  - Present phased roadmap to the final operations PWA.
- `03-dashboard-deep-dive.ipynb`
  - Explain every dashboard section in detail with purpose, logic, actions, and screenshot targets.
- `04-layout-deep-dive.ipynb`
  - Explain every major layout surface (frontend and admin) with customization guidance.

## How to run
1. Open this folder in Jupyter Lab / VS Code notebook view.
2. Run all cells top-to-bottom.
3. Use talking-point cells as your presenter script.
4. Optional preflight from repo root:
   - `python scripts/validate_client_notebooks.py`

## Image assets
- `../assets/pwa-architecture.svg`
- `../assets/prototype-ops-flow.svg`
- `../assets/landing-page-placeholder.svg`
- `../assets/dashboard-layout-map.svg`
- `../assets/layout-inventory-map.svg`
- Optional screenshot (recommended):
  - Save current site screenshot as `../assets/landing-page-current.png`
  - Save dashboard/layout captures under `../assets/screenshots/`

## Update workflow (as we keep building)
For each new commit milestone, update:
- KPI values in notebook 01
- phase estimates/priorities in notebook 02
- section logic and screenshot targets in notebook 03
- layout inventory and customization notes in notebook 04
- any new architecture visuals in `assets/`
