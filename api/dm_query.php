<?
function dm_query($params) {
  $total = 0;
    
  // convert searchstring params to array from stdClass (limitation of JSON parser)
  $parsed_search = array();
  if($params->searchstring) {
    foreach($params->searchstring as $search) {
      $search_array = array();
    
      $search_array['field'] = $search->field;
      $search_array['string'] = $search->string;
      $search_array['mode'] = $search->mode;
    
      $parsed_search[] = $search_array;
    }
  }
  
  $results = dmQuery($params->alias, 
                    $parsed_search, 
                    $params->field,
                    $params->sortby,
                    $params->maxrecs,
                    $params->start,
                    $total);
  
  $items = array();
  foreach($results as $result) {
    $items[] = get_item($result['collection'],$result['pointer']);
  }
  
  return array('items' => $items, 'total_num' => $total);
}
?>