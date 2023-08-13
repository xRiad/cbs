@extends('admin.layouts.app')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="service">
                        <div class="service-header">
                            <h3 class="service-title">Services</h3>
                        </div>
                        <div class="service-header">
                          @if(session('success'))
                            <h3 class="service-title alert-success alert">{{ session('success') }}</h3>
                          @elseif(session('failure'))
                            <h3 class="service-title alert-danger alert">{{ session('failure') }}</h3>
                          @endif
                        </div>
                        <!-- /.service-header -->
                        <div class="row1 ">
                          <form action="{{ route('admin.services.create') }}" method="GET">
                            @csrf
                            <button  class="btn btn-success ml-3 mt-2">Create</button>
                          </form>
                        </div>

                        <div class="service-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Service icon</th>
                                    <th>Title</th>
                                    <th>Question</th>
                                    <th>Content</th>
                                    <th>Delete</th>
                                    <th>EDIT</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td>{{$service->id}}</td>
                                        <td>{{$service->name}}</td>
                                        <td>{!!$service->icon!!}</td>
                                        <td>{{$service->title}}</td>
                                        <td>{{$service->question}}</td>
                                        <td>
                                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.services.edit', $service->id) }}" method="GET">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Edit</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.service-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
