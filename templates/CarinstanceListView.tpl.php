<?php
	$this->assign('title','Car Reliability-inator  | Carinstances');
	$this->assign('nav','carinstances');

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
	.script("scripts/app/carinstances.js").wait(function(){
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
	<i class="icon-th-list"></i> Carinstances
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="carinstanceCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Vin">Vin<% if (page.orderBy == 'Vin') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Mileage">Mileage<% if (page.orderBy == 'Mileage') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Color">Color<% if (page.orderBy == 'Color') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Make">Make<% if (page.orderBy == 'Make') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Model">Model<% if (page.orderBy == 'Model') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Repairs">Repairs<% if (page.orderBy == 'Repairs') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Package">Package<% if (page.orderBy == 'Package') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Maintenance">Maintenance<% if (page.orderBy == 'Maintenance') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Type">Type<% if (page.orderBy == 'Type') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Mpg">Mpg<% if (page.orderBy == 'Mpg') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Conditions">Conditions<% if (page.orderBy == 'Conditions') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Powertrain">Powertrain<% if (page.orderBy == 'Powertrain') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('vin')) %>">
				<td><%= _.escape(item.get('vin') || '') %></td>
				<td><%= _.escape(item.get('mileage') || '') %></td>
				<td><%= _.escape(item.get('color') || '') %></td>
				<td><%= _.escape(item.get('make') || '') %></td>
				<td><%= _.escape(item.get('model') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('repairs') || '') %></td>
				<td><%= _.escape(item.get('package') || '') %></td>
				<td><%= _.escape(item.get('maintenance') || '') %></td>
				<td><%= _.escape(item.get('type') || '') %></td>
				<td><%= _.escape(item.get('mpg') || '') %></td>
				<td><%= _.escape(item.get('conditions') || '') %></td>
				<td><%= _.escape(item.get('powertrain') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="carinstanceModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="vinInputContainer" class="control-group">
					<label class="control-label" for="vin">Vin</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="vin" placeholder="Vin" value="<%= _.escape(item.get('vin') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="mileageInputContainer" class="control-group">
					<label class="control-label" for="mileage">Mileage</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="mileage" placeholder="Mileage" value="<%= _.escape(item.get('mileage') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="colorInputContainer" class="control-group">
					<label class="control-label" for="color">Color</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="color" placeholder="Color" value="<%= _.escape(item.get('color') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
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
				<div id="repairsInputContainer" class="control-group">
					<label class="control-label" for="repairs">Repairs</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="repairs" placeholder="Repairs" value="<%= _.escape(item.get('repairs') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="packageInputContainer" class="control-group">
					<label class="control-label" for="package">Package</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="package" placeholder="Package" value="<%= _.escape(item.get('package') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="maintenanceInputContainer" class="control-group">
					<label class="control-label" for="maintenance">Maintenance</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="maintenance" placeholder="Maintenance" value="<%= _.escape(item.get('maintenance') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="typeInputContainer" class="control-group">
					<label class="control-label" for="type">Type</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="type" placeholder="Type" value="<%= _.escape(item.get('type') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="mpgInputContainer" class="control-group">
					<label class="control-label" for="mpg">Mpg</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="mpg" placeholder="Mpg" value="<%= _.escape(item.get('mpg') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="conditionsInputContainer" class="control-group">
					<label class="control-label" for="conditions">Conditions</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="conditions" placeholder="Conditions" value="<%= _.escape(item.get('conditions') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="powertrainInputContainer" class="control-group">
					<label class="control-label" for="powertrain">Powertrain</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="powertrain" placeholder="Powertrain" value="<%= _.escape(item.get('powertrain') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteCarinstanceButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteCarinstanceButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Carinstance</button>
						<span id="confirmDeleteCarinstanceContainer" class="hide">
							<button id="cancelDeleteCarinstanceButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteCarinstanceButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="carinstanceDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Carinstance
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="carinstanceModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveCarinstanceButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="carinstanceCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newCarinstanceButton" class="btn btn-primary">Add Carinstance</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
