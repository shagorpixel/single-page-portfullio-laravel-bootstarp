@extends('pages.dashboard.dashboard')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class=" breadcrumb mb-4 ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">portfullio</li>
                <a class="btn btn-primary" style="margin-left:auto;" href="{{ route('portfullio.index') }}">Back</a>
            </ol>
            @if (session('status'))
                <div class="alert text-white bg-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="card card-primary ">
                    <div class="card-header">
                        <h3 class="card-title">Create portfullio</h3>
                    </div>
                    <form class="row" method="POST" action="{{ route('portfullio.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body col-md-6">

                            <div class="form-group">
                                <label for="title">portfullio Title</label>
                                @if ($errors->has('title'))
                                    <div class="error text-danger">{{ $errors->first('title') }}</div>
                                @endif
                                <input name="title" type="text" class="form-control" id="title"
                                    placeholder="portfullio Title" value="{{old('title')}}">
                            </div>
                            <div class="form-group">
                                <label for="sub_title">Sub Title</label>
                                @if ($errors->has('sub_title'))
                                    <div class="error text-danger">{{ $errors->first('sub_title') }}</div>
                                @endif
                                <input name="sub_title" type="text" class="form-control" id="sub_title"
                                    placeholder="Sub Title" value="{{old('sub_title')}}">
                            </div>

                            <div class="form-group my-2">
                                <label class="d-block" for="image">Portfullio Image</label>
                                @if ($errors->has('title'))
                                    <div class="error text-danger">{{ $errors->first('image') }}</div>
                                @endif
                               <input type="file" id="image"  name="image">
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="client">Client</label>
                                    @if ($errors->has('client'))
                                        <div class="error text-danger">{{ $errors->first('client') }}</div>
                                    @endif
                                    <input name="client" type="text" class="form-control" id="client"
                                        placeholder="Client Name" value="{{old('client')}}">
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="category">Category</label>
                                    @if ($errors->has('category'))
                                        <div class="error text-danger">{{ $errors->first('category') }}</div>
                                    @endif
                                    <input name="category" type="text" class="form-control" id="category" placeholder="Category Name" value="{{old('category')}}">
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label for="description"><b>Description</b></label><br>
                                @if ($errors->has('description'))
                                    <div class="error text-danger">{{ $errors->first('description') }}</div>
                                @endif
                                <textarea class="col-12" placeholder="Portfullio Description" name="description" id="description" rows="10">{{old('category')}}</textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create Portfullio</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </main>
@endsection
