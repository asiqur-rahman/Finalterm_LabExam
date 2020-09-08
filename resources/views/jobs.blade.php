<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
</head>
<body>
  <!-- nav -->
  <nav class="navbar navbar-default">
    <div class="container-fluid">

      <ul class="nav navbar-nav navbar-right">
        <li><a href="/employee/update">Update My Account</a></li>
        <li><a href="/employee/index">Job List</a></li>
        <li><a href="/employee/register">Register New Employee</a></li>
        <li><a href="/logout">Logout</a></li>
      </ul>
    </div>
  </nav>
  <!-- ./nav -->

  <!-- main -->
  <main class="container">
    <table border="1">
      <thead>
        <tr class="table100-head">
          @for ($i = 0; $i < count($thead); $i++)
          <th>{{$thead[$i]}}</th>
          @endfor
        </tr>
      </thead>
      <tbody>
        @for ($i = 0; $i < count($tdata); $i++)
        <tr>
          @for ($j = 0; $j < count((array)$tdata[$i])-1; $j++)
          <td>{{$tdata[$i][$j]}}</td>
          @endfor
          @for ($k = 0; $k < count($tLinkName); $k++)
          <td><a href="{{$tLink[$k]}}{{$tdata[$i][$j]}}">{{$tLinkName[$k]}}</a></td>
          @endfor
        </tr>
        @endfor
      </tbody>
    </table>
  </main>
  <!-- ./main -->

  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
</body>
</html>
