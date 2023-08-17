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
                          <form enctype="multipart/form-data" action="{{ route('admin.service-accordions.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                              <label for="exampleinputemail1">Name</label>
                              <input type="text" name="name[az]" class="form-control @error('name') is-invalid @enderror" placeholder="name">
                              @error('name.*')
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
                           @if(count($services) > 0)
                            <div class="form-group">
                              <label>Services</label>
                              <select name="service_id" class="form-control select2" style="width: 100%;">
                                @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                              </select>
                              @error('service')
                              <div class="alert alert-danger">
                                {{$message}}
                              </div>
                              @enderror
                            </div>
                            @endif
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