@extends('layouts.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Myplant Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Myplant</a></li>
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
                        <!-- <div class="card-header">
                            <a href="/admin/plant/add" class="btn btn-primary"> + Add New Plant</a>
                        </div>     -->
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
									<th>User</th>
									<th>Plant Name</th>
									<th>Progress</th>
									<th>Name</th>
            						<th>Picture</th>
									<th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($myplants as $p)
                                    <tr>
										<td>{{ $p->user }}</td>
										<td>{{ $p->plant_name }}</td>
										<td>{{ ($p->progress * 100) }}%</td>
										<td>{{ $p->name }}</td>
            							<td><img src="{{ $p->picture }}" width=200></td>
										<td>
                			<a href="/admin/checklist/get/{{ $p->id }}" class="btn btn-success">Detail</a>
											<!-- |
											<a href="/admin/plant/edit/{{ $p->id }}" class="btn btn-warning">Edit</a>
											|
											<a href="/admin/plant/delete/{{ $p->id }}" class="btn btn-danger">Delete</a> -->
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