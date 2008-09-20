// #require '../../js/content_dm.js'

with (jqUnit) {
	module('merge');
	
	var cdm = new ContentDM('localhost');
	
	test('first', function(){ ok(true); });

	test('successful if a is empty', function(){
		expect(1);
		
		ok(cdm.merge({}, { foo: 'bar' }));
	});
	
	test('returns contents of b if a is empty', function(){
		expect(1);
		
		isObj({ foo: 'bar' }, cdm.merge({}, { foo: 'bar' }));
	});
	
	test('returns contents of a if b is empty', function(){
		expect(1);
		
		isObj({ foo: 'bar' }, cdm.merge({ foo: 'bar' }, {}));
	});
	
	test('returns contents of a merged with b', function(){
		expect(1);
		
		isObj({ foo: 'bar', james: 'bond' }, cdm.merge({ foo: 'bar' }, { james: 'bond' }));
	});

	test('does not overwrite contents of a with b', function(){
		expect(1);

		isObj({ foo: 'bar' }, cdm.merge({ foo: 'bar' }, { foo: 'baz' }));
	});
}