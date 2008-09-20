// #require '../js/config.js'
// #require '../../js/content_dm.js'

with (jqUnit) {
	module('query');
	
	var mock_ajax = new jqMock.Mock(jQuery, "ajax");
	mock_ajax.modify().returnValue({});

	test('is successful', function(){
		expect(1);
		
		cdm = new ContentDM(environment.config.host);
		ok(cdm.query({ }, function(){ true; }));
	});
}