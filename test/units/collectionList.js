// #require '../js/config.js'
// #require '../../js/content_dm.js'

with (jqUnit) {
	module('dmGetCollectionList');
	
	var cdm = new ContentDM(environment.config.host);
	
	test('should be successful', function(){
		expect(1);
		
		var mock_ajax = new jqMock.Mock(jQuery, "ajax");
		mock_ajax.modify().returnValue({});
		
		ok(cdm.collectionList(function(data){ return true; }));
		
		mock_ajax.restore();
	});
	
	test('should return all collections', function(){
		expect(1);
		
		cdm.collectionList(function(data, status){ 
			isObj({
				foo: 'bar'
			},
			data); 
		});
	});
}