<?php
    $UserId = $this->session->userdata('sc_sess')['UserId'];  
    $UserEmail = $this->session->userdata('sc_sess')['UserEmail']; 
?>  

 <style>
  .ruleterms a { color: #F79F1F }
 </style>

 <!--Login Modal-->
    <div class="modal fade" id="login" role="dialog" style="z-index:9999">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <h4 class="modal-title" id="auth-title"></h4>
                </div> -->
                <div class="modal-body">
                 <section class="modal-body">  

                  <!-- Username & Password Login form -->
                  <div class="popup_login user_login">
                    <div id="msgLog"></div>  
                      
                    <form action="<?php echo base_url()."index.php/auth/login"?>" method="post" id="formLogin" onsubmit="return false">
                     <div class="form-group">
                       <label class="control-label" for="inputDefault">Email</label>
                       <input id="logUser" type="email" name="UserEmail" class="form-control" autofocus>
                     </div>
                     <div class="form-group">
                       <label class="control-label" for="inputDefault">Password</label>
                       <input id="logPass" type="password" name="UserPass" class="form-control">
                     </div>
                     <div class="checkbox">
                         <label style="font-size:12px;"><input type="checkbox" name="remember"> &nbsp;  <a>Ingatkan saya saat masuk</a> </label>
                     </div>
                     <div class="action_btns">
                       <div class="one_half"><button type="button" class="btn register">Mendaftar</button></div>
                       <div class="one_half last"><button type="submit" class="btn btn-warning finishLogin" disabled>Masuk</button></div>     
                     </div>
                   </form>
                   <a href="#" class="forgot_password">Lupa password ?</a>
                   <div class="centeredText ruleterms">
                     <span>By logging in, you agree to Smart Print's <a href="#">Terms of Service</a>, <a href="#">Cookie Policy</a>, <a href="#">Privacy Policy</a> and <a href="#">Content Policies</a>.</span>
                   </div> 
                     <div class="action_btns">
                        <div class="one"><button type="button" class="btn exit_btn" id="exit_login">Keluar</button></div>   
                     </div>
                 </div>
                     
                  <!-- Reister form -->
                  <div class="popup_login user_register">
                    <div id="msgReg"></div>  
                      
                    <form action="<?php echo base_url()."index.php/auth/register" ?>" method="post" id="formRegister" onsubmit="return false">
                     <div class="form-group">
                       <label class="control-label" for="inputDefault">Email</label>
                       <input id="RegUser" type="email" name="UserEmail" class="form-control" autofocus>
                     </div>
                     <div class="form-group">
                        <label class="control-label" for="inputDefault">Role</label>
                        <select name="UserRole" class="form-control" autofocus>
                          <option value="User">User</option>
                          <option value="Merchant">Merchant</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label class="control-label" for="inputDefault">Password</label>
                        <div class="input-group date form_datetime">
                            <input type="password" id="RegPass" name="UserPass" class="form-control" required data-toggle="popover" title="Password Strength" data-content="Enter Password..." minlength="8">
                            <a onclick="randomString()" style="cursor:pointer" class="input-group-addon RegPass">
                                <i class="fa fa-plus-square-o"></i>
                            </a>
                        </div>
                    </div>                        
                     <div class="form-group">
                       <label class="control-label" for="inputDefault">Konfirmasi Password</label>
                       <input id="RegPassConf" type="password" class="form-control RegPassConf" minlength="8" readonly>
                     </div>    
                     <div class="checkbox">
                         <label style="font-size:12px;"><input type="checkbox" id="showPass"> &nbsp;  Perlihatkan Password </label>
                     </div>                     
                     <div class="action_btns">
                       <div class="one_half"><button type="button" class="btn back_btn" id="regBack">Kembali</button></div>
                       <div class="one_half last"><button type="submit" class="btn btn-warning finishRegist" disabled>Daftar</button></div>     
                     </div>
                   </form>
                   <div class="centeredText ruleterms">
                     <span>By registering, you agree to Smart Print's <a href="#">Terms of Service</a>, <a href="#">Cookie Policy</a>, <a href="#">Privacy Policy</a> and <a href="#">Content Policies</a>.</span>
                   </div> 
                     <div class="action_btns">
                        <div class="one"><button type="button" class="btn exit_btn" id="exit_regist">Keluar</button></div>    
                     </div>
                 </div>     

                 <!-- Forgot form -->
                 <div class="popup_login forgot">
                  <form action="<?php echo base_url()."index.php/auth/requestforget"?>" method="post" id="formRecover" onsubmit="return false">
                   <div class="form-group">
                     <label class="control-label" for="inputDefault">Email</label>
                     <input id="recUser" type="email" name="UserEmail" class="form-control" placeholder="eg: info@smartprint.com" autofocus>
                   </div>         
                   <div class="action_btns">
                     <div class="one_half"><button type="button" class="btn back_btn" id="recBack">Kembali</button></div>
                     <div class="one_half last"><button type="submit" class="btn btn-warning finishRecobery" disabled>Pulihkan</button></div>
                   </div>
                  </form>
                  <div class="centeredText">
                    <span>Please check your email after recover.</span>
                  </div>
                 </div>

                </section>
               </div>
            </div>
        </div>
    </div>
<!--/Login Modal-->
    
    