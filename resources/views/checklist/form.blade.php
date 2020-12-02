<!DOCTYPE html>
<html>
<head>
	<title>Admin | Add Article</title>

	<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
	<div class="container mx-auto py-24 px-12">
    	<form class="w-full" action="/admin/checklist/store" method="post" enctype="multipart/form-data">

		<div class="flex items-center justify-between mb-12">
    	    <div class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
    	      <a href="/admin/checklist/get"> Back</a>
    	    </div>
    	</div>
		
		<p class="text-3xl mb-6">Add Checklist Data</p>

		<div class="flex flex-wrap -mx-3 mb-6">
			<div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
		  		<div class="flex flex-wrap -mx-3 mb-6">
          		  <div class="w-full px-3">
          		    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
          		      Title
          		    </label>
          		    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Title" name="title" required>
          		  </div>
          		</div>
	      		<div class="flex flex-wrap -mx-3 mb-6">
          		  <div class="w-full px-3">
          		    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
					  Description
          		    </label>
          		    <textarea class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4" name="desc" required></textarea>
          		  </div>
          		</div>
                <div class="flex flex-wrap -mx-3 mb-6">
          		  <div class="w-full px-3">
          		    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
          		      Myplant ID
          		    </label>
          		    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Myplant ID" name="id_myplant" value="{{$myplant_id}}" readonly>
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
	</div>

</body>
</html>