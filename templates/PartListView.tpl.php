<?php
	$this->assign('title','Car Reliability-inator  | Parts');
	$this->assign('nav','parts');

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
	.script("scripts/app/parts.js").wait(function(){
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
	<i class="icon-th-list"></i> Parts
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="partCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Make">Make<% if (page.orderBy == 'Make') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Model">Model<% if (page.orderBy == 'Model') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Partno">Partno<% if (page.orderBy == 'Partno') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Partname">Partname<% if (page.orderBy == 'Partname') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Price">Price<% if (page.orderBy == 'Price') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('partno')) %>">
				<td><%= _.escape(item.get('make') || '') %></td>
				<td><%= _.escape(item.get('model') || '') %></td>
				<td><%= _.escape(item.get('partno') || '') %></td>
				<td><%= _.escape(item.get('partname') || '') %></td>
				<td><%= _.escape(item.get('price') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="partModelTemplate">
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
				<div id="partnoInputContainer" class="control-group">
					<label class="control-label" for="partno">Partno</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="partno" placeholder="Partno" value="<%= _.escape(item.get('partno') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="partnameInputContainer" class="control-group">
					<label class="control-label" for="partname">Partname</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="partname" placeholder="Partname" value="<%= _.escape(item.get('partname') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="priceInputContainer" class="control-group">
					<label class="control-label" for="price">Price</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="price" placeholder="Price" value="<%= _.escape(item.get('price') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deletePartButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deletePartButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Part</button>
						<span id="confirmDeletePartContainer" class="hide">
							<button id="cancelDeletePartButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeletePartButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="partDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Part
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="partModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="savePartButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="partCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newPartButton" class="btn btn-primary">Add Part</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
