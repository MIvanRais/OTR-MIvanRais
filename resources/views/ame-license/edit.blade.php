@extends('layouts.boilerplate')

@section('title', 'Edit AME License')

@section('content')
<main>
    <div class="container-fluid px-4 mb-4">
    <h1 class="mt-4">Edit AME License</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
        <a href="{{ url('/ame-license') }}">AME License</a>
        </li>
        <li class="breadcrumb-item active">Edit AME License</li>
    </ol>
    <form action="{{ route('ame-license.update', $ameLicense->id) }}" method="post" id="update-form">
        @csrf
        @method('PUT')
        <div id="dynamic-form">
            <div class="row mb-3">
                <div class="col-6 col-md-4">
                    <div class="form-floating mb-3 mb-md-0">
                        <input
                        class="form-control @error('ame_license_no') is-invalid @enderror"
                        type="text"
                        placeholder="Enter your ame license no."
                        name="ame_license_no"
                        value="{{ $ameLicense->ame_license_no }}"
                        />
                        <label>AME License No.</label>
                        @error('ame_license_no') 
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="form-floating">
                        <input
                        class="form-control @error('vut') is-invalid @enderror"
                        type="text"
                        placeholder="Enter your vut"
                        name="vut"
                        value="{{ $ameLicense->vut }}"
                        />
                        <label>V.U.T</label>
                        @error('vut') 
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
                Add
                </button>
                <a href="{{ url('/ame-license') }}" class="btn btn-danger btn-sm"
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