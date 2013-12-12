<?php
	$this->assign('title','CARS | Home');
	$this->assign('nav','home');

	$this->display('_Header.tpl.php');
?>

  <!-- Main Search Modal -->
  <div class="modal fade" id="main-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Cars just like yours</h4>
        </div>
        <div class="modal-body">
          <table id="maintbl" class="table table-bordered table-striped table-hover">
          	<thead><tr><td>Year</td><td>Make</td><td>Model</td><td>Mileage</td><td>MPG</td><td>Repairs</td></tr></thead>
          	<tbody id="mainbody"></tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <!-- Most Hazzard Prone Cars Modal -->
  <div class="modal fade" id="hazzard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Most Hazzard Prone Cars</h4>
        </div>
        <div class="modal-body">
          <table id="hzdtbl" class="table table-bordered table-striped table-hover">
          	<thead><tr><td>Year</td><td>Make</td><td>Model</td><td>Mileage</td><td>Num. of Repairs</td></tr></thead>
          	<tbody id="hzdbody"></tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<!-- Reliable Cars Modal -->
  <div class="modal fade" id="reliable" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Most Reliable Cars</h4>
        </div>
        <div class="modal-body">
		  <table id="rlbtbl" class="table table-bordered table-striped table-hover">
          	<thead><tr><td>Year</td><td>Make</td><td>Model</td><td>Mileage</td><td>Num. of Repairs</td></tr></thead>
          	<tbody id="rlbbody"></tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <!-- Best MPG Modal -->
  <div class="modal fade" id="mpg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Cars with Best MPG</h4>
        </div>
        <div class="modal-body">
          <table id="mpgtbl" class="table table-bordered table-striped table-hover">
          	<thead><tr><td>Year</td><td>Make</td><td>Model</td><td>Mileage</td><td>MPG</td></tr></thead>
          	<tbody id="mpgbody"></tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->



	<div class="container">

		<!-- Main hero unit for a primary marketing message or call to action -->
		<div class="well well-lg">
			<h1>Car Reliability-inator <!--<i class="icon-thumbs-up"></i>--></h1>
			<p>Welcome to our new -inator! This -inator has been specifically designed to help villians pick the best car for their evil plans and not have to worry about the get away car breaking down.</p>
			
			<p>Villians will be able to create profiles and share information about their car experiences and when repairs and other maintenance was done. This way we can plan better and no longer be foiled by the 'good' guys...or our machines breaking in an untimely manner.
			<br><br>
			<div align="center">
			<div class="panel panel-primary">
	              <div class="panel-heading">
	                <h3 class="panel-title">Enter a Year and Model For a Car</h3>
	              </div>
	              <div class="panel-body">
	              	<form action="#main-modal" method="get">
		              	   <div class="form-group">
				                <label class="control-label" for="focusedInput">Model</label>
				                <input class="form-control carNameParam" id="focusedInput" name="carName" placeholder="e.g. Corolla" type="text">
			            	</div>
			               <div class="form-group">
				                <label class="control-label" for="focusedInput">Year</label>
				                <input class="form-control carYearParam" id="focusedInput" name="carYear" placeholder="e.g. 2004" type="text">
			            	</div>
		              </div>
		              <input data-toggle="modal" href="#main-modal" class="btn btn-primary" id="submit" value="Submit"></input>
		              </form>
	        	  </div>
	        </div>
			</p>
		</div>

		<!-- Example row of columns -->
		<div class="row">
			<div class="span4">
				<h2><i class="icon-cogs"></i> Most Hazzard Prone Cars</h2>
				 <p>No one likes buying a car that ends up breaking down every other week. Click below to learn which cars are more prone to being more needy than your ex-girlfriend back in high school.</p>
				<p><a data-toggle="modal" href="#hazzard" class="btn hzd">Learn More &raquo;</a></p>
			</div>
			<div class="span4">
				<h2><i class="icon-th"></i> Most Reliable</h2>
				 <p>The cream of the crop, well behaved, and loyal to your cause. No, not your children. These are the cars that will take you from A to B to C to D... you get it...with minimal additional costs and repairs.</p>
				<p><a data-toggle="modal" href="#reliable" class="btn rlb">Find Out Now! &raquo;</a></p>
		 	</div>
			<div class="span4">
				<h2><i class="icon-signin"></i> Best Bang for Your Gas Mileage Buck</h2>
				<p>These beauties will drive longer than your boringest of board meetings you can't wait to get out of. They even give the Energizer Bunny a run for his money.</p>
				<p><a data-toggle="modal" href="#mpg" class="btn mpg">Keep Driving &raquo;</a></p>
			</div>
		</div>

	</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>

