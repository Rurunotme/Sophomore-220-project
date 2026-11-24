<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Overview') | Employease</title>

  <style>
    :root {
      --primary: #6554f5;
      --primary-light: #efecff;
      --background: #f7f8fc;
      --surface: #ffffff;
      --text: #202c46;
      --muted: #737e94;
      --border: #e9ecf3;
      --success: #20865f;
      --radius: 8px;
    }

    * { box-sizing: border-box; }

    body {
      margin: 0;
      background: var(--background);
      color: var(--text);
      font-family: Inter, system-ui, sans-serif;
      font-size: 14px;
    }

    button, input, select { font: inherit; }
    button, select { cursor: pointer; }
    a { color: inherit; text-decoration: none; }
    [hidden] { display: none !important; }

    :focus-visible {
      outline: 3px solid var(--primary);
      outline-offset: 3px;
    }

    .app {
      display: grid;
      grid-template-columns: 216px minmax(0, 1fr);
      min-height: 100vh;
    }

    /* Shared sidebar */
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
      margin: 44px 12px 12px;
      color: var(--muted);
      font-size: 10px;
      font-weight: 600;
      letter-spacing: 1px;
      text-transform: uppercase;
    }

    .navigation {
      display: grid;
      gap: 8px;
    }

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
      background: var(--primary-light);
      color: var(--primary);
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

    .count {
      margin-left: auto;
      padding: 2px 5px;
      border-radius: 4px;
      background: var(--primary-light);
      color: var(--primary);
      font-size: 10px;
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
      background: var(--primary-light);
      color: var(--primary);
      font-size: 11px;
      font-weight: 700;
    }

    .profile strong { display: block; font-size: 12px; }
    .profile small { color: var(--muted); font-size: 10px; }

    /* Shared header */
    .workspace { min-width: 0; }

    .topbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 20px;
      min-height: 72px;
      padding: 16px 32px;
      background: var(--surface);
      border-bottom: 1px solid var(--border);
    }

    .breadcrumb { color: var(--muted); font-size: 12px; }

    main {
      max-width: 1600px;
      margin: 0 auto;
      padding: 32px;
    }

    .page-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 20px;
      margin-bottom: 28px;
    }

    h1 { margin: 0 0 8px; font-size: 28px; letter-spacing: -.8px; }
    h2 { margin: 0 0 6px; font-size: 15px; }
    p { margin: 0; color: var(--muted); font-size: 12px; line-height: 1.6; }

    .actions { display: flex; flex-wrap: wrap; gap: 10px; }

    .button, .select {
      min-height: 36px;
      padding: 8px 14px;
      border: 1px solid var(--border);
      border-radius: 6px;
      background: white;
      color: var(--text);
      font-size: 12px;
    }

    .button-primary {
      background: var(--primary);
      border-color: var(--primary);
      color: white;
    }

    /* Reusable dashboard elements */
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(4, minmax(0, 1fr));
      gap: 20px;
      margin-bottom: 24px;
    }

    .card {
      min-width: 0;
      padding: 22px;
      border: 1px solid var(--border);
      border-radius: var(--radius);
      background: var(--surface);
    }

    .stat-value {
      display: block;
      margin: 8px 0 10px;
      font-size: 29px;
      font-weight: 650;
      letter-spacing: -.8px;
    }

    .stat-note { color: var(--muted); font-size: 11px; }
    .positive { color: var(--success); }

    .content-grid {
      display: grid;
      grid-template-columns: minmax(0, 1.9fr) minmax(280px, 1fr);
      gap: 24px;
    }

    .card-heading {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      gap: 16px;
      margin-bottom: 22px;
    }

    .text-link { color: var(--primary); font-size: 12px; }

    .chart {
      display: block;
      width: 100%;
      height: 190px;
      overflow: visible;
    }

    .chart-labels {
      display: flex;
      justify-content: space-between;
      margin-top: 14px;
      color: var(--muted);
      font-size: 10px;
    }

    .department-layout {
      display: flex;
      align-items: center;
      justify-content: space-around;
      flex-wrap: wrap;
      gap: 24px;
      margin-top: 28px;
    }

    .donut {
      display: grid;
      place-items: center;
      flex-shrink: 0;
      width: 136px;
      height: 136px;
      border-radius: 50%;
      background: conic-gradient(
        #6554f5 0% 37.5%,
        #9587ff 37.5% 54.69%,
        #b1a7ff 54.69% 73.44%,
        #cec7ff 73.44% 85.16%,
        #e6e1ff 85.16% 100%
      );
    }

    .donut-center {
      display: grid;
      place-content: center;
      width: 94px;
      height: 94px;
      border-radius: 50%;
      background: white;
      text-align: center;
    }

    .donut-center strong { font-size: 26px; }
    .donut-center span { color: var(--muted); font-size: 10px; }

    .legend {
      display: grid;
      gap: 14px;
      min-width: 130px;
      margin: 0;
    }

    .legend div {
      display: flex;
      justify-content: space-between;
      gap: 18px;
      font-size: 11px;
    }

    .legend dt { color: var(--muted); }
    .legend dd { margin: 0; }

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

    td small {
      display: block;
      margin-top: 4px;
      color: var(--muted);
      font-size: 10px;
    }

    .badge {
      display: inline-block;
      padding: 4px 7px;
      border-radius: 4px;
      background: #fff3d6;
      color: #855b0a;
      font-size: 10px;
    }

    .activity {
      display: grid;
      gap: 24px;
      margin: 24px 0 0;
      padding: 0;
      list-style: none;
    }

    .activity li {
      padding-left: 12px;
      border-left: 2px solid #c9c1ff;
    }

    .activity time {
      display: block;
      margin-bottom: 6px;
      color: var(--muted);
      font-size: 10px;
      text-transform: uppercase;
    }

    .activity strong { display: block; margin-bottom: 4px; font-size: 12px; }

    .empty-state { padding: 48px 24px; text-align: center; }
    .empty-state p { max-width: 460px; margin: 8px auto 0; }

    .logout-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      min-height: 36px;
      padding: 8px 14px;
      background: white;
      color: #d14b5a;
      border: 1px solid var(--border);
      border-radius: 6px;
      font-size: 12px;
      font-weight: 600;
      transition: all 0.2s ease;
    }

    .logout-btn:hover {
      background: #fff1f2;
      border-color: #f5c2c7;
      color: #b42332;
    }

    .logout-btn:active {
      background: #ffe4e6;
      transform: translateY(1px);
    }

    @media (max-width: 1180px) {
      .stats-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
      .content-grid { grid-template-columns: minmax(0, 1fr); }
    }

    @media (max-width: 720px) {
      .app { grid-template-columns: minmax(0, 1fr); }
      .sidebar { position: static; height: auto; padding: 20px 16px; }
      .nav-label { margin-top: 24px; }
      .navigation { display: flex; overflow-x: auto; margin-top: 12px; }
      .nav-link { flex-shrink: 0; }
      .profile { display: none; }
      .topbar { min-height: 56px; padding: 12px 20px; }
      main { padding: 24px 16px; }
      .stats-grid { gap: 12px; }
      .card { padding: 18px; }
    }

    @media (max-width: 380px) {
      .stats-grid { grid-template-columns: minmax(0, 1fr); }
    }
  </style>
  @stack('styles')
