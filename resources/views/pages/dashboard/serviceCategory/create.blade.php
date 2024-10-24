@extends('pages.dashboard.dashboard')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class=" breadcrumb mb-4 ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">team</li>
                <a class="btn btn-primary" style="margin-left:auto;" href="{{ route('team.index') }}">Back</a>
            </ol>
            @if (session('status'))
                <div class="alert text-white bg-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="card card-primary ">
                    <div class="card-header">
                        <h3 class="card-title">Create Service Categoory</h3>
                    </div>
                    <form class="row" method="POST" action="{{ route('servicecategory.store') }}" method="POST">
                        @csrf
                        <div class="card-body col-md-6">

                            <div class="form-group">
                                <label for="name">Category Name</label>
                                @if ($errors->has('name'))
                                    <div class="error text-danger">{{ $errors->first('name') }}</div>
                                @endif
                                <input name="name" type="text" class="form-control" id="name"
                                    placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="description" class="d-block">Discription</label>
                                @if ($errors->has('description'))
                                    <div class="error text-danger">{{ $errors->first('description') }}</div>
                                @endif
                                <textarea class=" d-block w-100 p-2 form-control" id="description" name="description" placeholder="Category Description" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create Category</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </main>
@endsection
