<!DOCTYPE html>
<html>
<head>
	<title>Admin | Get Article</title>
</head>
<body>

	<h3>Article Data</h3>

	<a href="/admin/article/add"> + Add New Article</a>
	
	<br/>
	<br/>

	<table border="1">
		<tr>
			<th>Title</th>
			<th>Category</th>
			<th>Description</th>
            <th>Picture</th>
            <th>Source</th>
            <th>Author</th>
			<th>Option</th>
		</tr>
		@foreach($articles as $a)
		<tr>
			<td>{{ $a->title }}</td>
			<td>{{ $a->category }}</td>
			<td>{{ $a->description }}</td>
            <td><img src="{{ $a->picture }}" width=200></td>
            <td>{{ $a->source }}</td>
            <td>{{ $a->author }}</td>
			<td>
                <!-- <a href="/admin/plant/detail/{{ $a->id }}">Detail</a>
				| -->
				<a href="/admin/article/edit/{{ $a->id }}">Edit</a>
				|
				<a href="/admin/article/delete/{{ $a->id }}">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>

</body>
</html>