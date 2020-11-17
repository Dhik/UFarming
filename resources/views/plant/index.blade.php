<!DOCTYPE html>
<html>
<head>
	<title>Admin | Get Plant</title>
</head>
<body>

	<h3>Plant Data</h3>

	<a href="/admin/plant/add"> + Add New Plant</a>
	
	<br/>
	<br/>

	<table border="1">
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
		@foreach($plants as $p)
		<tr>
			<td>{{ $p->plant_name }}</td>
			<td>{{ $p->summary }}</td>
			<td>{{ $p->growing }}</td>
			<td>{{ $p->harvesting }}</td>
            <td><img src="{{ $p->picture }}" width=200></td>
            <td>{{ $p->difficulty }}</td>
            <td>{{ $p->stages }}</td>
            <td>{{ $p->total_days }}</td>
            <td>{{ $p->success_rate }}</td>
			<td>
                <!-- <a href="/admin/plant/detail/{{ $p->id }}">Detail</a>
				| -->
				<a href="/admin/plant/edit/{{ $p->id }}">Edit</a>
				|
				<a href="/admin/plant/delete/{{ $p->id }}">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>


</body>
</html>