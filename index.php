
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css" type="text/css">
    <title>Login</title>
  </head>

  <body>
    <div class="img-container">
      <div class="col-md-8">
        
      </div>
    </div>
    <div class="log">
      <div class="col-md-3">
        <form class="form-signin" action="includes/log.inc.php" method="POST">
          <img class="mb-4" src="img/dp_ban.jpg" width="300px">
          <h1 class="h3 mb-3 font-weight-normal">User Login</h1>
          <label for="inputEmail" class="sr-only">Email address</label>
          <input type="email" name="mail" class="form-control" placeholder="Email address" required autofocus>
          </br>
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" name="pwd" class="form-control" placeholder="Password" required>
          <br>
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
        </form> 

    </div>
  </div>
  </body>
</html>
