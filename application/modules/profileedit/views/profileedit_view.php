
<div class="container-fluid">
            <div class="container profilePage" style= "background: #222f2a;">
            <form action="<?=site_url("profileedit/save")?>" method="post">
                <div class="container accountDetails">
                    
                    
                    <h5 style="color:#FAFAFA;text-align: center;">Account Details</h5>
                    <?php foreach ($qry->result() as $r){?>
                    <br>
                    <h6>Name:  <input style="color:#FAFAFA;" value="<?= $r->name?>" name="accHolder" readonly/> </h6>
                    <h6>A/C Number: <input style="color:#FAFAFA;" value="<?= $r->accNo?>" name="accNo"  readonly/></h6>
                    <?php }?>
                    <h6>Email: <input style="color:#FAFAFA;" value="<?= $r->email?>" name="email" <?php 
                     if($acc->num_rows()==0)
                     { ?> readonly/ <?php } ?> ></h6>
                    <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                    <h6>Mobile Number: <input style="color:#FAFAFA;" value="<?= $r->mobile?>" name="phone" <?php 
                     if($acc->num_rows()==0)
                     { ?> readonly/ <?php } ?> ></h6> 
                    <?php echo form_error('phone', '<div class="error">', '</div>'); ?>
                    <h6>Address: <input style="color:#FAFAFA;" value="<?= $r->address?>" name="address"></h6>
                    <?php echo form_error('address', '<div class="error">', '</div>'); ?>
                    <?php 
                     if($acc->num_rows()==0)
                     {?> 
                    <h6>Account Type: <select name="accType" style="display:inline; background:transparent; color:#FAFAFA;">
                        <option value="SAVINGS" style="color:black;" >Savings</option>
                        <option Value="CURRENT" style="color:black;" >Current</option>
                    </select></h6>

                    <h6>First Deposit Amount: <input style="color:#FAFAFA;" type="number" name="currBal" required></h6>
                    <?php echo form_error('phone', '<div class="error">', '</div>'); ?>
                    <?php echo $this->session->flashdata('limit_data'); ?>
                     <?php }
                    ?>
                    
                    <br>
                    <?=@$_GET['suc_msg'];?>
                    <input type="submit" class="btn" value="Save" name="acc">
                    <a href="<?=site_url("profile")?>" class="waves-effect waves-light btn">Cancel</a>
        
                    </form>
                    
                   
                <a href="closeAcc" class=" right btn-small btnSurrender"><span style="font-size: 16px;">Close A/C</span></a>
                
                </div>
            </div> 
            <br><br>
        </div>
        <style>
.error{
    color:red;
    font-weight:bold;
}
      </div>