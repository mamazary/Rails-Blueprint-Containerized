@extends('layouts.app')

@section('page-header')
  Users <small>manage</small>
@endsection

@section('content')
<div class="mB-20">
    <a href="{{ route('users.create') }}" class="btn cur-p btn-success">Tambah User</a>
</div>


<div class="bgc-white bd bdrs-3 p-20 mB-20">
    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Roles</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>Name</th>
                <th>Roles</th>
                <th>Actions</th>
            </tr>
        </tfoot>

        <tbody>
            @foreach ($users as $user)
            <tr>
                <td><a href="/dashboard/users/{{ $user->id }}">{{ $user->name }}</a></td>
                <td>
                    <ul>
                        @foreach($user->roles as $role)
                            <li>{{$role->name}}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="/dashboard/users/{{ $user->id }}/edit" title="Edit User" class="btn btn-primary btn-sm"><span class="ti-pencil"></span></a></li>
                        <li class="list-inline-item">
                            {{ Form::open(array('url' => '/dashboard/users/delete', 'method' => 'POST')) }}
                            {{ Form::hidden('userId', $user->id) }}
                            <button class="btn btn-danger btn-sm" title="Delete User"><i class="ti-trash"></i></button>
                            {{ Form::close() }}
                        </li>
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>


@endsection
