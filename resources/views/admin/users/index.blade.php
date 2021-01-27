@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manage Users</div>

                <div class="card-body">
                    <table class="table col-md-10">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
                                <td>
                                    <a href="{{route('admin.users.edit', $user->id)}}" class="float-left">
                                        <button class="btn btn-primary btn-sm">
                                            Edit
                                        </button>&nbsp;&nbsp;
                                    </a>
                                    <a href="{{route('admin.impersonate', $user->id)}}" class="float-left">
                                        <button class="btn btn-success btn-sm">
                                            Impersonate User
                                        </button>&nbsp;&nbsp;
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user->id)}}" method="POST" class="float-left">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection