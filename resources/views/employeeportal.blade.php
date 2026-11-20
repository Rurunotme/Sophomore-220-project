<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>My workspace | Employease</title>

  <style>
    :root {
      --primary: #6554f5;
      --primary-soft: #efecff;
      --background: #f7f8fc;
      --surface: #ffffff;
      --text: #202c46;
      --muted: #737e94;
      --border: #e9ecf3;
      --success: #237d61;
      --success-soft: #e7f5ef;
      --warning: #845b12;
      --warning-soft: #fff3d6;
      --radius: 8px;
    }

    * { box-sizing: border-box; }
    [hidden] { display: none !important; }

    body {
      margin: 0;
      background: var(--background);
      color: var(--text);
      font: 14px Inter, system-ui, sans-serif;
    }

    a { color: inherit; text-decoration: none; }
    button, input, select, textarea { font: inherit; }
    button, select { cursor: pointer; }

    :focus-visible {
      outline: 3px solid var(--primary);
      outline-offset: 3px;
    }

    .app {
      display: grid;
      grid-template-columns: 216px minmax(0, 1fr);
      min-height: 100vh;
    }

    /* Shared navigation */
    .sidebar {
      position: sticky;
      top: 0;
      display: flex;
      flex-direction: column;
      height: 100vh;
      padding: 28px 16px 20px;
      background: var(--surface);
      border-right: 1px solid var(--border);
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 0 8px;
      font-size: 20px;
      font-weight: 750;
      letter-spacing: -.6px;
    }

    .brand-mark {
      display: grid;
      place-items: center;
      width: 30px;
      height: 30px;
      border-radius: 9px;
      background: var(--primary);
      color: white;
      font-size: 23px;
    }

    .nav-label {
      margin: 42px 12px 12px;
      color: var(--muted);
      font-size: 10px;
      font-weight: 600;
      letter-spacing: .7px;
      text-transform: uppercase;
    }

    .navigation { display: grid; gap: 7px; }

    .nav-link {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 12px;
      border-radius: 7px;
      color: var(--muted);
      font-size: 13px;
    }

    .nav-link:hover { background: var(--background); }

    .nav-link[aria-current="page"] {
      color: var(--primary);
      background: var(--primary-soft);
      font-weight: 600;
    }

    .nav-icon {
      width: 18px;
      height: 18px;
      flex-shrink: 0;
      fill: none;
      stroke: currentColor;
      stroke-width: 1.6;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    .profile {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-top: auto;
      padding: 20px 8px 0;
      border-top: 1px solid var(--border);
    }

    .avatar {
      display: grid;
      place-items: center;
      flex-shrink: 0;
      width: 34px;
      height: 34px;
      border-radius: 50%;
      background: var(--primary-soft);
      color: var(--primary);
      font-size: 11px;
      font-weight: 700;
    }

    .profile strong { display: block; font-size: 12px; }
    .profile small { color: var(--muted); font-size: 11px; }

    /* Shared page shell */
    .workspace { min-width: 0; }

    .topbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      min-height: 72px;
      padding: 16px 32px;
      background: var(--surface);
      border-bottom: 1px solid var(--border);
    }

    .breadcrumb { color: var(--muted); font-size: 12px; }

    main {
      max-width: 1500px;
      margin: 0 auto;
      padding: 32px;
    }

    .page-header {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 16px;
      margin-bottom: 28px;
    }

    h1 {
      margin: 0 0 8px;
      font-size: 28px;
      letter-spacing: -.7px;
    }

    h2 { margin: 0 0 6px; font-size: 15px; }

    p {
      margin: 0;
      color: var(--muted);
      font-size: 12px;
      line-height: 1.6;
    }

    .date-label {
      padding: 10px 14px;
      border: 1px solid var(--border);
      border-radius: 6px;
      background: white;
      color: var(--muted);
      font-size: 11px;
    }

    /* Reusable layouts */
    .portal-grid {
      display: grid;
      grid-template-columns: minmax(0, 1.65fr) minmax(300px, 1fr);
      align-items: start;
      gap: 24px;
    }

    .stack { display: grid; gap: 24px; }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 18px;
      margin-bottom: 24px;
    }

    .card {
      min-width: 0;
      padding: 22px;
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: var(--radius);
    }

    .card-heading {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      gap: 16px;
      margin-bottom: 22px;
    }

    .eyebrow {
      color: var(--muted);
      font-size: 10px;
      letter-spacing: .5px;
      text-transform: uppercase;
    }

    .text-link { color: var(--primary); font-size: 12px; }

    .button {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-height: 36px;
      padding: 9px 16px;
      border: 1px solid var(--border);
      border-radius: 6px;
      background: white;
      color: var(--text);
      font-size: 12px;
      font-weight: 500;
    }

    .button-primary {
      border-color: var(--primary);
      background: var(--primary);
      color: white;
    }

    .badge {
      display: inline-block;
      padding: 4px 7px;
      border-radius: 4px;
      font-size: 10px;
      font-weight: 500;
      white-space: nowrap;
    }

    .badge-success {
      background: var(--success-soft);
      color: var(--success);
    }

    .badge-pending {
      background: var(--warning-soft);
      color: var(--warning);
    }

    .stat-value {
      display: block;
      margin: 10px 0 6px;
      font-size: 28px;
      font-weight: 650;
    }

    .clock-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 20px;
    }

    .clock-value {
      display: block;
      margin-bottom: 6px;
      font-size: 40px;
      font-weight: 650;
      letter-spacing: -1px;
      font-variant-numeric: tabular-nums;
    }

    .card-footer {
      margin-top: 22px;
      padding-top: 14px;
      border-top: 1px solid var(--border);
    }

    .balance {
      margin: 18px 0;
      padding: 16px;
      border-radius: 6px;
      background: var(--primary-soft);
      color: var(--primary);
    }

    .balance span {
      display: block;
      margin-bottom: 5px;
      font-size: 10px;
      text-transform: uppercase;
    }

    .balance strong { font-size: 20px; }

    .details {
      display: grid;
      gap: 16px;
      margin: 20px 0;
    }

    .details div {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 8px 20px;
      font-size: 12px;
    }

    .details dt { color: var(--muted); }
    .details dd { margin: 0; font-weight: 500; }

    .table-scroll { overflow-x: auto; }

    table {
      width: 100%;
      border-collapse: collapse;
      text-align: left;
      white-space: nowrap;
      font-size: 12px;
    }

    th, td {
      padding: 15px 10px;
      border-bottom: 1px solid var(--border);
    }

    th {
      color: var(--muted);
      font-size: 10px;
      font-weight: 500;
      text-transform: uppercase;
    }

    tbody tr:last-child td { border-bottom: 0; }

    .request-list {
      display: grid;
      gap: 18px;
      margin: 22px 0 0;
      padding: 0;
      list-style: none;
    }

    .request-list li {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      padding-bottom: 18px;
      border-bottom: 1px solid var(--border);
    }

    .request-list li:last-child { padding-bottom: 0; border: 0; }
    .request-list strong { display: block; margin-bottom: 5px; font-size: 12px; }

    .starter-note {
      margin-top: 20px;
      padding: 14px 16px;
      border-radius: 6px;
      background: var(--background);
      color: var(--muted);
      font-size: 12px;
      line-height: 1.6;
    }

    @media (max-width: 1100px) {
      .portal-grid { grid-template-columns: minmax(0, 1fr); }
    }

    @media (max-width: 720px) {
      .app { grid-template-columns: minmax(0, 1fr); }
      .sidebar { position: static; height: auto; padding: 20px 16px; }
      .nav-label { margin-top: 24px; }
      .navigation { display: flex; overflow-x: auto; }
      .nav-link { flex-shrink: 0; }
      .profile { display: none; }
      .topbar { min-height: 56px; padding: 12px 20px; }
      main { padding: 24px 16px; }
      .card { padding: 18px; }
      .stats-grid { grid-template-columns: minmax(0, 1fr); gap: 12px; }
      h1 { font-size: 25px; }
    }
  </style>
