@extends('admin.layouts.app')


@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
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
                          <form enctype="multipart/form-data" action="{{ route('admin.team-members.update', $teamMember->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                              <label for="exampleinputemail1">Name</label>
                              <input type="text" name="name[en]" value="{{ old('name', $teamMember->name) }}" class="form-control @error('name') is-invalid @enderror" placeholder="name">
                              @error('name.*')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleinputemail1">Position</label>
                              <input type="text" name="position[en]" value="{{ old('position', $teamMember->position) }}" class="form-control @error('position') is-invalid @enderror" placeholder="position">
                              @error('position.*')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleinputfile">File input</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="image" class="custom-file-input" id="exampleinputfile">
                                  <label class="custom-file-label" for="exampleinputfile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                  <span class="input-group-text">Upload</span>
                                </div>
                              </div>
                              @error('image')
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