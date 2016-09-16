var loginFormViewModel = {
    model: null,

    initialize: function() {
        var form = this;
        form.initializeDefaultValues();
        form.initializeEvents();
    },

    initializeDefaultValues: function() {
        var form = this;
        var model = form.model = loginViewModel;
        model.initializeDefaultValues();
        form.clearValidationMessageFields();
    },

    initializeEvents: function() {
        var form = this;
        var model = form.model;

        $("#txtUsername").focus();

        $("#txtUsername").focusout(function() {
           this.value = model.username = this.value.trim();
        });

        $("#txtPassword").focusout(function() {
            model.password = this.value;
        });

        $("#btnLogin").click(function() {
            form.hideMessageResponse();
            if(form.validateFields()) {
                form.loginToAccount();
            }
        });
    },

    validateFields: function(){
        var form = this, errorCount = 0;
        var model = form.model;
        form.clearValidationMessageFields();
        if(model.username == '') {
            $("#lblUsernameValidation").html('Field is required.');
            errorCount++;
        }

        if(model.password == '') {
            $("#lblPasswordValidation").html('Field is required.');
            errorCount++;
        }

        if(errorCount > 0) {
            return false;
        } else {
            return true;
        }

    },

    clearValidationMessageFields: function() {
        $("#lblUsernameValidation").html('&nbsp;');
        $("#lblPasswordValidation").html('&nbsp;');
    },

    loginToAccount: function() {
        var form = this;
        $.ajax({
            url: baseViewModel.baseUrl + baseViewModel.loginToAccountUrl,
            type: 'post',
            async: false,
            data: {
                data: form.model.getData()
            },
            success: function(data) {
                var response = $.parseJSON(data);
                if(response.hasRecord) {
                    window.location.href = baseViewModel.baseUrl + baseViewModel.homepageUrl;
                } else {
                    form.showMessageResponse(false);
                    $("#txtPassword").val('');
                }
            }
        });
    },

    showMessageResponse: function(isRegistered) {
        var form = this;
        var messageColorClass = '', messageTitle = '', messageContent = '';
        if(isRegistered) {
            messageColorClass = 'alert-success';
            messageTitle = "Success";
            messageContent = "Welcome " + form.model.username;
        } else {
            messageColorClass = 'alert-warning';
            messageTitle = "Error";
            messageContent = "Login failed";
        }
        $("#login-response-message").html('<div class="alert ' + messageColorClass + '">' +
            '<strong>' + messageTitle + ': </strong> ' + messageContent +
            '</div>');
    },

    hideMessageResponse: function() {
        $("#login-response-message").html('');
    }

}

var loginViewModel = {
    username: '',
    password: '',

    initializeDefaultValues: function() {
        this.username = '';
        this.password = '';
    },

    getData: function() {
        return {
            username: this.username,
            password: this.password
        }
    }
}