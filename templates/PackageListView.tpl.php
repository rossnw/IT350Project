<?php
	$this->assign('title','Car Reliability-inator  | Packages');
	$this->assign('nav','packages');

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
	.script("scripts/app/packages.js").wait(function(){
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
	<i class="icon-th-list"></i> Packages
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="packageCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Packagename">Packagename<% if (page.orderBy == 'Packagename') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Parts">Parts<% if (page.orderBy == 'Parts') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Vin">Vin<% if (page.orderBy == 'Vin') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('vin')) %>">
				<td><%= _.escape(item.get('packagename') || '') %></td>
				<td><%= _.escape(item.get('parts') || '') %></td>
				<td><%= _.escape(item.get('vin') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="packageModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="packagenameInputContainer" class="control-group">
					<label class="control-label" for="packagename">Packagename</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="packagename" placeholder="Packagename" value="<%= _.escape(item.get('packagename') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="partsInputContainer" class="control-group">
					<label class="control-label" for="parts">Parts</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="parts" placeholder="Parts" value="<%= _.escape(item.get('parts') || '') %>">
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
		<form id="deletePackageButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deletePackageButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Package</button>
						<span id="confirmDeletePackageContainer" class="hide">
							<button id="cancelDeletePackageButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeletePackageButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="packageDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Package
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="packageModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="savePackageButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="packageCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newPackageButton" class="btn btn-primary">Add Package</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
