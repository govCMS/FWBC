<?php
// $Id: template.php,v 1.2.2.2 2009/04/25 06:19:22 hswong3i Exp $

/**
 * Return a themed mission trail.
 *
 * @return
 *   a string containing the mission output, or execute PHP code snippet if
 *   mission is enclosed with <?php .
 */

// page template by alias
function fwbc_process_page(&$vars)
{
  $ruri = request_uri();
  if (strpos($ruri, '?')) {
    $ruri = substr($ruri, 0, strpos($ruri, '?'));
  }
  $alias = explode('/', drupal_get_path_alias($ruri));
  $page_alias = $alias[count($alias) - 1];
  if (!strlen($page_alias)) {
    $page_alias = $alias[count($alias) - 2];
  }
  $page_alias = str_replace('-', '_', $page_alias);
  // if single article, newsletter
  if (isset($vars['node'])) {
    $sptypes = array('article', 'newsletter', 'newsletter_section', 'legal_case', 'abcc_legal_case', 'legal_case_new', 'submission');
    if (in_array($vars['node']->type, $sptypes)) {
      $page_alias = 'single_' . $vars['node']->type;
    } else if ($vars['node']->nid == theme_get_setting('fwbc_newsletters_page')) {
      $page_alias = 'newsletters';
    } else if (@$vars['node']->book) {
      if ($vars['node']->book["mlid"] != $vars['node']->book["p1"]) {
        $pnid = fwbc_get_nid_by_mlid($vars['node']->book["p1"]);
        if ($pnid == theme_get_setting('fwbc_language_assitance_page')) {
          $page_alias = 'single_language_assitance';
        }
      }
    }
    $is_landing = fwbc_get_post_custom($vars['node'], 'field_landing_page');
    if ($is_landing) { // landing page
      $page_alias = 'landing_page';
    }
    $page_template = fwbc_get_post_custom($vars['node'], 'field_template');
    if (strlen($page_template)) {
      $page_alias = $page_template;
    }
  }
  $vars['theme_hook_suggestions'][] = 'page__' . $page_alias;
}

function fwbc_home_url()
{
  global $base_url;
  return $base_url . '/';
}

function fwbc_page_url($path)
{
  global $base_root;
  $page_url = $base_root . url($path);
  if (substr($page_url, -1) != '/') {
    $page_url .= '/';
  }
  return $page_url;
}

function fwbc_theme_url($echo = true)
{
  global $base_url, $theme_path;
  if ($echo) {
    echo $base_url . '/' . $theme_path;
  } else {
    return $base_url . '/' . $theme_path;
  }
}

function fwbc_the_main_menu()
{
  $menu_html = '';
  $menu_tree = menu_tree_all_data('menu-site-main-menu');
  if (count($menu_tree)) {
    $ul_li_class = ' class="first"';
    $menu_nmb = count($menu_tree);
    $menu_html = '<ul id="mainMenu">' . chr(10);
    $menu_html .= '<li id="home"' . $ul_li_class . '><div><a href="/"><span class="hidden">Home</span></a></div></li>';
    foreach ($menu_tree as $menu_item) {
      if ($menu_item['link']['hidden'] == 0) {
        $menu_html .= '<li' . $ul_li_class . '><div>' . l($menu_item['link']['link_title'], $menu_item['link']['link_path']);
        if (count($menu_item['below'])) {
          $menu_html .= chr(10) . '<ul>' . chr(10);
          foreach ($menu_item['below'] as $submenu_item) {
            if ($submenu_item['link']['hidden'] == 0) {
              $menu_html .= '<li>' . l($submenu_item['link']['link_title'], $submenu_item['link']['link_path']) . '</li>' . chr(10);
            }
          }
          $menu_html .= '</ul>' . chr(10);
        }
        $menu_html .= '</div></li>' . chr(10);
        $ul_li_class = '';
        $menu_nmb--;
        if ($menu_nmb == 1) {
          $ul_li_class = ' class="last"';
        }
      }
    }
    $menu_html .= '</ul>' . chr(10);
  }
  echo $menu_html;
}

