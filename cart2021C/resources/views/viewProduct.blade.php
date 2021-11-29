@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-3">

    </div>
    <div class="col-sm-6">
        <br><br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>categoryID</td>
                        <td>name</td>
                        <td>image</td>
                        <td>quantity</td>
                        <td>price</td>
                        <td>discription</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        
                    
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->catName}}</td>
                        <td>{{$product->name}}</td>
                        <td><img src="{{ asset('images/') }}/{{$product->image}}" class="img-fluid" alt="" width="100"></td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discription}}</td>
                        <td>Action</td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        <br><br>
    </div>
    <div class="col-sm-3">

    </div>
</div>
@endsection
