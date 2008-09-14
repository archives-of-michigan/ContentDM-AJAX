// #require '../../js/content_dm.js'

with (jqUnit) {
	module('merge');
	expect(2);

	test('successful if a is empty', function(){
		cdm = new ContentDM('localhost');
		ok(cdm.merge({}, { foo: 'bar' }));
	});
	test('contents of b if a is empty', function(){
		cdm = new ContentDM('localhost');
		equals({ foo: 'bar' }, cdm.merge({}, { foo: 'bar' }));
	});
}