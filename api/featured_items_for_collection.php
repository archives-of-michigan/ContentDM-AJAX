<?
function featured_items_for_collection($alias) {
  $params = array(
    array(
      'field' => 'featured',
      'string' => '1',
      'mode' => 'exact'
    )
  );
  $fields = array('Title','Subject','Description','Type');
  $total = 0;
  $items = dmQuery(array($alias), $params, $fields, array('Date'), 50, 1, $total);
  
  foreach($items as $item) {
    switch ($item) {
      case 'Copyprint':
        $item['type'] = 'image';
        $item['src'] = "/cgi-bin/thumbnail.exe?CISOROOT=".$item['collection']."&CISOPTR=".$item['pointer'];
        break;
      case 'MP3':
        $item['type'] = 'audio';
        break;
      default:
        break;
    }
  }
  
  return $items;
}
?>