<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>404</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link rel="icon" type="image/png" href="assets/nginAssets/img/favicon.ico">
    <link href="assets/nginAssets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/nginAssets/css/gsdk-base.css" rel="stylesheet" />
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
  </head>

  <body>
    <div class="image-container set-full-height" style="background-image: url('assets/nginAssets/img/wizard.jpg')">
      <!--   Big container   -->
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <!--      Wizard container        -->   
            <div class="wizard-container"> 
              <div class="card wizard-card ct-wizard-orange" id="wizardProfile">              
                <div class="wizard-header">
                  <h3>
                    <?php
                      print(
                        $view['error']
                      );
                    ?>
                    <!-- <small>This information will let us know more about you.</small> -->
                  </h3>
                </div>
              </div>
            </div>
          </div> <!-- wizard container -->
        </div>
      </div><!-- end row -->
    </div> <!--  big container -->
  </body>

  <script src="assets/nginAssets/js/jquery-1.10.2.js" type="text/javascript"></script>
  <script src="assets/nginAssets/js/bootstrap.min.js" type="text/javascript"></script>
  <!--   plugins 	 -->
  <script src="assets/nginAssets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
  <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
  <script src="assets/nginAssets/js/jquery.validate.min.js"></script>
  <!--  methods for manipulating the wizard and the validation -->
  <script src="assets/nginAssets/js/wizard.js"></script>
</html>