@extends('pages.dashboard.dashboard')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class=" breadcrumb mb-4 ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">User</li>
                <a class="btn btn-primary" style="margin-left:auto;" href="{{ route('user.index') }}">Back</a>
            </ol>
            @if (session('status'))
                <div class="alert text-white bg-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="card card-primary ">
                    <div class="card-header">
                        <h3 class="card-title">Edit User</h3>
                    </div>
                    <form class="row" method="POST" action="{{ route('user.update',$user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body col-md-6">
                            <div class="row">
                               <div class=" col-md-6">
                                {{-- name form group --}}
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    @if ($errors->has('name'))
                                        <div class="error text-danger">{{ $errors->first('name') }}</div>
                                    @endif
                                    <input name="name" type="text" class="form-control" id="name"
                                        placeholder="Name" value="{{$user->name}}">
                                </div>
                                {{-- email form group --}}
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    @if ($errors->has('email'))
                                        <div class="error text-danger">{{ $errors->first('email') }}</div>
                                    @endif
                                    <input name="email" type="email" class="form-control" id="email"
                                        placeholder="Email" value="{{$user->email}}">
                                </div>
                                {{-- Password form group --}}
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    @if ($errors->has('password'))
                                        <div class="error text-danger">{{ $errors->first('password') }}</div>
                                    @endif
                                    <input name="password" type="password" class="form-control" id="password"
                                        placeholder="Password">
                                </div>
                               </div>
                               <!--Right Side -->
                               <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="d-block mt-2" for="image">Image</label>
                                    @if ($errors->has('image'))
                                        <div class="error text-danger">{{ $errors->first('image') }}</div>
                                    @endif
                                    <input class="form-control" type="file" id="image" name="image">
                                </div>
                               </div>
                            </div>
                            <div class="form-group mb-2">
                                <label for="description"><b>Description</b></label><br>
                                @if ($errors->has('description'))
                                    <div class="error text-danger">{{ $errors->first('description') }}</div>
                                @endif
                                <textarea class="col-12 form-control" placeholder="about Description" name="description" id="" rows="10">{{$user->description}}</textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create about</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </main>
@endsection
