<?
include('../dmscripts/DMSystem.php');
include('../cdm4/config.php');
include('JSON.php');

$command = $_POST['command'];

$json = new Services_JSON();
$params = $json->decode(stripslashes($_POST['params']));

if($params->test_stubs) {
  include('stubs.php');
}

$results = '';
switch($command) {
  case 'dmQuery':
    include('api/dm_query.php');
    $results = dm_query($params);
    break;
  case 'dmGetCollectionList':
    $results = dmGetCollectionList();
    break;
  case 'get_collections_with_meta_data':
    include('api/get_collections_with_meta_data.php');
    $results = get_collections_with_meta_data();
    break; 
  case 'collection_info':
    include('api/collection_info.php');
    $results = collection_info($params->alias);
    break;
  case 'featured_items_for_collection':
    include('api/featured_items_for_collection.php');
    $results = featured_items_for_collection($params->alias);
    break;
  default:
    $results = array( 'error' => 'invalid operation requested: '.$_POST['command'] );
}

header('Content-Type: application/json');
echo $json->encode($results);
?>