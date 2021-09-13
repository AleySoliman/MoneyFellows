@extends('admin.dashboard')

@section('option')
Add Gameeya
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">New Gameeya Category</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('current.store') }}" method="POST">
        @csrf

        <div class="card-body">
            <div class="form-group">
                <label>Categories</label>
                <select class="form-control" name='category_id'>
                    @foreach ($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach </select>
            </div>
            <div class="form-group">
                <label for="Start_date">Start Date</label>
                <input type="date" name="start_date" class="form-control" id="Start_date"
                    placeholder="Enter Start date" required>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
