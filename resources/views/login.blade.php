<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign in — Employease</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
    rel="stylesheet"
  />

  <style>
    :root {
      --purple: #5b4fe9;
      --panel: #292263;
      --ink: #182338;
      --muted: #647084;
      --border: #e5e9f0;
      --green: #187453;
    }

    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      color: var(--ink);
      background: #fff;
      font-family: "Inter", sans-serif;
      -webkit-font-smoothing: antialiased;
    }

    button,
    input {
      font: inherit;
    }

    button,
    a,
    input {
      -webkit-tap-highlight-color: transparent;
    }

    a {
      color: var(--purple);
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    button {
      cursor: pointer;
    }

    :focus-visible {
      outline: 3px solid #aaa2ff;
      outline-offset: 3px;
    }

    .page {
      display: grid;
      grid-template-columns: 4fr 5fr;
      min-height: max(1024px, 100svh);
    }

    /* Welcome panel */

    .welcome {
      display: flex;
      flex-direction: column;
      padding: 43px 56px 58px;
      color: #fff;
      background: var(--panel);
    }

    .brand {
      display: inline-flex;
      align-items: center;
      align-self: flex-start;
      gap: 11px;
      margin-left: -8px;
      color: #fff;
      font-size: 23px;
      font-weight: 600;
      line-height: 32px;
      text-decoration: none;
    }

    .brand:hover {
      text-decoration: none;
    }

    .brand-mark {
      display: grid;
      place-items: center;
      width: 32px;
      height: 32px;
      border-radius: 8px;
      background: #8479ff;
      font-size: 24px;
      font-weight: 700;
    }

    .welcome-heading {
      margin: 120px 0 0;
      font-size: 42px;
      font-weight: 600;
      line-height: 55px;
      letter-spacing: -0.5px;
    }

    .welcome-description {
      margin: 26px 0 0;
      color: #cec9ee;
      font-size: 17px;
      line-height: 28px;
    }

    .snapshot {
      width: 100%;
      margin-top: 76px;
      overflow: hidden;
      border-radius: 14px;
      color: var(--ink);
      background: #fff;
    }

    .snapshot-top {
      padding: 21px 24px 28px;
    }

    .snapshot-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
    }

    .snapshot h2 {
      margin: 0;
      font-size: 17px;
      font-weight: 600;
      line-height: 24px;
    }

    .status {
      flex-shrink: 0;
      padding: 5px 10px;
      border-radius: 5px;
      color: var(--green);
      background: #e9f6ef;
      font-size: 11px;
      font-weight: 500;
      line-height: 14px;
    }

    .stats {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
      margin: 29px 0 0;
    }

    .stats div {
      display: flex;
      flex-direction: column;
    }

    .stats dt {
      order: 2;
      margin-top: 6px;
      color: var(--muted);
      font-size: 11px;
      line-height: 13px;
    }

    .stats dd {
      margin: 0;
      font-size: 29px;
      font-weight: 600;
      line-height: 35px;
    }

    .snapshot-bottom {
      padding: 22px 24px 29px;
      border-top: 1px solid var(--border);
    }

    .snapshot-bottom h3 {
      margin: 0 0 20px;
      font-size: 15px;
      font-weight: 600;
      line-height: 18px;
    }

    .benefits {
      display: grid;
      gap: 14px;
      margin: 0;
      padding: 0;
      list-style: none;
    }

    .benefits li {
      display: flex;
      gap: 12px;
      color: var(--muted);
      font-size: 12px;
      line-height: 15px;
    }

    .benefits li::before {
      content: "✓";
      color: var(--green);
      font-weight: 600;
    }

    .welcome-footer {
      margin-top: auto;
      padding-top: 70px;
    }

    .tagline {
      margin: 0;
      color: #dad5f5;
      font-size: 14px;
      line-height: 17px;
    }

    .copyright {
      margin: 57px 0 0;
      color: #a9a1cd;
      font-size: 11px;
      line-height: 13px;
    }

    /* Sign-in panel */

    .sign-in {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 194px 48px 70px;
    }

    .form-container,
    .access-note {
      width: 100%;
      max-width: 464px;
    }

    .eyebrow {
      margin: 0;
      color: var(--purple);
      font-size: 11px;
      font-weight: 600;
      line-height: 13px;
    }

    .form-container h2 {
      margin: 23px 0 0;
      font-size: 29px;
      font-weight: 600;
      line-height: 35px;
      letter-spacing: -0.5px;
    }

    .intro {
      margin: 16px 0 0;
      color: var(--muted);
      font-size: 14px;
      line-height: 17px;
    }

    form {
      margin-top: 42px;
    }

    .role-field {
      min-width: 0;
      margin: 0;
      padding: 0;
      border: 0;
    }

    .field-label,
    .role-field legend {
      display: block;
      padding: 0;
      font-size: 12px;
      font-weight: 500;
      line-height: 15px;
    }

    .role-selector {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 4px;
      height: 48px;
      margin-top: 12px;
      padding: 4px;
      border-radius: 7px;
      background: #f5f6fa;
    }

    .role-option {
      position: relative;
      min-width: 0;
    }

    .role-option input {
      position: absolute;
      width: 1px;
      height: 1px;
      opacity: 0;
    }

    .role-option span {
      display: grid;
      height: 40px;
      place-items: center;
      border: 1px solid transparent;
      border-radius: 5px;
      color: var(--muted);
      font-size: 13px;
      font-weight: 500;
      cursor: pointer;
    }

    .role-option input:checked + span {
      border-color: var(--border);
      color: var(--purple);
      background: #fff;
      font-weight: 600;
    }

    .role-option input:focus-visible + span {
      outline: 3px solid #aaa2ff;
      outline-offset: 2px;
    }

    .field {
      margin-top: 28px;
    }

    .input-wrap {
      position: relative;
      margin-top: 10px;
    }

    .text-input {
      display: block;
      width: 100%;
      height: 44px;
      padding: 0 13px;
      border: 1px solid var(--border);
      border-radius: 6px;
      color: var(--ink);
      background: #fff;
      font-size: 12px;
    }

    .text-input:focus {
      border-color: var(--purple);
      outline: 2px solid #5b4fe926;
      outline-offset: 1px;
    }

    .password-input {
      padding-right: 65px;
    }

    .password-toggle {
      position: absolute;
      inset: 0 10px 0 auto;
      padding: 0 8px;
      border: 0;
      color: var(--muted);
      background: transparent;
      font-size: 11px;
    }

    .form-options {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      margin-top: 26px;
      font-size: 12px;
      line-height: 16px;
    }

    .remember {
      display: inline-flex;
      align-items: center;
      gap: 9px;
      color: var(--muted);
      cursor: pointer;
    }

    .remember input {
      width: 16px;
      height: 16px;
      margin: 0;
      accent-color: var(--purple);
    }

    .forgot {
      font-weight: 500;
    }

    .submit {
      width: 100%;
      height: 46px;
      margin-top: 35px;
      border: 0;
      border-radius: 7px;
      color: #fff;
      background: var(--purple);
      font-size: 12px;
      font-weight: 500;
      transition: background 150ms ease;
    }

    .submit:hover {
      background: #4d41d8;
    }

    .role-help {
      margin-top: 21px;
      color: var(--muted);
    }

    .role-help p {
      margin: 0;
      font-size: 12px;
      line-height: 15px;
    }

    .role-help p + p {
      margin-top: 10px;
      font-size: 11px;
      line-height: 13px;
    }

    .access-note {
      margin-top: auto;
      margin-bottom: 0;
      padding-top: 50px;
      color: var(--muted);
      font-size: 12px;
      line-height: 15px;
    }

    .form-message {
      margin: 16px 0 0;
      color: var(--muted);
      font-size: 12px;
      line-height: 1.5;
    }

    .form-message:empty {
      display: none;
    }

    @media (min-width: 1441px) {
      .welcome {
        padding-right: max(56px, calc((100% - 528px) / 2));
        padding-left: max(56px, calc((100% - 528px) / 2));
      }
    }

    @media (max-width: 1100px) {
      .welcome {
        padding-right: 32px;
        padding-left: 32px;
      }

      .welcome-heading {
        font-size: 35px;
        line-height: 1.3;
      }

      .welcome-description br {
        display: none;
      }

      .snapshot-header {
        align-items: flex-start;
      }

      .snapshot h2 {
        font-size: 14px;
      }

      .status {
        font-size: 9px;
      }

      .sign-in {
        padding-right: 32px;
        padding-left: 32px;
      }

      .form-container h2 {
        font-size: 25px;
      }
    }

    @media (max-width: 760px) {
      .page {
        grid-template-columns: 1fr;
        min-height: 100svh;
      }

      .welcome {
        padding: 28px 24px 36px;
      }

      .brand {
        margin-left: 0;
      }

      .welcome-heading {
        margin-top: 40px;
        font-size: 34px;
      }

      .welcome-description {
        margin-top: 18px;
        font-size: 15px;
        line-height: 25px;
      }

      .snapshot,
      .welcome-footer {
        display: none;
      }

      .sign-in {
        padding: 44px 24px 32px;
      }

      .form-container h2 {
        font-size: 26px;
      }

      .access-note {
        margin-top: 48px;
        padding-top: 0;
      }
    }
  </style>
