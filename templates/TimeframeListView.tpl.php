<?php
	$this->assign('title','Car Reliability-inator  | Timeframes');
	$this->assign('nav','timeframes');

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
	.script("scripts/app/timeframes.js").wait(function(){
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
	<i class="icon-th-list"></i> Timeframes
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="timeframeCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Time">Time<% if (page.orderBy == 'Time') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Vin">Vin<% if (page.orderBy == 'Vin') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('vin')) %>">
				<td><%= _.escape(item.get('time') || '') %></td>
				<td><%= _.escape(item.get('vin') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="timeframeModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="timeInputContainer" class="control-group">
					<label class="control-label" for="time">Time</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="time" placeholder="Time" value="<%= _.escape(item.get('time') || '') %>">
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
		<form id="deleteTimeframeButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteTimeframeButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Timeframe</button>
						<span id="confirmDeleteTimeframeContainer" class="hide">
							<button id="cancelDeleteTimeframeButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteTimeframeButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="timeframeDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Timeframe
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="timeframeModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveTimeframeButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="timeframeCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newTimeframeButton" class="btn btn-primary">Add Timeframe</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
