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
	<form method="post" >

		@csrf
		<!-- {{csrf_field()}} -->
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<h3>Add New Employee</h3>
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" required></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" required></td>
			</tr>
      <tr>
				<td>Name</td>
				<td><input type="text" name="name" required></td>
			</tr>
      <tr>
				<td>Company Name</td>
				<td><input type="text" name="companyname" required></td>
			</tr>
      <tr>
				<td>Contact No</td>
				<td><input type="text" name="contactno" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>

	{{session('msg')}}
</body>
</html>
