<!DOCTYPE html>
<html>
<head>
  <title>Register</title>

  <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <!-- nav -->
  <nav class="navbar navbar-default">
    <div class="container-fluid">

      <ul class="nav navbar-nav navbar-right">
        <li><a href="/admin/update">Update My Account</a></li>
        <li><a href="/admin/index">Employee List</a></li>
        <li><a href="/admin/register">Register New Employee</a></li>
        <li><a href="/logout">Logout</a></li>
      </ul>
    </div>
  </nav>
  <!-- ./nav -->
  <!-- main -->
  <main class="container">

  </main>
  <!-- ./main -->
  <form method="post">
    {{ csrf_field() }}
  <table>
    <tbody>
      @for ($i = 0; $i < count($label); $i++)
      <tr>
      <td>{{$label[$i]}}</td>
      <td><input type="text" name="num{{$i}}" value="{{$dbdata[$i]}}" required></td>
     </tr>
      @endfor
        <tr>
          <td></td>
          <td><input type="submit" name="" value="Update Information" style="background: #ff523b; border-radius:40px; color:white;"></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td><center><h2 style="color:green" class="msg">{{ Session::get('status') }}</h2></center></td>
          <td></td>
        </tr>
    </tbody>
  </table>
  </form>

	{{session('msg')}}
</body>
</html>
