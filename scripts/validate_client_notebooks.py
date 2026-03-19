#!/usr/bin/env python3
"""Validate client presentation notebooks.

Checks JSON structure, compiles code cells, and executes code cells in order.
The script is dependency-light and works even when IPython is not installed.
"""

from __future__ import annotations

import json
import traceback
from pathlib import Path


NOTEBOOK_DIR = Path("docs/client-handoff/notebooks")


def iter_notebooks() -> list[Path]:
    return sorted(NOTEBOOK_DIR.glob("*.ipynb"))


def validate_notebook(path: Path) -> list[str]:
    errors: list[str] = []

    try:
        notebook = json.loads(path.read_text(encoding="utf-8"))
    except Exception as exc:
        return [f"{path}: invalid JSON ({exc})"]

    cells = notebook.get("cells", [])
    env: dict[str, object] = {"__name__": "__main__"}

    for index, cell in enumerate(cells, start=1):
        if cell.get("cell_type") != "code":
            continue

        source = "".join(cell.get("source", []))
        if not source.strip():
            continue

        cell_ref = f"{path.name}:cell{index}"
        try:
            code = compile(source, cell_ref, "exec")
            exec(code, env, env)  # noqa: S102 - controlled local validation
        except Exception as exc:
            trace = traceback.format_exc(limit=5)
            errors.append(f"{cell_ref}: {exc.__class__.__name__}: {exc}\n{trace}")

    return errors


def main() -> int:
    notebooks = iter_notebooks()
    if not notebooks:
        print(f"No notebooks found in {NOTEBOOK_DIR}")
        return 1

    all_errors: list[str] = []
    for notebook in notebooks:
        print(f"Validating {notebook}...")
        all_errors.extend(validate_notebook(notebook))

    if all_errors:
        print("\nNotebook validation failed:\n")
        for error in all_errors:
            print(error)
        return 1

    print("\nAll client presentation notebooks validated successfully.")
    return 0


if __name__ == "__main__":
    raise SystemExit(main())
