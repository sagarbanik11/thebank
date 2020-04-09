
<nav>
                  <div class="nav-wrapper  navbar-class">
                    <a href="<?=site_url('home')?>" class="brand-logo" style="margin-left: 20px;">&nbsp;MyBank</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                      <?php if (!isset($_SESSION['user_id'])):?>
                      <li><a href="<?=site_url('login')?>" style="margin-right: 20px;">Login</a></li>
                      <li><a href="<?=site_url('register')?>" style="margin-right: 20px;">Signup</a></li>
                      <?php else:?>
                        <li><a href="profile" style="margin-right: 20px;">Welcome <?php foreach ($qry->result() as $r){?><b><?= $r->name?></a></li>
                      
              
                      <li><a href="logout" style="margin-right: 20px;">Logout</a></li>
                        <?php }endif?>
                    
                    </ul>
                  </div>
                </nav>
</header>
<body>
