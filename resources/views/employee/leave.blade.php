@extends('layouts.employee')

@section('title', 'My leave')
@section('description', 'Plan time off and follow your leave requests.')

@section('content')
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
@endsection