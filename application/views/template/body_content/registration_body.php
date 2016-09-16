<script type="text/javascript" src="<?php echo base_url(); ?>assets/viewmodel/registration/registrationFormViewModel.js"></script>
<div class="body-content container">
    <div id="div-container-form">
        <div id="registration-container">
            <div id="registration-form">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="registration-panel-form">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" id="registration-header">
                        <h1>Create your Account</h1>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 reg-content" id="registration-content">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group" id="saving-registration-response-message">

                                </div>
                                <div class="form-group">
                                    <label class="required-fields-legend"> * fields are required</label>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="form-control fieldRequired" id="txtLastname" placeholder="Last name" maxlength="100"/>
                                    <span class="input-group-addon" id="basic-addon1">,</span>
                                    <input type="text" class="form-control fieldRequired" id="txtFirstname" placeholder="First name" maxlength="100"/>
                                </div>
                                <label id="lblNameValidation" class="form-label-validation-required">&nbsp;</label>
    <!--                            -->
                                <input type="text" class="form-control fieldRequired" id="txtUsername" placeholder="Username" maxlength="20"/>
                                <label id="lblUsernameValidation" class="form-label-validation-required">&nbsp;</label>

                                <input type="password" class="form-control fieldRequired" id="txtPassword" placeholder="Password" maxlength="100"/>
                                <label id="lblPasswordValidation" class="form-label-validation-required">&nbsp;</label>

                                <input type="password" class="form-control fieldRequired" id="txtConfirmPassword" placeholder="Confirm Password" maxlength="20"/>
                                <label id="lblConfirmPasswordValidation" class="form-label-validation-required">&nbsp;</label>

                                <select class="form-control fieldRequired" id="cboCountry"></select>
                                <label id="lblCountryValidation" class="form-label-validation-required">&nbsp;</label>
                                <p class="form-label-validation-required">Birthday</p>
                                <div class="input-group">
                                    <select class="form-control fieldRequired" id="cboMonth"></select>
                                    <span class="input-group-addon" id="basic-addon1"></span>
                                    <select class="form-control fieldRequired" id="cboDay"></select>
                                    <span class="input-group-addon" id="basic-addon1"></span>
                                    <select class="form-control fieldRequired" id="cboYear"></select>
                                </div>
                                <label id="lblBirthdayValidation" class="form-label-validation-required">&nbsp;</label>

                                <input type="email" class="form-control fieldRequired" id="txtEmail" placeholder="example@domain.com" maxlength="50"/>
                                <label id="lblEmailValidation" class="form-label-validation-required">&nbsp;</label>
                            </div>
                            <div class="panel-footer text-right">
                                <input type="button" class="btn btn-success" id="btnSignUp" value="Sign Up">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 reg-content" id="registration-content-description">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam suscipit magna velit, quis dapibus odio gravida id.
                            Sed dictum efficitur laoreet. Curabitur ex tortor, laoreet sit amet nibh vitae, aliquet luctus nunc. Nunc viverra
                            metus non ullamcorper bibendum. Duis a volutpat tellus. Aenean mattis bibendum nunc, nec pharetra nisi sollicitudin
                            et. Mauris vitae sem ut purus egestas posuere. Nam vehicula lectus at posuere ultricies.</br></br>

                            Phasellus vitae vehicula tellus. Curabitur ut ultrices turpis. Ut ac faucibus est. Nam mollis tempor lacus nec
                            pellentesque. In hac habitasse platea dictumst. Curabitur porttitor augue ex, ut consequat est commodo et. Proin
                            dignissim congue porta. Nullam luctus nisi vitae ex feugiat tincidunt. Integer lectus nulla, dapibus vel magna at,
                            fermentum scelerisque urna. Quisque euismod semper metus, nec laoreet massa rhoncus in.</br></br>

                            Donec vitae felis orci. Proin rhoncus, risus eget eleifend tincidunt, enim lectus tempor diam, in feugiat libero eros
                            sed lectus. Donec auctor porttitor sodales. Proin euismod mollis semper. Phasellus pharetra odio quam, sed elementum
                            neque placerat vel. Maecenas vestibulum, felis eget blandit egestas, augue purus rutrum nibh, quis condimentum quam
                            mauris a neque. Ut nisi ligula, sodales in ligula sed, lacinia luctus magna. Nulla facilisi. Aenean urna magna, finibus
                            sed diam luctus, molestie pulvinar sapien. Donec maximus augue nec sapien mattis scelerisque. Vestibulum porttitor
                            tincidunt neque posuere sollicitudin.</br></br>

                            Sed accumsan nunc a purus auctor, eu rhoncus neque facilisis. Nullam nec dui sit amet lorem sollicitudin aliquam. Fusce
                            gravida erat quis lorem aliquam, sed finibus ante eleifend. Suspendisse sit amet dignissim diam, ut tristique nisl.
                            Suspendisse risus mauris, interdum ac finibus ut, euismod quis ipsum. Morbi sollicitudin ligula eget mauris pharetra,
                            nec ornare ante lobortis. Nulla facilisi. Sed sit amet turpis et nunc vulputate ullamcorper.</br></br>

                            Sed faucibus leo et sollicitudin dapibus. Sed mauris sapien, rutrum at nulla ut, accumsan aliquet mauris. Aliquam viverra
                            metus purus, non porttitor neque interdum in. Proin sit amet enim ligula. Suspendisse eget odio dui. Donec vel nisl lacinia,
                            vestibulum ante vitae, vehicula lorem. In euismod ultrices mi non suscipit.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        registrationFormViewModel.initialize();
    });
</script>