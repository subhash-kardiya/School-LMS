@extends('layouts.admin')

@section('title', 'Homework List')

@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Homework List (Demo)</h5>
                <button class="btn btn-primary-fancy">
                    <i class="fa fa-filter me-2"></i> Filter
                </button>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Due Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Chapter 5 Practice</td>
                                <td>10-A</td>
                                <td>Maths</td>
                                <td>2026-02-10</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                            </tr>
                            <tr>
                                <td>Light & Sound</td>
                                <td>9-B</td>
                                <td>Science</td>
                                <td>2026-02-08</td>
                                <td><span class="badge bg-success">Assigned</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
