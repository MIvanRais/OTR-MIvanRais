@extends('layouts.boilerplate')

@section('title', 'Training')

@section('content')
<main>
    <div class="container-fluid px-4">
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>    
      @endif
      <h1 class="mt-4">Training</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
          <a href="{{ url('/dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Training</li>
      </ol>
      <a href="{{ url('/training/create') }}" class="btn btn-success mb-2 btn-sm">
        <i class="fa-solid fa-plus me-2"></i>Add
      </a>
      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-table me-1"></i>
          Training
        </div>
        <div class="card-body">
          <table id="datatablesSimple">
            <thead>
              <tr>
                <th>Course</th>
                <th>Year</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Course</th>
                <th>Year</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($trainings as $training)
                <tr>
                  <td>{{ $training->course }}</td>
                  <td>{{ $training->year }}</td>
                  <td>
                    <div class="d-flex">
                      <a
                        href="{{ route('training.edit', $training->id) }}"
                        class="btn btn-primary"
                        style="--bs-btn-padding-y: 0.2rem; --bs-btn-padding-x: 0.5rem; --bs-btn-font-size: 0.7rem;"
                      >
                        <i class="fa-regular fa-pen-to-square"></i>
                      </a>
                      <form action="{{ route('training.destroy', $training->id) }}" method="POST" class="ms-2" id="delete-form-{{ $training->id }}">
                        @csrf
                        @method('DELETE')
                        <button
                          type="button"
                          class="btn btn-danger btn-delete"
                          style="--bs-btn-padding-y: 0.2rem; --bs-btn-padding-x: 0.5rem; --bs-btn-font-size: 0.7rem;"
                           onclick="confirmAction({{ $training->id }}, 'delete')"
                        >
                          <i class="fa-regular fa-trash-can"></i>
                        </button>
                      </form>
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