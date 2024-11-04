@extends('pages.dashboard.dashboard')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class=" breadcrumb mb-4 ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Service</li>
                <a class="btn btn-primary" style="margin-left:auto;" href="{{ route('service.index') }}">Back</a>
            </ol>
            @if (session('status'))
                <div class="alert text-white bg-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="card card-primary ">
                    <div class="card-header">
                        <h3 class="card-title">Create Service</h3>
                    </div>
                    <form class="row" method="POST" action="{{ route('service.update',$service->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body col-md-6">

                            <div class="form-group">
                                <label for="name">Service Title</label>
                                @if ($errors->has('title'))
                                    <div class="error text-danger">{{ $errors->first('title') }}</div>
                                @endif
                                <input name="title" type="text" class="form-control" id="title"
                                    placeholder="Service Title" value="{{$service->title}}">
                            </div>
                            <div class="mt-2 row">
                                <div class="col-md-4">
                                    <div class="form-group" data-select2-id="29">
                                        <label>Service Category</label>
                                        <select name="category_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                            data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option class=" d-none" data-select2-id="3">Service Category</option>

                                            @foreach ($serviceCategories as $serviceCategory)
                                            <option @if ($serviceCategory->id == $service->category_id)
                                                    selected
                                            @endif value="{{$serviceCategory->id}}" data-select2-id="35">{{$serviceCategory->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="image">Service Image</label>
                                        @if ($errors->has('image'))
                                            <div class="error text-danger">{{ $errors->first('icon') }}</div>
                                        @endif
                                        <input name="image" type="file" class="form-control" id="icon"
                                            >
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="icon">Service Price</label>
                                        @if ($errors->has('icon'))
                                            <div class="error text-danger">{{ $errors->first('icon') }}</div>
                                        @endif
                                        <input name="price" type="text" class="form-control" id="icon"
                                            placeholder="Service Price (USD)" value="{{$service->price}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label for="description"><b>Description</b></label><br>
                                @if ($errors->has('description'))
                                    <div class="error text-danger">{{ $errors->first('description') }}</div>
                                @endif
                                <textarea class="col-12 form-control" placeholder="Service Description" name="description" id=""
                                    rows="10">{{$service->description}}</textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Service</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </main>
@endsection
