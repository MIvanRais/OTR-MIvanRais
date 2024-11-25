@extends('layouts.boilerplate')

@section('title', 'Dashboard')

@section('content')
<main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">OTR</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active text-dark">
          Welcome, {{ $user->first_name . ' ' . $user->last_name }} -
          <span class="text-muted">{{ $user->role->name }}</span>
        </li>
      </ol>
      @include('partials.card')
      @can('admin')
        <div class="card mb-4">
          <div class="card-header">
            <i class="fas fa-table me-1"></i>
            PTW
          </div>
          <div class="card-body">
            <table id="datatablesSimple">
              <thead>
                <tr>
                  <th>Issue Date</th>
                  <th>Verification Date</th>
                  <th>Assessment Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Issue Date</th>
                  <th>Verification Date</th>
                  <th>Assessment Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                  @foreach ($ptws as $ptw)
                    <tr>
                      <td>{{ \Carbon\Carbon::parse($ptw->statuses[0]->date)->format('d-m-Y H:i:s') }}</td>
                      <td>
                        {{ !empty($ptw->statuses[1]->date) ? \Carbon\Carbon::parse($ptw->statuses[1]->date)->format('d-m-Y H:i:s') : 'Waiting Verification' }}
                      </td>                  
                      <td>
                        {{ !empty($ptw->statuses[2]->date) ? \Carbon\Carbon::parse($ptw->statuses[2]->date)->format('d-m-Y H:i:s') : 'Waiting Assessment' }}
                      </td>   
                      <td>
                        @switch($ptw->statuses[count($ptw->statuses) - 1]->name)
                            @case('Proposal')
                                <span class="badge text-bg-primary">Proposal</span>
                                @break
                            @case('Verification')
                                <span class="badge text-bg-warning">Verification</span>
                                @break
                            @case('Assessment')
                                <span class="badge text-bg-success">Assessment</span>
                                @break
                            @case('Rejection')
                                <span class="badge text-bg-danger">Rejection</span>
                                @break
                            @case('Pass')
                                <span class="badge text-bg-success">Pass</span>
                                @break
                            @case('Fail')
                                <span class="badge text-bg-danger">Fail</span>
                                @break
                        @endswitch
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="#"
                            ><button
                              type="button"
                              class="btn btn-primary"
                              style="
                                --bs-btn-padding-y: 0.25rem;
                                --bs-btn-padding-x: 0.5rem;
                                --bs-btn-font-size: 0.75rem;
                              "
                              disabled
                            >
                              Preview
                            </button>
                          </a>
                        </div>
                      </td>
                    </tr>
                @endforeach
                {{-- <tr>
                  <td>22 - 11 - 2024, 02:49:00 AM</td>
                  <td>22 - 11 - 2024, 02:49:00 AM</td>
                  <td>22 - 11 - 2024, 02:49:00 AM</td>
                  <td>
                    <span class="badge text-bg-primary">Proposal</span>
                  </td>
                  <td>
                    <a href="#"
                      ><button
                        type="button"
                        class="btn btn-primary"
                        style="
                          --bs-btn-padding-y: 0.25rem;
                          --bs-btn-padding-x: 0.5rem;
                          --bs-btn-font-size: 0.75rem;
                        "
                      >
                        Preview
                      </button></a
                    >
                  </td>
                </tr>
                <tr>
                  <td>22 - 11 - 2024, 02:49:00 AM</td>
                  <td>22 - 11 - 2024, 02:49:00 AM</td>
                  <td>22 - 11 - 2024, 02:49:00 AM</td>
                  <td>
                    <span class="badge text-bg-warning">Verification</span>
                  </td>
                  <td>
                    <a href="#"
                      ><button
                        type="button"
                        class="btn btn-primary"
                        style="
                          --bs-btn-padding-y: 0.25rem;
                          --bs-btn-padding-x: 0.5rem;
                          --bs-btn-font-size: 0.75rem;
                        "
                      >
                        Preview
                      </button></a
                    >
                  </td>
                </tr>
                <tr>
                  <td>22 - 11 - 2024, 02:49:00 AM</td>
                  <td>22 - 11 - 2024, 02:49:00 AM</td>
                  <td>22 - 11 - 2024, 02:49:00 AM</td>
                  <td>
                    <span class="badge text-bg-success">Assessment</span>
                  </td>
                  <td>
                    <a href="#"
                      ><button
                        type="button"
                        class="btn btn-primary"
                        style="
                          --bs-btn-padding-y: 0.25rem;
                          --bs-btn-padding-x: 0.5rem;
                          --bs-btn-font-size: 0.75rem;
                        "
                      >
                        Preview
                      </button></a
                    >
                  </td>
                </tr>
                <tr>
                  <td>22 - 11 - 2024, 02:49:00 AM</td>
                  <td>Waiting</td>
                  <td>Waiting</td>
                  <td>
                    <span class="badge text-bg-danger">Rejection</span>
                  </td>
                  <td>
                    <a href="#"
                      ><button
                        type="button"
                        class="btn btn-primary"
                        style="
                          --bs-btn-padding-y: 0.25rem;
                          --bs-btn-padding-x: 0.5rem;
                          --bs-btn-font-size: 0.75rem;
                        "
                      >
                        Preview
                      </button></a
                    >
                  </td>
                </tr> --}}
              </tbody>
            </table>
          </div>
        </div>
      @endcan
      
    </div>
  </main>
@endsection

@push('scripts')
    
@endpush