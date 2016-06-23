<?php $this->load->helper('url'); ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <base href="<?php echo base_url() . index_page(); if (index_page() !== '') { echo '/'; } ?>">
        <title><?php echo $page_title; ?></title>
        <link rel='stylesheet' type='text/css' media='all' href='<?php echo base_url(); ?>css/style.css' />
        <link rel="SHORTCUT ICON" href="favicon.ico">
        <link href='http://fonts.googleapis.com/css?family=Gudea' rel='stylesheet' type='text/css'>
        <?php if (!empty($javascript)) { foreach ($javascript as $js): ?>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/<?php echo $js; ?>"></script>
        <?php endforeach; } ?>
	      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-35760875-14', 'auto');
          ga('send', 'pageview');

        </script>
    </head>
    <body>
        <div id="header">
        <a href="http://www.oregonstate.edu" id="link"></a>
	<h1><p><a href="http://osulibrary.oregonstate.edu/">OSU Libraries and Press</a></p>
	<a href="<?php echo base_url(); ?>">Open Access Article Deposit and Waiver Form</a>
        <hr style="width:80%; text-align:left;margin-left:0">
        <p>
	<?php echo $page_title; ?><p></h1>
	<a href="/easydeposit"><h1>Title</h1></a>
	</div>
