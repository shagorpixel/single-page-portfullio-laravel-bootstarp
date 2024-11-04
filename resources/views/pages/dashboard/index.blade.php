@extends('pages.dashboard.dashboard')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>

            <div class="row ">
                <div class="col-lg-3 col-6 mb-3">
                    <!-- small box -->
                    <div class="small-box bg-info p-3 rounded">
                        <div class="inner">
                            <h3>150</h3>
                            <p>Total Service</p>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6 mb-3">
                    <!-- small box -->
                    <div class="small-box bg-success p-3 rounded text-light">
                        <div class="inner">
                            <h3>7</h3>
                            <p>Active Order</p>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6 mb-3">
                    <!-- small box -->
                    <div class="small-box bg-warning p-3 rounded ">
                        <div class="inner">
                            <h3>7</h3>
                            <p>Total Category</p>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6 mb-3">
                    <!-- small box -->
                    <div class="small-box bg-danger p-3 rounded text-light">
                        <div class="inner">
                            <h3>7</h3>
                            <p>Total User</p>
                        </div>
                    </div>
                </div>
                <!-- ./col -->

            </div>
            <!--Service List Start -->
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
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th style="width: 40px">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr class=" align-middle">
                                        <td>{{ $service->id }}</td>
                                        <th>
                                            <img width="100px" src="{{ asset('upload/img/' . $service->image) }}"
                                                alt="">
                                        </th>
                                        <td>{{ $service->title }}</td>
                                        <td>
                                            <span>{{ $service->price }}</span>
                                        </td>
                                        <td>
                                            @if ($service->category)
                                            {{$service->category->name}}
                                            @else N/A
                                            @endif
                                        </td>

                                        <td class=" ">
                                            <div class=" d-flex ">
                                                <a class="mx-1" href="{{ route('service.edit', $service->id) }}">
                                                    <span class="btn btn-sm btn-primary"><i
                                                            class="fa-regular fa-pen-to-square"></i></i></span>
                                                </a>
                                                <a class="mx-1" href="{{ route('service.show', $service->id) }}">
                                                    <span class="btn btn-sm btn-secondary"><i
                                                            class="fa-regular fa-eye"></i></span>
                                                </a>
                                                <form class="mx-1" action="{{ route('service.destroy', $service->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-danger" type="submit">
                                                        <span><i class="fa-solid fa-trash"></i></span>
                                                    </button>
                                                </form>
                                            </div>
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
