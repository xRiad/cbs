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
                          <form enctype="multipart/form-data" action="{{ route('admin.subservices.update', $subservice->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                              <label for="exampleinputemail1">Name</label>
                              <input type="text" name="name[az]" value="{{ old('name[az]', $subservice->name) }}" class="form-control @error('name') is-invalid @enderror" placeholder="name">
                              @error('name.*')
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
                                <option @if($subservice->service?->id === $service->id) selected @endif value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                                <option @if(!in_array($subservice->service?->id, $services->pluck('id')->toArray(), true)) selected @endif value="0">No service</option>
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