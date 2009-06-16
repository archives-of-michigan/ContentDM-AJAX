<?php

function get_item($alias, $itnum) {
  $rc = dmGetItemInfo($alias, $itnum, $xmlbuffer);
  $parser = xml_parser_create();
  xml_parse_into_struct($parser, $xmlbuffer, $structure, $index);
  xml_parser_free($parser);

  $filetype = GetFileExt($structure[$index["FIND"][0]]["value"]);
  $item = array(
    'alias' => $alias, 
    'ptr' => $itnum,
    'title' => $structure[$index["TITLE"][0]]["value"],
    'settings' => get_item_settings($alias, $itnum, $filetype),
    'filetype' => $filetype,
    'thumbnail' => "/cgi-bin/thumbnail.exe?CISOROOT=".$alias."&amp;CISOPTR=".$itnum
  );
  
  return $item;
}

function get_item_settings($alias, $itnum, $filetype) {
  $isthisImage = in_array($filetype, array('gif','jpg','tif','tiff','jp2'));

  if($isthisImage){
    dmGetCollectionImageSettings($alias, $pan_enabled, $minjpegdim, $zoomlevels, $maxderivedimg, $viewer, $docviewer, $compareviewer, $slideshowviewer);
    dmGetImageInfo($alias, $itnum, $filename, $type, $width, $height);

    return array(
      'pan_enabled' => $pan_enabled,
      'width' => $width,
      'height' => $height,
      'thumbnail' => "/cgi-bin/thumbnail.exe?CISOROOT=".$alias."&amp;CISOPTR=".$itnum,
      'full_image' => "/cgi-bin/getimage.exe?CISOROOT=".$alias."&amp;CISOPTR=".$itnum."&amp;DMWIDTH=".$width."&amp;DMHEIGHT=".$height."&amp;DMSCALE=100"
    );
  } else {
    return NULL;
  }
}