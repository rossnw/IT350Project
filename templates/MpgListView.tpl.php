<?php
	$this->assign('title','Car Reliability-inator  | Mpgs');
	$this->assign('nav','mpgs');

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
	.script("scripts/app/mpgs.js").wait(function(){
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
	<i class="icon-th-list"></i> Mpgs
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="mpgCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Car">Car<% if (page.orderBy == 'Car') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Mpgamount">Mpgamount<% if (page.orderBy == 'Mpgamount') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Typeofmiles">Typeofmiles<% if (page.orderBy == 'Typeofmiles') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Vin">Vin<% if (page.orderBy == 'Vin') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('vin')) %>">
				<td><%= _.escape(item.get('car') || '') %></td>
				<td><%= _.escape(item.get('mpgamount') || '') %></td>
				<td><%= _.escape(item.get('typeofmiles') || '') %></td>
				<td><%= _.escape(item.get('vin') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="mpgModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="carInputContainer" class="control-group">
					<label class="control-label" for="car">Car</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="car" placeholder="Car" value="<%= _.escape(item.get('car') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="mpgamountInputContainer" class="control-group">
					<label class="control-label" for="mpgamount">Mpgamount</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="mpgamount" placeholder="Mpgamount" value="<%= _.escape(item.get('mpgamount') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="typeofmilesInputContainer" class="control-group">
					<label class="control-label" for="typeofmiles">Typeofmiles</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="typeofmiles" placeholder="Typeofmiles" value="<%= _.escape(item.get('typeofmiles') || '') %>">
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
		<form id="deleteMpgButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteMpgButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Mpg</button>
						<span id="confirmDeleteMpgContainer" class="hide">
							<button id="cancelDeleteMpgButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteMpgButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="mpgDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Mpg
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="mpgModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveMpgButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="mpgCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newMpgButton" class="btn btn-primary">Add Mpg</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
