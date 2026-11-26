@extends('layouts.admin')

@section('title', 'Attendance')
@section('description', 'Track attendance and working hours.')

{{-- Page-specific styles. The layout already provides .card, .stats-grid, table, etc. --}}
@push('styles')
<style>
  .filters {
    display: grid;
    grid-template-columns: minmax(180px, 1.4fr) minmax(160px, 1fr) minmax(150px, 1fr);
    gap: 12px;
    margin-bottom: 28px;
  }
  .filters .select,
  .filters .search,
  .filters .date-input {
    width: 100%;
    min-height: 38px;
    padding: 0 12px;
    border: 1px solid var(--border);
    border-radius: 7px;
    background: #fff;
    color: var(--text);
    font-size: 12px;
    font-weight: 500;
  }

  /* Status badge colors (match the Figma) */
  .badge-present { background: #e9f6ef; color: #187453; }
  .badge-late    { background: #fff4db; color: #936000; }
  .badge-leave   { background: #eeecff; color: #5b4fe9; }
  .badge-absent  { background: #fdecec; color: #b33939; }
  .badge { font-size: 11px; padding: 5px 10px; border-radius: 5px; font-weight: 500; }

  .thead-bg th { background: #f8f9fc; }
  .name-cell { font-weight: 500; }
  .muted-cell { color: var(--muted); }

  @media (max-width: 720px) {
    .filters { grid-template-columns: minmax(0, 1fr); }
  }
</style>
@endpush

@section('content')
  {{-- The 4 summary cards --}}
  <div class="stats-grid">
    <article class="card">
      <p>Present{{ $day->isToday() ? ' today' : '' }}</p>
      <strong class="stat-value">{{ $stats['present'] }}</strong>
      <span class="stat-note">{{ $stats['presentRate'] }}% attendance rate</span>
    </article>
    <article class="card">
      <p>Absent</p>
      <strong class="stat-value">{{ $stats['absent'] }}</strong>
      <span class="stat-note">No clock-in and no approved leave</span>
    </article>
    <article class="card">
      <p>On approved leave</p>
      <strong class="stat-value">{{ $stats['onLeave'] }}</strong>
      <span class="stat-note">Approved requests</span>
    </article>
    <article class="card">
      <p>Average workday</p>
      <strong class="stat-value">{{ $stats['average'] }}</strong>
      <span class="stat-note">Across {{ $stats['averageDays'] }} completed {{ \Illuminate\Support\Str::plural('day', $stats['averageDays']) }}</span>
    </article>
  </div>

  <section class="card" aria-labelledby="records-title">
    {{-- Filters: a GET form, so the choices show up in the URL --}}
    <form class="filters" id="filter-form" method="GET" action="{{ route('admin.attendance') }}">
      <input class="search" type="search" name="q" value="{{ $search }}"
             placeholder="Search employee…" aria-label="Search employee">

      <input class="date-input" type="date" name="date" value="{{ $day->toDateString() }}"
             max="{{ today()->toDateString() }}" aria-label="Date">

      <select class="select" name="department" aria-label="Department">
        <option value="">Department: All</option>
        @foreach ($departments as $id => $deptName)
          <option value="{{ $id }}" @selected((string) $departmentID === (string) $id)>
            {{ $deptName }}
          </option>
        @endforeach
      </select>
    </form>

    <h2 id="records-title">Daily records</h2>
    <p>{{ $day->format('l, F j, Y') }} · Times in local timezone</p>

    <div class="table-scroll" style="margin-top: 18px;">
      <table aria-label="Attendance records">
        <thead class="thead-bg">
          <tr>
            <th scope="col">Employee</th>
            <th scope="col">Department</th>
            <th scope="col">Clock in</th>
            <th scope="col">Clock out</th>
            <th scope="col">Total hours</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($records as $row)
            @php
              // Pick the badge color based on the status
              $badge = match ($row['status']) {
                'Present'  => 'badge-present',
                'Late'     => 'badge-late',
                'On leave' => 'badge-leave',
                default    => 'badge-absent',
              };
            @endphp
            <tr>
              <td class="name-cell">{{ $row['name'] }}</td>
              <td class="muted-cell">{{ $row['department'] }}</td>
              <td class="muted-cell">{{ $row['clockIn']?->format('h:i A') ?? '—' }}</td>
              <td class="muted-cell">{{ $row['clockOut']?->format('h:i A') ?? '—' }}</td>
              <td class="muted-cell">{{ $row['hours'] }}</td>
              <td><span class="badge {{ $badge }}">{{ $row['status'] }}</span></td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="muted-cell" style="text-align:center; padding: 40px 10px;">
                No attendance records match these filters.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div style="margin-top: 24px;">
      <p>Total hours are calculated automatically after clock-out.</p>
      <p style="margin-top: 14px;">
        Showing {{ $records->count() }} {{ \Illuminate\Support\Str::plural('record', $records->count()) }}
      </p>
    </div>
  </section>
@endsection

@push('scripts')
<script>
  // Reload the page when the date or department changes (search submits on Enter)
  const filterForm = document.getElementById('filter-form');
  filterForm.querySelectorAll('select, input[type="date"]').forEach(el =>
    el.addEventListener('change', () => filterForm.submit())
  );
</script>
@endpush