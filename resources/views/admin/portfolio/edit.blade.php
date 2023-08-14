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
                          <form enctype="multipart/form-data" action="{{ route('admin.projects.update', $project->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                              <label for="exampleinputemail1">Name</label>
                              <input type="text" name="name[az]" value="{{ old('name[az]', $project->name) }}" class="form-control @error('name') is-invalid @enderror" placeholder="name">
                              @error('name.*')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleinputemail1">Slug</label>
                              <input type="text" name="slug" value="{{ old('slug', $project->slug) }}" class="form-control @error('slug') is-invalid @enderror" placeholder="slug">
                              @error('slug')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleinputemail1">Phrase</label>
                              <input type="text" name="phrase[az]" value="{{ old('phrase[az]', $project->phrase) }}" class="form-control @error('phrase') is-invalid @enderror" placeholder="phrase">
                              @error('phrase.*')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="description">Description</label>
                              <textarea name="description[az]" id="summernote">{!! old('description[az]', $project->description) !!}</textarea>
                              @error('description.*')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            @if(count($categories) > 0)
                            <div class="form-group">
                              <label>categories</label>
                              <select name="category_id" class="form-control select2" style="width: 100%;">
                                @foreach($categories as $category)
                                <option @if($project->category?->id === $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                <option @if(!in_array($project->category?->id, $categories->pluck('id')->toArray(), true)) selected @endif value="0">No category</option>
                              </select>
                              @error('category_id')
                              <div class="alert alert-danger">
                                {{$message}}
                              </div>
                              @enderror
                            </div>
                            @endif
                            <div class="image-preview mb-3">
                              <img src="{{ asset('storage/' . $project->image) }}" alt="">
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
                            <div class="wide-image-preview mb-3">
                              <img src="{{ asset('storage/' . $project->image_detail) }}" alt="">
                            </div>
                            <div class="form-group">
                              <label for="exampleinputfile">File input</label>
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