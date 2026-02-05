@extends('layouts.admin')

@section('title', 'Class Timetable')

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h5 class="mb-1">Class Timetable</h5>
                <p class="text-muted small mb-0">Demo schedule for a class</p>
            </div>
            <button class="btn btn-primary-fancy">
                <i class="fa fa-print me-2"></i> Print
            </button>
        </div>

        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Class 10-A · Weekdays</h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>09:00 - 10:00</td>
                                <td>Maths</td>
                                <td>Science</td>
                                <td>English</td>
                                <td>Maths</td>
                                <td>Computer</td>
                            </tr>
                            <tr>
                                <td>10:15 - 11:15</td>
                                <td>History</td>
                                <td>Maths</td>
                                <td>Science</td>
                                <td>Hindi</td>
                                <td>Sports</td>
                            </tr>
                            <tr>
                                <td>11:30 - 12:30</td>
                                <td>English</td>
                                <td>Art</td>
                                <td>Maths</td>
                                <td>Science</td>
                                <td>Library</td>
                            </tr>
                            <tr>
                                <td>01:15 - 02:15</td>
                                <td>Computer</td>
                                <td>History</td>
                                <td>Geography</td>
                                <td>Maths</td>
                                <td>Science</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
