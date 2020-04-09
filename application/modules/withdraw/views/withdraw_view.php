<div class="container-fluid">
                    <div class="container formLogin">
                        <h5>Withdraw</h5><br>
                        <form action="<?=site_url('withdraw/save')?>" method="post">
                            <div class="row col m6">
                            <div class="input-field inputStyle1">
                                <?php foreach ($acc->result() as $r){?>
                                <strong>Name</strong><input type="text" value="<?= $r->accHolder?>" readonly/>
                                <strong>Withdrawal Amount</strong><input type="number" name="ramount" required/>
                                <?php echo $this->session->flashdata('flash_data'); ?>
                                <?php echo $this->session->flashdata('limit_data'); ?>
                                <br><br>
                                <?php }?>
                                <?=@$_GET['suc_msg'];?>
                                <input type="submit" class="btn" value="Withdraw">
                                <div style="color:red;font-weight: 50;">
                            		<h5 style="padding:10px;">
                        
                            		</h5>                      
                            	</div>
                            </div>
                            </div>
                        </form>
                    </div>
                  </div>
    
   <style> 
    .error{
    color:red;
    font-weight:bold;
}
      </div>