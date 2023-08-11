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
                          <form enctype="multipart/form-data" action="{{ route('admin.blogs.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                              <label for="exampleinputemail1">Blog title</label>
                              <input type="text" name="title[en]" class="form-control @error('title') is-invalid @enderror" placeholder="title">
                              @error('title.*')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleinputemail1">Slug</label>
                              <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="slug">
                              @error('slug')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="content">Content</label>
                              <textarea name="content[en]" id="summernote"></textarea>
                              @error('content.*')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            @if(count($categories) > 0)
                            <div class="form-group">
                              <label>Categories</label>
                              <select name="category" class="form-control select2" style="width: 100%;">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                <option selected value="0">No category</option>
                              </select>
                              @error('category')
                              <div class="alert alert-danger">
                                {{$message}}
                              </div>
                              @enderror
                            </div>
                            @endif
                            <div class="form-group">
                              <label for="exampleinputfile">Image</label>
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
                              <label for="exampleinputfile">Second image</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="image_detail" class="custom-file-input" id="exampleinputfile">
                                  <label class="custom-file-label" for="exampleinputfile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                  <span class="input-group-text">Upload</span>
                                </div>
                              </div>
                              @error('image_detail')
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