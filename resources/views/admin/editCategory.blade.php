@extends('admin.dashboard')

@section('option')
    Edit Category
@endsection
@section('content')
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Update Gameeya Category</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  
  @foreach ($cat as $item)
  <form action="{{ route('categories.update',$item->id) }}" method="post">
    @csrf
    @method('PUT')

    <div class="card-body">
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" name="name" class="form-control" id="Name" placeholder="Enter Category Name" required value="{{ $item->name }}">
        </div>
        <div class="form-group">
            <label for="Price">Price</label>
            <input type="number" name="price" class="form-control" id="Price" min="1" placeholder="Enter Category Price" value="{{ $item->price }}" required>
        </div>
        <div class="form-group">
            <label for="no_months">Number of months</label>
            <input type="number" name="no_months" class="form-control" id="no_months" min="1" placeholder="Enter Category Duration" value="{{ $item->no_months }}" required>
        </div>
        <div class="form-group">
            <label for="no_users">Maximum number of users</label>
            <input type="number" name="no_users" class="form-control" id="no_users" min="1" placeholder="Enter Maximum number of users" value="{{ $item->no_users }}" required>
        </div>
    </div>
    <!-- /.card-body -->
    
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@endforeach
</div>
@endsection