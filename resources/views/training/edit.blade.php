@extends('layouts.boilerplate')

@section('title', 'Edit Training')

@section('content')
<main>
    <div class="container-fluid px-4 mb-4">
    <h1 class="mt-4">Edit Training</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
        <a href="{{ url('/training') }}">Training</a>
        </li>
        <li class="breadcrumb-item active">Edit Training</li>
    </ol>
    <form action="{{ route('training.update', $training->id) }}" method="POST" id="update-form">
        @csrf
        @method('PUT')
        <div id="dynamic-form">
            <div class="row mb-3">
                <div class="col-6 col-md-4">
                    <div class="form-floating mb-3 mb-md-0">
                        <input
                        class="form-control @error('course') is-invalid @enderror"
                        type="text"
                        placeholder="Enter your course"
                        name="course"
                        value="{{ $training->course }}"
                        />
                        <label>Course</label>
                        @error('course')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="form-floating">
                        <input
                        class="form-control @error('year') is-invalid @enderror"
                        type="number"
                        placeholder="Enter your year"
                        name="year"
                        value="{{ $training->year }}"
                        />
                        <label>Year</label>
                        @error('year')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 text-end">
                <button type="button" class="btn btn-success btn-sm" onclick="confirmAction(null, 'update')">
                Update
                </button>
                <a href="{{ url('/training') }}" class="btn btn-danger btn-sm"
                >Back</a
                >
            </div>
        </div>
    </form>
    </div>
</main>
@endsection

@push('scripts')
    <script src="{{ asset('resources/js/confirm-action.js') }}"></script>
@endpush