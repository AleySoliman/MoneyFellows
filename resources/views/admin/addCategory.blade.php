@extends('admin.dashboard')

@section('option')
    Add Category
@endsection
@section('content')
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">New Gameeya Category</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <div class="card-body">
      <div class="form-group">
        <label for="Name">Name</label>
        <input type="text" name="name" class="form-control" id="Name" placeholder="Enter Category Name" required>
      </div>
      <div class="form-group">
        <label for="Price">Price</label>
        <input type="number" name="price" class="form-control" id="Price" min="1" placeholder="Enter Category Price" required>
      </div>
      <div class="form-group">
        <label for="no_months">Number of months</label>
        <input type="number" name="no_months" class="form-control" id="no_months" min="1" placeholder="Enter Category Duration" required>
      </div>
      <div class="form-group">
        <label for="no_users">Maximum number of users</label>
        <input type="number" name="no_users" class="form-control" id="no_users" min="1" placeholder="Enter Maximum number of users" required>
      </div>
    </div>
    <!-- /.card-body -->
    
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
@endsection