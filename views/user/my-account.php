<!-- <!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>404 Not Found</title>
</head><body>
<h1>My account</h1>
<p>The requested URL was not found on this server.</p>
<p>Additionally, a 404 Not Found
error was encountered while trying to use an ErrorDocument to handle the request.</p>
</body></html> -->




  <div class="container">
    <div class="section-title">My Account</div>

    <div class="info-group">
      <label class="info-label">Name</label>
      <div class="info-value"><?= $_SESSION['user']['user_name']?></div>
    </div>

    <div class="info-group">
      <label class="info-label">Email</label>
      <div class="info-value"><?= $_SESSION['user']['email']?></div>
    </div>

    <div class="info-group">
      <label class="info-label">phoone</label>
      <div class="info-value"><?= $_SESSION['user']['phone']?> </div>
    </div>


    <div class="btns">

    <?php if(isset($_SESSION['user']['rule'])):?>
      <a href="?page=admin" class="my-account-register-btn">admin dashboard</a>
      <a href="?page=logout" class="my-account-logout-btn">logout</a>
      <?php elseif(isset($_SESSION['user']['user_id'])):?>
    <a href="?page=registerAsSeller" class="my-account-register-btn">Register as a Seller</a>
    <a href="?page=logout" class="my-account-logout-btn">logout</a>
      <?php endif;?>
    </div>
  </div>

