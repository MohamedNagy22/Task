<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <title>User Panel</title>
</head>
<body>
  <h3>Profile</h3>
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
      @foreach ($user_product_key as $user_product_keys )
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$user_product_keys->product_key}}</td>
        <td>{{$user_product_keys->created_date}}</td>
        <td>{{$user_product_keys->expire_date}}</td>
      </tr>
      @endforeach
    </tbody>
    <form action="{{url("logout")}}" method="POST">
      @csrf
      <button type="submit" class="btn btn-danger">Lougout</button>
    </form>
      <br>
  </table>
  <a href="{{url("user")}}">Back</a>
    <script src="{{asset("js/bootstrap.min.js")}}"></script>
</body>
</html>