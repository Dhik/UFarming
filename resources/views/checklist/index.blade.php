@extends('layouts.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Checklist Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Myplant</a></li>
                <li class="breadcrumb-item active">Checklist </li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="/admin/checklist/add/{{ $myplant_id }}" class="btn btn-primary"> + Add New Checklist</a>
                        </div>    
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
									<th>Title</th>
									<th>Description</th>
									<th>Done</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($checklist as $c)
                                    <tr>
										<td>{{ $c->title }}</td>
										<td>{{ $c->desc }}</td>
										<td><input type="checkbox" {{ ($c->is_checked) ? 'checked' : '' }} onclick="return false;" /></td>
										<td>
                							<!-- <a href="/admin/plant/detail/{{ $c->id }}">Detail</a>
											| -->
											<!-- <a href="/admin/plant/edit/{{ $c->id }}" class="btn btn-warning">Edit</a>
											|
											<a href="/admin/plant/delete/{{ $c->id }}" class="btn btn-danger">Delete</a> -->
										</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection