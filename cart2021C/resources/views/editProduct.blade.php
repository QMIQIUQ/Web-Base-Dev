@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-3">

    </div>
    <div class="col-sm-6">
        <br><br>
        <h3>Add New Category</h3>
        <form  action="" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach ($products as $product)
            
            <div class="form-group">
                <label for="productName">Category</label>
                <select name="categoryID" id="categoryID" class="form-control">
                    @foreach ($category as $category)
                        <option value="{{$category->id}}">
                            
                            @if ($product->categoryID==$category->id)
                                selected
                            @endif

                            {{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="productName">Product name</label>
                <input type="hidden" name="id" value="{{$product->id}}">
                <input class="form-control" type="text" id="productName" name="productName" required value="{{$product->name}}">
            </div>
            <div class="form-group">
                <label for="productImage">Image</label>
                <img src="{{ asset('images/') }}/{{$product->image}}" class="img-fluid" alt="" width="100">
                <input class="form-control" type="file" id="productImage" name="productImage" required value="{{$product->image}}">
            </div>
            <div class="form-group">
                <label for="productQuantity">Quantity</label>
                <input class="form-control" type="number" id="productQuantity" name="productQuantity" min=0 required value="{{$product->quantity}}">
            </div>
            <div class="form-group">
                <label for="productPrice">Price</label>
                <input class="form-control" type="number" id="productPrice" name="productPrice" min=0 required value="{{$product->price}}">
            </div>
            <div class="form-group">
                <label for="productDiscription">Discription</label>
                <input class="form-control" type="text" id="productDiscription" name="productDiscription" required value="{{$product->discription}}">
            </div>
            @endforeach
                <button class="btn btn-primary" type="submit">Add New</button>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3">

    </div>
</div>
@endsection