function fwbc_the_footer_menu($menu_delta, $menu_params = array(), $lisep = '')
{
  return;
  $menu_html = '';
  $menu_tree = menu_tree_all_data($menu_delta);
  if (count($menu_tree)) {
    $ul_li_class = ' class="first"';
    $first = 1;
    $menu_lisep = '';
    $menu_nmb = count($menu_tree);
    $menu_html = '<div';
    if (count($menu_params)) {
      foreach ($menu_params as $mpk => $mpv) {
        $menu_html .= ' ' . $mpk . '="' . $mpv . '"';
      }
    }
    $menu_html .= '>' . chr(10);
    foreach ($menu_tree as $menu_item) {
      if ($first) {
        $menu_html .= '<h2>' . l($menu_item['link']['link_title'], $menu_item['link']['link_path']) . '</h2><ul>';
        $first = '';
        $menu_nmb--;
        continue;
      }
      $menu_html .= '<li' . $ul_li_class . '>' . $menu_lisep . l($menu_item['link']['link_title'], $menu_item['link']['link_path']);
      if (count($menu_item['below'])) {
        $menu_html .= chr(10) . '<ul>' . chr(10);
        foreach ($menu_item['below'] as $submenu_item) {
          $menu_html .= '<li>' . l($submenu_item['link']['link_title'], $submenu_item['link']['link_path']) . '</li>' . chr(10);
        }
        $menu_html .= '</ul>' . chr(10);
      }
      $menu_html .= '</li>' . chr(10);
      $ul_li_class = '';
      $menu_nmb--;
      if ($menu_nmb == 1) {
        $ul_li_class = ' class="last"';
      }
      if (strlen($lisep)) {
        $menu_lisep = $lisep;
      }
    }
    $menu_html .= '</ul></div>' . chr(10);
  }
  echo $menu_html;
}

function fwbc_the_menu($menu_delta, $menu_params = array(), $lisep = '')
{
  $menu_html = '';
  $menu_tree = menu_tree_all_data($menu_delta);
  if (count($menu_tree)) {
    $ul_li_class = ' class="first"';
    $menu_lisep = '';
    $menu_nmb = count($menu_tree);
    $menu_html = '<ul';
    if (count($menu_params)) {
      foreach ($menu_params as $mpk => $mpv) {
        $menu_html .= ' ' . $mpk . '="' . $mpv . '"';
      }
    }
    $menu_html .= '>' . chr(10);
    foreach ($menu_tree as $menu_item) {
      $menu_html .= '<li' . $ul_li_class . '>' . $menu_lisep . l($menu_item['link']['link_title'], $menu_item['link']['link_path']);
      if (count($menu_item['below'])) {
        $menu_html .= chr(10) . '<ul>' . chr(10);
        foreach ($menu_item['below'] as $submenu_item) {
          $menu_html .= '<li>' . l($submenu_item['link']['link_title'], $submenu_item['link']['link_path']) . '</li>' . chr(10);
        }
        $menu_html .= '</ul>' . chr(10);
      }
      $menu_html .= '</li>' . chr(10);
      $ul_li_class = '';
      $menu_nmb--;
      if ($menu_nmb == 1) {
        $ul_li_class = ' class="last"';
      }
      if (strlen($lisep)) {
        $menu_lisep = $lisep;
      }
    }
    $menu_html .= '</ul>' . chr(10);
  }
  echo $menu_html;
}

function fwbc_the_block($bl, $show_title = true)
{
  if ($bl === 0) {
    return;
  }
  $block_slug = 'block_' . $bl;
  $block_content = _block_render_blocks(array(block_load('block', $bl)));
  if ($show_title) {
    echo '<h2>' . $block_content[$block_slug]->title . '</h2>';
  }
  echo render($block_content[$block_slug]->content);
}

function fwbc_get_post_added($submitted)
{
  $submitted = substr($submitted, strpos($submitted, 'on ') + 3);
  $submitted = substr($submitted, 0, strpos($submitted, ' -'));
  return $submitted;
}

