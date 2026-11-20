<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Employease brings your people, attendance, leave, and payroll together in one thoughtful workspace." />
  <title>Employease — A better workday for everyone</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <style>
    :root {
      --ink: #182338;
      --muted: #647084;
      --purple: #5b4fe9;
      --purple-dark: #292263;
      --lavender: #f7f6fd;
      --border: #e5e9f0;
      --green: #187453;
    }

    * {
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      min-width: 320px;
      min-height: 100vh;
      margin: 0;
      color: var(--ink);
      background: #fff;
      font-family: "Inter", sans-serif;
      -webkit-font-smoothing: antialiased;
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    a:focus-visible {
      outline: 3px solid #aaa2ff;
      outline-offset: 4px;
    }

    .container {
      width: min(1280px, calc(100% - 64px));
      margin: 0 auto;
    }

    .site-header {
      position: relative;
      z-index: 2;
      display: flex;
      min-height: 96px;
      align-items: center;
      justify-content: space-between;
      gap: 30px;
      background: #fff;
    }

    .brand {
      display: inline-flex;
      flex-shrink: 0;
      align-items: center;
      gap: 10px;
      font-size: 24px;
      font-weight: 600;
      letter-spacing: -0.8px;
    }

    .brand-mark {
      display: grid;
      width: 36px;
      height: 36px;
      place-items: center;
      border-radius: 9px;
      color: #fff;
      background: var(--purple);
      font-size: 27px;
      font-weight: 700;
      line-height: 1;
    }

    .header-nav {
      display: flex;
      align-items: center;
      gap: clamp(18px, 3vw, 46px);
      color: var(--muted);
      font-size: 14px;
      font-weight: 500;
    }

    .header-nav a:not(.button):hover,
    .footer-nav a:hover {
      color: var(--purple);
    }

    .button {
      display: inline-flex;
      min-height: 50px;
      align-items: center;
      justify-content: center;
      padding: 0 22px;
      border: 1px solid transparent;
      border-radius: 7px;
      font-size: 14px;
      font-weight: 600;
      transition: background-color 160ms ease, transform 160ms ease;
      cursor: pointer;
    }

    .button:hover {
      transform: translateY(-1px);
    }

    .button-primary {
      color: #fff;
      background: var(--purple);
    }

    .button-primary:hover {
      background: #493ed2;
    }

    .button-secondary {
      border-color: var(--border);
      color: var(--ink);
      background: #fff;
    }

    .hero {
      overflow: hidden;
      background: var(--lavender);
    }

    .hero-inner {
      display: grid;
      min-height: 700px;
      grid-template-columns: minmax(0, 0.94fr) minmax(0, 1.06fr);
      align-items: center;
      gap: 36px;
      padding: 66px 0 48px;
    }

    .hero-copy {
      align-self: stretch;
      display: flex;
      flex-direction: column;
      align-items: flex-start;
    }

    .eyebrow {
      margin: 0;
      color: var(--purple);
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.9px;
      line-height: 1.5;
      text-transform: uppercase;
    }

    .hero .eyebrow {
      padding: 8px 14px;
      border-radius: 999px;
      background: #ebe8ff;
    }

    h1 {
      max-width: 650px;
      margin: 28px 0 0;
      color: var(--purple-dark);
      font-size: clamp(48px, 5.2vw, 68px);
      font-weight: 600;
      letter-spacing: -3.4px;
      line-height: 1.08;
    }

    .hero-description {
      max-width: 580px;
      margin: 24px 0 0;
      color: var(--muted);
      font-size: 18px;
      line-height: 1.7;
    }

    .hero-actions {
      display: flex;
      flex-wrap: wrap;
      gap: 16px;
      margin-top: 34px;
    }

    .hero-note {
      margin: 18px 0 0;
      color: var(--muted);
      font-size: 13px;
    }

    .hero-tagline {
      margin-top: auto;
      padding-top: 42px;
    }

    .hero-tagline strong {
      display: block;
      margin-top: 8px;
      font-size: 20px;
      font-weight: 500;
    }

    .product-frame {
      position: relative;
      width: 100%;
      padding: 20px 0 18px 18px;
    }

    .product-frame::before {
      position: absolute;
      top: 0;
      right: -14px;
      bottom: 30px;
      left: 44px;
      border-radius: 18px;
      background: #e6e1fc;
      content: "";
    }

    .product-window {
      position: relative;
      overflow: hidden;
      border: 1px solid #dcd7f3;
      border-radius: 12px;
      background: #fff;
      box-shadow: 0 18px 40px rgb(41 33 99 / 12%);
    }

    .window-toolbar {
      display: flex;
      height: 33px;
      align-items: center;
      gap: 5px;
      padding: 0 12px;
      border-bottom: 1px solid #eff0f5;
      background: #fff;
    }

    .window-dot {
      width: 7px;
      height: 7px;
      border-radius: 50%;
      background: #e2e4ea;
    }

    .window-address {
      width: 44%;
      margin: 0 auto;
      padding: 4px 12px;
      border-radius: 4px;
      color: #9299a8;
      background: #f6f7fa;
      font-size: 7px;
      text-align: center;
    }

    .admin-preview {
      display: grid;
      min-height: 385px;
      grid-template-columns: 128px minmax(0, 1fr);
      background: #f8f9fc;
    }

    .preview-sidebar {
      padding: 14px 9px;
      border-right: 1px solid #eceef3;
      background: #fff;
    }

    .preview-logo {
      display: flex;
      align-items: center;
      gap: 6px;
      margin: 1px 5px 20px;
      font-size: 10px;
      font-weight: 700;
    }

    .preview-logo-mark {
      display: grid;
      width: 17px;
      height: 17px;
      place-items: center;
      border-radius: 4px;
      color: #fff;
      background: var(--purple);
      font-size: 12px;
    }

    .side-label {
      margin: 0 6px 6px;
      color: #a0a6b2;
      font-size: 7px;
      font-weight: 600;
      text-transform: uppercase;
    }

    .side-item {
      display: flex;
      min-height: 25px;
      align-items: center;
      gap: 7px;
      padding: 0 7px;
      border-radius: 5px;
      color: #747d8e;
      font-size: 8px;
    }

    .side-item.active {
      color: var(--purple);
      background: #f0efff;
      font-weight: 600;
    }

    .side-icon {
      width: 9px;
      height: 9px;
      border: 1px solid currentColor;
      border-radius: 3px;
      opacity: 0.75;
    }

    .preview-main {
      min-width: 0;
      padding: 17px 18px;
    }

    .preview-topbar,
    .preview-title-row,
    .stat-card,
    .activity-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .preview-topbar {
      margin-bottom: 18px;
      color: #8991a1;
      font-size: 8px;
    }

    .preview-title-row {
      align-items: flex-start;
      margin-bottom: 14px;
    }

    .preview-title {
      margin: 0;
      font-size: 15px;
      font-weight: 700;
    }

    .preview-subtitle {
      margin: 5px 0 0;
      color: #8b93a2;
      font-size: 8px;
    }

    .preview-action {
      padding: 6px 8px;
      border-radius: 4px;
      color: #fff;
      background: var(--purple);
      font-size: 7px;
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(4, minmax(0, 1fr));
      gap: 7px;
    }

    .stat-card {
      display: block;
      min-width: 0;
      padding: 9px 8px;
      border: 1px solid #eff0f4;
      border-radius: 6px;
      background: #fff;
    }

    .stat-label {
      display: block;
      color: #7e8797;
      font-size: 7px;
      white-space: nowrap;
    }

    .stat-value {
      display: block;
      margin-top: 6px;
      font-size: 15px;
      font-weight: 700;
    }

    .stat-change {
      display: block;
      margin-top: 3px;
      color: var(--green);
      font-size: 6px;
    }

    .preview-panels {
      display: grid;
      grid-template-columns: 1.2fr 0.8fr;
      gap: 8px;
      margin-top: 9px;
    }

    .preview-panel {
      min-width: 0;
      padding: 10px;
      border: 1px solid #eff0f4;
      border-radius: 6px;
      background: #fff;
    }

    .panel-heading {
      margin: 0;
      font-size: 8px;
      font-weight: 600;
    }

    .panel-caption {
      margin: 4px 0 0;
      color: #9299a8;
      font-size: 6px;
    }

    .chart {
      position: relative;
      display: flex;
      height: 85px;
      align-items: flex-end;
      justify-content: space-around;
      gap: 6px;
      margin-top: 10px;
      padding: 0 5px 13px;
      border-bottom: 1px solid #e9ebf1;
      background: repeating-linear-gradient(to bottom, transparent 0, transparent 19px, #f1f2f6 20px);
    }

    .chart-bar {
      width: 10%;
      border-radius: 3px 3px 0 0;
      background: #aaa3ff;
    }

    .chart-bar:nth-child(2n) {
      background: #7568ee;
    }

    .chart-labels {
      display: flex;
      justify-content: space-around;
      margin-top: 4px;
      color: #959cab;
      font-size: 6px;
    }

    .activity-row {
      gap: 5px;
      padding: 8px 0;
      border-bottom: 1px solid #f0f1f4;
      font-size: 6px;
    }

    .activity-row:last-child {
      border-bottom: 0;
    }

    .activity-person {
      display: flex;
      align-items: center;
      gap: 4px;
    }

    .mini-avatar {
      display: grid;
      width: 16px;
      height: 16px;
      place-items: center;
      border-radius: 5px;
      color: #5144c5;
      background: #e8e6ff;
      font-size: 6px;
      font-weight: 700;
    }

    .activity-state {
      color: #ba8c27;
      font-size: 6px;
    }

    .pillars {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 26px;
      padding-top: 34px;
      padding-bottom: 38px;
    }

    .pillar-number {
      margin: 0;
      color: var(--purple);
      font-size: 11px;
      font-weight: 700;
    }

    .pillar h2 {
      margin: 10px 0 5px;
      font-size: 18px;
      font-weight: 600;
    }

    .pillar p:last-child {
      margin: 0;
      color: var(--muted);
      font-size: 13px;
      line-height: 1.6;
    }

    .section {
      padding-top: 84px;
      padding-bottom: 84px;
    }

    .section-label {
      margin: 0 0 18px;
      color: var(--purple);
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.9px;
      text-transform: uppercase;
    }

    .section-title {
      margin: 0;
      font-size: clamp(32px, 4vw, 44px);
      font-weight: 600;
      letter-spacing: -1.7px;
      line-height: 1.2;
    }

    .section-description {
      max-width: 680px;
      margin: 14px 0 0;
      color: var(--muted);
      font-size: 16px;
      line-height: 1.7;
    }

    .workspace {
      display: grid;
      grid-template-columns: minmax(310px, 0.85fr) minmax(0, 1.15fr);
      align-items: center;
      gap: 72px;
    }

    .workspace-points {
      display: grid;
      gap: 22px;
      margin-top: 38px;
    }

    .workspace-point {
      display: grid;
      grid-template-columns: 32px 1fr;
      gap: 15px;
    }

    .point-number {
      color: var(--purple);
      font-size: 12px;
      font-weight: 700;
    }

    .workspace-point h3 {
      margin: -4px 0 6px;
      font-size: 18px;
      font-weight: 600;
    }

    .workspace-point p {
      margin: 0;
      color: var(--muted);
      font-size: 14px;
      line-height: 1.65;
    }

    .directory-card {
      overflow: hidden;
      border: 1px solid #e6e8ef;
      border-radius: 12px;
      background: #fff;
      box-shadow: 0 16px 42px rgb(24 35 56 / 8%);
    }

    .directory-top {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px 22px;
      border-bottom: 1px solid #eff0f5;
    }

    .directory-top h3 {
      margin: 0;
      font-size: 14px;
      font-weight: 600;
    }

    .directory-top span {
      color: #8b93a2;
      font-size: 10px;
    }

    .directory-summary {
      display: flex;
      gap: 24px;
      padding: 14px 22px;
      border-bottom: 1px solid #eff0f5;
      color: #7c8595;
      font-size: 9px;
    }

    .directory-summary strong {
      margin-left: 4px;
      color: var(--ink);
      font-size: 11px;
    }

    .directory-row {
      display: grid;
      grid-template-columns: 1.4fr 1fr 0.9fr;
      align-items: center;
      gap: 10px;
      padding: 13px 22px;
      border-bottom: 1px solid #f0f1f4;
      font-size: 10px;
    }

    .directory-row:last-child {
      border-bottom: 0;
    }

    .directory-header {
      color: #9299a8;
      font-size: 8px;
      font-weight: 600;
      text-transform: uppercase;
    }

    .directory-person {
      display: flex;
      align-items: center;
      gap: 9px;
      font-weight: 600;
    }

    .directory-role {
      margin-top: 3px;
      color: #8991a1;
      font-size: 8px;
      font-weight: 400;
    }

    .directory-status {
      justify-self: start;
      padding: 5px 7px;
      border-radius: 999px;
      color: var(--green);
      background: #eaf7f1;
      font-size: 8px;
    }

    .employee-section {
      overflow: hidden;
      color: #fff;
      background: var(--purple-dark);
    }

    .employee-inner {
      display: grid;
      min-height: 600px;
      grid-template-columns: minmax(0, 0.9fr) minmax(0, 1.1fr);
      align-items: center;
      gap: 56px;
      padding-top: 64px;
      padding-bottom: 64px;
    }

    .employee-section .section-label {
      color: #c9c2ff;
    }

    .employee-section .section-title {
      max-width: 550px;
      color: #fff;
    }

    .employee-section .section-description {
      color: #d5cff0;
    }

    .benefit-list {
      display: grid;
      gap: 16px;
      margin: 30px 0 0;
      padding: 0;
      list-style: none;
    }

    .benefit-list li {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      color: #fff;
      font-size: 14px;
      line-height: 1.6;
    }

    .check {
      color: #c9c2ff;
      font-weight: 700;
    }

    .employee-link {
      display: inline-flex;
      margin-top: 34px;
      color: #fff;
      font-size: 14px;
      font-weight: 600;
    }

    .employee-link:hover {
      text-decoration: underline;
      text-underline-offset: 4px;
    }

    .portal-window {
      overflow: hidden;
      border: 8px solid rgb(255 255 255 / 13%);
      border-radius: 14px;
      color: var(--ink);
      background: #f7f8fb;
      box-shadow: 0 20px 54px rgb(0 0 0 / 18%);
    }

    .portal-layout {
      display: grid;
      min-height: 400px;
      grid-template-columns: 120px minmax(0, 1fr);
    }

    .portal-sidebar {
      padding: 17px 10px;
      background: #fff;
    }

    .portal-sidebar .preview-logo {
      margin: 0 3px 25px;
      font-size: 9px;
    }

    .portal-sidebar .side-item {
      min-height: 29px;
      font-size: 8px;
    }

    .portal-main {
      min-width: 0;
      padding: 22px;
    }

    .portal-greeting {
      margin: 0;
      font-size: 16px;
      font-weight: 700;
    }

    .portal-welcome {
      margin: 6px 0 18px;
      color: #818a9a;
      font-size: 9px;
    }

    .portal-attendance {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      padding: 14px;
      border-radius: 8px;
      color: #fff;
      background: var(--purple);
    }

    .portal-attendance p {
      margin: 0;
      font-size: 8px;
    }

    .portal-attendance strong {
      display: block;
      margin-top: 5px;
      font-size: 13px;
    }

    .clock-button {
      padding: 8px 10px;
      border-radius: 5px;
      color: var(--purple);
      background: #fff;
      font-size: 8px;
      font-weight: 600;
    }

    .portal-cards {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 9px;
      margin-top: 12px;
    }

    .portal-card {
      padding: 12px;
      border: 1px solid #eceef3;
      border-radius: 7px;
      background: #fff;
    }

    .portal-card-label {
      color: #7c8595;
      font-size: 8px;
    }

    .portal-card-value {
      display: block;
      margin-top: 8px;
      font-size: 13px;
      font-weight: 700;
    }

    .portal-card-note {
      display: block;
      margin-top: 4px;
      color: var(--green);
      font-size: 7px;
    }

    .portal-lower {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 9px;
      margin-top: 12px;
    }

    .portal-list {
      padding: 12px;
      border: 1px solid #eceef3;
      border-radius: 7px;
      background: #fff;
    }

    .portal-list h3 {
      margin: 0 0 9px;
      font-size: 9px;
    }

    .portal-list-row {
      display: flex;
      justify-content: space-between;
      gap: 6px;
      padding: 8px 0;
      border-top: 1px solid #f0f1f4;
      color: #687286;
      font-size: 7px;
    }

    .portal-list-row strong {
      color: var(--green);
      font-size: 7px;
      font-weight: 600;
    }

    .steps {
      padding-top: 72px;
      padding-bottom: 78px;
    }

    .steps .section-title {
      font-size: clamp(30px, 3.5vw, 38px);
    }

    .steps-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 40px;
      margin-top: 44px;
    }

    .step-number {
      margin: 0 0 18px;
      color: var(--purple);
      font-size: 26px;
      font-weight: 600;
    }

    .step h3 {
      margin: 0 0 9px;
      font-size: 18px;
      font-weight: 600;
    }

    .step p:last-child {
      max-width: 350px;
      margin: 0;
      color: var(--muted);
      font-size: 14px;
      line-height: 1.65;
    }

    .questions {
      background: #f7f8fc;
    }

    .questions-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 34px 60px;
      margin-top: 34px;
    }

    .question h3 {
      margin: 0 0 10px;
      font-size: 16px;
      font-weight: 600;
      line-height: 1.5;
    }

    .question p {
      margin: 0;
      color: var(--muted);
      font-size: 14px;
      line-height: 1.65;
    }

    .cta-section {
      padding-top: 36px;
      padding-bottom: 36px;
    }

    .cta-card {
      display: flex;
      min-height: 228px;
      align-items: center;
      justify-content: space-between;
      gap: 30px;
      padding: 36px 40px;
      border-radius: 16px;
      background: #f1eeff;
    }

    .cta-card h2 {
      margin: 0;
      color: var(--purple-dark);
      font-size: clamp(28px, 3.3vw, 38px);
      font-weight: 600;
      letter-spacing: -1.3px;
    }

    .cta-card p {
      margin: 12px 0 0;
      color: var(--muted);
      font-size: 16px;
      line-height: 1.6;
    }

    .cta-note {
      font-size: 13px !important;
    }

    .cta-card .button {
      flex-shrink: 0;
      min-width: 190px;
    }

    .site-footer {
      display: grid;
      min-height: 160px;
      grid-template-columns: 1fr auto;
      align-items: center;
      gap: 18px 40px;
      padding-top: 28px;
      padding-bottom: 28px;
    }

    .footer-brand {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 20px;
      font-weight: 600;
    }

    .footer-description {
      margin: 13px 0 0;
      color: var(--muted);
      font-size: 13px;
    }

    .footer-nav {
      display: flex;
      flex-wrap: wrap;
      gap: 28px;
      color: var(--muted);
      font-size: 13px;
    }

    .copyright {
      grid-column: 2;
      margin: 0;
      color: var(--muted);
      font-size: 11px;
      text-align: right;
    }

    @media (max-width: 1000px) {
      .hero-inner {
        grid-template-columns: 1fr;
        gap: 30px;
      }

      .hero-copy {
        min-height: 440px;
      }

      .product-frame {
        width: min(100%, 720px);
        margin: 0 auto;
      }

      .workspace {
        grid-template-columns: 1fr;
        gap: 42px;
      }

      .employee-inner {
        grid-template-columns: 1fr;
      }

      .portal-window {
        width: min(100%, 720px);
        margin: 0 auto;
      }
    }

    @media (max-width: 700px) {
      .container {
        width: min(100% - 36px, 1280px);
      }

      .site-header {
        min-height: 76px;
      }

      .brand {
        font-size: 20px;
      }

      .header-nav {
        gap: 14px;
      }

      .header-nav a:not(.button) {
        display: none;
      }

      .header-nav .button {
        min-height: 42px;
        padding: 0 14px;
      }

      .hero-inner {
        min-height: unset;
        padding-top: 52px;
        padding-bottom: 46px;
      }

      .hero-copy {
        min-height: unset;
      }

      h1 {
        font-size: clamp(44px, 12vw, 60px);
        letter-spacing: -2.5px;
      }

      .hero-description {
        font-size: 16px;
      }

      .hero-tagline {
        margin-top: 48px;
        padding-top: 0;
      }

      .product-frame {
        padding-left: 0;
      }

      .product-frame::before {
        right: -8px;
        left: 20px;
      }

      .admin-preview {
        min-height: 320px;
        grid-template-columns: 88px minmax(0, 1fr);
      }

      .preview-sidebar {
        padding-right: 6px;
        padding-left: 6px;
      }

      .preview-main {
        padding: 13px 10px;
      }

      .stats-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
      }

      .preview-panels {
        grid-template-columns: 1fr;
      }

      .activity-panel {
        display: none;
      }

      .pillars {
        grid-template-columns: repeat(2, 1fr);
        gap: 28px 18px;
      }

      .section {
        padding-top: 64px;
        padding-bottom: 64px;
      }

      .workspace {
        gap: 32px;
      }

      .directory-top,
      .directory-summary,
      .directory-row {
        padding-right: 12px;
        padding-left: 12px;
      }

      .directory-row {
        grid-template-columns: 1.4fr 0.8fr 0.7fr;
        gap: 5px;
        font-size: 8px;
      }

      .directory-role {
        font-size: 7px;
      }

      .directory-summary {
        gap: 10px;
        font-size: 7px;
      }

      .employee-inner {
        gap: 36px;
      }

      .portal-layout {
        min-height: 350px;
        grid-template-columns: 84px minmax(0, 1fr);
      }

      .portal-sidebar {
        padding-right: 5px;
        padding-left: 5px;
      }

      .portal-main {
        padding: 14px 10px;
      }

      .steps-grid {
        grid-template-columns: 1fr;
        gap: 28px;
        margin-top: 32px;
      }

      .step {
        display: grid;
        grid-template-columns: 42px 1fr;
        column-gap: 12px;
      }

      .step-number {
        grid-row: span 2;
        margin: -4px 0 0;
      }

      .step h3 {
        margin-bottom: 6px;
      }

      .questions-grid {
        grid-template-columns: 1fr;
        gap: 26px;
      }

      .cta-card {
        align-items: flex-start;
        flex-direction: column;
        padding: 30px 24px;
      }

      .cta-card .button {
        width: 100%;
      }

      .site-footer {
        grid-template-columns: 1fr;
      }

      .footer-nav {
        gap: 20px;
      }

      .copyright {
        grid-column: 1;
        text-align: left;
      }
    }

    @media (prefers-reduced-motion: reduce) {
      html {
        scroll-behavior: auto;
      }

      .button {
        transition: none;
      }
    }
  </style>