</head>

<body>
  <main class="page">
    <aside class="welcome" aria-label="About Employease">
      <a class="brand" href="/" aria-label="Employease home">
        <span class="brand-mark" aria-hidden="true">e</span>
        <span>employease</span>
      </a>

      <h1 class="welcome-heading">
        A better workday,<br />
        for everyone.
      </h1>

      <p class="welcome-description">
        One home for your people, attendance,<br />
        and payroll. Less admin. More possibility.
      </p>

      <section class="snapshot" aria-labelledby="snapshot-title">
        <div class="snapshot-top">
          <div class="snapshot-header">
            <h2 id="snapshot-title">Your people at a glance</h2>
            <span class="status">All up to date</span>
          </div>

          <dl class="stats">
            <div>
              <dt>Teammates</dt>
              <dd>128</dd>
            </div>
            <div>
              <dt>Present today</dt>
              <dd>112</dd>
            </div>
            <div>
              <dt>Departments</dt>
              <dd>5</dd>
            </div>
          </dl>
        </div>

        <div class="snapshot-bottom">
          <h3>A little less busywork.</h3>
          <ul class="benefits">
            <li>Attendance, automatically tracked.</li>
            <li>Payslips, always within reach.</li>
            <li>Time off, thoughtfully managed.</li>
          </ul>
        </div>
      </section>

      <footer class="welcome-footer">
        <p class="tagline">
          Built around the people who make it happen.
        </p>
        <p class="copyright">
          © 2026 Employease. All rights reserved.
        </p>
      </footer>
    </aside>

    <section class="sign-in" aria-labelledby="sign-in-title">
      <div class="form-container">
        <header>
          <p class="eyebrow">WELCOME BACK</p>
          <h2 id="sign-in-title">Sign in to your workspace</h2>
          <p class="intro">
            Good to see you. Let’s get your day started.
          </p>
        </header>

        <form id="sign-in-form" method="post">
          <fieldset class="role-field">
            <legend>Your role</legend>
            <div class="role-selector">
              <label class="role-option">
                <input type="radio" name="role" value="admin" />
                <span>Admin</span>
              </label>
              <label class="role-option">
                <input
                  type="radio"
                  name="role"
                  value="employee"
                  checked
                />
                <span>Employee</span>
              </label>
            </div>
          </fieldset>

          <div class="field">
            <label class="field-label" for="email">Work email</label>
            <div class="input-wrap">
              <input
                class="text-input"
                id="email"
                name="email"
                type="email"
                placeholder="alex.morgan@employease.co"
                autocomplete="username"
                required
              />
            </div>
          </div>

          <div class="field">
            <label class="field-label" for="password">Password</label>
            <div class="input-wrap">
              <input
                class="text-input password-input"
                id="password"
                name="password"
                type="password"
                placeholder="••••••••••••"
                autocomplete="current-password"
                required
              />
              <button
                class="password-toggle"
                id="password-toggle"
                type="button"
                aria-controls="password"
                aria-label="Show password"
                aria-pressed="false"
              >
                Show
              </button>
            </div>
          </div>

          <div class="form-options">
            <label class="remember">
              <input type="checkbox" name="remember" />
              Remember me
            </label>
            <a class="forgot" href="/forgot-password">
              Forgot password?
            </a>
          </div>

          <button class="submit" type="submit">
            Sign in <span aria-hidden="true">→</span>
          </button>

          <div class="role-help">
            <p>Your account opens the workspace for your role.</p>
            <p>Admin → Overview · Employee → My workspace</p>
          </div>

          <p class="form-message" id="form-message" role="status"></p>
        </form>
      </div>

      <p class="access-note">
        Need access? Contact your workspace administrator.
      </p>
    </section>
  </main>

  <script>
    const password = document.getElementById("password");
    const toggle = document.getElementById("password-toggle");

    toggle.addEventListener("click", () => {
      const showPassword = password.type === "password";

      password.type = showPassword ? "text" : "password";
      toggle.textContent = showPassword ? "Hide" : "Show";
      toggle.setAttribute("aria-pressed", String(showPassword));
      toggle.setAttribute(
        "aria-label",
        showPassword ? "Hide password" : "Show password"
      );
    });

    document
      .getElementById("sign-in-form")
      .addEventListener("submit", async (event) => {
        event.preventDefault();

        const form = event.target;
        const message = document.getElementById("form-message");

        // Get form values
        const email = form.elements["email"].value;
        const password = form.elements["password"].value;

        message.textContent = "Signing in...";

        try {
          const response = await fetch("/api/login", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
              "Accept": "application/json"
            },
            body: JSON.stringify({
              email: email,
              password: password,
              device_name: "Web Browser"
            })
          });

          const data = await response.json();
          const employee = data.employee;

          if (!response.ok) {
            // Handle validation/authentication errors
            message.textContent =
              data.message || "Invalid email or password.";

            return;
          }

          // Authentication successful
          message.textContent = "Login successful!";

          // Save the Sanctum token
          sessionStorage.setItem("auth_token", data.token);

          // Optional: Store user information
          sessionStorage.setItem(
            "employee",
            JSON.stringify(data.employee)
          );

          // Redirect to dashboard
          if(Number(employee.roleID)===1){
            window.location.href = "/admin";
          }
          else{
            window.location.href = "employeeportal";
          }

        } catch (error) {
          console.error("Login error:", error);
          message.textContent =
            "Unable to connect to the server.";
        }
      });
  </script>
</body>
</html>