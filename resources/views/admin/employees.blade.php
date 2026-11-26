@extends('layouts.admin')

@section('title', 'Employees')
@section('description', 'Manage your people and employee information.')

@push('styles')
  <style>
    .employee-directory {
      overflow: hidden;
      border: 1px solid #e5e9f0;
      border-radius: 8px;
      background: #fff;
    }

    .employee-filters {
      display: grid;
      grid-template-columns: minmax(180px, 1fr) 130px 148px;
      align-items: center;
      gap: 8px;
      padding: 12px;
      border-bottom: 1px solid #e5e9f0;
    }

    .employee-search,
    .employee-filter {
      width: 100%;
      height: 28px;
      padding: 0 9px;
      border: 1px solid #e5e9f0;
      border-radius: 6px;
      background: #fff;
      color: #182338;
      font: inherit;
      font-size: 10px;
    }

    .employee-search::placeholder {
      color: #182338;
      opacity: 1;
    }

    .employee-filter {
      color: #344054;
    }

    .employee-table-scroll {
      overflow-x: auto;
    }

    .employee-table {
      width: 100%;
      min-width: 700px;
      border-collapse: collapse;
      text-align: left;
      white-space: normal;
      font-size: 10px;
    }

    .employee-table th {
      height: 29px;
      padding: 0 12px;
      background: #f7f8fb;
      color: #647084;
      font-size: 8px;
      font-weight: 500;
      text-transform: uppercase;
    }

    .employee-table td {
      height: 44px;
      padding: 7px 12px;
      border-bottom: 1px solid #e9ecf3;
      color: #182338;
      vertical-align: middle;
    }

    .employee-table tbody tr:last-child td {
      border-bottom: 0;
    }

    .employee-person-name {
      display: block;
      margin-bottom: 3px;
      font-size: 10px;
      font-weight: 500;
    }

    .employee-person-email,
    .employee-joined {
      color: #737e94;
      font-size: 9px;
    }

    .employee-status {
      display: inline-block;
      padding: 3px 7px;
      border-radius: 4px;
      font-size: 9px;
      line-height: 1.2;
    }

    .employee-status-active {
      background: #e7f5ef;
      color: #237d61;
    }

    .employee-status-leave {
      background: #fff3d6;
      color: #845b12;
    }

    .employee-status-inactive {
      background: #f0f2f5;
      color: #647084;
    }

    .employee-row-actions {
      color: #647084;
      font-size: 15px;
      text-align: center;
    }

    .employee-pagination {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      min-height: 50px;
      padding: 8px 12px;
      border-top: 1px solid #e9ecf3;
    }

    .employee-pagination-summary {
      color: #737e94;
      font-size: 9px;
    }

    .employee-pagination-controls {
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .employee-page-link {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-width: 26px;
      height: 27px;
      padding: 0 9px;
      border: 1px solid #e5e9f0;
      border-radius: 5px;
      background: #fff;
      color: #182338;
      font-size: 10px;
    }

    .employee-page-link-current {
      border-color: #6554f5;
      background: #6554f5;
      color: #fff;
    }

    .employee-page-link-disabled {
      color: #98a2b3;
      cursor: default;
    }

    .employee-empty-state {
      padding: 28px 14px;
      color: #647084;
      font-size: 11px;
      text-align: center;
    }

    .employee-visually-hidden {
      position: absolute;
      width: 1px;
      height: 1px;
      padding: 0;
      margin: -1px;
      overflow: hidden;
      clip: rect(0, 0, 0, 0);
      white-space: nowrap;
      border: 0;
    }

    @media (max-width: 680px) {
      .employee-filters {
        grid-template-columns: minmax(0, 1fr) minmax(120px, 0.6fr);
      }

      .employee-search-wrap {
        grid-column: 1 / -1;
      }
    }

    @media (max-width: 480px) {
      .employee-pagination {
        align-items: flex-start;
        flex-direction: column;
      }
    }
  </style>
@endpush

@section('content')
  <section class="employee-directory" aria-label="Employee directory">
    <div class="employee-filters">
      <div class="employee-search-wrap">
        <label class="employee-visually-hidden" for="employee-search">Search by name or email</label>
        <input
          class="employee-search"
          id="employee-search"
          type="search"
          placeholder="Search by name or email..."
          readonly
        >
      </div>

      <label class="employee-visually-hidden" for="department-filter">Filter by department</label>
      <select class="employee-filter" id="department-filter" aria-label="Department filter">
        <option value="">Department: All</option>
        @foreach ($departments as $department)
          <option value="{{ $department->departmentID }}">{{ $department->departmentName }}</option>
        @endforeach
      </select>

      <label class="employee-visually-hidden" for="status-filter">Filter by status</label>
      <select class="employee-filter" id="status-filter" aria-label="Status filter">
        <option value="">Status: All</option>
        <option>Active</option>
        <option>On leave</option>
      </select>
    </div>

    @if ($employees->isEmpty())
      <div class="employee-empty-state">
        <p>No employee records were found.</p>
      </div>
    @else
      <div class="employee-table-scroll">
        <table class="employee-table">
          <caption class="employee-visually-hidden">Employee directory</caption>
          <thead>
            <tr>
              <th scope="col">Employee</th>
              <th scope="col">Department</th>
              <th scope="col">Designation</th>
              <th scope="col">Status</th>
              <th scope="col">Joined</th>
              <th scope="col"><span class="employee-visually-hidden">Actions</span></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($employees as $employee)
              <tr>
                <td>
                  <span class="employee-person-name">{{ $employee->name }}</span>
                  <span class="employee-person-email">{{ $employee->email }}</span>
                </td>
                <td>{{ $employee->departmentName ?? 'Not assigned' }}</td>
                <td>{{ $employee->designation ?? 'Not assigned' }}</td>
                <td>
                  @if ($employee->onLeave)
                    <span class="employee-status employee-status-leave">On leave</span>
                  @elseif ($employee->isCurrentEmployee)
                    <span class="employee-status employee-status-active">Active</span>
                  @else
                    <span class="employee-status employee-status-inactive">Inactive</span>
                  @endif
                </td>
                <td class="employee-joined">Not recorded</td>
                <td class="employee-row-actions" aria-hidden="true">&#8226;&#8226;&#8226;</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <footer class="employee-pagination">
        <span class="employee-pagination-summary">
          Showing {{ $employees->firstItem() ?? 0 }}–{{ $employees->lastItem() ?? 0 }}
          of {{ $employees->total() }} employees
        </span>
        <nav class="employee-pagination-controls" aria-label="Employee pages">
          @if ($employees->onFirstPage())
            <span class="employee-page-link employee-page-link-disabled" aria-disabled="true">&larr; Previous</span>
          @else
            <a class="employee-page-link" href="{{ $employees->previousPageUrl() }}">&larr; Previous</a>
          @endif

          @php
            $firstPage = max(1, $employees->currentPage() - 1);
            $lastPage = min($employees->lastPage(), $employees->currentPage() + 1);
          @endphp
          @for ($page = $firstPage; $page <= $lastPage; $page++)
            @if ($page === $employees->currentPage())
              <span class="employee-page-link employee-page-link-current" aria-current="page">{{ $page }}</span>
            @else
              <a class="employee-page-link" href="{{ $employees->url($page) }}">{{ $page }}</a>
            @endif
          @endfor

          @if ($employees->hasMorePages())
            <a class="employee-page-link" href="{{ $employees->nextPageUrl() }}">Next &rarr;</a>
          @else
            <span class="employee-page-link employee-page-link-disabled" aria-disabled="true">Next &rarr;</span>
          @endif
        </nav>
      </footer>
    @endif
  </section>
@endsection