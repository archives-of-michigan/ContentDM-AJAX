<? # $_POST['command']

$params = array();
foreach(array_keys($_POST) as $param) {
	# echo "Converting: \n".$param.' => "'.$_POST[$param]."\"\n";
	$params[$param] = json_decode($_POST[$param]);
	# echo " to ".$params[$param]."\n\n";
}

if($params['test_stubs']) {
	include('./stubs.php');
}

$results = '';
switch($_POST['command']) {
	case 'dmQuery':
		$total = 0;
		$results = dmQuery($params['alias'], 
											$params['searchstring'], 
											$params['field'],
											$params['sortby'],
											$params['maxrecs'],
											$params['start'],
											$total);
		break;
	case 'dmGetCollectionList':
		$results = dmGetCollectionList();
		break;
	default:
		$results = array( 'error' => 'invalid operation requested: '.$_POST['command'] );
}

echo json_encode($results);
?>