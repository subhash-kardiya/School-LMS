@extends('layouts.admin')

@section('title', 'Certificate')

@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Certificate (Demo)</h5>
                <button class="btn btn-primary-fancy">
                    <i class="fa fa-print me-2"></i> Print
                </button>
            </div>
            <div class="card-body">
                <div class="border rounded p-4">
                    <h4 class="text-center mb-3">Certificate of Achievement</h4>
                    <p class="text-center mb-4">This is to certify that</p>
                    <h5 class="text-center fw-bold mb-4">Aarav Patel</h5>
                    <p class="text-center mb-4">has successfully completed the term with excellent performance.</p>
                    <div class="d-flex justify-content-between mt-5">
                        <div class="text-center">
                            <div class="fw-bold">Class Teacher</div>
                            <small class="text-muted">Signature</small>
                        </div>
                        <div class="text-center">
                            <div class="fw-bold">Principal</div>
                            <small class="text-muted">Signature</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
