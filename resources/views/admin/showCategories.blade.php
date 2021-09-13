@extends('admin.dashboard')

@section('option')
Show Categories
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="dt-buttons btn-group flex-wrap"> <button
                            class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="example1"
                            type="button"><span>Copy</span></button> <button
                            class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1"
                            type="button"><span>CSV</span></button> <button
                            class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1"
                            type="button"><span>Excel</span></button> <button
                            class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1"
                            type="button"><span>PDF</span></button> <button class="btn btn-secondary buttons-print"
                            tabindex="0" aria-controls="example1" type="button"><span>Print</span></button>
                        <div class="btn-group"><button
                                class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis" tabindex="0"
                                aria-controls="example1" type="button" aria-haspopup="true"
                                aria-expanded="false"><span>Column visibility</span></button></div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search"
                                class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                        aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Price</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Number of Months</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">Max number of users</th>
                                <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Update / Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 0 ?> 
                            @foreach ($all as $cat)
                            <tr class="odd">
                                <td class="dtr-control sorting_1" tabindex="0">{{ $cat->id }}</td>
                                <td>{{ $cat->name}}</td>
                                <td>{{ $cat->price }}</td>
                                <td>{{ $cat->no_months }}</td>
                                <td>{{ $cat->no_users }}</td>
                                <td>
                                    <form action="{{ route('categories.edit', $cat->id) }}" method="GET" class="d-inline-block" title="EDIT">
                                        @csrf
                                        <button type="submit"><i class="btn btn-warning fa fa-edit"></i></button>
                                    </form>
                                    <form action="{{ route('categories.destroy', $cat->id) }}" method="POST" title="DELETE" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i class="fas fa-trash-alt btn btn-danger"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php $count = $count + 1 ?> 
                            @endforeach
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">ID</th>
                                <th rowspan="1" colspan="1">Name</th>
                                <th rowspan="1" colspan="1">Price</th>
                                <th rowspan="1" colspan="1">Number of Months</th>
                                <th rowspan="1" colspan="1">Max number of users</th>
                                <th rowspan="1" colspan="1">Update / Delete</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing {{$count}} entries</div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
@endsection
