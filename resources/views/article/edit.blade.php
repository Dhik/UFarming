<!DOCTYPE html>
<html>
<head>
	<title>Admin | Add Article</title>

  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

  <div class="container mx-auto py-24 px-12">

  @foreach($article as $a)
    <form class="w-full" action="/admin/article/update" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="{{ $a->id }}"> <br/>

		  <div class="flex items-center justify-between mb-12">
    	    <div class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
    	      <a href="/admin/article"> Back</a>
    	    </div>
    	</div>
		
		<p class="text-3xl mb-6">Edit Article Data</p>

		<div class="flex flex-wrap -mx-3 mb-6">
			<div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
		  		<div class="flex flex-wrap -mx-3 mb-6">
          		  <div class="w-full px-3">
          		    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
          		      Title
          		    </label>
          		    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Title" name="title" value="{{ $a->title }}" required>
          		  </div>
          		</div>
				<div class="flex flex-wrap -mx-3 mb-6">
          		  <div class="w-full px-3">
          		    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
					  Category
          		    </label>
          		    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Category" name="category" value="General" required>
          		  </div>
          		</div>
	      		<div class="flex flex-wrap -mx-3 mb-6">
          		  <div class="w-full px-3">
          		    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
					  Description
          		    </label>
          		    <textarea class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4" name="description" required>{{ $a->description }}</textarea>
          		  </div>
          		</div>
		  		<div class="flex flex-wrap -mx-3 mb-6">
          		  <div class="w-full px-3">
          		    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
          		      Picture
          		    </label>
          		    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="file" name="picture" required>
          		  </div>
          		</div>
				<div class="flex flex-wrap -mx-3 mb-6">
          		  <div class="w-full px-3">
          		    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
					  Source
          		    </label>
          		    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Source" name="source"  value="{{ $a->source }}" required>
          		  </div>
          		</div>
				<div class="flex flex-wrap -mx-3 mb-6">
          		  <div class="w-full px-3">
          		    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
					  Author
          		    </label>
          		    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Author" name="author" value="{{ $a->author }}" value="Admin" required>
          		  </div>
          		</div>

		  		<div class="flex items-center justify-between">
          		  <button class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="Save">
          		    Save
          		  </button>
          		</div>
			</div>
		</div>

		</form>
  @endforeach 
	</div>

</body>
</html>