<?=$layouts['header']?>
<div class="container">
  <h2></h2>
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab"  style="color:black" href="#home">Register</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab"  style="color:black" href="#menu1">Login</a>
    </li>
   
  </ul>

  <!-- Tab panes -->
  <div class="tab-content" style="padding-bottom:50px">
    <div id="home" class="container tab-pane active"><br>
      <div class="card" style="width:50rem; margin-left:100px">
                     
    <h6 class="card-subtitle mb-2 text-muted"></h6>
    <div class="container-fluid bg-light py-3">
    <div class="row">
        <div class="col-md-6 mx-auto">
                
                    <h3 class="text-center mb-4" style="color:black">Register</h3>
                    <form method="post"  action="<?=base_url('dosignup')?>" id="myform">
                    <fieldset>
                <div class="form-group has-error">
                            <input class="form-control input-lg"  style="width:250px;height:40px;font-size:85%" placeholder="Please Enter Full Name" name="name" type="text">
                        </div>
                        <div class="form-group has-error">
                            <input class="form-control input-lg"  style="width:250px;height:40px;font-size:85%"placeholder="Please Enter Email" name="email" type="email">
                        </div>
                        <div class="form-group has-error">
                            <input class="form-control input-lg" style="width:250px;height:40px;font-size:85%" pattern="[0-9]{10}" title="10 digit mobile number" name="mobile" placeholder="Please Enter Mobile No" required type="text">
                        </div>
                        <div class="form-group has-success">
                          <div class="row">
                            <div class="col-md-10"> 
                              <input class="form-control input-lg"  style="width:250px;height:40px;font-size:85%"placeholder="Password" name="password" value="" type="password" id="password">
                            </div>
                            <div class="col-md-2 mt-3">
                               <i class="fas fa-eye" style="cursor: pointer;" onclick="view()"></i>
                               <i class="fas fa-eye-slash" style="cursor: pointer; display: none;" onclick="view()"></i>
                            </div>
                          </div>
                        </div>
                        <!--div class="form-group has-success">
                            <input class="form-control input-lg" placeholder="Confirm Password" name="password" value="" type="password">
                        </div-->
                        
                        <input class="btn btn-lg btn-primary btn-block" value="Register"style="width:154px;height:40px ;border-radius:10px" type="submit">
                    </fieldset>
                 </form>
                
        </div>
    </div>
</div>
  </div>
    </div>
  
    <div id="menu1" class="container tab-pane fade"><br>
      <div class="card" style="width: 50rem; margin-left:100px">
  <div class="card-body">
                     
    <h6 class="card-subtitle mb-2 text-muted"></h6>
    <div class="container-fluid bg-light py-3">
    <div class="row" style="width:288px">
        <div class="col-md-6 mx-auto">
                <div class="card card-body" style="width:300px">
                    <h3 class="text-center mb-4">Login</h3>
                    <form action="<?=base_url('dologin')?>" method="post" id="loginform">
                    <fieldset>
                        <div class="form-group has-error">
                            <input class="form-control input-lg"  style="width:250px;height:40px;font-size:85%" name="mobile" type="text" placeholder="Mobile Number">
                        </div>
                        <div class="form-group has-success">
                          <div class="row">
                            <div class="col-md-9">
                              <input class="form-control input-lg" placeholder="Password" name="password" style="width:250px;height:40px;font-size:85%" value="" type="password" id="loginpassword"></div>
                            <div class="col-md-2 mt-3">
                            <i class="fas fa-eye" style="cursor: pointer;" onclick="viewPassword()"></i>
                            <i class="fas fa-eye-slash" style="cursor: pointer; display: none;" onclick="viewPassword()"></i>
                            </div>
                        </div>
                      </div>
                        <input class="btn btn-lg btn-primary btn-block" style="width:120px;height:40px ;border-radius:10px" value="Login" type="submit">
                    </fieldset>
                 </form>

                </div>
        </div>
    </div>
</div>
  </div>
</div>
    </div>

  
    
  </div>
</div>
<?=$layouts['footer']?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    
<script type="text/javascript">
$(document).ready(function(){
    $("#myform").validate({
        rules:{
            name:"required",
            email:"required",
            mobile:{
              required: true,
              number: true,
              minlength: 10,
              maxlength: 10
            },
            password:"required"
        },
        debug: true,
        messages:{
            name:"<span>Enter Full Name</span>",
            email:"<span>Enter Email Id</span>",
            mobile:{
              required:"<span>Enter Mobile Number</span>",
              number:"<span>Enter Numbers Only</span>",
              minlength:"<span>Enter minimum 10 digits</span>",
              maxlength:"<span>Enter maximum 10 digits</span>"
            },
            password:"<span>Enter password</span>"
        }
    });
});

$(document).ready(function(){
    $("#loginform").validate({
        rules:{
            mobile:{
              required: true,
              number: true,
              minlength: 10,
              maxlength: 10
            },
            password:"required"
        },
        debug: true,
        messages:{
            mobile:{
              required:"<span>Enter Mobile Number</span>",
              number:"<span>Enter Numbers Only</span>",
              minlength:"<span>Enter minimum 10 digits</span>",
              maxlength:"<span>Enter maximum 10 digits</span>"
            },
            password:"<span>Enter password</span>"
        }
    });
});

      function view()
    {
        var p = document.getElementById("password");
        if (p.type === "password")
        {
            p.type = "text";
            $(".fa-eye").hide();
            $(".fa-eye-slash").show();
        }
        else
        {
            p.type = "password";
            $(".fa-eye").show();
            $(".fa-eye-slash").hide();
        }
    }

    function viewPassword(){
      var p = document.getElementById("loginpassword");
        if (p.type === "password")
        {
            p.type = "text";
            $(".fa-eye").hide();
            $(".fa-eye-slash").show();
        }
        else
        {
            p.type = "password";
            $(".fa-eye").show();
            $(".fa-eye-slash").hide();
        }
    }
    </script>