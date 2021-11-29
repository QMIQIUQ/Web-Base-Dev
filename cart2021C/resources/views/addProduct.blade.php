@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-3">

    </div>
    <div class="col-sm-6">
        <br><br>
        <h3>Add New Category</h3>
        <form  action="{{route('addProduct')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="productName">Category</label>
                <select name="categoryID" id="categoryID" class="form-control">
                    @foreach ($categoryID as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="productName">Product name</label>
                <input class="form-control" type="text" id="productName" name="productName" required>
            </div>
            <div class="form-group">
                <label for="productImage">Image</label>
                <input class="form-control" type="file" id="productImage" name="productImage" required>
            </div>
            <div class="form-group">
                <label for="productQuantity">Quantity</label>
                <input class="form-control" type="number" id="productQuantity" name="productQuantity" min=0 required>
            </div>
            <div class="form-group">
                <label for="productPrice">Price</label>
                <input class="form-control" type="number" id="productPrice" name="productPrice" min=0 required>
            </div>
            <div class="form-group">
                <label for="productDiscription">Discription</label>
                <input class="form-control" type="text" id="productDiscription" name="productDiscription" required>
            </div>
                <button class="btn btn-primary" type="submit">Add New</button>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3">

    </div>
</div>
@endsection