</head>

<body>
  @php
    $userInitials = collect(explode(' ', trim($user->name)))
      ->filter()
      ->map(fn($name) => strtoupper(substr($name, 0, 1)))
      ->take(2)
      ->join('');
  @endphp

  <!-- Reusable navigation icons -->
  <svg xmlns="http://www.w3.org/2000/svg" width="0" height="0"
       aria-hidden="true" style="position:absolute">
    <defs>
      <symbol id="icon-overview" viewBox="0 0 24 24">
        <rect x="3" y="3" width="7" height="7" rx="1"/>
        <rect x="14" y="3" width="7" height="7" rx="1"/>
        <rect x="3" y="14" width="7" height="7" rx="1"/>
        <rect x="14" y="14" width="7" height="7" rx="1"/>
      </symbol>
      <symbol id="icon-employees" viewBox="0 0 24 24">
        <circle cx="9" cy="8" r="3"/>
        <path d="M3 21v-3a6 6 0 0 1 12 0v3M17 5a3 3 0 0 1 0 6m1 4a5 5 0 0 1 3 5"/>
      </symbol>
      <symbol id="icon-attendance" viewBox="0 0 24 24">
        <rect x="3" y="5" width="18" height="16" rx="2"/>
        <path d="M7 3v4m10-4v4M3 11h18m-13 5 3 3 5-5"/>
      </symbol>
      <symbol id="icon-leave" viewBox="0 0 24 24">
        <rect x="5" y="5" width="14" height="16" rx="2"/>
        <rect x="9" y="3" width="6" height="4" rx="1"/>
        <path d="M9 12h6m-6 4h4"/>
      </symbol>
      <symbol id="icon-payroll" viewBox="0 0 24 24">
        <rect x="3" y="5" width="18" height="14" rx="2"/>
        <path d="M3 10h18m-13 5h3"/>
      </symbol>
    </defs>
  </svg>

  <div class="app">
    <aside class="sidebar">
      <a class="brand" href="{{ route('admin.overview') }}">
        <span class="brand-mark" aria-hidden="true">e</span>
        employease
      </a>

      <p class="nav-label">Workspace</p>

      <nav class="navigation" aria-label="Workspace">
        <a class="nav-link" href="{{ route('admin.overview') }}"
           @if(request()->routeIs('admin.overview')) aria-current="page" @endif>
          <svg class="nav-icon" aria-hidden="true"><use href="#icon-overview"/></svg>
          Overview
        </a>
        <a class="nav-link" href="{{ route('admin.employees') }}"
           @if(request()->routeIs('admin.employees*')) aria-current="page" @endif>
          <svg class="nav-icon" aria-hidden="true"><use href="#icon-employees"/></svg>
          Employees
        </a>
        <a class="nav-link" href="{{ route('admin.attendance') }}"
           @if(request()->routeIs('admin.attendance*')) aria-current="page" @endif>
          <svg class="nav-icon" aria-hidden="true"><use href="#icon-attendance"/></svg>
          Attendance
        </a>
        <a class="nav-link" href="{{ route('admin.leave-requests') }}"
           @if(request()->routeIs('admin.leave-requests*')) aria-current="page" @endif>
          <svg class="nav-icon" aria-hidden="true"><use href="#icon-leave"/></svg>
          Leave requests
          <span class="count">3</span>
        </a>
        <a class="nav-link" href="{{ route('admin.payroll') }}"
           @if(request()->routeIs('admin.payroll*')) aria-current="page" @endif>
          <svg class="nav-icon" aria-hidden="true"><use href="#icon-payroll"/></svg>
          Payroll
        </a>
      </nav>

      <div class="profile">
        <img
          class="avatar"
          src="{{ route('employee.picture', $user->employeeID) }}"
          alt="{{ $user->name }}"
          onerror="this.hidden = true; this.nextElementSibling.hidden = false;"
        >
        <div class="avatar" aria-hidden="true" hidden>{{ $userInitials }}</div>
        <div>
          <strong>{{ $user->name }}</strong>
          <small>Workspace admin</small>
        </div>
      </div>

      <form id="logoutForm" action="/logout" method="POST">
        @csrf
        <button type="submit" id="logoutBtn" class="logout-btn">
          Logout
        </button>
      </form>
    </aside>

    <div class="workspace">
      <header class="topbar">
        <span class="breadcrumb" id="breadcrumb">@yield('title', 'Overview')</span>
        <img
          class="avatar"
          src="{{ route('employee.picture', $user->employeeID) }}"
          alt="{{ $user->name }}"
          onerror="this.hidden = true; this.nextElementSibling.hidden = false;"
        >
        <div class="avatar" aria-hidden="true" hidden>{{ $userInitials }}</div>
      </header>

      <main id="main-content">
        <!-- SHARED PAGE HEADING -->
        <div class="page-header">
          <div>
            <h1 id="page-title" tabindex="-1">@yield('title', 'Overview')</h1>
            <p id="page-description">@yield('description')</p>
          </div>

          <!-- Page-specific actions -->
          @hasSection('actions')
            <div class="actions">
              @yield('actions')
            </div>
          @endif
        </div>

        <!-- PAGE DATA PANEL -->
        <section aria-labelledby="page-title">
          @yield('content')
        </section>
      </main>
    </div>
  </div>

  @stack('scripts')
</body>
</html>