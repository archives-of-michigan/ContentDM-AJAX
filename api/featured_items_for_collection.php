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
    $items[$x]['thumbnail'] = "http://haldigitalcollections.cdmhost.com/cgi-bin/thumbnail.exe?CISOROOT=".$items[$x]['collection']."&CISOPTR=".$items[$x]['pointer'];
    $items[$x]['url'] = "http://haldigitalcollections.cdmhost.com/seeking_michigan/discover_item_viewer.php?CISOROOT=".$items[$x]['collection']."&CISOPTR=".$items[$x]['pointer'];
  }
  
  return $items;
}
?>