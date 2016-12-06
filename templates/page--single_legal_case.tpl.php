<?php
/*
 * Single Legal Cases page template
*/
?>
	<?php include('block-breadcrumb.tpl.php'); ?>
	<?php include('block-left-sidebar.tpl.php'); ?>
	<div class="content-box">
		<div id="leftContent">
			<div id="annocement" style="border: 2px solid #3a6265; padding: 1em; margin: 15px;">
				<h2 style="text-align: center; margin-bottom: 1em;">IMPORTANT</h2><p>On the 1st of December 2016 the <em>Building and Construction Industry (Improving Productivity) Bill 2013</em> and the <em>Building and Construction Industry (Consequential and Transitional Provisions) Bill 2013</em> received Royal Assent.</p><p>As a result, the Office of the Fair Work Building Industry Inspectorate (known as Fair Work Building and Construction) will cease operations on 1 December 2016 and the agency will transition to the Australian Building and Construction Commission.</p><p><strong>The information on this website is currently being reviewed and checked for currency under the new legislation. Updated information will appear on the new ABCC website shortly. Until then, for advice and assistance, you can call the ABCC hotline on 1800 003 338 or contact&nbsp;<a href="mailto:enquiry@abcc.gov.au">enquiry@abcc.gov.au</a></strong></p><p>A new website will be available at&nbsp;<a href="http://www.abcc.gov.au/">www.abcc.gov.au</a>&nbsp;as soon as possible.</p><p>The material on this website is for general information only. You should seek legal advice in relation to your particular circumstances.</p>
			</div>
			<div class="contentBox">
				<h1><?php echo $title; ?></h1>
				<?php if ($tabs): ?>
				  <div class="tabs">
					<?php print render($tabs); ?>
				  </div>
				<?php endif; ?>
				<?php print render($page['content']); ?>
			</div>
			<?php include('block-right-sidebar.tpl.php'); ?>
		</div>
	</div>
