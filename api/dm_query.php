<?
function dm_query($params) {
  $total = 0;
    
  // convert searchstring params to array from stdClass (limitation of JSON parser)
  $parsed_search = array();
  foreach($params->searchstring as $search) {
    $search_array = array();
    
    $search_array['field'] = $search->field;
    $search_array['string'] = $search->string;
    $search_array['mode'] = $search->mode;
    
    $parsed_search[] = $search_array;
  }
  
  $results = dmQuery($params->alias, 
                    $parsed_search, 
                    $params->field,
                    $params->sortby,
                    $params->maxrecs,
                    $params->start,
                    $total);
}
?>