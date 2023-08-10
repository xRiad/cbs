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
                              <input type="text" name="name[en]" value="{{ old('name', $service->name) }}" class="form-control @error('name') is-invalid @enderror" placeholder="headerSlide">
                              @error('name.*')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            <div class="form-group">
                              <label for="exampleinputemail1">Title</label>
                              <input type="text" name="title[en]" value="{{ old('title', $service->title) }}" class="form-control @error('title') is-invalid @enderror" placeholder="headerSlide">
                              @error('title.*')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleinputemail1">Question</label>
                              <input type="text" name="question[en]" value="{{ old('question', $service->question) }}" class="form-control @error('question') is-invalid @enderror" placeholder="headerSlide">
                              @error('question.*')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="content">Content</label>
                              <textarea name="content[en]" id="summernote">{!! old('content', $service->content) !!}</textarea>
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