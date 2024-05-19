<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <title>Login Form</title>
</head>
<body>
    <form action="{{url("login")}}" method="POST">
        @csrf
        <h3>Login Form</h3>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='email' placeholder="Enter your email" value="{{old('email')}}">
            @error("email")
              <div class="alert alert-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='password' placeholder="Enter your Password" >
            @error("password")
              <div class="alert alert-danger">{{$message}}</div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script src="{{asset("js/bootstrap.min.js")}}"></script>
</body>
</html>