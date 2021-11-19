@extends('latout')
@section('name')
<div class="row">
    <div class="col-3-sm">
        
    </div>  
    <div class="col-6-sm">
        <br><br>
        <h3>Add New Category</h3>
        <form action="">
            <label for="addCategory">Add Neww Category</label>
            <input class="form-control" type="text" id="categoryName" name="categoryName">
            <button class="btn btn-primary" type="submit">Add New</button>
        </form>
    </div>  
    <div class="col-3-sm">
        
    </div>      
</div>  
@endsection