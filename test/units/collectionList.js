// #require '../js/config.js'
// #require '../../js/content_dm.js'

with (jqUnit) {
	module('dmGetCollectionList');
	
	var cdm = new ContentDM();
	
	test('should be successful', function(){
		console.log('should be successful');
		expect(1);
		
		var mock_ajax = new jqMock.Mock(jQuery, "ajax");
		mock_ajax.modify().returnValue({});
		
		ok(cdm.collectionList(function(data){ return true; }));
		
		mock_ajax.restore();
	});
	
	test('should return all collections', function(){
		console.log('should return all collections');
		expect(1);
		
		var result = null;
		
		cdm.collectionList(function(data, status){ 
			result = $.evalJSON(data);
		});
		
		equals(result, 
					 [["CSIO_Stamps","Stamps","/some/path/to/Stamps"],
					  ["CSIO_Star Wars Toys","Star Wars Toys","/some/path/to/Star Wars Toys"],
					  ["CSIO_Coins","Coins","/some/path/to/Coins"],
					  ["CSIO_Train Tickets","Train Tickets","/some/path/to/Train Tickets"]]);
	});
}