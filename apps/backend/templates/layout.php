<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <?php use_javascript('jquery-1.4.2.min.js') ?>
  <?php include_javascripts() ?>
  <head>    
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <div>
	<?php if ($sf_user->isAuthenticated()): ?>
          <div class="mylist">
             <?php echo link_to('Users', 'sf_guard_user') ?>
	     <?php echo link_to('Grants', 'grantx') ?>
	     <?php echo link_to('Organizations', 'organization') ?>
             <?php echo link_to('Members', 'member')?>
	     <?php echo link_to('Logout', 'sf_guard_signout') ?>
           </div>
	<?php endif ?> 
    </div>
    <hr/>
    <?php echo $sf_content ?>
  </body>
</html>
