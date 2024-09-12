@extends('pages.dashboard.dashboard')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class=" breadcrumb mb-4 ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Service</li>
                <a class="btn btn-primary" style="margin-left:auto;" href="{{route('service.create')}}">Create Service</a>
            </ol>

            @if (session('status'))
                <div class="alert text-white bg-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Service List</h3>
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Icon</th>
                                    <th>Date</th>
                                    <th style="width: 40px">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                <tr>
                                    <td>{{$service->id}}</td>
                                    <td>{{$service->name}}</td>
                                    <td>
                                       <span><i class="{{$service->icon}}"></i></span>
                                    </td>
                                    <td>
                                        18-10-2024
                                    </td>
                                    <td class="d-flex">
                                        <a class="mx-1" href="{{route('service.edit',$service->id)}}">
                                            <span class="btn btn-sm btn-primary"><i class="fa-regular fa-pen-to-square"></i></i></span>
                                        </a>
                                        <a class="mx-1" href="{{route('service.show',$service->id)}}">
                                            <span class="btn btn-sm btn-secondary"><i class="fa-regular fa-eye"></i></span>
                                        </a>
                                        <form class="mx-1" action="{{route('service.destroy',$service->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger" type="submit">
                                                <span><i class="fa-solid fa-trash"></i></span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>

    </main>
@endsection
