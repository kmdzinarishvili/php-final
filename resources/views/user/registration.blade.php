<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->



<form class="form-horizontal" method="post" enctype="multipart/form-data" action ="{{route('post.register')}}">
    <fieldset>
        <div id="legend">
            <legend class="">Register</legend>
        </div>
        <div class="control-group">
            <!-- Username -->
            <label class="control-label"  for="name">Username</label>
            <div class="controls">
                <input type="text" id="name" name="name" placeholder="" class="input-xlarge">
                <p class="help-block">Username can contain any letters or numbers, without spaces</p>
            </div>
        </div>
        @error("name")
        <p class="text-danger">{{$errors->first("name")}}</p>
        @enderror

        <div class="control-group">
            <!-- E-mail -->
            <label class="control-label" for="email">E-mail</label>
            <div class="controls">
                <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
                <p class="help-block">Please provide your E-mail</p>
            </div>
        </div>
        @error("email")
        <p class="text-danger">{{$errors->first("email")}}</p>
        @enderror

        <div class="control-group">
            <!-- Password-->
            <label class="control-label" for="password">Password</label>
            <div class="controls">
                <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                <p class="help-block">Password should be at least 4 characters</p>
            </div>
        </div>
        @error("password")
        <p class="text-danger">{{$errors->first("password")}}</p>
        @enderror


        <div class="control-group">
            <!-- Button -->
            <div class="controls">
                @csrf

                <button class="btn btn-success">Register</button>
            </div>
        </div>
    </fieldset>
</form>
