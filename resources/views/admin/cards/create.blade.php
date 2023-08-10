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
                          <form enctype="multipart/form-data" action="{{ route('admin.cards.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                              <label for="exampleinputemail1">Title</label>
                              <input type="text" name="title[en]" class="form-control @error('title') is-invalid @enderror" placeholder="title">
                              @error('title.*')
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

                            <div class="form-group">
                              <label for="icon">Icon</label>
                              <textarea name="icon" id="summernote"></textarea>
                              @error('icon')
                              <div class="alert alert-danger">
                                 {{$message}}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label>Card type</label>
                              <select name="card_type" class="form-control select2" style="width: 100%;">
                                <option value="1">Services</option>
                                <option value="2">Proccesses</option>
                              </select>
                              @error('card_type')
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