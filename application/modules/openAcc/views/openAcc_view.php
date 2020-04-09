<div class="container-fluid">
    <div class="container formLogin">
        <h5>Open an A/C</h5><br>
        <form action="<?=site_url("openAcc/save")?>" method="post">
            <div class="row col m6">
            <div class="input-field inputStyle1">
                <strong>Account Number</strong><input type="number" value="<?=$accNo?>" name="accNo" readonly/>
                <strong>Name</strong><input value="<?=$name?>" readonly/> 
                <strong>Account Type</strong>
                    <select name="accType" style="display:inline">
                        <option value="SAVINGS">Savings</option>
                        <option Value="CURRENT">Current</option>
                    </select>
                <strong>Deposit Amount</strong><input type="number" name="currBal"/>
                <?php echo $this->session->flashdata('limit_data'); ?>
                <br>
                <input type="submit" class="btn" value="account" name="acc">
            </div>
            </div>
        </form>
    </div>
  </div> 