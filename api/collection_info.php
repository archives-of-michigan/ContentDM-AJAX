<?
function collection_info($alias) {
  include('get_collections_with_meta_data.php');
  $collections = get_collections_with_meta_data();
  $requested_collection = FALSE;
  foreach($collections as &$item) {
    if($item['alias'] == $alias) {
      $requested_collection = $item;
    }
  }
  
  return $requested_collection;
}
?>