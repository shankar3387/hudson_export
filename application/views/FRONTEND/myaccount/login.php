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
                
                    <h3 class="text-center mb-4" style="color:black">  Register</h3>
                    <form method="post"  action="<?=base_url('dosignup')?>" >
                    <fieldset>
                <div class="form-group has-error">
                            <input class="form-control input-lg"  style="width:250px;height:40px;font-size:85%" placeholder="Please Enter Full Name" name="name" type="text">
                        </div>
                        <div class="form-group has-error">
                            <input class="form-control input-lg"  style="width:250px;height:40px;font-size:85%"placeholder="Please Enter Email" name="email" type="email">
                        </div>
                        <div class="form-group has-error">
                            <input class="form-control input-lg" style="width:250px;height:40px;font-size:85%" pattern="[0-9]{10}" title="10 digit mobile number" name="mobile" placeholder="Please Enter Mobile No" required type="number">
                        </div>
                        <div class="form-group has-success">
                            <input class="form-control input-lg"  style="width:250px;height:40px;font-size:85%"placeholder="Password" name="password" value="" type="password">
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
                    <form action="<?=base_url('dologin')?>" method="post">
                    <fieldset>
                        <div class="form-group has-error">
                            <input class="form-control input-lg" pattern="[0-9]{10}" title="Enter only number , only 10 digit"  style="width:250px;height:40px;font-size:85%" name="mobile" type="number" placeholder="Mobile No">
                        </div>
                        <div class="form-group has-success">
                            <input class="form-control input-lg" placeholder="Password" name="password"   style="width:250px;height:40px;font-size:85%"value="" type="password">
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