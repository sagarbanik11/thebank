<?php if(isset($_SESSION)) {
        $this->session->flashdata('flash_data');
    } ?>
<div class="container-fluid">
      <div class="container formLogin">
        <form action="<?= site_url('login') ?>" method="POST">
          <div class="row col m6">
            <div class="input-field inputStyle1">
              <strong>Email-ID</strong><input type="text" name="email"/>
              <strong>Password</strong><input type="password" name="password"/>
              <?php echo $this->session->flashdata('flash_data'); ?>
             <br><br>
             <?=@$_GET['suc_msg'];?>
              <input type="submit" class="btn" value="Login" name="auth-type">
              <br>
              
            </div>
          </div>
        </form>
      </div>
    </div>
  
