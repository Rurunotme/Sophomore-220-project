@extends('layouts.employee')

@section('title', 'My attendance')
@section('description', 'Keep track of your time and attendance.')

@section('content')
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
@endsection