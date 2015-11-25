<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<?php foreach ($fields as $id => $field): ?>

  <?php
  if (($id == 'field_tile_link_to') && !empty($field->content)) {
    $node_link = new SimpleXMLElement($field->content);
    $href = $node_link->a[0]['href'];
    $link = $field->content;
  }
  if (($id == 'field_tile_image') && !empty($field->content)) {
    $img_link = new SimpleXMLElement($field->content);
    $src = $img_link->img[0]['src'];
  }
  if (($id == 'title') && !empty($field->raw)) {
    $title_raw = $field->raw;
  }
  if (($id == 'body') && !empty($field->content)) {
    $body_rendered = $field->content;
  }
  ?>

<?php endforeach;
  if (isset($src) && !empty($src)) :
?>
  <div id="<?php print preg_replace('@[^a-z0-9-]+@','-', strtolower($title_raw));?>" class="box" style="background: url('<?php print $src;?>') no-repeat; background-size: cover;">
    <div class="corner"></div>
    <div class="banner-item">
      <h2>
        <a href="<?php print $href;?>"><?php print $title_raw;?></a>
      </h2>
      <h4>
        <?php print $link;?>
      </h4>
    </div>
  </div>
<?php elseif  (isset($body_rendered) && !empty($body_rendered)) :?>
  <div id="<?php print preg_replace('@[^a-z0-9-]+@','-', strtolower($title_raw));?>" class="box home-box">
    <div class="corner"></div>
    <h2>
      <?php print $title_raw;?>
    </h2>
    <div id="home-latest-news">
      <?php
      if (strtolower($title_raw) == strtolower(theme_get_setting('fwbc_homepage_news_block_title'))) {
        $latest_news_block = module_invoke('views', 'block_view', 'home_latest_news-block');
        print render($latest_news_block["content"]);
      }
      ?>
    </div>
    <?php print $body_rendered;?>
  </div>
<?php endif; ?>