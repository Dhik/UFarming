<!DOCTYPE html>
<html>
<head>
	<title>Admin | Add Plant</title>
</head>
<body>

	<h3>Plant Data</h3>

	<a href="/admin/plant"> Back</a>
	
	<br/>
	<br/>

	<form action="/admin/plant/store" method="post" enctype="multipart/form-data">
		Plant Name <input type="text" name="plant_name" required="required"> <br/>
		Summary <textarea name="summary" required="required"></textarea> <br/>
		Growing <textarea name="growing" required="required"></textarea> <br/>
		Harvesting <textarea name="harvesting" required="required"></textarea> <br/>
        
        Picture <input type="file" name="picture" required="required"> <br/>
        Difficulty
        <select name="difficulty" required>
          <option value="Easy">Easy</option>
          <option value="Medium">Medium</option>
          <option value="Hard">Hard</option>
        </select> <br/>
        
        Category 
        <select name="category" required>
        @foreach($category as $c)
          <option value="{{ $c->id }}">{{ $c->category_name }}</option>
        @endforeach
        </select> <br/>
        
        Type 
        <select name="type" required>
        @foreach($type as $t)
          <option value="{{ $t->id }}">{{ $t->type_name }}</option>
        @endforeach
        </select> <br/>

        Stages <input type="number" name="stages" required="required"> <br/>
        Total Days <input type="number" name="total_days" required="required"> <br/>
        Success Rate <input type="range" min="1" max="100" value="50" name="success_rate">
		<input type="submit" value="Save">
	</form>

</body>
</html>