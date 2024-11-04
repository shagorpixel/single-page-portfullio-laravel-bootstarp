@extends('pages.dashboard.dashboard')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class=" breadcrumb mb-4 ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Main</li>
            </ol>
            @if (session('status'))
                <div class="alert text-white bg-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="card card-primary ">
                    <div class="card-header">
                        <h3 class="card-title">Main Section</h3>
                    </div>
                    <form class="row" action="{{ route('main.update', $mainSection->id) }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        @method('put')
                        <div class="card-body col-md-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input name="title" type="text" class="form-control" id="title"
                                    placeholder="Enter Title" value="{{ $mainSection->title }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="sub_title">Sub Title</label>
                                <input name="sub_title" type="text" class="form-control" id="sub_title"
                                    placeholder="Sub Title" value="{{ $mainSection->sub_title }}">
                            </div>
                            <div class="form-group mb-2">
                                <label for="background"><b>Background</b></label><br>
                                <input class=" form-control" id="background" type="file" name="bg_image">
                            </div>
                            <div class="form-group">
                                <label for="resume"><b>Resume</b></label><br>
                                <input class=" form-control" id="resume" type="file" name="resume">
                            </div>
                        </div>

                        <div class="col-md-6 mt-4">
                            <img style="width: 100%;"
                                src="{{ $mainSection->bg_image ? asset('upload/img/' . $mainSection->bg_image) : asset('assets/img/header-bg.jpg') }}"
                                alt="">
                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer mt-5">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </main>
@endsection
