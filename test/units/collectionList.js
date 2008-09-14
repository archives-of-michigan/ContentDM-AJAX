// #require '../js/config.js'
// #require '../../js/content_dm.js'

with (jqUnit) {
	module('dmGetCollectionList');
	expect(1);

	test('is successful', function(){
		cdm = new ContentDM(environment.config.host);
		ok(cdm.collectionList(function(){ return true; }));
	});
}