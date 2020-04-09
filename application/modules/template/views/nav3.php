
        
     		 <nav>
                <div class="nav-wrapper  navbar-class" >
                    <a href=<?=site_url('home')?> class="brand-logo" style="margin-left: 20px ;">&nbsp;MyBank</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="<?=site_url('profile')?>">Profile</a></li>
                        <li><a href="<?=site_url('statement')?>">Account Statement</a></li>
                    <?php if($acc->num_rows()!==0)
                     {?>
	                    <li><a href="<?=site_url('transfer')?>">Transfer</a></li>
                        <li><a href="<?=site_url('withdraw')?>">Withdraw</a></li>
                        
                        <li><a href="<?=site_url('deposit')?>" style="margin-right: 20px;">Deposit</a></li>
                        <?php } ?>
                        <li><a href="<?=site_url('logout')?>" style="margin-right: 20px;">Logout</a></li>
                  
                        
                    </ul>
                </div> 
            </nav>
    </header>
    <body>