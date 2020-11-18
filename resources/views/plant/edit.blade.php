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
    @endforeach
	
  <h3>Edit Statistic</h3>

    @foreach($statistic as $s)
    Germ Days <input type="text" name="plant_name" required="required" value="{{ $s->germ_days_low}}"> - <input type="text" name="plant_name" required="required" value="{{ $s->germ_days_up}}"> <br/>
    Germ Temperature <input type="text" name="plant_name" required="required" value="{{ $s->germ_temperature_low}}"> - <input type="text" name="plant_name" required="required" value="{{ $s->germ_temperature_up}}"> <br/>
    Growth Days <input type="text" name="plant_name" required="required" value="{{ $s->growth_days_low}}"> - <input type="text" name="plant_name" required="required" value="{{ $s->growth_days_up}}"> <br/>
    Height <input type="text" name="plant_name" required="required" value="{{ $s->height_low}}"> - <input type="text" name="plant_name" required="required" value="{{ $s->height_up}}"> <br/>
    PH <input type="text" name="plant_name" required="required" value="{{ $s->pH_low}}"> - <input type="text" name="plant_name" required="required" value="{{ $s->pH_up}}"> <br/>
    Spacing <input type="text" name="plant_name" required="required" value="{{ $s->spacing_low}}"> - <input type="text" name="plant_name" required="required" value="{{ $s->spacing_up}}"> <br/>
    Temperature <input type="text" name="plant_name" required="required" value="{{ $s->temperature_low}}"> - <input type="text" name="plant_name" required="required" value="{{ $s->temperature_up}}"> <br/>
    Width <input type="text" name="plant_name" required="required" value="{{ $s->width_low}}"> - <input type="text" name="plant_name" required="required" value="{{ $s->width_up}}"> <br/>
    @endforeach

    <br/>
    
    <input type="submit" value="Save"> 
	</form>
</body>
</html>