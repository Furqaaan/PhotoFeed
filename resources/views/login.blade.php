@include("header")

<div class="login-form-container">
	<form action="/" method="POST">
		@csrf
	  <div class="form-group mb-3">
	  	@error('email')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		@error('password')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
	    <label class="mb-1">Email</label>
	    <input type="email" class="form-control" placeholder="Email" name="email">
	  </div>
	  <div class="form-group mb-3">
	    <label class="mb-1">Password</label>
	    <input type="password" class="form-control" placeholder="Password" name="password">
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>




@include("footer")