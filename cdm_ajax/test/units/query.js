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
	
	test('it should query all collections', function(){
		expect(1);
		
		cdm = new ContentDM(environment.config.host);
		
		results = cdm.query({ alias: 'CSIOSEARCHALL', 
							 						searchstring: {
														field: 'Subject',
														string: 'governors',
														mode: 'any' }});
		isObj({
			something: 'cool'
		},results)
	});
	test('it should query a single collection');
	test('it should return specified fields');
	test('it should sort by a given field');
	test('it should show N records at a time');
	test('it should start search results at record N');
}