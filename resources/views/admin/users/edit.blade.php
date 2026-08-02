@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Edit User
                        <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-sm text-white float-end">
                            Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Password (Leave blank if you don't want to change)</label>
                                <input type="password" name="password" class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Select Role</label>
                                <select name="roll_as" class="form-control" required>
                                    <option value="">Select Role</option>
                                    <option value="0" {{ $user->roll_as == 0 ? 'selected' : '' }}>User</option>
                                    <option value="1" {{ $user->roll_as == 1 ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Update User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
