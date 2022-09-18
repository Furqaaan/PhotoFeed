@include("header")

<div class="nav-container">
	<div>
		Hi , {{session()->get("user")->firstname}}
	</div>
	<a href="/logout">
		<button type="button" class="btn btn-secondary">LOGOUT</button>
	</a>
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

<script>
	$(document).ready(function() {
		$("#image-category-view").val("{{session('defaultCat')}}");
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