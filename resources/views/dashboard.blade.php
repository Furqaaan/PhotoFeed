@include("header")

<div class="nav-container">
	<div>
		Hi , {{session()->get("user")->firstname}}
	</div>
	<div class="nav-btns">
		<a href="/categories">
			<button type="button" class="btn btn-secondary">CATEGORIES</button>
		</a>
		<a href="/logout">
			<button type="button" class="btn btn-secondary">LOGOUT</button>
		</a>
	</div>
</div>

<div class="upload-form-container">
	<form id="image-upload" method="POST" enctype="multipart/form-data" action="{{url('doUploadImage')}}">
		@csrf
		@error('image')
		    	<div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<div class="upload-container">
		  <input class="form-control" type="file" id="image-file" name="image">
		  <select class="form-select" id="image-category" name="category">
		  	@foreach($categories as $cat)
			  <option value="{{$cat->ID}}">{{$cat->Name}}</option>
			@endforeach
		  </select>
		  <button type="submit" class="btn btn-primary uploadBtn">Upload</button>
		</div>
	</form>
</div>

<div class="gallery-container">
	<label for="formFile1" class="form-label">GALLERY</label>
	<select class="form-select" id="image-category-view" name="category">
	  	@foreach($categories as $cat)
		  <option value="{{$cat->ID}}">{{$cat->Name}}</option>
		@endforeach
	</select>
	<div class="image-gallery">

	</div>
</div>

<!-- <div class="category-container">
	<label for="formFile1" class="form-label">Categories</label>
  	@foreach($categories as $cat)
	  <div class="cat-item">
	  	<span>{{$cat->Name}}</span>
	  	<button type="button" data-category="{{$cat->ID}}" class="btn btn-danger deleteBtn">Delete</button>
	  </div>
	@endforeach
</div> -->



<script>
	$(document).ready(function() {
		$("#image-category-view").val("{{session('defaultCat')}}");
		$("#image-category").val("{{session('defaultCat')}}");
		$.ajax({
			url: "{{route('getImages')}}",
			data : {
				category: $("#image-category-view").val()
			},
			success: function(data) {
				let gallery = "";
				data.forEach((item) => {
					gallery += `<img src='storage/${item.Name}' />`;
				})
				$(".image-gallery").html(gallery);
			}
		})
	});

	$("#image-category-view").on("change",function() {
		$.ajax({
			url: "{{route('getImages')}}",
			data : {
				category: $(this).val()
			},
			success: function(data) {
				let gallery = "";
				data.forEach((item) => {
					gallery += `<img src='storage/${item.Name}' />`;
				})
				$(".image-gallery").html(gallery);
			}
		})
	});
</script>



@include("footer")