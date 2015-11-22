<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>GPA Calculator</title>

	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/fresh-bootstrap-table.css" rel="stylesheet" />
     
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        
</head>
<body>
	<div class="wrapper">
		<center>
			<h1>GPA Calculator</h1>
		</center>
	    <div class="container">
	        <div class="row">
	            <div class="col-md-8 col-md-offset-2">
	                                
	                <div class="fresh-table full-color-blue">
		                <!--    Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange                  
		                        Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
		                -->
		                <form method="POST" accept="index.php">
		                    <table class="table">
		                        <tbody>
		                            <?php
		                            	foreach ($rows as $key => $value) {
		                            		print_r($value);
		                            	}
		                            ?>		                                         		
		                        </tbody>
		                    </table>
		                    <center>
		                    	<button type="submit" class="btn">Calculate GPA</button>
		                    	<br>
		                    	<h2><?php echo $gpa; ?></h2>
		                    </center>
		                    <br>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</body>    
</html>