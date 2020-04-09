
<div class="container-fluid">

            <div class="container profilePage" style= "background: #222f2a;">
            <a href="profileedit" class=" right btn-floating btn-large cyan pulse"  ><i class="material-icons" >edit</i></a>
                <div class="container accountDetails">
                    
                    <center><img src="<?php echo base_url(); ?>/assets/img/bank-logo.png" style= "max-width: 30% ;" class= ""/></center>
                    <h5 style="color:#FAFAFA;text-align: center;">Account Details</h5>
                    <?php foreach ($qry->result() as $r){?>
                    <br>
                    <h6>Name: <b><?= $r->name?></h6>
                    <h6>Email: <b><?= $r->email?></b></h6>
                    <h6>Mobile Number: <b><?=$r->mobile?></b></h6>
                    <h6>Address: <b><?=$r->address?></b></h6>
                    <?php }?>
                    <?php if($acc->num_rows()==0)
                     {?>
                     <div class="card-panel red lighten-1">
                     <span class="white-text text-darken-2">Please complete your profile for transaction</span>
                     </div>
                    <?php }?>
                     
                    <?php foreach ($acc->result() as $r){?>
                    <h6>A/C Number: <b><?= $r->accNo?></b></h6>
                    <h6>Account Type: <b><?=$r->title?></b></h6>
                    <h6>Balance: <b><?=$r->cr?></b></h6>
                    <?php }?>

                    
                </div>
            </div> 
        </div>
      