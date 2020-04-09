<div class="container-fluid">
                    <div class="container formLogin" >
                        
                        <h5>Deposit</h5><br>
                        
                        <form action="deposit/save" method="post">
                            <div class="row col m6">
                            
                            <div class="input-field inputStyle1">
                                <?php foreach ($acc->result() as $r){?>
                                <strong>Name</strong><input type="text" value="<?= $r->accHolder?>" readonly/>
                                <strong>Deposit Amount</strong><input type="number" name="depo" required/>
                                <?php echo $this->session->flashdata('flash_data'); ?>
                                <br><br>
                                <?php }?>
                                <?=@$_GET['suc_msg'];?>
                               
                                <input type="submit" class="btn" value="Deposit">
                                
                            </div>
                            </div>
                        </form>
                    </div>
                  </div> 