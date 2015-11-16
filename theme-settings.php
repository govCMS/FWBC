<?php

/**
 * @file
 * Theme setting callbacks for the garland theme.
 */

/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @param $form
 *   The form.
 * @param $form_state
 *   The form state.
 */

function fwbc_form_system_theme_settings_alter(&$form, &$form_state) {
	// Theme Pages
	$spages = db_query("SELECT nid, title FROM {node} WHERE type = 'page' ORDER BY title");
	if ($spages) {
		$options = array();
		foreach ($spages as $spage) { $options[$spage->nid] = $spage->title; }
		$form['fwbc_pages'] = array(
			'#type' => 'fieldset', 
			'#title' => t('Theme Pages'),
			'#weight' => -3 // Place this to top of options page.
		);
		$form['fwbc_pages']['fwbc_search_page'] = array(
			'#type' => 'select',
			'#title' => t('Search page'),
			'#options' => $options,
			'#default_value' => theme_get_setting('fwbc_search_page')
		);
		$form['fwbc_pages']['fwbc_latest_news_page'] = array(
			'#type' => 'select',
			'#title' => t('Latest News page'),
			'#options' => $options,
			'#default_value' => theme_get_setting('fwbc_latest_news_page')
		);
		$form['fwbc_pages']['fwbc_newsletters_page'] = array(
			'#type' => 'select',
			'#title' => t('Newsletters page'),
			'#options' => $options,
			'#default_value' => theme_get_setting('fwbc_newsletters_page')
		);
		$form['fwbc_pages']['fwbc_legal_cases_page'] = array(
			'#type' => 'select',
			'#title' => t('Legal cases page'),
			'#options' => $options,
			'#default_value' => theme_get_setting('fwbc_legal_cases_page')
		);
		$form['fwbc_pages']['fwbc_submissions_page'] = array(
			'#type' => 'select',
			'#title' => t('Submissions page'),
			'#options' => $options,
			'#default_value' => theme_get_setting('fwbc_submissions_page')
		);
		$form['fwbc_pages']['fwbc_language_assitance_page'] = array(
			'#type' => 'select',
			'#title' => t('Language assistance page'),
			'#options' => $options,
			'#default_value' => theme_get_setting('fwbc_language_assitance_page')
		);
		$form['fwbc_pages']['fwbc_faqs_page'] = array(
			'#type' => 'select',
			'#title' => t('FAQs page'),
			'#options' => $options,
			'#default_value' => theme_get_setting('fwbc_faqs_page')
		);
	}
	// Theme Pages
	$webforms = db_query("SELECT nid, title FROM {node} WHERE type = 'webform' ORDER BY title");
	if ($webforms) {
		$options = array();
		foreach ($webforms as $webform) { $options[$webform->nid] = $webform->title; }
		$form['fwbc_forms'] = array(
			'#type' => 'fieldset', 
			'#title' => t('Newsletter Sign Up Forms'),
			'#weight' => -2 // Place this to top of options page.
		);
		$form['fwbc_forms']['fwbc_newsletter_signup_form'] = array(
			'#type' => 'select',
			'#title' => t('Newsletter Form'),
			'#options' => $options,
			'#default_value' => theme_get_setting('fwbc_newsletter_signup_form')
		);
		$form['fwbc_forms']['fwbc_newsletter_cm_subscribe_url'] = array(
			'#type' => 'textfield',
			'#title' => 'Campaign Monitor Subscribe URL',
			'#size' => 60,
			'#default_value' => theme_get_setting('fwbc_newsletter_cm_subscribe_url')
		);
	}
	// Home Slider Tabs (width)
	$homepage_slides = views_get_view_result('homepage_slider');
	if (count($homepage_slides)) {
		$options = array();
		foreach ($homepage_slides as $homepage_slide) { $options[$homepage_slide->nid] = $homepage_slide->node_title; }
		$form['fwbc_homepage_slider_tabs'] = array(
			'#type' => 'fieldset', 
			'#title' => t('Homepage Slider Tabs'),
			'#weight' => -1
		);
		foreach($options as $opk => $opv) {
			$form['fwbc_homepage_slider_tabs']['fwbc_hs_'.$opk.'_width'] = array(
				'#type' => 'textfield',
				'#title' => '"'.$opv.'" tab width',
				'#size' => 10,
				'#default_value' => theme_get_setting('fwbc_hs_'.$opk.'_width')
			);
		}
	}
}
