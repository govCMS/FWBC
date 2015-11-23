<?php

/**
 * @file
 * GovCMS theme - panel layout.
 */

?>

<div class="gov-front-layout clearfix" <?php if (!empty($css_id)) : print "id=\"$css_id\""; endif; ?>>
  <?php if (!empty($content['main'])) : ?>
    <?php print $content['main']; ?>
  <?php endif; ?>

  <div class="clear"></div>

  <div class="box">
    <?php if (!empty($content['left'])) : ?>
      <?php print $content['left']; ?>
    <?php endif; ?>
  </div>

  <div class="box home-box">
    <?php if (!empty($content['middle'])) : ?>
      <?php print $content['middle']; ?>
    <?php endif; ?>
  </div>

  <div class="box">
    <?php if (!empty($content['right'])) : ?>
      <?php print $content['right']; ?>
    <?php endif; ?>
  </div>

  <div class="clear"></div>
</div>