function fwbc_get_post_term($node, $type)
{
  $post_categories = field_view_field('node', $node, $type);
  return $post_categories['#items'][0]['taxonomy_term']->name;
}

function fwbc_get_post_custom($node, $field, $val = 'value')
{
  $custom_field = @$node->$field;
  return @$custom_field['und'][0][$val];
}

function fwbc_get_page_type($vars)
{
  $node_data = $vars['node'];
  $ntype = $node_data->type;
  $ntypes = array(
    theme_get_setting('fwbc_search_page') => 'search_view',
    theme_get_setting('fwbc_latest_news_page') => 'latest_news',
    theme_get_setting('fwbc_newsletters_page') => 'newsletters',
    theme_get_setting('fwbc_legal_cases_page') => 'legal_cases',
    theme_get_setting('fwbc_submissions_page') => 'submissions',
    theme_get_setting('fwbc_faqs_page') => 'faqs',
    theme_get_setting('fwbc_language_assitance_page') => 'language_assitance'
  );
  if (isset($ntypes[$node_data->nid])) {
    $ntype = $ntypes[$node_data->nid];
  } else if (@$node_data->book) {
    if ($node_data->book["mlid"] != $node_data->book["p1"]) {
      $pnid = fwbc_get_nid_by_mlid($node_data->book["p1"]);
      $pntypes = array(
        theme_get_setting('fwbc_language_assitance_page') => 'language_assitance',
        theme_get_setting('fwbc_faqs_page') => 'faqs'
      );
      if (isset($pntypes[$pnid])) {
        $ntype = $pntypes[$pnid];
      }
    }
  }

  return $ntype;
}

function fwbc_get_node_type($vars)
{
  $node = $vars['node'];
  $ntype = $node->type;
  $vview = @$vars['view'];
  if ($vview) {
    $ntype = $vview->name;
  } else if ($node->vid == theme_get_setting('fwbc_newsletters_page')) {
    $ntype = 'newsletters';
  }
  return $ntype;
}

function fwbc_get_list_page($type)
{
  $list_page = false;
  switch ($type) {
    case "article":
      $list_page = theme_get_setting('fwbc_latest_news_page');
      break;
    case "legal_case":
      $list_page = theme_get_setting('fwbc_legal_cases_page');
      break;
    case "submission":
      $list_page = theme_get_setting('fwbc_submissions_page');
      break;
  }
  return $list_page;
}

function fwbc_get_node_parents($nid)
{
  $pid = 0;
  $node_data = node_load($nid);
  $list_page = fwbc_get_list_page($node_data->type);
  if ($list_page) {
    $node_data = node_load($list_page);
    if ($node_data->book) {
      $pid = $node_data->book['mlid'];
    }
  } else {
    if (@$node_data->book) {
      $pid = $node_data->book['plid'];
    }
  }
  return fwbc_get_parents($pid);
}

function fwbc_get_parents($mlid, $pars = '')
{
  $parents = false;
  if ($mlid > 0) {
    $result = db_query("SELECT l.plid, b.nid FROM {menu_links} l LEFT JOIN {book} b ON b.mlid = l.mlid WHERE l.mlid = '" . $mlid . "'")->fetchObject();
    $node_data = node_load($result->nid);
    if ($node_data) {
      if (strlen($pars)) {
        $pars = '|' . $pars;
      }
      //$pars = $node_data->vid.';'.$node_data->title.$pars;
      $pars = $node_data->nid . ';' . $node_data->title . $pars;
      if ($result->plid > 0) {
        return fwbc_get_parents($result->plid, $pars);
      }
    }
    if ($pars) {
      $parents = array();
      $pars_array = explode('|', $pars);
      foreach ($pars_array as $pars_val) {
        $pars_vals = explode(';', $pars_val);
        $parents[$pars_vals[0]] = $pars_vals[1];
      }
    }
  }
  return $parents;
}

