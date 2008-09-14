function ContentDM(host, root){
	this.host = host;
	this.root = root;
	this.url = 'http://' + this.host + this.root + '/cdm_ajax/get.php';
}  

ContentDM.prototype = {
	collectionList: function(handler) {
		jQuery.ajax({ 
			dataType: "json",
			type: 'get',
			success: handler,
			url: this.url,
			data: {
				method: 'dmGetCollectionList'
			}
		});
	},
	
	query: function(options) {
		jQuery.ajax({ 
			dataType: "json",
			type: 'get',
			success: handler,
			url: this.url,
			data: this.merge({ method: 'dmQuery' }, options)
		});
	},
	
	
	merge: function(a, b) {
		var x = [1, 2, 3];
		jQuery.each(b, function(key, value) {
			if(a[key] == undefined)
		  	a[key] = value;
		});
	}
}