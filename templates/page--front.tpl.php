<?php
/*
 * Front page template
*/
?>

<div id="industryUpdate" class="box">
  <div class="corner"></div>
  <div class="banner-item">
    <h2>
      <a href="http://www.fwbc.gov.au/industry-updates">INDUSTRY<br>UPDATE</a>
    </h2>
    <h4>
      <a href="http://www.fwbc.gov.au/industry-updates">Sign up for FWBC’sfree<br>online newsletter now ></a>
    </h4>
  </div>
</div>

<div id="fwbcOnSite" class="box">
  <div class="corner"></div>
  <div class="banner-item">
    <h2>
      <a href="http://www.fwbc.gov.au/app">FWBC ON SITE</a>
    </h2>
    <h4>
      <a href="http://www.fwbc.gov.au/app">Your App about your rights<br>and responsibilities on site ></a>
    </h4>
  </div>
</div>

<div id="noPermits" class="box">
  <div class="corner"></div>
  <div class="banner-item">
    <h2>
      <a href="http://www.fwbc.gov.au/no-permit-list">NO PERMITS<br>LIST</a>
    </h2>
    <h4>
      <a href="http://www.fwbc.gov.au/no-permit-list">Find out who is not<br>permitted to enter your site ></a>
    </h4>
  </div>
</div>

<div class="clear"></div>

<div class="box home-box" id="home-latest-news">
  <div class="corner"></div>
  <h2>Latest News</h2>
  <?php
  $latest_news_block = module_invoke('views', 'block_view', 'home_latest_news-block');
  echo render($latest_news_block["content"]);
  ?>
  <div class="clear"></div>
  <div class="more-news">
    <a class="button" href="<?php echo page_url('node/' . theme_get_setting('fwbc_latest_news_page')); ?>">More news</a>
  </div>
</div>

<div id="strike" class="box">
  <div class="corner"></div>
  <div class="banner-item">
    <h2>
      <a href="http://www.fwbc.gov.au/sites/default/files/Strike%20stop%20and%20think_web.pdf?pdf=strikeflyer">
        STRIKE?<br>STOP AND THINK
      </a>
    </h2>
    <h4>
      <a href="http://www.fwbc.gov.au/sites/default/files/Strike%20stop%20and%20think_web.pdf?pdf=strikeflyer">
        Four things every worker should<br>know before going on strike >
      </a>
    </h4>
  </div>
</div>

<div class="box home-box">
  <div class="corner"></div>
  <?php the_block(3); ?>
  <a class="button" href="<?php echo page_url('contact-us'); ?>">More contact details</a>
</div>

<div class="clear"></div>


<div id="buildingCode2013" class="box">
  <div class="corner"></div>
  <div class="banner-item">
    <h2>
      <a href="http://www.fwbc.gov.au/building-code/">Building Code<br>2013</a>
    </h2>
    <h4>
      <a href="http://www.fwbc.gov.au/building-code/">Information and resources on<br>the Building Code ></a>
    </h4>
  </div>
</div>


<div class="box home-box">
  <div class="corner"></div>
  <?php the_block(34); ?>
</div>

<div id="drugAndAlcohol" class="box">
  <div class="corner"></div>
  <div class="banner-item">
    <h2>
      <a href="http://www.fwbc.gov.au/drug-and-alcohol-testing-under-building-code-2013-0/">DRUG AND<br>ALCOHOL TESTING</a>
    </h2>
    <h4>
      <a href="http://www.fwbc.gov.au/drug-and-alcohol-testing-under-building-code-2013-0/">
        New requirements under<br>the Building Code 2013 >
      </a>
    </h4>
  </div>
</div>
