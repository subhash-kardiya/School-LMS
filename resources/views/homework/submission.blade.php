@extends('layouts.admin')

@section('title', 'Homework Submission')

@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Homework Submission (Demo)</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Class</th>
                                <th>Homework</th>
                                <th>Submitted On</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Aarav Patel</td>
                                <td>10-A</td>
                                <td>Chapter 5 Practice</td>
                                <td>2026-02-04</td>
                                <td><span class="badge bg-success">Submitted</span></td>
                            </tr>
                            <tr>
                                <td>Riya Shah</td>
                                <td>9-B</td>
                                <td>Light & Sound</td>
                                <td>2026-02-03</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
