/**
 * backbone model definitions for Car Reliability-inator 
 */

/**
 * Use emulated HTTP if the server doesn't support PUT/DELETE or application/json requests
 */
Backbone.emulateHTTP = false;
Backbone.emulateJSON = false

var model = {};

/**
 * long polling duration in miliseconds.  (5000 = recommended, 0 = disabled)
 * warning: setting this to a low number will increase server load
 */
model.longPollDuration = 0;

/**
 * whether to refresh the collection immediately after a model is updated
 */
model.reloadCollectionOnModelUpdate = true;


/**
 * a default sort method for sorting collection items.  this will sort the collection
 * based on the orderBy and orderDesc property that was used on the last fetch call
 * to the server. 
 */
model.AbstractCollection = Backbone.Collection.extend({
	totalResults: 0,
	totalPages: 0,
	currentPage: 0,
	pageSize: 0,
	orderBy: '',
	orderDesc: false,
	lastResponseText: null,
	lastRequestParams: null,
	collectionHasChanged: true,
	
	/**
	 * fetch the collection from the server using the same options and 
	 * parameters as the previous fetch
	 */
	refetch: function() {
		this.fetch({ data: this.lastRequestParams })
	},
	
	/* uncomment to debug fetch event triggers
	fetch: function(options) {         
            this.constructor.__super__.fetch.apply(this, arguments);
	},
	// */
	
	/**
	 * client-side sorting baesd on the orderBy and orderDesc parameters that
	 * were used to fetch the data from the server.  Backbone ignores the
	 * order of records coming from the server so we have to sort them ourselves
	 */
	comparator: function(a,b) {
		
		var result = 0;
		var options = this.lastRequestParams;
		
		if (options && options.orderBy) {
			
			// lcase the first letter of the property name
			var propName = options.orderBy.charAt(0).toLowerCase() + options.orderBy.slice(1);
			var aVal = a.get(propName);
			var bVal = b.get(propName);
			
			if (isNaN(aVal) || isNaN(bVal)) {
				// treat comparison as case-insensitive strings
				aVal = aVal ? aVal.toLowerCase() : '';
				bVal = bVal ? bVal.toLowerCase() : '';
			}
			else {
				// treat comparision as a number
				aVal = Number(aVal);
				bVal = Number(bVal);
			}
			
			if (aVal < bVal) {
				result = options.orderDesc ? 1 : -1;
			}
			else if (aVal > bVal) {
				result = options.orderDesc ? -1 : 1;
			}

		}
		
		return result;

	},
	/**
	 * override parse to track changes and handle pagination
	 * if the server call has returned page data
	 */
	parse: function(response, options) {

		// the response is already decoded into object form, but it's easier to
		// compary the stringified version.  some earlier versions of backbone did
		// not include the raw response so there is some legacy support here
		var responseText = options && options.xhr ? options.xhr.responseText : JSON.stringify(response);
		this.collectionHasChanged = (this.lastResponseText != responseText);
		this.lastRequestParams = options ? options.data : undefined;
		
		// if the collection has changed then we need to force a re-sort because backbone will
		// only resort the data if a property in the model has changed
		if (this.lastResponseText && this.collectionHasChanged) this.sort({ silent:true });
		
		this.lastResponseText = responseText;
		
		var rows;

		if (response.currentPage)
		{
			rows = response.rows;
			this.totalResults = response.totalResults;
			this.totalPages = response.totalPages;
			this.currentPage = response.currentPage;
			this.pageSize = response.pageSize;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}
		else
		{
			rows = response;
			this.totalResults = rows.length;
			this.totalPages = 1;
			this.currentPage = 1;
			this.pageSize = this.totalResults;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}

		return rows;
	}
});

/**
 * Accessory Backbone Model
 */
model.AccessoryModel = Backbone.Model.extend({
	urlRoot: 'api/accessory',
	idAttribute: 'accessoryid',
	model: '',
	packagename: '',
	accessoryid: '',
	defaults: {
		'model': '',
		'packagename': '',
		'accessoryid': null
	}
});

/**
 * Accessory Backbone Collection
 */
model.AccessoryCollection = model.AbstractCollection.extend({
	url: 'api/accessories',
	model: model.AccessoryModel
});

/**
 * Carinstance Backbone Model
 */
model.CarinstanceModel = Backbone.Model.extend({
	urlRoot: 'api/carinstance',
	idAttribute: 'vin',
	vin: '',
	mileage: '',
	color: '',
	make: '',
	model: '',
	repairs: '',
	package: '',
	maintenance: '',
	type: '',
	mpg: '',
	conditions: '',
	powertrain: '',
	defaults: {
		'vin': null,
		'mileage': '',
		'color': '',
		'make': '',
		'model': '',
		'repairs': '',
		'package': '',
		'maintenance': '',
		'type': '',
		'mpg': '',
		'conditions': '',
		'powertrain': ''
	}
});

/**
 * Carinstance Backbone Collection
 */
model.CarinstanceCollection = model.AbstractCollection.extend({
	url: 'api/carinstances',
	model: model.CarinstanceModel
});

/**
 * Condition Backbone Model
 */