</head>

<body>
  <!-- Shared icon definitions -->
  <svg xmlns="http://www.w3.org/2000/svg" width="0" height="0"
       aria-hidden="true" style="position:absolute">
    <defs>
      <symbol id="icon-workspace" viewBox="0 0 24 24">
        <rect x="3" y="3" width="7" height="7" rx="1"/>
        <rect x="14" y="3" width="7" height="7" rx="1"/>
        <rect x="3" y="14" width="7" height="7" rx="1"/>
        <rect x="14" y="14" width="7" height="7" rx="1"/>
      </symbol>
      <symbol id="icon-attendance" viewBox="0 0 24 24">
        <rect x="3" y="5" width="18" height="16" rx="2"/>
        <path d="M7 3v4m10-4v4M3 11h18m-13 5 3 3 5-5"/>
      </symbol>
      <symbol id="icon-payslips" viewBox="0 0 24 24">
        <rect x="3" y="5" width="18" height="14" rx="2"/>
        <path d="M3 10h18m-13 5h3"/>
      </symbol>
      <symbol id="icon-leave" viewBox="0 0 24 24">
        <rect x="5" y="5" width="14" height="16" rx="2"/>
        <rect x="9" y="3" width="6" height="4" rx="1"/>
        <path d="M9 12h6m-6 4h4"/>
      </symbol>
      <symbol id="icon-salary" viewBox="0 0 24 24">
        <path d="M4 20h16M5 16l5-5 4 3 6-8m-5 0h5v5"/>
      </symbol>
    </defs>
  </svg>

  <div class="app">
    <aside class="sidebar">
      <a class="brand" href="#workspace">
        <span class="brand-mark" aria-hidden="true">e</span>
        employease
      </a>

      <p class="nav-label">Employee workspace</p>

      <nav class="navigation" aria-label="Employee portal">
        <a class="nav-link" href="#workspace" data-page="workspace"
           aria-current="page">
          <svg class="nav-icon" aria-hidden="true"><use href="#icon-workspace"/></svg>
          My workspace
        </a>

        <a class="nav-link" href="#attendance" data-page="attendance">
          <svg class="nav-icon" aria-hidden="true"><use href="#icon-attendance"/></svg>
          My attendance
        </a>

        <a class="nav-link" href="#payslips" data-page="payslips">
          <svg class="nav-icon" aria-hidden="true"><use href="#icon-payslips"/></svg>
          My payslips
        </a>

        <a class="nav-link" href="#leave" data-page="leave">
          <svg class="nav-icon" aria-hidden="true"><use href="#icon-leave"/></svg>
          My leave
        </a>

        <a class="nav-link" href="#salary-changes" data-page="salary-changes">
          <svg class="nav-icon" aria-hidden="true"><use href="#icon-salary"/></svg>
          Salary changes
        </a>
      </nav>

      <div class="profile">
        <div class="avatar" aria-hidden="true">AM</div>
        <div>
          <strong>Alex Morgan</strong>
          <small>Employee account</small>
        </div>
      </div>
    </aside>

    <div class="workspace">
      <header class="topbar">
        <span class="breadcrumb" id="breadcrumb">My workspace</span>
        <div class="avatar" aria-label="Alex Morgan">AM</div>
      </header>

      <main>
        <div class="page-header">
          <div>
            <h1 id="page-title" tabindex="-1">Good morning, Alex</h1>
            <p id="page-description">Your workday, without the busywork.</p>
          </div>

          <span class="date-label" id="demo-label">Demo · November 10, 2026</span>
        </div>

        <!-- MY WORKSPACE -->
        <section data-panel="workspace" aria-labelledby="page-title">
          <div class="portal-grid">
            <div class="stack">
              <section class="card" aria-labelledby="workday-title">
                <div class="card-heading">
                  <h2 class="eyebrow" id="workday-title">Today's workday</h2>
                  <span class="badge badge-success">Clocked in</span>
                </div>

                <div class="clock-row">
                  <div>
                    <strong class="clock-value">01:48:12</strong>
                    <p>Clocked in at 09:05 AM · Local time</p>
                  </div>
                  <a class="button button-primary" href="#attendance">
                    View attendance
                  </a>
                </div>

                <div class="card-footer">
                  <p>Illustrative workday snapshot. Live tracking can be connected here.</p>
                </div>
              </section>

              <section class="card" aria-labelledby="attendance-preview-title">
                <div class="card-heading">
                  <div>
                    <h2 id="attendance-preview-title">My attendance</h2>
                    <p>Your recent attendance records.</p>
                  </div>
                  <a class="text-link" href="#attendance">View all →</a>
                </div>

                <div class="table-scroll">
                  <table aria-label="Recent attendance">
                    <thead>
                      <tr>
                        <th scope="col">Date</th>
                        <th scope="col">In</th>
                        <th scope="col">Out</th>
                        <th scope="col">Hours</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Nov 9, 2026</td>
                        <td>09:00 AM</td>
                        <td>05:30 PM</td>
                        <td>8h 30m</td>
                      </tr>
                      <tr>
                        <td>Nov 6, 2026</td>
                        <td>08:58 AM</td>
                        <td>05:28 PM</td>
                        <td>8h 30m</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </section>

              <section class="card" aria-labelledby="payslips-preview-title">
                <div class="card-heading">
                  <div>
                    <h2 id="payslips-preview-title">My payslips</h2>
                    <p>Your latest monthly payments.</p>
                  </div>
                  <a class="text-link" href="#payslips">View all →</a>
                </div>

                <div class="table-scroll">
                  <table aria-label="Recent payslips">
                    <thead>
                      <tr>
                        <th scope="col">Pay period</th>
                        <th scope="col">Net pay</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>October 2026</td>
                        <td>$5,200.00</td>
                        <td><span class="badge badge-success">Paid</span></td>
                      </tr>
                      <tr>
                        <td>September 2026</td>
                        <td>$5,150.00</td>
                        <td><span class="badge badge-success">Paid</span></td>
                      </tr>
                      <tr>
                        <td>August 2026</td>
                        <td>$5,125.00</td>
                        <td><span class="badge badge-success">Paid</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </section>
            </div>

            <div class="stack">
              <section class="card" aria-labelledby="time-off-title">
                <h2 id="time-off-title">Plan your time off</h2>
                <p>Check your balance and manage leave requests.</p>

                <div class="balance">
                  <span>Annual leave balance</span>
                  <strong>12 days available</strong>
                </div>

                <dl class="details">
                  <div><dt>Allowance year</dt><dd>2026</dd></div>
                  <div><dt>Pending requests</dt><dd>1 request</dd></div>
                </dl>

                <a class="button button-primary" href="#leave">
                  Manage my leave
                </a>
              </section>

              <section class="card" aria-labelledby="leave-preview-title">
                <h2 id="leave-preview-title">My leave status</h2>

                <ul class="request-list">
                  <li>
                    <div>
                      <strong>Annual leave</strong>
                      <p>Nov 23–24, 2026</p>
                    </div>
                    <span class="badge badge-pending">Pending</span>
                  </li>
                  <li>
                    <div>
                      <strong>Annual leave</strong>
                      <p>Oct 19–20, 2026</p>
                    </div>
                    <span class="badge badge-success">Approved</span>
                  </li>
                </ul>
              </section>

              <section class="card" aria-labelledby="salary-preview-title">
                <h2 id="salary-preview-title">Salary changes</h2>
                <p>Review your compensation history and effective dates.</p>
                <div class="card-footer">
                  <a class="text-link" href="#salary-changes">
                    View salary history →
                  </a>
                </div>
              </section>
            </div>
          </div>
        </section>

        <!-- MY ATTENDANCE -->
        <section data-panel="attendance" aria-labelledby="page-title" hidden>
          <div class="stats-grid">
            <article class="card">
              <p>Today's status</p>
              <strong class="stat-value">Clocked in</strong>
              <p>Since 09:05 AM · Demo</p>
            </article>
            <article class="card">
              <p>Last completed workday</p>
              <strong class="stat-value">8h 30m</strong>
              <p>November 9, 2026</p>
            </article>
            <article class="card">
              <p>Attendance period</p>
              <strong class="stat-value">November</strong>
              <p>2026</p>
            </article>
          </div>

          <section class="card">
            <h2>Attendance history</h2>
            <p>Extend this section with a date filter, clock-in/out actions,
              attendance records, and correction requests.</p>
            <div class="starter-note">
              Connect live attendance data here. Define break deductions
              and working-hour calculations according to your policies.
            </div>
          </section>
        </section>

        <!-- MY PAYSLIPS -->
        <section data-panel="payslips" aria-labelledby="page-title" hidden>
          <section class="card">
            <h2>Payslip history</h2>
            <p>Extend this section with pay-period filters, earnings,
              deductions, net pay, and secure payslip downloads.</p>
            <div class="starter-note">
              Download links should point to authorized employee documents,
              not publicly accessible documents.
            </div>
          </section>
        </section>

        <!-- MY LEAVE -->
        <section data-panel="leave" aria-labelledby="page-title" hidden>
          <div class="portal-grid">
            <section class="card">
              <h2>My leave requests</h2>
              <ul class="request-list">
                <li>
                  <div>
                    <strong>Annual leave</strong>
                    <p>Nov 23–24, 2026</p>
                  </div>
                  <span class="badge badge-pending">Pending</span>
                </li>
                <li>
                  <div>
                    <strong>Annual leave</strong>
                    <p>Oct 19–20, 2026</p>
                  </div>
                  <span class="badge badge-success">Approved</span>
                </li>
              </ul>

              <div class="starter-note">
                Add a request form here with leave type, start/end dates,
                reason, validation, and submission confirmation.
              </div>
            </section>

            <section class="card">
              <h2>Leave balance</h2>
              <div class="balance">
                <span>Annual leave</span>
                <strong>12 days available</strong>
              </div>
              <p>Sample balance for the 2026 allowance year.</p>
            </section>
          </div>
        </section>

        <!-- SALARY CHANGES -->
        <section data-panel="salary-changes" aria-labelledby="page-title" hidden>
          <section class="card">
            <h2>Compensation history</h2>
            <p>Extend this section with effective dates, previous and new
              salary amounts, currency, pay frequency, and adjustment reasons.</p>

            <div class="starter-note">
              Keep this employee view read-only. Salary adjustments and
              approvals should remain in authorized administrative workflows.
            </div>
          </section>
        </section>
      </main>
    </div>
  </div>

  <script>
    /*
     * Page registry:
     * Add a new entry and a matching data-panel section to extend the portal.
     */
    const pages = {
      workspace: {
        label: "My workspace",
        title: "Good morning, Alex",
        description: "Your workday, without the busywork."
      },
      attendance: {
        label: "My attendance",
        title: "My attendance",
        description: "Keep track of your time and attendance."
      },
      payslips: {
        label: "My payslips",
        title: "My payslips",
        description: "Your pay history, all in one place."
      },
      leave: {
        label: "My leave",
        title: "My leave",
        description: "Plan time off and follow your leave requests."
      },
      "salary-changes": {
        label: "Salary changes",
        title: "Salary changes",
        description: "A clear view of your compensation history."
      }
    };

    function renderPage(moveFocus = false) {
      const requestedPage = location.hash.slice(1);
      const page = Object.hasOwn(pages, requestedPage)
        ? requestedPage
        : "workspace";

      const config = pages[page];
      const heading = document.getElementById("page-title");

      document.title = `${config.label} | Employease`;
      document.getElementById("breadcrumb").textContent = config.label;
      heading.textContent = config.title;
      document.getElementById("page-description").textContent =
        config.description;

      document.querySelectorAll("[data-panel]").forEach(panel => {
        panel.hidden = panel.dataset.panel !== page;
      });

      document.querySelectorAll("[data-page]").forEach(link => {
        if (link.dataset.page === page) {
          link.setAttribute("aria-current", "page");
        } else {
          link.removeAttribute("aria-current");
        }
      });

      if (moveFocus) heading.focus();
    }

    window.addEventListener("hashchange", () => renderPage(true));
    renderPage();
  </script>
</body>
</html>