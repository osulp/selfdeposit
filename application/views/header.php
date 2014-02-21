<?php $this->load->helper('url'); ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <base href="<?php echo base_url() . index_page(); if (index_page() !== '') { echo '/'; } ?>">
        <title><?php echo $page_title; ?></title>
        <link rel='stylesheet' type='text/css' media='all' href='<?php echo base_url(); ?>css/style.css' />
        <link rel="SHORTCUT ICON" href="favicon.ico">
        <link href='http://fonts.googleapis.com/css?family=Gueda' rel='stylesheet' type='text/css'>
        <?php if (!empty($javascript)) { foreach ($javascript as $js): ?>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/<?php echo $js; ?>"></script>
        <?php endforeach; } ?>
    </head>
    <body>
        <div id="header">
	<h1>Open Access Article Deposit and Waiver Form<p>
	<?php echo $page_title; ?><p></h1>
	<a href="/easydeposit"><h1>Title</h1></a>
	</div>
