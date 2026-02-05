@extends('layouts.admin')

@section('title', 'Teacher Timetable')

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h5 class="mb-1">Teacher Timetable</h5>
                <p class="text-muted small mb-0">Demo schedule for a teacher</p>
            </div>
            <button class="btn btn-primary-fancy">
                <i class="fa fa-calendar me-2"></i> Weekly View
            </button>
        </div>

        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Prof. Mehta · Weekdays</h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Subject</th>
                                <th>Room</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>09:00 - 10:00</td>
                                <td>10</td>
                                <td>A</td>
                                <td>Mathematics</td>
                                <td>101</td>
                            </tr>
                            <tr>
                                <td>10:15 - 11:15</td>
                                <td>9</td>
                                <td>B</td>
                                <td>Mathematics</td>
                                <td>103</td>
                            </tr>
                            <tr>
                                <td>11:30 - 12:30</td>
                                <td>10</td>
                                <td>A</td>
                                <td>Mathematics</td>
                                <td>101</td>
                            </tr>
                            <tr>
                                <td>01:15 - 02:15</td>
                                <td>8</td>
                                <td>C</td>
                                <td>Mathematics</td>
                                <td>105</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
