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
    
    <form action="/admin/article/update" method="post" enctype="multipart/form-data">
    @foreach($article as $a)
        <input type="hidden" name="id" value="{{ $a->id }}"> <br/>
	    Title <input type="text" name="title" required="required" value="{{ $a->title }}"> <br/>
        Category <input type="text" name="category" required="required" value="General"> <br/>
	    Description <textarea name="description" required="required">{{ $a->description }}</textarea> <br/>
        Picture <input type="file" name="picture" required="required"> <br/>
        Source <input type="text" name="source" required="required" value="{{ $a->source }}"> <br/>
        Author <input type="text" name="author" required="required" value="{{ $a->author }}"> <br/>  
    @endforeach  
    <input type="submit" value="Save"> 
  </form>

</body>
</html>