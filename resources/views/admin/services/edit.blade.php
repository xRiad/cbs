@extends('admin.layouts.app')


@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="service">
                        <div class="service-header">
                          @if(session('success'))
                            <h3 class="service-title alert-success alert">{{ session('success') }}</h3>
                          @elseif(session('failure'))
                            <h3 class="service-title alert-danger alert">{{ session('failure') }}</h3>
                          @endif
                        </div>
                        <!-- /.service-header -->
                        <div class="row1 ">
                        </div>

                        <div class="service-body">
                          <form enctype="multipart/form-data" action="{{ route('admin.services.update', $service->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                              <label for="exampleinputemail1">Name</label>
                              <input type="text" name="name[az]" value="{{ old('name[az]', $service->name) }}" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                              @error('name.*')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleinputemail1">Slug</label>
                              <input type="text" name="slug" value="{{ old('slug', $service->slug) }}" class="form-control @error('slug') is-invalid @enderror" placeholder="Slug">
                              @error('slug')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleinputemail1">Title</label>
                              <input type="text" name="title[az]" value="{{ old('title[az]', $service->title) }}" class="form-control @error('title') is-invalid @enderror" placeholder="Title">
                              @error('title.*')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleinputemail1">Question</label>
                              <input type="text" name="question[az]" value="{{ old('question[az]', $service->question) }}" class="form-control @error('question') is-invalid @enderror" placeholder="Question">
                              @error('question.*')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="content">Content</label>
                              <textarea name="content[az]" id="summernote">{!! old('content[az]', $service->content) !!}</textarea>
                              @error('content.*')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="icon">Icon</label>
                              <textarea name="icon">{{ $service->icon }}</textarea>
                              @error('icon')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            <div class="image-preview mb-3">
                              <img src="{{ asset('storage/' . $service->image) }}" alt="">
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
                            <div class="form-group">
                              <div class="custom-control custom-switch">
                                <input type="checkbox" name="has_letters" value="1" class="custom-control-input" id="customswitch1" @if($service->has_letters) checked @endif>
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
                                <input type="checkbox" name="is_main" value="1" class="custom-control-input" id="customswitch2" @if($service->is_main) checked @endif>
                                <label class="custom-control-label" for="customswitch2">Is main</label>
                              </div>
                              @error('is_main')
                              <div class="alert alert-danger">
                                {{$message}}
                              </div>
                              @enderror
                            </div>
                            <button type="submit">submit</button>
                          </form>
                        </div>
                        <!-- /.service-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection