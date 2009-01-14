<?
function getCollectionsWithMetaData() {
  $collections = dmGetCollectionList();
  foreach($collections as &$item) {
    dmGetCollectionFullResInfo($item['alias'], $enabled, $public, $volprefix, $volsize, $displaysize, $archivesize);
    
    $archive_dimensions = '';
    if($archivesize != '') {
      $size = split('x',$archivesize);
      $archive_dimensions = array('width' => $size[0], 'height' => $size[1]);
    }
    
    $item['full_res_info'] = array(
      'enabled' => $enabled, 
      'public' => $public, 
      'volprefix' => $volprefix, 
      'volsize' => $volsize, 
      'displaysize' => $displaysize, 
      'archivesize' => $archive_dimensions
    );
  }
  return $collections;
}
?>