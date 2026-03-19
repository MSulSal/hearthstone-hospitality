#!/usr/bin/env python3
"""Export result-only Markdown presentations from client notebooks."""

from __future__ import annotations

import subprocess
from pathlib import Path


NOTEBOOK_DIR = Path("docs/client-handoff/notebooks")


def export_notebook(path: Path) -> None:
    command = [
        "jupyter",
        "nbconvert",
        "--to",
        "markdown",
        "--no-input",
        str(path),
        "--output",
        path.stem,
    ]
    subprocess.run(command, check=True)


def main() -> int:
    notebooks = sorted(NOTEBOOK_DIR.glob("*.ipynb"))
    if not notebooks:
        print(f"No notebooks found in {NOTEBOOK_DIR}")
        return 1

    for notebook in notebooks:
        print(f"Exporting {notebook}...")
        export_notebook(notebook)

    print("Presentation markdown export complete.")
    return 0


if __name__ == "__main__":
    raise SystemExit(main())
