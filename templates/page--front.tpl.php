<?php
/*
 * Front page template
*/
?>

<?php

if ((isset($page['homepage_left']) && !empty($page['homepage_left'])) || (isset($page['homepage_right']) && !empty($page['homepage_right']))) {
  print '<div id="home-content-region" class="wideBox">';
  if (isset($page['homepage_left']) && !empty($page['homepage_left'])) {
    print render($page['homepage_left']);
  }
  if (isset($page['homepage_right']) && !empty($page['homepage_right'])) {
    print render($page['homepage_right']);
  }
  print '</div>';
}
else {
  // @TODO: Remove this else block after the new site goes live!
  // Content removal should prevent this from becoming a problem, but don't forget!
  print views_embed_view('homepage_tiles', 'block');
}

?>
