<!DOCTYPE html>
<html>
<head>
	<title>{{session("title") ?? "Login"}}</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<script type="text/javascript">
		$.ajaxSetup({
	       headers: {
        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		}
    	});
	</script>
	<style>
		body {
			background: #f3f3f3;
		}

		.login-form-container {
			background: white;
			width:  500px;
			margin:  130px auto;
			padding:  20px;
			border-bottom:  2px solid #ccc;
		}

		.btn-primary {
			border:  0;
			border-radius: 0;
			border-bottom: 3px solid #0a58ca;
		}

		.btn-secondary {
			border:  0;
			border-radius: 0;
			border-bottom: 3px solid #565e64;
		}

		.btn-danger {
			border:  0;
			border-radius: 0;
			border-bottom: 3px solid #b02a37;
		}

		.alert-danger {
			border-radius: 0;
		}

		.upload-form-container {
			background: white;
			width:  70%;
			margin:  10px auto;
			padding:  20px;
			border-bottom:  2px solid #ccc;
		}

		.upload-container {
			display: flex;
			align-items: center;
			gap:  10px;
		}

		#image-category {
			width: 30%;
		}

		.nav-container {
			width:  100px;
			margin:  30px auto;
			text-align: center;
		    display: flex;
		    flex-direction: column;
		    align-items: center;

		}

		.gallery-container {
			background: white;
			width:  70%;
			margin:  20px auto;
			padding:  20px;
			border-bottom:  2px solid #ccc;
		}

		.image-gallery {
			margin-top:  20px;
			display: flex;
			justify-content:  center;
			flex-wrap: wrap;
		}

		.image-gallery img {
			width: 30%;
			padding:  10px;
		}

		.nav-btns {
			display: flex;
			gap: 10px;
		}

		.category-container {
			background: white;
			width:  30%;
			margin:  20px auto;
			padding:  20px;
			border-bottom:  2px solid #ccc;
		}

		.cat-item {
			margin:  10px;
			padding:  10px;
			display: flex;
    		justify-content: space-between;
		}

		.new-cat {
			display: flex;
			gap:  10px;
		}
	</style>
</head>
<body>