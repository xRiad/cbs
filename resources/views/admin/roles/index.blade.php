@extends('admin.layouts.app')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">roles</h3>
                        </div>
                        <div class="card-header">
                          @if(session('success'))
                            <h3 class="card-title alert-success alert">{{ session('success') }}</h3>
                          @elseif(session('failure'))
                            <h3 class="card-title alert-danger alert">{{ session('failure') }}</h3>
                          @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="row1 ">
                          <form action="{{ route('admin.roles.create') }}" method="GET">
                            @csrf
                            <button  class="btn btn-success ml-3 mt-2">Create</button>
                          </form>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{$role->id}}</td>
                                        <td>{{$role->name }}</td>
                                        <td>
                                            <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.roles.edit', $role->id) }}" method="GET">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Edit</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
