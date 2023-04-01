


@extends('layouts.app')
@section('content')

<div class="container">

    <form action="{{route("apartment.test.store")}}" method="POST">
        @csrf
        <div class="form-group mt-3">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" class="form-control w-50 mb-3" id=""  value="" name="title">
          
          <label for="exampleInputEmail1">address</label>
          <input type="text" class="form-control w-50 mb-3" id=""  name="address">
          <label for="exampleFormControlTextarea1">Description</label>
          <textarea class="form-control w-50" name="description" rows="3"></textarea>
          <label class="d-block" for="">Rooms qty</label>
          <input style="width: 50px" type="number" class="mb-3" id=""  name="rooms_qty">
          <label class="d-block" for="">beds qty</label>
          <input style="width: 50px" type="number" class="mb-3" id=""  name="beds_qty">
          <label class="d-block" for="1">Bathrooms qty</label>
          <input style="width: 50px" type="number" class="mb-3" id=""  name="bathrooms_qty">
          <label class="d-block" for="">Mq</label>
          <input style="width: 50px" type="number" class="mb-3" id=""  name="mq">
          <label class="d-block" for="">Daily price</label>
          <input style="width: 100px" style="width: 50px" type="number" class="mb-3" id="" step=".01" name="daily_price">
         
          
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
    
@endsection