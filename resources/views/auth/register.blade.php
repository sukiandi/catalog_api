<!DOCTYPE html>
<html>
<head>

    <title>Register User</title>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>


  <body class="container">
    <div style="width: 50%; margin: auto">
      <h1>Register New User</h1>
        <hr/>
      <form method="POST" action="/auth/register">
          {!! csrf_field() !!}

          <div class="form-group">
              <label for="name">Full Name</label>
              <input type="text" name="name" class="form-control" />
          </div>

          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" />
          </div>

          <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" />
          </div>

          <div class="form-group">
              <label for="password_confirmation">Confirm Password</label>
              <input type="password" name="password_confirmation" class="form-control" />
          </div>

          <div>
              <button type="submit" class="btn btn-primary">Register</button>
          </div>
      </form>
    </div>
  </body>

</html>