model.ConditionModel = Backbone.Model.extend({
	urlRoot: 'api/condition',
	idAttribute: 'vin',
	car: '',
	mileagebracket: '',
	conditiontype: '',
	vin: '',
	defaults: {
		'car': '',
		'mileagebracket': '',
		'conditiontype': '',
		'vin': null
	}
});

/**
 * Condition Backbone Collection
 */
model.ConditionCollection = model.AbstractCollection.extend({
	url: 'api/conditions',
	model: model.ConditionModel
});

/**
 * Make Backbone Model
 */
model.MakeModel = Backbone.Model.extend({
	urlRoot: 'api/make',
	idAttribute: 'vin',
	model: '',
	reviews: '',
	makename: '',
	vin: '',
	defaults: {
		'model': '',
		'reviews': '',
		'makename': '',
		'vin': null
	}
});

/**
 * Make Backbone Collection
 */
model.MakeCollection = model.AbstractCollection.extend({
	url: 'api/makes',
	model: model.MakeModel
});

/**
 * Mileagebracket Backbone Model
 */
model.MileagebracketModel = Backbone.Model.extend({
	urlRoot: 'api/mileagebracket',
	idAttribute: 'vin',
	car: '',
	bracketname: '',
	vin: '',
	defaults: {
		'car': '',
		'bracketname': '',
		'vin': null
	}
});

/**
 * Mileagebracket Backbone Collection
 */
model.MileagebracketCollection = model.AbstractCollection.extend({
	url: 'api/mileagebrackets',
	model: model.MileagebracketModel
});

/**
 * Package Backbone Model
 */
model.PackageModel = Backbone.Model.extend({
	urlRoot: 'api/package',
	idAttribute: 'vin',
	packagename: '',
	parts: '',
	vin: '',
	defaults: {
		'packagename': '',
		'parts': '',
		'vin': null
	}
});

/**
 * Package Backbone Collection
 */
model.PackageCollection = model.AbstractCollection.extend({
	url: 'api/packages',
	model: model.PackageModel
});

/**
 * Part Backbone Model
 */
model.PartModel = Backbone.Model.extend({
	urlRoot: 'api/part',
	idAttribute: 'partno',
	make: '',
	model: '',
	partno: '',
	partname: '',
	price: '',
	defaults: {
		'make': '',
		'model': '',
		'partno': null,
		'partname': '',
		'price': ''
	}
});

/**
 * Part Backbone Collection
 */
model.PartCollection = model.AbstractCollection.extend({
	url: 'api/parts',
	model: model.PartModel
});

/**
 * Powertrain Backbone Model
 */
model.PowertrainModel = Backbone.Model.extend({
	urlRoot: 'api/powertrain',
	idAttribute: 'vin',
	make: '',
	model: '',
	engine: '',
	transtype: '',
	drivetrain: '',
	vin: '',
	defaults: {
		'make': '',
		'model': '',
		'engine': '',
		'transtype': '',
		'drivetrain': '',
		'vin': null
	}
});

/**
 * Powertrain Backbone Collection
 */
model.PowertrainCollection = model.AbstractCollection.extend({
	url: 'api/powertrains',
	model: model.PowertrainModel
});

/**
 * Repair Backbone Model
 */
model.RepairModel = Backbone.Model.extend({
	urlRoot: 'api/repair',
	idAttribute: 'vin',
	type: '',
	timeframe: '',
	parts: '',
	vin: '',
	defaults: {
		'type': '',
		'timeframe': '',
		'parts': '',
		'vin': null
	}
});

/**
 * Repair Backbone Collection
 */
model.RepairCollection = model.AbstractCollection.extend({
	url: 'api/repairs',
	model: model.RepairModel
});

/**
 * Timeframe Backbone Model
 */
model.TimeframeModel = Backbone.Model.extend({
	urlRoot: 'api/timeframe',
	idAttribute: 'vin',
	time: '',
	vin: '',
	defaults: {
		'time': '',
		'vin': null
	}
});

/**
 * Timeframe Backbone Collection
 */
model.TimeframeCollection = model.AbstractCollection.extend({
	url: 'api/timeframes',
	model: model.TimeframeModel
});

/**
 * Mpg Backbone Model
 */
model.MpgModel = Backbone.Model.extend({
	urlRoot: 'api/mpg',
	idAttribute: 'vin',
	car: '',
	mpgamount: '',
	typeofmiles: '',
	vin: '',
	defaults: {
		'car': '',
		'mpgamount': '',
		'typeofmiles': '',
		'vin': null
	}
});

/**
 * Mpg Backbone Collection
 */
model.MpgCollection = model.AbstractCollection.extend({
	url: 'api/mpgs',
	model: model.MpgModel
});

/**
 * User Backbone Model
 */
model.UserModel = Backbone.Model.extend({
	urlRoot: 'api/user',
	idAttribute: 'userid',
	userid: '',
	name: '',
	email: '',
	username: '',
	defaults: {
		'userid': null,
		'name': '',
		'email': '',
		'username': ''
	}
});

/**
 * User Backbone Collection
 */
model.UserCollection = model.AbstractCollection.extend({
	url: 'api/users',
	model: model.UserModel
});

