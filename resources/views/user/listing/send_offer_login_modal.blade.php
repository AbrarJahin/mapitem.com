<div id="lgn-pup" class="modal fade" role="dialog">
  <div class="modal-dialog width-adj10">

    {{-- Modal content--}}
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Please Login</h4>
      </div>
      <div class="modal-body">

        <form class="" id="login-f" role="form">
            <div class="form-group">
                <input type="email" required="" placeholder="Email" id="inputEmail" class="form-control normal-input">
            </div>
            <div class="form-group">
                <input type="password" required="" placeholder="Password" class="form-control normal-input" name="login-password" id="login-password">
            </div>
            <div class="pos-adj1">
                <a style="color: #23a500 !important; float: left; font-size: 9pt!important; padding: 0 !important; width: 50%;" data-dismiss="modal" data-target="#forgot-password" data-toggle="modal" href="#" class="fp">Forgot Password ?</a>
                <div class="checkbox no-margin pull-right">
                    <label class="pos-adj2">
                      <input type="checkbox"> Remember Me
                    </label>
                </div>
            </div>
            <button class="btn btn-default green-small3 margin-top-twenty" type="submit">Login</button>
            <div class="pos-adj3">
                <span>Don't have an account ?</span>
                <a data-target="#sgn-pup" data-toggle="modal" style="color: #23a500 !important; font-size: 10pt !important; padding: 0 !important;" class="sup" href="#">Sign up</a>
            </div>
            <div class="clearfix"></div>
            <div style="display:none" class="for-pass">
                <div class="modal-header">
                    <button type="button" class="close closefp" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Reset Password</h4>
                </div>
                <div class="modal-body">
                      <div class="form-group">
                      <input type="email" placeholder="Email Address" id="InputEmail1" class="form-control normal-input">
                      </div>
                      <button class="btn btn-default green-small" type="submit">Reset Password</button>
                      <p class="small-text margin-top-ten">We will send password to your email address shortly</p>
                </div>
            </div>
        </form>
        <a class="facebook butt-adj1" href="#">Login with Facebook</a>
        <a class="googleplus butt-adj1" href="#">Login with Google Plus</a>

      </div>
      <div class="clearfix margin-twenty"></div>

    </div>

  </div>
</div>