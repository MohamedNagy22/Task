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
  <h3>All Product Keys</h3>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Product_key</th>
        <th scope="col">Created date</th>
        <th scope="col">Expire_date</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($product_key as $product_keys )
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$product_keys->product_key}}</td>
        <td>{{$product_keys->created_at}}</td>
        <td>{{$product_keys->expire_date}}</td>
      </tr>
      @endforeach
    </tbody>
    <form action="{{url("logout")}}" method="POST">
      @csrf
      <button type="submit" class="btn btn-danger">Lougout</button>
    </form>
      <br>
  </table>
  <a href="{{url("admin")}}">Back</a>
    <script src="{{asset("js/bootstrap.min.js")}}"></script>
</body>
</html>