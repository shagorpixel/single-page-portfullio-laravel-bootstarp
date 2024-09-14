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
                        <h3 class="card-title">Create team Member Section</h3>
                    </div>
                    <form class="row" method="POST" action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body col-md-6">

                            <div class="form-group">
                                <label for="name">Member Name</label>
                                @if ($errors->has('name'))
                                    <div class="error text-danger">{{ $errors->first('name') }}</div>
                                @endif
                                <input name="name" type="text" class="form-control" id="name"
                                    placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                @if ($errors->has('title'))
                                    <div class="error text-danger">{{ $errors->first('title') }}</div>
                                @endif
                                <input name="title" type="text" class="form-control" id="title"
                                    placeholder="Title">
                            </div>
                            <div class="form-group mb-3">
                                <label class="d-block mt-2" for="image">User Photo</label>
                                @if ($errors->has('image'))
                                    <div class="error text-danger">{{ $errors->first('image') }}</div>
                                @endif
                                <input type="file" id="image" name="image">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="facebook">Facebook</label>
                                    @if ($errors->has('facebook'))
                                        <div class="error text-danger">{{ $errors->first('facebook') }}</div>
                                    @endif
                                    <input name="facebook" type="text" class="form-control" id="facebook"
                                        placeholder="Facebook Link">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="twitter">Twitter</label>
                                    @if ($errors->has('twitter'))
                                        <div class="error text-danger">{{ $errors->first('twitter') }}</div>
                                    @endif
                                    <input name="twitter" type="text" class="form-control" id="twitter"
                                        placeholder="Twitter Link">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="linkedin">Linkedin</label>
                                    @if ($errors->has('linkedin'))
                                        <div class="error text-danger">{{ $errors->first('linkedin') }}</div>
                                    @endif
                                    <input name="linkedin" type="text" class="form-control" id="linkedin"
                                        placeholder="Linkedin Link">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create Member</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </main>
@endsection
