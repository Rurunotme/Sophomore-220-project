@extends('layouts.admin')

@section('title', 'Overview')
@section('description', 'A little clarity for your people operations.')

@section('actions')
  <label>
    <span class="breadcrumb">Reporting period</span>
    <select class="select" aria-label="Reporting period">
      <option>November 2026</option>
    </select>
  </label>
@endsection

@section('content')
  <div class="stats-grid">
    <article class="card">
      <p>Total employees</p>
      <strong class="stat-value">128</strong>
      <span class="stat-note positive">↑ 8 this month</span>
    </article>
    <article class="card">
      <p>Present today</p>
      <strong class="stat-value">112</strong>
      <span class="stat-note">87.5% of your team</span>
    </article>
    <article class="card">
      <p>Absent today</p>
      <strong class="stat-value">8</strong>
      <span class="stat-note">3 more on approved leave</span>
    </article>
    <article class="card">
      <p>Monthly payroll</p>
      <strong class="stat-value">$612,480</strong>
      <span class="stat-note">November · 128 employees</span>
    </article>
  </div>

  <div class="content-grid">
    <section class="card" aria-labelledby="trends-title">
      <div class="card-heading">
        <div>
          <h2 id="trends-title">Attendance trends</h2>
          <p>Daily attendance across your team</p>
        </div>
        <span class="stat-note">Present</span>
      </div>

      <svg class="chart" viewBox="0 0 600 190"
           role="img" aria-labelledby="chart-title">
        <title id="chart-title">
          Illustrative attendance trend across seven days
        </title>
        <g stroke="#e9ecf3" stroke-width="1">
          <path d="M0 20H600M0 70H600M0 120H600M0 170H600"/>
        </g>
        <path d="M0 45L100 35L200 42L300 30L400 35L500 40L600 38V170H0Z"
              fill="#efecff"/>
        <path d="M0 45L100 35L200 42L300 30L400 35L500 40L600 38"
              fill="none" stroke="#6554f5" stroke-width="3"/>
      </svg>

      <div class="chart-labels" aria-hidden="true">
        <span>Mon</span><span>Tue</span><span>Wed</span>
        <span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>
      </div>
    </section>

    <section class="card" aria-labelledby="departments-title">
      <h2 id="departments-title">Department distribution</h2>
      <p>128 employees · 5 departments</p>

      <div class="department-layout">
        <div class="donut" aria-hidden="true">
          <div class="donut-center">
            <strong>128</strong>
            <span>people</span>
          </div>
        </div>

        <dl class="legend">
          <div><dt>Engineering</dt><dd>48</dd></div>
          <div><dt>Design</dt><dd>22</dd></div>
          <div><dt>Marketing</dt><dd>24</dd></div>
          <div><dt>Operations</dt><dd>15</dd></div>
          <div><dt>People</dt><dd>19</dd></div>
        </dl>
      </div>
    </section>

    <section class="card" aria-labelledby="requests-title">
      <div class="card-heading">
        <div>
          <h2 id="requests-title">Recent leave requests</h2>
          <p>3 requests need your attention</p>
        </div>
        <!-- Will need to fix this link -->
          <a class="text-link" href="{{ route('admin.leave-requests') }}">View all →</a>
      </div>

      <div class="table-scroll">
        <table aria-label="Recent leave requests">
          <thead>
            <tr>
              <th scope="col">Employee</th>
              <th scope="col">Leave type</th>
              <th scope="col">Dates</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Sophie Chen<small>Product Designer</small></td>
              <td>Annual leave</td>
              <td>Nov 16–18</td>
              <td><span class="badge">Pending</span></td>
            </tr>
            <tr>
              <td>James Wilson<small>Software Engineer</small></td>
              <td>Sick leave</td>
              <td>Nov 11–12</td>
              <td><span class="badge">Pending</span></td>
            </tr>
            <tr>
              <td>Priya Sharma<small>Marketing Manager</small></td>
              <td>Annual leave</td>
              <td>Nov 23–25</td>
              <td><span class="badge">Pending</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <section class="card" aria-labelledby="today-title">
      <h2 id="today-title">Today at a glance</h2>
      <p>Tuesday, November 10</p>

      <ul class="activity">
        <li>
          <time datetime="2026-11-10">All day</time>
          <strong>Third work anniversary</strong>
          <p>Celebrate Jordan’s milestone.</p>
        </li>
        <li>
          <time datetime="2026-11-10T09:00">09:00 AM</time>
          <strong>Welcome, Daniel Kim</strong>
          <p>Engineering onboarding begins.</p>
        </li>
        <li>
          <time datetime="2026-11-10T15:00">03:00 PM</time>
          <strong>Payroll ready to review</strong>
          <p>Review this month’s payroll summary.</p>
        </li>
      </ul>
    </section>
  </div>
@endsection
