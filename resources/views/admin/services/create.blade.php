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
                          <form enctype="multipart/form-data" action="{{ route('admin.services.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                              <label for="exampleinputemail1">Name</label>
                              <input type="text" name="name[az]" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                              @error('name.*')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleinputemail1">Slug</label>
                              <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Slug">
                              @error('slug')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleinputemail1">Title</label>
                              <input type="text" name="title[az]" class="form-control @error('title') is-invalid @enderror" placeholder="Title">
                              @error('title.*')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleinputemail1">Question</label>
                              <input type="text" name="question[az]"  class="form-control @error('question') is-invalid @enderror" placeholder="Question">
                              @error('question.*')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="content">Content</label>
                              <textarea name="content[az]" id="summernote"></textarea>
                              @error('content.*')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="icon">Icon</label>
                              <textarea name="icon"></textarea>
                              @error('icon')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            {{-- <div class="image-preview mb-3">
                              <img src="{{ asset('storage/' . $service->image) }}" alt="">
                            </div> --}}
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
                            <div class="form-group">
                              <div class="custom-control custom-switch">
                                <input type="checkbox" name="has_letters" value="0" class="custom-control-input" id="customswitch1">
                                <label class="custom-control-label" for="customswitch1">Has letters</label>
                              </div>
                              @error('has_letters')
                              <div class="alert alert-danger">
                                {{$message}}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <div class="custom-control custom-switch">
                                <input type="checkbox" name="is_main" value="0" class="custom-control-input" id="customswitch1">
                                <label class="custom-control-label" for="customswitch1">Is main</label>
                              </div>
                              @error('has_letters')
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