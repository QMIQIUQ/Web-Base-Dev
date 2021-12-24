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
                        <td>name</td>
                        <td>image</td>
                        <td>cartQty</td>
                        <td>price</td>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        
                    
                    <tr>
                        <td>{{$product->cid}}</td>
                        <td><a href="">{{$product->name}}</a></td>
                        <td><img src="{{ asset('images/') }}/{{$product->image}}" class="img-fluid" alt="" width="100"></td>
                        <td>{{$product->cartQty}}</td>
                        <td>{{$product->price}}</td>
                        
                            <a href="" class="btn btn-warning">Edit</a>
                            <a href="" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure to delete?')">Delete</a>
                        </td>
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
