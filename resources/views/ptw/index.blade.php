@extends('layouts.boilerplate')

@section('title', 'PTW')

@section('content')
<main>
    <div class="container-fluid px-4">
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>    
      @endif
      <h1 class="mt-4">Permit to Work</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
          <a href="{{ url('/dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Training</li>
      </ol>
      @can('engineer')
        <a href="{{ url('/ptw/create') }}" class="btn btn-success mb-2 btn-sm">
          <i class="fa-solid fa-plus me-2"></i>Add
        </a>
      @endcan
      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-table me-1"></i>
          Permit to Work
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
                        @if ($ptw->flag === 0)
                            <a
                              href="{{ route('ptw.edit', $ptw->id) }}"
                              class="btn btn-primary"
                              style="--bs-btn-padding-y: 0.2rem; --bs-btn-padding-x: 0.5rem; --bs-btn-font-size: 0.7rem;"
                            >
                              <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('ptw.destroy', $ptw->id) }}" method="POST" class="mx-2" id="delete-form-{{ $ptw->id }}">
                              @csrf
                              @method('DELETE')
                              <button
                                type="button"
                                class="btn btn-danger btn-delete"
                                style="--bs-btn-padding-y: 0.2rem; --bs-btn-padding-x: 0.5rem; --bs-btn-font-size: 0.7rem;"
                                  onclick="confirmAction({{ $ptw->id }}, 'delete')"
                              >
                                <i class="fa-regular fa-trash-can"></i>
                              </button>
                            </form>
                            <form action="{{ route('ptw.send', $ptw->id) }}" method="POST" class="me-2" id="send-form-{{ $ptw->id }}">
                              @csrf
                              @method('PUT')
                              <button
                                type="button"
                                class="btn btn-success"
                                style="--bs-btn-padding-y: 0.2rem; --bs-btn-padding-x: 0.5rem; --bs-btn-font-size: 0.7rem;"
                                  onclick="confirmAction({{ $ptw->id }}, 'send')"
                              >
                                <i class="fa-regular fa-paper-plane"></i>
                              </button>
                            </form>
                        @endif

                        @can('qualityinspector')
                          @if ($ptw->statuses[count($ptw->statuses) - 1]->result == null)
                            <a
                              href="{{ route('ptw.assessment', $ptw->id) }}"
                              class="btn btn-success me-2"
                              style="--bs-btn-padding-y: 0.2rem; --bs-btn-padding-x: 0.5rem; --bs-btn-font-size: 0.7rem;"
                            >
                              Assessment
                            </a>
                          @endif
                        @endcan
                        
                        
                        @can('pic')
                          @if ($ptw->statuses[count($ptw->statuses) - 1]->name != 'Rejection')
                            <form action="{{ route('ptw.verificationok', $ptw->id) }}" method="POST" class="me-2" id="verification-form-ok">
                              @csrf
                              @method('PUT')
                              <button
                                type="button"
                                class="btn btn-success"
                                style="--bs-btn-padding-y: 0.2rem; --bs-btn-padding-x: 0.5rem; --bs-btn-font-size: 0.7rem;"
                                  onclick="confirmAction('ok', 'OK')"
                              >
                                OK
                              </button>
                            </form>
                            <form action="{{ route('ptw.verificationreject', $ptw->id) }}" method="POST" class="" id="verification-form-reject">
                              @csrf
                              @method('PUT')
                              <button
                                type="button"
                                class="btn btn-danger me-2"
                                style="--bs-btn-padding-y: 0.2rem; --bs-btn-padding-x: 0.5rem; --bs-btn-font-size: 0.7rem;"
                                  onclick="confirmAction('reject', 'Reject')"
                              >
                                Reject
                              </button>
                            </form>
                          @endif
                        @endcan

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
            </tbody>
          </table>
        </div>
      </div>
    </div>
</main>
@endsection

@push('scripts')
  <script src="{{ asset('resources/js/confirm-action.js') }}"></script>
@endpush