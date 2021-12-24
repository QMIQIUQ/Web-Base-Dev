@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <div class="card-body">
            <form action="{{route('add.to.cart')}}" method="POST">
            @csrf

            
            @foreach($products as $product)
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <input type="hidden" name="id" value="{{$product->id}}"> 
                    <img src="{{ asset('images/') }}/{{$product->image}}" alt="" width="100%" class="img-fluid">
                </div>
                <div class="col-md-9">
                    <br><br>
                    <p class="card-text">{{$product->discription}}</p>
                    <div class="card-heading">Quantity<input type="number" min="1" name="quantity" id="quantity">Available:{{$product->quantity}}</div>
                    <br><br>
                    <div class="card-heading">Price:{{$product->price}}</div>
                    <br>
                    <button type="submit" class="btn btn-danger btn-xs">Add to cart</button>
                </div>
            </div>
            @endforeach
        </form>
        </div>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection
