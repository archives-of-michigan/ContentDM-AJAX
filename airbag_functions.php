<?
function all_featured_items() {
  dmQuery('CISOSEARCHALL', 
          $params['searchstring'], 
          $params['field'],
          $params['sortby'],
          $params['maxrecs'],
          $params['start'],
          $total);
}

function featured_items_for_collection($collection) {
  dmQuery($collection, 'true', 'featured',
          $params['sortby'],
          $params['maxrecs'],
          $params['start'],
          $total);
}
?>