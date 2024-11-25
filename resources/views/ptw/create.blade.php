@extends('layouts.boilerplate')

@section('title', 'Issue PTW')

@section('content')
<main>
    <div class="container-fluid px-4 mb-4">
        <h1 class="mt-4">Issued Permit to Work</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
            <a href="{{ url('/ptw') }}">Permit to Work</a>
            </li>
            <li class="breadcrumb-item active">Issued Permit to Work</li>
        </ol>
        <form action="/ptw" method="POST" id="add-form">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <p class="fs-5 fw-semibold">Authorization LACA</p>
                    <div class="d-flex align-items-center mb-2">
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="status" id="status-laca1" value="initial" {{ old('status') == 'initial' ? 'checked' : '' }}>
                            <label class="form-check-label" for="status-laca1">
                            Initial
                            </label>
                        </div>
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="status" id="status-laca2" value="additional" {{ old('status') == 'additional' ? 'checked' : '' }}>
                            <label class="form-check-label" for="status-laca2">
                            Additional
                            </label>
                        </div>
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="status" id="status-laca3" value="renewal" {{ old('status') == 'renewal' ? 'checked' : '' }}>
                            <label class="form-check-label" for="status-laca3">
                            Renewal
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <div class="form-floating">
                                <input
                                class="form-control @error('no') is-invalid @enderror"
                                type="text"
                                placeholder="Enter your no"
                                name="no"
                                value="{{ old('no') }}"
                                />
                                <label>No.</label>
                                @error('no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-floating ">
                                <input
                                class="form-control @error('validy') is-invalid @enderror"
                                type="text"
                                placeholder="Enter your validy"
                                name="validy"
                                value="{{ old('validy') }}"
                                />
                                <label>Validy</label>
                                @error('validy')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="">Scope</label>
                            <div class="d-flex align-items-center">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="scope" id="scope-laca1" value="mr" {{ old('scope') == 'mr' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="scope-laca1">
                                    MR
                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="scope" id="scope-laca2" value="rii" {{ old('scope') == 'rii' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="scope-laca2">
                                    RII
                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="scope" id="scope-laca3" value="etops" {{ old('scope') == 'etops' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="scope-laca3">
                                    ETOPS
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-md-12 mb-2">
                    <p class="fs-5 fw-semibold">Lion Air Aircraft Type</p>
                    <div id="dynamic-form">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input
                                    class="form-control"
                                    type="text"
                                    placeholder="Enter your aircraft type"
                                    name="name[]"
                                    />
                                    <label>Aircraft Type</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button
                        type="submit"
                        class="btn btn-secondary btn-sm"
                        id="add-aircraft-type"
                        >
                        Add Aircraft Type
                    </button>
                </div>
                <hr>
                <div class="col-md-12">
                    <p class="fs-5 fw-semibold">Mandatory Training</p>
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label>HUMAN FACTOR TRAINING</label>
                            <div class="form-floating">
                                <input
                                class="form-control @error('last_performed_year_human') is-invalid @enderror"
                                type="number"
                                placeholder="Enter your year"
                                name="last_performed_year_human"
                                value="{{ old('last_performed_year_human') }}"
                                />
                                <label>Last Performed Year</label>
                                @error('last_performed_year_human')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>SMS TRAINING</label>
                            <div class="form-floating">
                                <input
                                class="form-control @error('last_performed_year_sms') is-invalid @enderror"
                                type="number"
                                placeholder="Enter your year"
                                name="last_performed_year_sms"
                                value="{{ old('last_performed_year_sms') }}"
                                />
                                <label>Last Performed Year</label>
                                @error('last_performed_year_sms')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>RVSM PBN TRAINING</label>
                            <div class="form-floating">
                                <input
                                class="form-control @error('last_performed_year_rvsm') is-invalid @enderror"
                                type="number"
                                placeholder="Enter your year"
                                name="last_performed_year_rvsm"
                                value="{{ old('last_performed_year_rvsm') }}"
                                />
                                <label>Last Performed Year</label>
                                @error('last_performed_year_rvsm')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>ETOPS TRAINING (only for applicant for A/C type effective ETOPS)</label>
                            <div class="form-floating">
                                <input
                                class="form-control @error('last_performed_year_etops') is-invalid @enderror"
                                type="number"
                                placeholder="Enter your year"
                                name="last_performed_year_etops"
                                value="{{ old('last_performed_year_etops') }}"
                                />
                                <label>Last Performed Year</label>
                                @error('last_performed_year_etops')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>RII TRAINING (only for applicant RII)</label>
                            <div class="form-floating">
                                <input
                                class="form-control @error('last_performed_year_rii') is-invalid @enderror"
                                type="number"
                                placeholder="Enter your year"
                                name="last_performed_year_rii"
                                value="{{ old('last_performed_year_rii') }}"
                                />
                                <label>Last Performed Year</label>
                                @error('last_performed_year_rii')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-end">
                    <button type="button" class="btn btn-success btn-sm" onclick="confirmAction(null, 'add')">
                    Add
                    </button>
                    <a href="{{ url('/ptw') }}" class="btn btn-danger btn-sm"
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