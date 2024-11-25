@extends('layouts.boilerplate')

@section('title', 'Issue PTW')

@section('content')
<main>
    <div class="container-fluid px-4 mb-4">
        <h1 class="mt-4">Assessment PTW</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
            <a href="{{ url('/ptw') }}">Permit to Work</a>
            </li>
            <li class="breadcrumb-item active">Assessment PTW</li>
        </ol>
        <form action="{{ route('ptw.evaluate', $ptw->id) }}" method="POST" id="evaluate-form-{{ $ptw->id }}">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <p class="fs-5 fw-semibold">Assessment Material</p>
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label>The understanding of CASR, SMS, HF, RVSM & PBN</label>
                            <div class="form-floating">
                                <input
                                class="form-control"
                                type="number"
                                placeholder="Enter your year"
                                name="value[]"
                                />
                                <label>Percentage Value</label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>The understanding of Lion Air CMM, QCPM and QN</label>
                            <div class="form-floating">
                                <input
                                class="form-control"
                                type="number"
                                placeholder="Enter your year"
                                name="value[]"
                                />
                                <label>Percentage Value</label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>The understanding of Required Inspection Item (only for applicant RII person)</label>
                            <div class="form-floating">
                                <input
                                class="form-control"
                                type="number"
                                placeholder="Enter your year"
                                name="value[]"
                                />
                                <label>Percentage Value</label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>The understanding of ETOPS (only for applicant type rating A330)</label>
                            <div class="form-floating">
                                <input
                                class="form-control"
                                type="number"
                                placeholder="Enter your year"
                                name="value[]"
                                />
                                <label>Percentage Value</label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>The understanding and the application of MP and MEL</label>
                            <div class="form-floating">
                                <input
                                class="form-control"
                                type="number"
                                placeholder="Enter your year"
                                name="value[]"
                                />
                                <label>Percentage Value</label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>Preflight / Transit / Daily</label>
                            <div class="form-floating">
                                <input
                                class="form-control"
                                type="number"
                                placeholder="Enter your year"
                                name="value[]"
                                />
                                <label>Percentage Value</label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>AD / SB</label>
                            <div class="form-floating">
                                <input
                                class="form-control"
                                type="number"
                                placeholder="Enter your year"
                                name="value[]"
                                />
                                <label>Percentage Value</label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>AFML, DMI, DBC, NSRDI</label>
                            <div class="form-floating">
                                <input
                                class="form-control"
                                type="number"
                                placeholder="Enter your year"
                                name="value[]"
                                />
                                <label>Percentage Value</label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>Chronologies Report, AOG and SS Declaration</label>
                            <div class="form-floating">
                                <input
                                class="form-control"
                                type="number"
                                placeholder="Enter your year"
                                name="value[]"
                                />
                                <label>Percentage Value</label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>The understanding of Airframe, Engine, Aircraft system</label>
                            <div class="form-floating">
                                <input
                                class="form-control"
                                type="number"
                                placeholder="Enter your year"
                                name="value[]"
                                />
                                <label>Percentage Value</label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>The understanding of Electronics, Instrument, Radio installed to the Aircraft type</label>
                            <div class="form-floating">
                                <input
                                class="form-control"
                                type="number"
                                placeholder="Enter your year"
                                name="value[]"
                                />
                                <label>Percentage Value</label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>What is the experience on performing trouble shooting on the aircraft? And how is his/her PASS FAIL performance on conducting trouble shooting?</label>
                            <div class="form-floating">
                                <input
                                class="form-control"
                                type="number"
                                placeholder="Enter your year"
                                name="value[]"
                                />
                                <label>Percentage Value</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-end">
                    <button type="button" class="btn btn-success btn-sm" onclick="confirmAction({{ $ptw->id }}, 'evaluate')">
                    Evaluate
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
    <script src="{{ asset('resources/js/confirm-action.js') }}"></script>
@endpush