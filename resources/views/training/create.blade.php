@extends('layouts.boilerplate')

@section('title', 'New Training')

@section('content')
<main>
    <div class="container-fluid px-4 mb-4">
    <h1 class="mt-4">New Training</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
        <a href="{{ url('/training') }}">Training</a>
        </li>
        <li class="breadcrumb-item active">New Training</li>
    </ol>
    <form action="/training" method="post" id="add-form">
        @csrf
        <div id="dynamic-form">
            <div class="row mb-3">
                <div class="col-6 col-md-4">
                    <div class="form-floating mb-3 mb-md-0">
                        <input
                        class="form-control"
                        type="text"
                        placeholder="Enter your course"
                        name="course[]"
                        />
                        <label>Course</label>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="form-floating">
                        <input
                        class="form-control"
                        type="number"
                        placeholder="Enter your year"
                        name="year[]"
                        />
                        <label>Year</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <button
                type="submit"
                class="btn btn-secondary btn-sm"
                id="add-training"
                >
                Add Training
                </button>
            </div>
            <div class="col-md-8 text-end">
                <button type="button" class="btn btn-success btn-sm" onclick="confirmAction(null, 'add')">
                Add
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
    <script src="{{ asset('resources/js/dynamic-form.js') }}"></script>
    <script src="{{ asset('resources/js/confirm-action.js') }}"></script>
@endpush