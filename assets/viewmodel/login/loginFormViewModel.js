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
        //todo by tomorrow
        alert("validate credentials");
        /*$.ajax({
           url: baseViewModel.baseUrl + baseViewModel.loginToAccountUrl,

        });*/
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