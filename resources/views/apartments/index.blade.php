@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ( $apartments as $apartment )
                
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{url('/images/img_app_test.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$apartment->title}}</h5>
                        <p class="card-text">{{$apartment->description}}</p>
                        <a href="{{Route("apartment.edit", $apartment->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{Route("apartment.show", $apartment->id)}}" class="btn btn-success">Show</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>

            @endforeach
        </div>

    </div>
@endsection
