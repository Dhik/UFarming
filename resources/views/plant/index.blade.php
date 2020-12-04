@extends('layouts.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Plant Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Plant</a></li>
                <li class="breadcrumb-item active">Main </li>
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
                            <a href="/admin/plant/add" class="btn btn-primary"> + Add New Plant</a>
                        </div>
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                <tr>
									<th>Plant Name</th>
									<th>Summary</th>
									<th>Growing</th>
									<th>Harvesting</th>
            						<th>Picture</th>
            						<th>Difficulty</th>
            						<th>Stages</th>
            						<th>Total Days</th>
            						<th>Success Rate</th>
									<th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($plants as $p)
                                    <tr>
										<td>{{ $p->plant_name }}</td>
										<td>{{ substr($p->summary, 0, 100) . "..." }}</td>
										<td>{{ substr($p->growing) . "..." }}</td>
										<td>{{ substr($p->harvesting) . "..." }}</td>
            							<td><img src="{{ $p->picture }}" width=200></td>
            							<td>{{ $p->difficulty }}</td>
            							<td>{{ $p->stages }}</td>
            							<td>{{ $p->total_days }}</td>
            							<td>{{ $p->success_rate }}</td>
										<td>
                							<!-- <a href="/admin/plant/detail/{{ $p->id }}">Detail</a>
											| -->
											<a href="/admin/plant/edit/{{ $p->id }}" class="btn btn-warning">Edit</a>
											|
											<a href="/admin/plant/delete/{{ $p->id }}" class="btn btn-danger">Delete</a>
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
