@extends('layouts.boilerplate')

@section('title', 'Edit Basic License')

@section('content')
<main>
    <div class="container-fluid px-4 mb-4">
    <h1 class="mt-4">Edit Basic License</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
        <a href="{{ url('/basic-license') }}">Basic License</a>
        </li>
        <li class="breadcrumb-item active">Edit Basic License</li>
    </ol>
    <form action="{{ route('basic-license.update', $basicLicense->id) }}" method="POST" id="update-form">
        @csrf
        @method('PUT')
        <div id="dynamic-form">
            <div class="row mb-3">
                <div class="col-6 col-md-4">
                    <div class="form-floating mb-3 mb-md-0">
                        <input
                        class="form-control @error('category') is-invalid @enderror"
                        type="text"
                        placeholder="Enter your category"
                        name="category"
                        value="{{ $basicLicense->category }}"
                        />
                        <label>Category</label>
                        @error('category') 
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="form-floating">
                        <input
                        class="form-control @error('card_no') is-invalid @enderror"
                        type="text"
                        placeholder="Enter your card no."
                        name="card_no"
                        value="{{ $basicLicense->card_no }}"
                        />
                        <label>Card No.</label>
                        @error('card_no') 
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
                <a href="{{ url('/basic-license') }}" class="btn btn-danger btn-sm"
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