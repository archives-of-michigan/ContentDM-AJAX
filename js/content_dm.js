//document.domain = environment.host; //'haldigitalcollections.cdmhost.com'; //environment.host; 

function ContentDM(host, root) {
	this.host = host;
	this.root = root;

	this.last_method_result = null;
	this.method_status = false;
}
ContentDM.prototype = {

	callMethod: function(handler, failure, options) {
		var onFail = failure ||
			function(){
				alert("Could not fetch list of collections from the server.  Please contact an administrator.");
			};
		var onSuccess = handler ||
			function(data, status) {
				$('#cdm').innerHtml = data;
			};
		
		if(environment.config.test_stubs)
			options = this.merge(options, { test_stubs: true });
			
		jQuery.ajax(this.merge(options,
			{ 
				dataType: 'jsonp',
				type: 'post',
				success: onSuccess,
				error: onFail,
				url: this.url(),
				cache: true,
				async: true  // TODO (handler != null)
		}));
		
		//TODO - return results immediately (block and wait for results when async: false)
		//if(handler) {
		//} else {
		//	return new Result(this.results, this.status);
		//}
		return true;
	},

	collectionList: function(handler, failure) {
		return this.callMethod(handler, failure, { 
			data: {
				command: 'dmGetCollectionList'
			}
		});
	},

	query: function(options, handler, failure) {
		return this.callMethod(handler, failure, this.merge(options, { 
			data: {
				command: 'dmQuery'
			}
		}));
	},


	merge: function(a, b) {
		var merged = a;
		jQuery.each(b, function(key, value) {
			if(merged[key] == undefined)
		  	merged[key] = value;
		});
		return merged;
	},


	url: function() {
		return 'http://' + environment.config.host + environment.config.path;
	}
};

ContentDM.prototype.Result = function(data, status){
	this.data = data;
	this.status = status;
};