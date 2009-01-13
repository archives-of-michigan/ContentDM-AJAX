<?
function getCollectionsWithMetaData() {
  $collections = dmGetCollectionList();
  foreach($collections as &$item) {
    $image_settings = dmGetCollectionFullResInfo($item['alias'], $enabled, $public, $volprefix, $volsize, $displaysize, $archivesize);
    $item['full_res_info'] = array({
      'enabled' => $enabled, 
      'public' => $public, 
      'volprefix' => $volprefix, 
      'volsize' => $volsize, 
      'displaysize' => $displaysize, 
      'archivesize' => $archivesize
    });
  }
  return $collections;
}
?>