function fwbc_get_child_pages($mlid, $nid)
{
  $child_pages = array();
  $child_nodes = db_query("SELECT m.mlid, b.nid, n.title FROM {menu_links} m LEFT JOIN {book} b ON b.mlid = m.mlid LEFT JOIN {node} n ON n.nid = b.nid WHERE m.plid = '" . $mlid . "' AND n.status > 0 AND n.type <> 'article' ORDER BY m.weight, n.title");
  if (count($child_nodes)) {
    foreach ($child_nodes as $child_node) {
      if ($child_node->nid) {
        $child_pages[$child_node->nid] = array('title' => $child_node->title, 'parent' => $nid, 'childs' => fwbc_get_child_pages($child_node->mlid, $child_node->nid));
      }
    }
  }
  return $child_pages;
}

function fwbc_limit_content($content, $max_char, $more = '...')
{
  if ((strlen($content) > $max_char) && ($espacio = strpos($content, " ", $max_char))) {
    $content = substr($content, 0, $espacio);
    if (substr($content, -1) == ',') {
      $content = substr($content, 0, -1);
    }
    $content = $content . $more;
  }
  return $content;
}

function fwbc_get_taxonomies($tslug, $counttype = '')
{
  $where = " WHERE tv.machine_name = '" . $tslug . "'";
  if (strlen($counttype)) {
    $where .= " AND n.type = '" . $counttype . "'";
  }
  return db_query("SELECT td.tid, td.name, COUNT(ti.nid) as pcount FROM {taxonomy_term_data} td LEFT JOIN {taxonomy_vocabulary} tv ON tv.vid = td.vid LEFT JOIN {taxonomy_index} ti ON ti.tid = td.tid LEFT JOIN {node} n ON n.nid = ti.nid " . $where . " GROUP BY td.tid ORDER BY td.weight, td.name")->fetchAll();
}

function fwbc_get_nid_by_mlid($mlid)
{
  $bookdata = db_query("SELECT nid FROM {book} WHERE mlid = '" . $mlid . "'")->fetchObject();
  return $bookdata->nid;
}

function fwbc_get_mlid_by_nid($nid)
{
  $bookdata = db_query("SELECT mlid FROM {book} WHERE nid = '" . $nid . "'")->fetchObject();
  return $bookdata->mlid;
}

// NEWSLETTER SIGNUP FORM (Subcribe to Campaign Monitor)
if (strlen(@$_POST['form_id'])) {
  if (@$_POST['form_id'] == 'webform_client_form_' . theme_get_setting('fwbc_newsletter_signup_form')) {
    $cmstate = trim($_POST["submitted"]["state"]);
    $cmemail = trim($_POST["submitted"]["email"]);
    if (preg_match("/^[a-zA-Z0-9\.\_\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/", $cmemail)) {
      $cm_api_key = theme_get_setting('fwbc_newsletter_cm_api_key');
      $cm_list_id = theme_get_setting('fwbc_newsletter_cm_api_list_id');

      if (strlen($cm_api_key) && strlen($cm_list_id)) {

        // Add subscriber using Campaignmonitor's API
        require_once 'lib/campaignmonitor/csrest_subscribers.php';

        $auth = array(
          'api_key' => $cm_api_key,
        );
        $wrap = new CS_REST_Subscribers($cm_list_id, $auth);
        $result = $wrap->add(array(
          'EmailAddress' => $cmemail,
          'CustomFields' => array(
            array(
              'Key' => 'State',
              'Value' => $cmstate
            ),
          ),
        ));

        if ($result->was_successful()) {
          drupal_set_message('You have successfully signed up for our newsletter', $type = 'status');
          $_SESSION['newsletter_signup_action'] = 'success';
        } else {
          drupal_set_message($result->response->Message, $type = 'error');
        }
      }
    }
  }
}

function fwbc_html_head_alter(&$head_elements)
{
  foreach ($head_elements as $key => $element) {
    if (isset($element['#attributes']['content'])) {
      unset($head_elements[$key]);
    }
  }
  foreach ($head_elements as $key => $element) {
    if (isset($element['#attributes']['about'])) {
      unset($head_elements[$key]);
    }
  }
}
