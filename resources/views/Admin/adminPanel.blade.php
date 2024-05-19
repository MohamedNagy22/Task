<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <title>Admin Panel</title>
</head>
<body>
    <h2>Admin Panel</h2>
    <form action="{{url("add_product_key")}}" method="POST">
        @csrf
        <h3>Add Product Key</h3>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Product Key</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='product_key' placeholder="Enter your product key" value="{{old('product_key')}}">
            @error("product_key")
              <div class="alert alert-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Expire Date</label>
            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='expire_date'  >
            @error("expire_date")
              <div class="alert alert-danger">{{$message}}</div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <br>
    <form action="{{url("admin/product_keys")}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">All Product Keys</button>
    </form>
    <br>
    <form action="{{url("logout")}}" method="POST">
      @csrf
      <button type="submit" class="btn btn-danger">Lougout</button>
    </form>
    <br>
    <script src="{{asset("js/bootstrap.min.js")}}"></script>
</body>
</html>