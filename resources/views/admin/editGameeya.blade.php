@extends('admin.dashboard')

@section('option')
Edit Gameeya
@endsection
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Update Gameeya</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    @foreach ($current as $item)
    <form action="{{ route('current.update',$item->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="card-body">
            <div class="form-group">
                <label>Categories</label>
                <select class="form-control" name='category_id'>
                    @foreach ($categories as $cat)
                    <option value="{{$cat->id}}" @if ($cat->id == $item->category_id)
                        selected
                        @endif>{{$cat->name}}</option>
                    @endforeach </select>
            </div>
            <div class="form-group">
                <label for="Start_date">Start Date</label>
                <input type="date" name="start_date" class="form-control" id="Start_date" placeholder="Enter Start date"
                    required value="{{ $item->start_date }}">
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
