@extends('base')
@section('title', 'Student Lists')

<div>
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left;"><strong>Student Lists</strong></h4>
                        <button type="button" class="btn btn-primary" style="float: right;" data-bs-toggle="modal" data-bs-target="#createNewStd">
                            Create New Student
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">ID</th>
                                    <th style="text-align: center;">Student Name</th>
                                    <th style="text-align: center;">Age</th>
                                    <th style="text-align: center;">Gender</th>
                                    <th style="text-align: center;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $std)
                                <tr>
                                    <td style="text-align: center;">{{ $std->id }}</td>
                                    <td style="text-align: center;">{{ $std->name }}</td>
                                    <td style="text-align: center;">{{ $std->age }}</td>
                                    <td style="text-align: center;">{{ $std->gender }}</td>
                                    <td style="text-align: center;">
                                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editStudent{{ $std->id }}">Update</button>
                                        <form action="{{ route('std.delete', $std->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editStudent{{ $std->id }}" tabindex="-1" aria-labelledby="editStudentLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form method="post" action="{{ route('std.update', $std->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5">Edit Student</h1>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" class="form-control" name="stdName" value="{{ $std->name }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Age</label>
                                                        <input type="text" class="form-control" name="stdAge" value="{{ $std->age }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Gender</label>
                                                        <input type="text" class="form-control" name="stdGender" value="{{ $std->gender }}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Student Modal -->
    <div class="modal fade" id="createNewStd" tabindex="-1" aria-labelledby="createNewStdLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="{{ route('std.create') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="createNewStdLabel">Create New Student</h1>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="stdName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="stdName" name="stdName" value="{{ old('stdName') }}" placeholder="Input Name">
                        </div>
                        <div class="mb-3">
                            <label for="stdAge" class="form-label">Age</label>
                            <input type="text" class="form-control" id="stdAge" name="stdAge" value="{{ old('stdAge') }}" placeholder="Input Age">
                        </div>
                        <div class="mb-3">
                            <label for="stdGender" class="form-label">Gender</label>
                            <input type="text" class="form-control" id="stdGender" name="stdGender" value="{{ old('stdGender') }}" placeholder="Input Gender">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
