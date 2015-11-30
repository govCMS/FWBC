<?php

/**
 * @file
 * Rewrite search results title.
 */

$nid = $row->entity;
$node = node_load($nid);
print l($node->title, drupal_get_path_alias('node/' . $node->nid));
