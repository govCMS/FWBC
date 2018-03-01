<?php
/*
 * Legal Cases list template
*/
?>
<div>
  <?php include('block-breadcrumb.tpl.php'); ?>
  <?php include('block-left-sidebar.tpl.php'); ?>

  <div class="content-box">
    <div id="leftContent" class="legal-cases-list">
      <div class="contentBox wide agreement-clauses-content-wrapper">
        <div class="content-block">
          <h1><?php echo $title; ?></h1>
          <?php if ($tabs): ?>
            <div class="tabs">
              <?php print render($tabs); ?>
            </div>
          <?php endif; ?>
          <?php echo render($page['content']); ?>
          <?php echo views_embed_view('agreement_clauses_view', 'page_1'); ?>
          <br/>
          <br/>
          <h2>Need more information?</h2>
          <p>For further information, advice or assistance contact the ABCC on
            <strong>1800 003 338.</strong> or <a
              href="mailto:enquiry@abcc.gov.au">enquiry@abcc.gov.au</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
