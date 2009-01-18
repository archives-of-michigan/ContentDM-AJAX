<?
function collectionInfo($alias) {
  include('getCollectionsWithMetaData.php');
  $collections = getCollectionsWithMetaData();
  $requested_collection = FALSE;
  foreach($collections as &$item) {
    if($item['alias'] == $alias) {
      $requested_collection = $item;
    }
  }
  
  return $requested_collection;
}
?>