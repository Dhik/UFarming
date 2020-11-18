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
    
    <h3>Statistic Data</h3>

      Germ Days <input type="text" name="germ_days_low" required="required"> - <input type="text" name="germ_days_up" required="required"> <br/>
      Germ Temperature <input type="text" name="germ_temperature_low" required="required"> - <input type="text" name="germ_temperature_up" required="required"> <br/>
      Growth Days <input type="text" name="growth_days_low" required="required"> - <input type="text" name="growth_days_up" required="required"> <br/>
      Height <input type="text" name="height_low" required="required"> - <input type="text" name="height_up" required="required"> <br/>
      PH <input type="text" name="pH_low" required="required"> - <input type="text" name="pH_up" required="required"> <br/>
      Spacing <input type="text" name="spacing_low" required="required"> - <input type="text" name="spacing_up" required="required"> <br/>
      Temperature <input type="text" name="temperature_low" required="required"> - <input type="text" name="temperature_up" required="required"> <br/>
      Width <input type="text" name="width_low" required="required"> - <input type="text" name="width_up" required="required"> <br/>

    <br/>

    <input type="submit" value="Save"> 
  </form>

</body>
</html>