<?php $title = "Contact";?>
<?php require_once ("header.php"); ?>
<html>
  <body>

    <div class="title-bar">
      <h1>Contact</h1>
    </div>

    <div class="main">
    <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Regular Office Hours
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                  Regular office hours: Monday-Thursday 9am-6pm, Friday 9am-5pm
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Walk-in/Phone-in Information
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                    Scheduled appointments are encouraged and may be set in BlueStar
                    Walk-in/phone-in advising for brief inquiries available Monday and Wednesday 10am-noon or Tuesday and Thursday 3pm-5pm
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Location and Contact Information
                    </a>
                  </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">
                    14 E. Jackson (Daley)
                    Suite 100
                    Chicago, IL 60604
                    <br>
                    Contact Us
                    (312) 362-8633
                    advising@cdm.depaul.edu
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <img src="img/athletics_logo.jpg">
          </div>
        </div>
      </div>
    </div>

    <div class = "section-a">
      <div class = "container">
        <div class="row">
          <div class ="col-md-6">
            <i class="fas fa-book"></i>
            <h3>Degree Progress</h3>
            <p>This will take you to the degree progress simulation page. Here you will be able to create a simulation of how long it would take you to finish your degree! </p>
            <a href="progress.php" class="btn btn-primary">GO!</a>
          </div>

          <div class ="col-md-6">
            <i class="fas fa-id-card"></i>
            <h3>Profile</h3>
            <p>This will take you to your profile page. Here you will be able to see your major, concentration, email, and name. </p>
            <a href="profile.php" class="btn btn-primary">GO!</a>
          </div>
        </div>
      </div>
    </div>

    <script src="bower_components/jquery/dist/jquery.js"></script>
    <script src="bower_components/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
  </body>
</html>
<?php require_once ("footer.php"); ?>
