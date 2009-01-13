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
    $total = 0;
    $results = dmQuery($params->alias, 
                      $params->searchstring, 
                      $params->field,
                      $params->sortby,
                      $params->maxrecs,
                      $params->start,
                      $total);
    break;
  case 'dmGetCollectionList':
    $results = dmGetCollectionList();
    break;
  case 'getCollectionsWithMetaData':
    include('api/getCollectionsWithMetaData.php');
    $results = getCollectionsWithMetaData();
    break; 
  default:
    $results = array( 'error' => 'invalid operation requested: '.$_POST['command'] );
}

echo $json->encode($results);
?>