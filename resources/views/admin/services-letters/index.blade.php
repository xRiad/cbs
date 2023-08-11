@extends('admin.layouts.app')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Services' letters</h3>
                        </div>
                        <div class="card-header">
                          @if(session('success'))
                            <h3 class="card-title alert-success alert">{{ session('success') }}</h3>
                          @elseif(session('failure'))
                            <h3 class="card-title alert-danger alert">{{ session('failure') }}</h3>
                          @endif
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Service name</th>
                                    <th>Phone/Email</th>
                                    <th>Web url</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($letters as $letter)
                                    <tr>
                                        <td>{{$letter->id}}</td>
                                        <td>{{$letter->name }}</td>
                                        <td>{{$letter->service->name }}</td>
                                        <td>{{$letter->phone_or_email }}</td>
                                        <td>{{$letter->website_url }}</td>
                                        <td>
                                            <form action="{{ route('admin.services-letters.destroy', $letter->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
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
