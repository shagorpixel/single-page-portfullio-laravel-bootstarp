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
                        <h3 class="card-title">Edit Service</h3>
                    </div>
                    <form class="row" method="POST" action="{{route('service.update',$service->id)}}">
                        @csrf
                        @method('put')
                        <div class="card-body col-md-6">

                            <div class="form-group">
                                <label for="name">Service Name</label>
                                @if ($errors->has('name'))
                                    <div class="error text-danger">{{ $errors->first('name') }}</div>
                                @endif
                                <input name="name" type="text" class="form-control" id="name"
                                    placeholder="Service Name" value="{{$service->name}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="icon">Service Icon</label>
                                @if ($errors->has('icon'))
                                    <div class="error text-danger">{{ $errors->first('icon') }}</div>
                                @endif
                                <input name="icon" type="text" class="form-control" id="icon" placeholder="Icon" value="{{$service->icon}}">
                            </div>
                            <div class="form-group mb-2">
                                <label for="description"><b>Description</b></label><br>
                                @if ($errors->has('description'))
                                    <div class="error text-danger">{{ $errors->first('description') }}</div>
                                @endif
                                <textarea class="col-12" placeholder="Service Description" name="description" id="" rows="10">{{$service->description}}</textarea>
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
