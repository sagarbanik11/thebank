
<div class="container-fluid"> 
            <div class="container"> 
              <form action="<?=site_url('register/save')?>" method="post" >
                <div class="row col m6">
                  <div class="input-field ">
                    First Name<input type="text" id="firstname" name="firstName" value="<?=set_value('firstName')?>" required>
                    Last Name<input type="text" id="lastname" name="lastName"value="<?=set_value('lastName')?>" required>
                    Email-ID<input type="email" name="email" value="<?=set_value('email')?>" required>
                    <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                    Mobile Number<input type="text" id="phone" name="phone" value="<?=set_value('phone')?>" required>
                    <?php echo form_error('phone', '<div class="error">', '</div>'); ?>
                    Address<input type="text" name="address" value="<?=set_value('address')?>" required>
                    Password<input type="password" id="txtPassword" name="password" required>
                    Repeat Password<input type="password" id="txtConfirmPassword" name="confirmpassword" required>
                    <input type="submit" class="btn" value="register" onclick="return Validate()" name="auth-type">
                  </div>
                </div>
              </form>
            </div>
          </div>
          <script type="text/javascript">
          
//First Name Validation 
    
            function Validate() {
                var password = document.getElementById("txtPassword").value;
                var confirmPassword = document.getElementById("txtConfirmPassword").value;
                if (password != confirmPassword) {
                    alert("Passwords do not match.");
                    return false;
                }
                
            var fn=document.getElementById('firstname').value;
    if(fn == ""){
        alert('Please Enter First Name');
        document.getElementById('firstname').style.borderColor = "red";
        return false;
    }else{
        document.getElementById('firstname').style.borderColor = "green";
    }
    if (/^[0-9]+$/.test(document.getElementById("firstname").value)) {
        alert("First Name Contains Numbers!");
        document.getElementById('firstname').style.borderColor = "red";
        return false;
    }else{
        document.getElementById('firstname').style.borderColor = "green";
    }
    if(fn.length <=2){
        alert('Your Name is To Short');
        document.getElementById('firstname').style.borderColor = "red";
        return false;
    }else{
        document.getElementById('firstname').style.borderColor = "green";
    }
    var fn=document.getElementById('lastname').value;
    if(fn == ""){
        alert('Please Enter Last Name');
        document.getElementById('lastname').style.borderColor = "red";
        return false;
    }else{
        document.getElementById('lastname').style.borderColor = "green";
    }
    if (/^[0-9]+$/.test(document.getElementById("lastname").value)) {
        alert("Last Name Contains Numbers!");
        document.getElementById('lastname').style.borderColor = "red";
        return false;
    }else{
        document.getElementById('lastname').style.borderColor = "green";
    }
    if(fn.length <=2){
        alert('Your Name is To Short');
        document.getElementById('lastname').style.borderColor = "red";
        return false;
    }else{
        document.getElementById('lastname').style.borderColor = "green";
    }
    var fn=document.getElementById('phone').value;
    if(fn == ""){
        alert('Please Enter Mobile Number');
        document.getElementById('phone').style.borderColor = "red";
        return false;
    }else{
        document.getElementById('phone').style.borderColor = "green";
    }
    if(fn.length >=11 || fn.length <=9){
        alert('Please Enter a Valid Mobile Number');
        document.getElementById('phone').style.borderColor = "red";
        return false;
    }else{
        document.getElementById('phone').style.borderColor = "green";
    }
    return true;
            }
        </script>
      
      <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';
        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
      </script>
      <style>
.error{
    color:red;
    font-weight:bold;
}
      </div>