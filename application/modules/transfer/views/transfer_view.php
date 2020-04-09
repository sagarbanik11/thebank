
<div class="container-fluid">
                    <div class="container formLogin">
                        <h5>Transfer Money</h5><br>
                        <form action="transfer/save" method="post">
                            <div class="row col m6">
                            <div class="input-field inputStyle1">
                                <?php foreach ($acc->result() as $r){?>
                                <strong>Account Number</strong>
                                <input type="text" value="<?= $r->accNo?>" name="accNo" readonly/>

                                <strong>Recipient's Account Number</strong><input type="number" name="racc" id="racc" onblur="fetch_name()" />
                                <?php echo $this->session->flashdata('flash_data'); ?>
                                <?php echo $this->session->flashdata('same_data'); ?>
                                <br>
                                <strong>Recipient's Name</strong><input type="text" name="rname"  id="rname" readonly/>
                                <strong>Transfer Amount</strong><input type="number" name="ramount" required/>
                                <?php echo $this->session->flashdata('amount_data'); ?>
                                <?php echo $this->session->flashdata('limit_data'); ?>
                                <br><br>
                                <?php }?>
                                <?=@$_GET['suc_msg'];?>
                                <input type="submit" class="btn" value="Transfer">
                                
                                <div style="color:red;font-weight: 50;">
                            		<h5 style="padding:10px;">
                
                            		</h5>                      
                            	</div>
                                
                            </div>
                            	
                            </div>
                        </form>
                    </div>
                  </div>
                <script>
                    function fetch_name(){
                        var acc=document.getElementById('racc').value;
                        $.get('transfer/fetch_name/'+acc, function(d){
                            //console.log(d);
                            document.getElementById('rname').value=d;
                        });
                    }

                </script>
