@extends('layouts.employee')

@section('title', 'My workspace')
@section('heading', 'Good morning, ' . explode(' ', trim($user->name))[0])
@section('description', 'Your workday, without the busywork.')

@section('content')
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
          <a class="button button-primary" href="{{ route('employee.attendance') }}">
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
          <a class="text-link" href="{{ route('employee.attendance') }}">View all →</a>
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
          <a class="text-link" href="{{ route('employee.payslips') }}">View all →</a>
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

        <a class="button button-primary" href="{{ route('employee.leave') }}">
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
          <a class="text-link" href="{{ route('employee.salary-changes') }}">
            View salary history →
          </a>
        </div>
      </section>
    </div>
  </div>
@endsection