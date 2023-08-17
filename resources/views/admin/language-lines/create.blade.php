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
                          <form enctype="multipart/form-data" action="{{ route('admin.language-lines.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                              <label for="exampleinputemail1">Group</label>
                              <input type="text" name="group" class="form-control @error('group') is-invalid @enderror" placeholder="group">
                              @error('group')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>

                            <div class="form-group">
                              <label for="exampleinputemail1">Key</label>
                              <input type="text" name="key" class="form-control @error('key') is-invalid @enderror" placeholder="key">
                              @error('key')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>

                            <div class="form-group">
                              <label for="exampleinputemail1">Text</label>
                              <input type="text" name="text[az]" class="form-control @error('text') is-invalid @enderror" placeholder="text">
                              @error('text.*')
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