</head>
<body>
  <header class="container site-header">
    <a class="brand" href="#home" aria-label="Employease home">
      <span class="brand-mark" aria-hidden="true">e</span>
      <span>employease</span>
    </a>
    <nav class="header-nav" aria-label="Main navigation">
      <a href="#platform">Platform</a>
      <a href="#how-it-works">How it works</a>
      <a href="#for-your-team">For your team</a>
      <a href="{{ url('/login') }}">Sign in</a>
      <a class="button button-primary" href="mailto:hello@employease.com?subject=Employease%20demo%20request&amp;body=Hi%20Employease%20team%2C%0A%0AI%27d%20like%20to%20book%20a%20product%20demo.">View Watch demo <span aria-hidden="true">&nbsp;→</span></a>
    </nav>
  </header>

  <main>
    <section class="hero" id="home" aria-labelledby="hero-title">
      <div class="container hero-inner">
        <div class="hero-copy">
          <p class="eyebrow">People-first HR, all in one</p>
          <h1 id="hero-title">A better workday.<br />For everyone.</h1>
          <p class="hero-description">
            Your people, attendance, leave, and payroll. Finally working together in one thoughtful workspace.
          </p>
          <div class="hero-actions">
            <a class="button button-primary" href="mailto:hello@employease.com?subject=Employease%20demo%20request&amp;body=Hi%20Employease%20team%2C%0A%0AI%27d%20like%20to%20book%20a%20product%20demo.">View Watch demo <span aria-hidden="true">&nbsp;→</span></a>
            <a class="button button-secondary" href="#platform" aria-label="Explore the Employease platform">Explore the platform</a>
          </div>
          <p class="hero-note">Less admin. More time for your people.</p>
          <div class="hero-tagline">
            <p class="eyebrow">Built around your everyday</p>
            <strong>People operations, without the busywork.</strong>
          </div>
        </div>

        <div class="product-frame" role="img" aria-label="Preview of the Employease admin dashboard with employee, attendance, payroll, and leave summaries">
          <div class="product-window">
            <div class="window-toolbar" aria-hidden="true">
              <span class="window-dot"></span><span class="window-dot"></span><span class="window-dot"></span>
              <span class="window-address">app.employease.com / overview</span>
            </div>
            <div class="admin-preview">
              <aside class="preview-sidebar" aria-hidden="true">
                <div class="preview-logo"><span class="preview-logo-mark">e</span>employease</div>
                <p class="side-label">Workspace</p>
                <div class="side-item active"><span class="side-icon"></span>Overview</div>
                <div class="side-item"><span class="side-icon"></span>Employees</div>
                <div class="side-item"><span class="side-icon"></span>Attendance</div>
                <div class="side-item"><span class="side-icon"></span>Leave requests</div>
                <div class="side-item"><span class="side-icon"></span>Payroll</div>
                <p class="side-label" style="margin-top: 22px">Account</p>
                <div class="side-item"><span class="side-icon"></span>Settings</div>
              </aside>
              <div class="preview-main">
                <div class="preview-topbar"><span>Overview / Dashboard</span><span>Search&nbsp;&nbsp;&nbsp; ◉</span></div>
                <div class="preview-title-row">
                  <div><h2 class="preview-title">Good morning, Alex</h2><p class="preview-subtitle">Here’s what’s happening with your team today.</p></div>
                  <span class="preview-action">Export report</span>
                </div>
                <div class="stats-grid">
                  <div class="stat-card"><span class="stat-label">Total employees</span><span class="stat-value">128</span><span class="stat-change">Across your teams</span></div>
                  <div class="stat-card"><span class="stat-label">Present today</span><span class="stat-value">96</span><span class="stat-change">Attendance overview</span></div>
                  <div class="stat-card"><span class="stat-label">On leave</span><span class="stat-value">08</span><span class="stat-change">Today’s requests</span></div>
                  <div class="stat-card"><span class="stat-label">Payroll status</span><span class="stat-value">Ready</span><span class="stat-change">For review</span></div>
                </div>
                <div class="preview-panels">
                  <div class="preview-panel">
                    <p class="panel-heading">Attendance trends</p>
                    <p class="panel-caption">Team check-ins this week</p>
                    <div class="chart" aria-hidden="true">
                      <span class="chart-bar" style="height: 42%"></span><span class="chart-bar" style="height: 68%"></span><span class="chart-bar" style="height: 55%"></span><span class="chart-bar" style="height: 82%"></span><span class="chart-bar" style="height: 72%"></span><span class="chart-bar" style="height: 94%"></span><span class="chart-bar" style="height: 62%"></span>
                    </div>
                    <div class="chart-labels"><span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span></div>
                  </div>
                  <div class="preview-panel activity-panel">
                    <p class="panel-heading">Recent requests</p>
                    <p class="panel-caption">Needs your attention</p>
                    <div class="activity-row"><span class="activity-person"><span class="mini-avatar">JM</span>Jordan M.</span><span class="activity-state">Pending</span></div>
                    <div class="activity-row"><span class="activity-person"><span class="mini-avatar">AL</span>Alex L.</span><span class="activity-state">Pending</span></div>
                    <div class="activity-row"><span class="activity-person"><span class="mini-avatar">SK</span>Sam K.</span><span class="activity-state">Pending</span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="container pillars" aria-label="Employease platform highlights">
      <article class="pillar"><p class="pillar-number">01</p><h2>People, connected</h2><p>One place for every employee.</p></article>
      <article class="pillar"><p class="pillar-number">02</p><h2>Time, well managed</h2><p>Attendance and leave in sync.</p></article>
      <article class="pillar"><p class="pillar-number">03</p><h2>Payroll, made clear</h2><p>From monthly runs to payslips.</p></article>
      <article class="pillar"><p class="pillar-number">04</p><h2>A little more autonomy</h2><p>An everyday home for your team.</p></article>
    </section>

    <section class="container section workspace" id="platform" aria-labelledby="platform-title">
      <div>
        <p class="section-label">One connected workspace</p>
        <h2 class="section-title" id="platform-title">Everything your people need. Nothing in your way.</h2>
        <p class="section-description">Bring the everyday details together, so you can see the bigger picture.</p>
        <div class="workspace-points">
          <article class="workspace-point">
            <span class="point-number">01</span>
            <div><h3>Know your people</h3><p>Keep employee profiles, roles, and departments in one organized directory.</p></div>
          </article>
          <article class="workspace-point">
            <span class="point-number">02</span>
            <div><h3>Make time make sense</h3><p>See attendance at a glance and manage leave requests without the back-and-forth.</p></div>
          </article>
          <article class="workspace-point">
            <span class="point-number">03</span>
            <div><h3>Bring clarity to payday</h3><p>Review monthly payroll and keep payslips within easy reach for every employee.</p></div>
          </article>
        </div>
      </div>

      <div class="directory-card" role="img" aria-label="Illustration of the Employease employee directory">
        <div class="directory-top"><h3>Employee directory</h3><span>Export&nbsp;&nbsp; + Add employee</span></div>
        <div class="directory-summary"><span>All employees <strong>128</strong></span><span>Active <strong>124</strong></span><span>Departments <strong>08</strong></span></div>
        <div class="directory-row directory-header"><span>Employee</span><span>Department</span><span>Status</span></div>
        <div class="directory-row"><span class="directory-person"><span class="mini-avatar">JM</span><span>Jordan Miller<span class="directory-role">jordan@example.com</span></span></span><span>Operations</span><span class="directory-status">Active</span></div>
        <div class="directory-row"><span class="directory-person"><span class="mini-avatar">AL</span><span>Alex Lee<span class="directory-role">alex@example.com</span></span></span><span>Design</span><span class="directory-status">Active</span></div>
        <div class="directory-row"><span class="directory-person"><span class="mini-avatar">SK</span><span>Sam Kim<span class="directory-role">sam@example.com</span></span></span><span>People</span><span class="directory-status">Active</span></div>
        <div class="directory-row"><span class="directory-person"><span class="mini-avatar">RP</span><span>Riley Park<span class="directory-role">riley@example.com</span></span></span><span>Marketing</span><span class="directory-status">Active</span></div>
        <div class="directory-row"><span class="directory-person"><span class="mini-avatar">TC</span><span>Taylor Chen<span class="directory-role">taylor@example.com</span></span></span><span>Engineering</span><span class="directory-status">Active</span></div>
      </div>
    </section>

    <section class="employee-section" id="for-your-team" aria-labelledby="team-title">
      <div class="container employee-inner">
        <div>
          <p class="section-label">For the people behind the work</p>
          <h2 class="section-title" id="team-title">A workspace they’ll actually use.</h2>
          <p class="section-description">Give your team a little more independence. And everyone a little less admin.</p>
          <ul class="benefit-list">
            <li><span class="check" aria-hidden="true">✓</span><span>Clock in and out, without the guesswork</span></li>
            <li><span class="check" aria-hidden="true">✓</span><span>Request time off and follow its status</span></li>
            <li><span class="check" aria-hidden="true">✓</span><span>Find payslips when you need them</span></li>
          </ul>
          <a class="employee-link" href="{{ url('/employeeportal') }}">Meet the employee workspace <span aria-hidden="true">&nbsp;→</span></a>
        </div>

        <div class="portal-window" role="img" aria-label="Illustration of an employee's Employease workspace">
          <div class="portal-layout">
            <aside class="portal-sidebar" aria-hidden="true">
              <div class="preview-logo"><span class="preview-logo-mark">e</span>employease</div>
              <div class="side-item active"><span class="side-icon"></span>Workspace</div>
              <div class="side-item"><span class="side-icon"></span>Attendance</div>
              <div class="side-item"><span class="side-icon"></span>Payslips</div>
              <div class="side-item"><span class="side-icon"></span>Leave</div>
            </aside>
            <div class="portal-main">
              <p class="portal-greeting">Good morning, Jordan</p>
              <p class="portal-welcome">Here’s your workday at a glance.</p>
              <div class="portal-attendance">
                <div><p>YOUR ATTENDANCE</p><strong>Ready when you are</strong></div>
                <span class="clock-button">Clock in</span>
              </div>
              <div class="portal-cards">
                <div class="portal-card"><span class="portal-card-label">Hours this week</span><strong class="portal-card-value">32h 15m</strong><span class="portal-card-note">On track this week</span></div>
                <div class="portal-card"><span class="portal-card-label">Leave balance</span><strong class="portal-card-value">12 days</strong><span class="portal-card-note">Available to request</span></div>
              </div>
              <div class="portal-lower">
                <div class="portal-list"><h3>Recent activity</h3><div class="portal-list-row"><span>Clocked in today</span><strong>9:02 AM</strong></div><div class="portal-list-row"><span>Leave request</span><strong>Approved</strong></div></div>
                <div class="portal-list"><h3>Latest payslip</h3><div class="portal-list-row"><span>October 2026</span><strong>View</strong></div><div class="portal-list-row"><span>Net pay</span><strong>Available</strong></div></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="container section steps" id="how-it-works" aria-labelledby="steps-title">
      <p class="section-label">A simpler way to work</p>
      <h2 class="section-title" id="steps-title">From scattered admin to a shared rhythm.</h2>
      <div class="steps-grid">
        <article class="step"><p class="step-number">01</p><h3>Bring your people together</h3><p>Add your team and organize the details that make every employee unique.</p></article>
        <article class="step"><p class="step-number">02</p><h3>Make the everyday flow</h3><p>Manage attendance, review time off, and keep payroll moving in one place.</p></article>
        <article class="step"><p class="step-number">03</p><h3>Give your team a home</h3><p>Let employees manage their day from their own workspace.</p></article>
      </div>
    </section>

    <section class="questions section" id="questions" aria-labelledby="questions-title">
      <div class="container">
        <h2 class="section-title" id="questions-title">A little more clarity.</h2>
        <div class="questions-grid">
          <article class="question"><h3>What can I manage in Employease?</h3><p>Your employee directory, attendance, leave requests, monthly payroll, and payslips — all in one workspace.</p></article>
          <article class="question"><h3>Is there a workspace for employees?</h3><p>Yes. Employees can track attendance, request leave, check request status, and access their payslips.</p></article>
          <article class="question"><h3>How do admins and employees sign in?</h3><p>Both use the Employease sign-in page. Their account opens the right workspace for their role.</p></article>
          <article class="question"><h3>How can I see Employease in action?</h3><p>Watch the demo to explore the platform and see how it could fit your team’s everyday work.</p></article>
        </div>
      </div>
    </section>

    <section class="container cta-section" id="book-a-demo" aria-labelledby="cta-title">
      <div class="cta-card">
        <div>
          <h2 id="cta-title">Less busywork. More possibility.</h2>
          <p>Make room for what matters most: your people.</p>
          <p class="cta-note">One home for your people, from the first day to every payday.</p>
        </div>
        <a class="button button-primary" href="mailto:hello@employease.com?subject=Employease%20demo%20request&amp;body=Hi%20Employease%20team%2C%0A%0AI%27d%20like%20to%20book%20a%20product%20demo.">View Watch demo <span aria-hidden="true">&nbsp;→</span></a>
      </div>
    </section>
  </main>

  <footer class="container site-footer" id="contact">
    <div>
      <a class="footer-brand" href="#home" aria-label="Employease home">
        <span class="brand-mark" aria-hidden="true">e</span>
        <span>employease</span>
      </a>
      <p class="footer-description">A better workday, for everyone.</p>
    </div>
    <nav class="footer-nav" aria-label="Footer navigation">
      <a href="#platform">Platform</a>
      <a href="{{ url('/login') }}">Sign in</a>
      <a href="mailto:hello@employease.com">Contact</a>
    </nav>
    <p class="copyright">© {{ date('Y') }} Employease. All rights reserved.</p>
  </footer>
</body>
</html>
