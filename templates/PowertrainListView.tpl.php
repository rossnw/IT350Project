<?php
	$this->assign('title','Car Reliability-inator  | Powertrains');
	$this->assign('nav','powertrains');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("bootstrap/js/bootstrap-datepicker.js")
	.script("bootstrap/js/bootstrap-timepicker.js")
	.script("bootstrap/js/bootstrap-combobox.js")
	.script("scripts/libs/underscore-min.js").wait()
	.script("scripts/libs/underscore.date.min.js")
	.script("scripts/libs/backbone-min.js")
	.script("scripts/app.js")
	.script("scripts/model.js").wait()
	.script("scripts/view.js").wait()
	.script("scripts/app/powertrains.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});
		
		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>

<div class="container">

<h1>
	<i class="icon-th-list"></i> Powertrains
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="powertrainCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Make">Make<% if (page.orderBy == 'Make') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Model">Model<% if (page.orderBy == 'Model') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Engine">Engine<% if (page.orderBy == 'Engine') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Transtype">Transtype<% if (page.orderBy == 'Transtype') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Drivetrain">Drivetrain<% if (page.orderBy == 'Drivetrain') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Vin">Vin<% if (page.orderBy == 'Vin') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('vin')) %>">
				<td><%= _.escape(item.get('make') || '') %></td>
				<td><%= _.escape(item.get('model') || '') %></td>
				<td><%= _.escape(item.get('engine') || '') %></td>
				<td><%= _.escape(item.get('transtype') || '') %></td>
				<td><%= _.escape(item.get('drivetrain') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('vin') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="powertrainModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="makeInputContainer" class="control-group">
					<label class="control-label" for="make">Make</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="make" placeholder="Make" value="<%= _.escape(item.get('make') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="modelInputContainer" class="control-group">
					<label class="control-label" for="model">Model</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="model" placeholder="Model" value="<%= _.escape(item.get('model') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="engineInputContainer" class="control-group">
					<label class="control-label" for="engine">Engine</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="engine" placeholder="Engine" value="<%= _.escape(item.get('engine') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="transtypeInputContainer" class="control-group">
					<label class="control-label" for="transtype">Transtype</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="transtype" placeholder="Transtype" value="<%= _.escape(item.get('transtype') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="drivetrainInputContainer" class="control-group">
					<label class="control-label" for="drivetrain">Drivetrain</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="drivetrain" placeholder="Drivetrain" value="<%= _.escape(item.get('drivetrain') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="vinInputContainer" class="control-group">
					<label class="control-label" for="vin">Vin</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="vin" placeholder="Vin" value="<%= _.escape(item.get('vin') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deletePowertrainButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deletePowertrainButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Powertrain</button>
						<span id="confirmDeletePowertrainContainer" class="hide">
							<button id="cancelDeletePowertrainButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeletePowertrainButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="powertrainDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Powertrain
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="powertrainModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="savePowertrainButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="powertrainCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newPowertrainButton" class="btn btn-primary">Add Powertrain</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
