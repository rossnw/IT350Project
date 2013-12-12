<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<base href="<?php $this->eprint($this->ROOT_URL); ?>" />
		<title>Car Reliability-inator</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="Car Reliability-inator " />
		<meta name="author" content="phreeze builder | phreeze.com" />

		<!-- Le styles -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link href="styles/style.css" rel="stylesheet" />
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link href="bootstrap/css/font-awesome.min.css" rel="stylesheet" />
		<!--[if IE 7]>
		<link rel="stylesheet" href="bootstrap/css/font-awesome-ie7.min.css">
		<![endif]-->
		<link href="bootstrap/css/datepicker.css" rel="stylesheet" />
		<link href="bootstrap/css/timepicker.css" rel="stylesheet" />
		<link href="bootstrap/css/bootstrap-combobox.css" rel="stylesheet" />
		
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Le fav and touch icons -->
		<link rel="shortcut icon" href="images/favicon.png" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114-precomposed.png" />
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72-precomposed.png" />
		<link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-57-precomposed.png" />

		<script type="text/javascript" src="scripts/libs/LAB.min.js"></script>
		<script type="text/javascript">
			$LAB
				.script("//code.jquery.com/jquery-1.8.2.min.js").wait()
				.script("bootstrap/js/bootstrap.min.js");
		</script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script>
$(document).ready(function(){
  console.log("this is a console log");
  $("#submit").click(function(carN, carY){
  var carNamePar = $(".carNameParam").val();
  var carYearPar = $(".carYearParam").val();
  console.log("this is the car name: " + carNamePar);

    $.getJSON("getSameCars.php?carName=" +carNamePar +"&carYear=" + carYearPar,function(result){
      $("#mainbody").html("");
      $.each(result, function(i, field){
        $("#mainbody").append('<tr><td>'+field.year + '</td><td>'+field.make + '</td><td>' + field.model + '</td><td>' + field.mileage + '</td><td>'+field.mpg +'</td><td>'+field.repairs +'</td></tr>');
      });
    });
  });
});

$(document).ready(function(){
  $(".hzd").click(function(){
    $.getJSON("getMostRepairs.php",function(result){
      $("#hzdbody").html("");
      $.each(result, function(i, field){
        $("#hzdbody").append('<tr><td>'+field.year + '</td><td>'+field.make + '</td><td>' + field.model + '</td><td>' + field.mileage +'</td><td>' + field.numberRepairs + '</td></tr>');
      });
    });
  });
});

$(document).ready(function(){
  $(".rlb").click(function(){
    $.getJSON("getLeastRepairs.php",function(result){
      $("#rlbbody").html("");
      $.each(result, function(i, field){
        $("#rlbbody").append('<tr><td>'+field.year + '</td><td>'+field.make + '</td><td>' + field.model + '</td><td>' + field.mileage +'</td><td>' + field.numberRepairs + '</td></tr>');
      });
    });
  });
});

$(document).ready(function(){
  $(".mpg").click(function(){
    $.getJSON("getWorstMileage.php",function(result){
      $("#mpgbody").html("");
      $.each(result, function(i, field){
        $("#mpgbody").append('<tr><td>'+field.year + '</td><td>'+field.make + '</td><td>' + field.model + '</td><td>' + field.mileage +'</td><td>' + field.mpg + '</td></tr>');
      });
    });
  });
});
</script>

	</head>

	<body>

			
      <div class="container">
        <div class="navbar-header">
          <a href="./" class="navbar-brand">Reliability-inator</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Car Types <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <li><a tabindex="-1" href="../default/">Compact</a></li>
                <li><a tabindex="-1" href="../amelia/">Sedan</a></li>
                <li><a tabindex="-1" href="../cyborg/">Sport</a></li>
                <li><a tabindex="-1" href="../cerulean/">SUV</a></li>
                <li><a tabindex="-1" href="../cosmo/">Truck</a></li>
                <li><a tabindex="-1" href="../cyborg/">Van</a></li>
              </ul>
            </li>
             <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Repairs / Parts<span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="download">
                <li><a tabindex="-1" href="./bootstrap.min.css">Drive Train</a></li>
                <li><a tabindex="-1" href="./bootstrap.css">Transmission</a></li>
                <li class="divider"></li>
                <li><a tabindex="-1" href="./variables.less">Wheel Barings</a></li>
                <li><a tabindex="-1" href="./bootswatch.less">Filters</a></li>
              </ul>
            </li>
            <li>
              <a href="http://news.bootswatch.com">Support / FAQ</a>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="./" >Log in</a></li>
          </ul>

        </div>
      </div>
    
