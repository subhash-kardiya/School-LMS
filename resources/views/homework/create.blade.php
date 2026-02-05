@extends('layouts.admin')

@section('title', 'Create Homework')

@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Create Homework (Demo)</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label">Class</label>
                            <select class="form-select">
                                <option>Class 10-A</option>
                                <option>Class 9-B</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Subject</label>
                            <select class="form-select">
                                <option>Mathematics</option>
                                <option>Science</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Homework Title</label>
                            <input type="text" class="form-control" placeholder="Chapter 5 Practice">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="4" placeholder="Solve questions 1-10."></textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Due Date</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="mt-4 d-flex justify-content-end">
                        <button type="button" class="btn btn-primary-fancy px-5">Save Homework</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
