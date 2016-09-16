<script type="text/javascript" src="<?php echo base_url(); ?>assets/viewmodel/login/loginFormViewModel.js"></script>
<div class="body-content container">
    <div id="login-container">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" id="login-header">
                <h1>Log into your Account</h1>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 login-content">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group" id="login-response-message">

                        </div>
                        <div class="form-group">
                            <label class="required-fields-legend"> * fields are required</label>
                        </div>
                        <input type="text" class="form-control fieldRequired" id="txtUsername" placeholder="Username" maxlength="20"/>
                        <label id="lblUsernameValidation" class="form-label-validation-required">&nbsp;</label>

                        <input type="password" class="form-control fieldRequired" id="txtPassword" placeholder="Password" maxlength="20"/>
                        <label id="lblPasswordValidation" class="form-label-validation-required">&nbsp;</label>
                    </div>
                    <div class="panel-footer text-right">
                        <input type="button" class="btn btn-primary" id="btnLogin" value="Log in"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        loginFormViewModel.initialize();
    });
</script>