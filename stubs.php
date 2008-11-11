<?
function dmGetCollectionList(){
	$collections = array();
	
	foreach(array('Stamps','Star Wars Toys','Coins','Train Tickets') as $collection){
		array_push($collections,
			array('CSIO_'.$collection,
						$collection,
						'/some/path/to/'.$collection));
	}
	
	return json_encode($collections);
}

function dmQuery($alias, $searchstring, $fields, $sortby, $maxrecs, $start, $total){
	$results = array();
	
	for($i = $start; $i < $start + $maxrecs; $i = $i + 1) {
		$field_data = array();
		for($f = 0; $f < count($fields); $f = $f + 1){
			$field_data[$fields[$f]] = $f;
		}
		array_push($results, array($alias, $i, 'test', $field_data));
	}
	
	return $results;
}
?>