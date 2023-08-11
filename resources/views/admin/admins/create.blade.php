@extends('admin.layouts.app')


@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          {{session('failure')}}
                          @if(session('success'))
                            <h3 class="card-title alert-success alert">{{ session('success') }}</h3>
                          @elseif(session('failure'))
                            <h3 class="card-title alert-danger alert">{{ session('failure') }}</h3>
                          @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="row1 ">
                        </div>

                        <div class="card-body">
                          <form enctype="multipart/form-data" action="{{ route('admin.admins.store') }}" method="post">
                            @csrf
                             <div class="form-group">
                              <label for="exampleinputemail1">Name</label>
                              <input type="text" name="name"  class="form-control @error('name') is-invalid @enderror" placeholder="name">
                              @error('name')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleinputemail1">Email</label>
                              <input type="text" name="email"  class="form-control @error('email') is-invalid @enderror" placeholder="email">
                              @error('email')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleinputemail1">Password</label>
                              <input type="text" name="password"  class="form-control @error('password') is-invalid @enderror" placeholder="password">
                              @error('password')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            <button type="submit">submit</button>
                          </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection