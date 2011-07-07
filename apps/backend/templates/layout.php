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
    
    <div id="container">
    
    <div id="header">
      <h1 >Logo of China Fund Seeker</h1>
    </div>
    
    <div id="mainmenu"> 
      <div class="mylist">
        <?php echo link_to ('Home', '/') ?>
        <?php if ($sf_user->isAuthenticated()): ?>
        <?php echo link_to('Logout', 'sf_guard_signout') ?>
        <?php else: ?> 
        <?php echo link_to('Login', 'sf_guard_signin') ?>
        <?php endif ?>

      </div>
    </div>
    
    <div id="leftmenu">
      <b>Left Menu</b><br />
      <?php if ($sf_user->isAuthenticated()): ?>
      <div class="mylist">
        <?php echo link_to('Users', 'sf_guard_user') ?> <br/>
        <?php echo link_to('Grants', 'grantx') ?> <br/>
        <?php echo link_to('Organizations', 'organization') ?> <br/>
        <?php echo link_to('Members', 'member')?> <br/>
        <?php echo link_to('ContactPerons', 'contact_person')?> <br/>
      </div>
      <?php endif ?> 
 
    </div>

    
    <div id="content">
      <?php echo $sf_content ?>
    </div>
        
    <div id="rightmenu">
      Right Menu<br/>
    </div>
    
    <div id="footer">
      Copyright © 2011 China Fund Seeker</div>
    </div>

  </body>
</html>
