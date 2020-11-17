<!DOCTYPE html>
<html>
<head>
    <title>Admin | Edit Plant</title>
</head>
<body>

	<h3>Edit Plant</h3>

	<a href="/admin/plant"> Back</a>
	
	<br/>
	<br/>
    
    @foreach($plant as $p)
    <form action="/admin/plant/update" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="{{ $p->id }}"> <br/>

        Plant Name <input type="text" name="plant_name" required="required" value="{{ $p->plant_name}}"> <br/>
		Summary <textarea name="summary" required="required">{{ $p->summary}}</textarea> <br/>
		Growing <textarea name="growing" required="required">{{ $p->growing}}</textarea> <br/>
		Harvesting <textarea name="harvesting" required="required">{{ $p->harvesting}}</textarea> <br/>
        
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

        Stages <input type="number" name="stages" required="required" value="{{ $p->stages}}"> <br/>
        Total Days <input type="number" name="total_days" required="required" value="{{ $p->total_days}}"> <br/>
        Success Rate <input type="range" min="1" max="100" value="50" name="success_rate">
		<input type="submit" value="Save">
	</form>
    @endforeach
	
</body>
</html>