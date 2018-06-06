<?php require_once ("../function.php");?>
<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Cache-control" content="no-cache">
    <link rel="stylesheet" href="../css/app.css?ts=<?=time()?>">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css?ts=<?=time()?>" type="text/css">
    <title><?php the_title(); ?></title>
  </head>

  <body>

   <nav class="navbar navbar-default">
     <div class="container">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="home.php">DePaul</a>
       </div>

       <div id="navbar" class="collapse navbar-collapse">
         <ul class="nav navbar-nav">
           <li><a href="home.php">Home</a></li>
           <li><a href="progress.php">Progress</a></li>
           <li><a href="contact.php">Contact</a></li>
           <li><a href="course_search.php">Course Search</a></li>
           <li><a href="user_search.php">User Search</a></li>
           <li><a href="degree_requirements.php">Degree Requirements</a></li>
		   <li><a href="/phpmyadmin">PHPMyAdmin</a></li>
         </ul>

         <ul class="nav navbar-nav navbar-right">
           <li><a href="profile.php">Profile</a></li>
           <li><a href="logout.php">Log Out</a></li>
         </ul>

       </div><!--/.nav-collapse -->

     </div>
   </nav>
  </body>
</html>
