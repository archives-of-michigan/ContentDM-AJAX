<?
function featured_items_for_collection($alias) {
  $params = array(
    array(
      'field' => 'featur',
      'string' => '1',
      'mode' => 'exact'
    )
  );
  $fields = array('Title','Subject','descri','Format','Type','formab');
  $total = 0;
  $items = dmQuery(array($alias), $params, $fields, array('Date'), 50, 1, $total);
  
  for($x = 0; $x < count($items); $x++) {
    // $items[$x]['debug'] = var_export($items[$x]);
    if(preg_match('/image/i',$items[$x]['formab']) > 0) {
      $items[$x]['content_type'] = 'image';
      $items[$x]['src'] = "http://haldigitalcollections.cdmhost.com/cgi-bin/thumbnail.exe?CISOROOT=".$items[$x]['collection']."&CISOPTR=".$items[$x]['pointer'];
      $items[$x]['url'] = "http://haldigitalcollections.cdmhost.com/seeking_michigan/discover_item_viewer.php?CISOROOT=".$items[$x]['collection']."&CISOPTR=".$items[$x]['pointer']."&CISOBOX=1&REC=1";
    } elseif(preg_match('/audio/i',$items[$x]['formab']) > 0) {
      $items[$x]['content_type'] = 'audio';
      $items[$x]['url'] = "http://haldigitalcollections.cdmhost.com/seeking_michigan/discover_item_viewer.php?CISOROOT=".$items[$x]['collection']."&CISOPTR=".$items[$x]['pointer']."&CISOBOX=1&REC=1";
    } else {
      $items[$x]['url'] = "http://haldigitalcollections.cdmhost.com/seeking_michigan/discover_item_viewer.php?CISOROOT=".$items[$x]['collection']."&CISOPTR=".$items[$x]['pointer']."&CISOBOX=1&REC=1";
    }
  }
  
  return $items;
}
?>