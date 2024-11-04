@extends('pages.servicelayout')
@section('service')
       @foreach ($SingleCategory->service as $service)
       <div class="col-md-4">
        <div class="card product-card">
          <img src="{{asset('upload/img/'.$service->image)}}" class="card-img-top" alt="Product Image">
          <div class="card-body">
            <h5 class="card-title">{{$service->title}}</h5>
            <h5 class="card-title text-primary">{{$service->category->name}}</h5>
            <p class="card-text">${{$service->price}}</p>
            <a href="#" class="btn btn-primary">View Ditels</a>
          </div>
        </div>
      </div>
      @endforeach

@endsection
