<!DOCTYPE html>
<html>
<head>
	<title>Admin | Add Article</title>
</head>
<body>

	<h3>Article Data</h3>

	<a href="/admin/article"> Back</a>
	
	<br/>
	<br/>

	<form action="/admin/article/store" method="post" enctype="multipart/form-data">
		Title <input type="text" name="title" required="required"> <br/>
    Category <input type="text" name="category" required="required" value="General"> <br/>
		Description <textarea name="description" required="required"></textarea> <br/>
    Picture <input type="file" name="picture" required="required"> <br/>
    Source <input type="text" name="source" required="required"> <br/>
    Author <input type="text" name="author" required="required" value="Admin"> <br/>    
    <input type="submit" value="Save"> 
  </form>

</body>
</html>