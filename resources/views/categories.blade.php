@include("header")

<div class="nav-container">
	<div>
		Hi , {{session()->get("user")->firstname}}
	</div>
	<div class="nav-btns">
		<a href="/dashboard">
			<button type="button" class="btn btn-secondary">UPLOAD</button>
		</a>
		<a href="/logout">
			<button type="button" class="btn btn-secondary">LOGOUT</button>
		</a>
	</div>
</div>

<div class="category-container">
	<div class="alert alert-danger show-error">Category name cannot be null</div>
	<div class="new-cat">
		<input type="text" class="form-control new-cat-name" placeholder="Add new category" name="category">
	 	<button type="submit" class="btn btn-primary addBtn">ADD</button>
	</div>
	<div class="cat-list">
	  	@foreach($categories as $cat)
		  <div class="cat-item cat-{{$cat->ID}}">
		  	<span>{{$cat->Name}}</span>
		  	<button type="button" data-category="{{$cat->ID}}" class="btn btn-danger deleteBtn">Delete</button>
		  </div>
		@endforeach
	</div>
</div>



<script>
	$(document).ready(function() {
		$(".show-error").hide();
	});

	$(".deleteBtn").on("click",function() {
		$(".show-error").hide();
		let item = ".cat-"+$(this).data("category");
		console.log($(item));
		$.ajax({
			url: "{{route('deleteCategory')}}",
			data : {
				category: $(this).data("category")
			},
			success: function(data) {
				$(item).remove();
			}
		})
	});

	$(".addBtn").on("click",function() {
		$(".show-error").hide();

		if($(".new-cat-name").val() == ""){
			$(".show-error").show();
		}else{
			$.ajax({
				url: "{{route('addCategory')}}",
				data : {
					category: $(".new-cat-name").val()
				},
				success: function(data) {
					let newcat = `<div class="cat-item cat-${data.ID}">
							  	<span>${data.Name}</span>
							  	<button type="button" data-category="${data.ID}" class="btn btn-danger deleteBtn">Delete</button>
							  </div>`;
					$(".cat-list").append(newcat);
					$(".new-cat-name").val("")
					attachEvent();
				}
			})
		}
	});

	function attachEvent() {
		$(".deleteBtn").on("click",function() {
		let item = ".cat-"+$(this).data("category");
		console.log($(item));
		$.ajax({
			url: "{{route('deleteCategory')}}",
			data : {
				category: $(this).data("category")
			},
			success: function(data) {
				$(item).remove();
			}
		})
	});
	}
</script>



@include("footer")