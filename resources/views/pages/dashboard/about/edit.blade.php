@extends('pages.dashboard.dashboard')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class=" breadcrumb mb-4 ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">About</li>
                <a class="btn btn-primary" style="margin-left:auto;" href="{{ route('about.index') }}">Back</a>
            </ol>
            @if (session('status'))
                <div class="alert text-white bg-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="card card-primary ">
                    <div class="card-header">
                        <h3 class="card-title">Edit about Section</h3>
                    </div>
                    <form class="row" method="POST" action="{{ route('about.update',$about->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body col-md-6">

                            <div class="form-group">
                                <label for="title">Title</label>
                                @if ($errors->has('title'))
                                    <div class="error text-danger">{{ $errors->first('title') }}</div>
                                @endif
                                <input name="title" type="text" class="form-control" id="title"
                                    placeholder="Title" value="{{$about->title}}">
                            </div>
                            <div class="form-group mb-3">
                                <label class="d-block mt-2" for="image">Image</label>
                                @if ($errors->has('image'))
                                    <div class="error text-danger">{{ $errors->first('image') }}</div>
                                @endif
                                <input type="file" id="image" name="image">
                            </div>
                            <div class="form-group mb-2">
                                <label for="description"><b>Description</b></label><br>
                                @if ($errors->has('description'))
                                    <div class="error text-danger">{{ $errors->first('description') }}</div>
                                @endif
                                <textarea class="col-12" placeholder="about Description" name="description" id="" rows="10">{{$about->description}}</textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update about</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </main>
@endsection
