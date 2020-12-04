@extends('layouts.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Article Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Article</a></li>
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
                            <a href="/admin/article/add" class="btn btn-primary"> + Add New Article</a>
                        </div>
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                <tr>
									<th>Title</th>
									<th>Category</th>
									<th>Description</th>
            						<th>Picture</th>
            						<th>Source</th>
            						<th>Author</th>
									<th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($articles as $a)
                                    <tr>
										<td>{{ $a->title }}</td>
										<td>{{ $a->category }}</td>
										<td>{{ substr($a->description, 0, 100) . "..." }}</td>
            							<td><img src="{{ $a->picture }}" width=200></td>
            							<td>{{ $a->source }}</td>
            							<td>{{ $a->author }}</td>
										<td>
                							<!-- <a href="/admin/plant/detail/{{ $a->id }}">Detail</a>
											| -->
											<a href="/admin/article/edit/{{ $a->id }}" class="btn btn-warning">Edit</a>
											|
											<a href="/admin/article/delete/{{ $a->id }}" class="btn btn-danger">Delete</a>
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
