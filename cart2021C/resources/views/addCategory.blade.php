@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-3">

    </div>
    <div class="col-sm-6">
        <br><br>
        <h3>Add New Category</h3>
        <form  action="{{route('addCategory')}}" method="POST">
            @csrf
                <label for="addCategory">Add New Category</label>
                <input class="form-control" type="text" id="categoryName" name="categoryName" required>

                <button class="btn btn-primary" type="submit">Add New</button>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3">

    </div>
</div>
@endsection
