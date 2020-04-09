
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/popper.min.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.css"/>
<div class="container-fluid">
    <br>
            <div class="container ">
                <div class="container">
                    
                    <h5 style="">Account Details</h5>
                    <?php foreach ($qry->result() as $r){?>
                    <br>
                    <h6>Name: <b><?= $r->name?></h6>
                    <h6>Email: <b><?= $r->email?></b></h6>
                    <h6>Mobile Number: <b><?=$r->mobile?></b></h6>
                    <h6>Address: <b><?=$r->address?></b></h6>
                    <?php }?>
                    <?php foreach ($acc->result() as $r){?>
                    <h6>A/C Number: <b><?= $r->accNo?></b></h6>
                    <h6>Account Type: <b><?=$r->title?></b></h6>
                    <h6>Balance: <b><?=$r->cr?></b></h6>
                    <?php }?>
                    <br><br>
                    <h3 class="pull-left">Account Statements </h3>

                   
                </div>
            </div>
        </div>

 
        <div class="container">
         
<table class="table table-hover table-bordered content_table">


<tbody>

<tr>

    <tr>
      <th scope="col">Txn Id</th>
      <th scope="col">Txn Date</th>
      <th scope="col">Description</th>
      <th scope="col">Ref No./Cheque No.</th>
      <th scope="col">Debit</th>
      <th scope="col">Credit</th>
      <th scope="col">Balance</th>
    </tr>
  </thead>
  <?php foreach ($sta->result() as $r){?>  
  <tbody>
    <tr>
    
      <th scope="row"><b><?= $r->t_id?></th>
      <td><?= $r->date?></td>
      <td><?= $r->descr?></td>
      <td><?= $r->ref_no?></td>
      <td><?= $r->dr?></td>
      <td><?= $r->cr?></td>
      <td><?= $r->balance?></td>
    </tr>
    <tr>
    <?php }?>
  </tbody>
</table>

  </div> 
