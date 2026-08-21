---
paths:
  - '**'
---

# General

## Never kill the user's dev server processes
Standing constraint: never run pkill -f "artisan serve" or lsof/kill on ports without explicit permission — the user runs their own dev server and those commands kill it. For verification, spin up a server on a dedicated port, record its PID, and clean up ONLY that PID afterward (kill $PID). Always ask before touching any running process.
