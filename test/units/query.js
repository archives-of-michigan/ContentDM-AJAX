// #require '../js/config.js'
// #require '../../js/content_dm.js'

with (jqUnit) {
	module('query');
	expect(1);

	test('is successful', function(){
		cdm = new ContentDM(environment.config.host);
		ok(cdm.query(function(){ true; }));
	});
}