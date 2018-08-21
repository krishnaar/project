@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User List</div>
                <div class="card-body">
                  <a href="{{ route('admin.user.create') }}" class="btn btn-info ">
                    Tambah User
                  </a>
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Jabatan</th>
                          <th>Email</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($user as $user)
                        <tr>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->role->name }}</td>
                          <td>{{ $user->email }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
