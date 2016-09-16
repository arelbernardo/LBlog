var registrationFormViewModel = {

    model: null,

    initialize: function() {
        var form = this;
        form.initializeDefaultValues();
        form.populateCountryList();
        date_helper.setDatePicker("cboMonth", "cboDay", "cboYear");
        form.initializeEvents();
    },

    initializeEvents: function() {
        var form = this;
        var model = form.model;
        $("#txtLastname").focus();

        $("#txtLastname").focusout(function() {
            this.value = base_nameHelper.titleCasing(this.value);
            model.lastName = this.value != '' ? this.value.trim() : '';
        });

        $("#txtFirstname").focusout(function() {
            this.value = base_nameHelper.titleCasing(this.value);
            model.firstName = this.value != '' ? this.value.trim() : '';
        });

        $("#txtUsername").focusout(function() {
            model.userName = this.value != '' ? this.value.trim() : '';
        });

        $("#txtPassword").focusout(function() {
           model.password = this.value;
        });

        $("#txtConfirmPassword").focusout(function() {
            model.confirmPassword = this.value;
        });

        $("#cboCountry").change(function() {
            model.countryId = this.value;
        });

        $("#cboMonth").change(function(){
           model.birthdayMonth = this.value;
        });

        $("#cboDay").change(function(){
            model.birthdayDay = this.value;
        });

        $("#cboYear").change(function(){
            model.birthdayYear = this.value;
        });

        $("#txtEmail").focusout(function() {
           model.email = this.value != '' ? this.value.trim() : '';
        });

        $("#btnSignUp").click(function() {
            form.enableDisableFields(true);
            if(form.validateFields()) {
                form.createNewAccount();
            }
            form.enableDisableFields(false);
        });
    },

    initializeDefaultValues: function() {
        var form = this;
        form.model = registrationViewModel;
        form.model.initializeDefaultValues();
        form.clearValidationMessageFields();
    },

    clearValidationMessageFields: function() {
        $("#lblNameValidation").html('&nbsp;');
        $("#lblUsernameValidation").html('&nbsp;');
        $("#lblPasswordValidation").html('&nbsp;');
        $("#lblConfirmPasswordValidation").html('&nbsp;');
        $("#lblCountryValidation").html('&nbsp;');
        $("#lblBirthdayValidation").html('&nbsp;');
        $("#lblEmailValidation").html('&nbsp;');
    },

    populateCountryList: function() {
        $("#cboCountry").html("");
        $.post(baseViewModel.baseUrl + baseViewModel.getAllCountryListUrl, function(data) {
            var html = '<option selected value="0">Select Country</option>';
            var countryList = $.parseJSON(data);
            for(var x = 0, y = countryList.length; x < y; x++) {
                html += '<option value="' + countryList[x].Id + '">' + countryList[x].CountryName + '</option>\n';
            }
            $("#cboCountry").html(html);
        });
    },

    validateFields: function() {
        var form = this, failedFields = 0;
        var data = form.model.getData();
        var data = data.data;
        form.hideMessageResponse();
        form.clearValidationMessageFields();
        if(data.lastName == '' || data.firstName == '') {
            $("#lblNameValidation").html("Field is required");
            failedFields++;
        }
        if (data.userName == '') {
            $("#lblUsernameValidation").html("Field is required");
            failedFields++;
        }
        if (data.password == '') {
            $("#lblPasswordValidation").html("Field is required");
            failedFields++;
        }
        if (data.confirmPassword == '') {
            $("#lblConfirmPasswordValidation").html("Field is required");
            failedFields++;
        }
        if ( (data.password != '' && data.confirmPassword != '') && (data.password != data.confirmPassword) ) {
            $("#lblPasswordValidation").html("Password does not match");
            failedFields++;
        }
        if (data.countryId == 0) {
            $("#lblCountryValidation").html("Field is required");
            failedFields++;
        }
        if (data.birthdayMonth == 0 || data.birthdayDay == 0 || data.birthdayYear == 0) {
            $("#lblBirthdayValidation").html("Field is required");
            failedFields++;
        }
        if (data.email == '') {
            $("#lblEmailValidation").html("Field is required");
            failedFields++;
        }
        if(failedFields != 0) {
            return false;
        } else {
            return true;
        }
    },

    createNewAccount: function() {
        var form = this;
        var model = form.model;
        $.ajax({
            url: baseViewModel.baseUrl + baseViewModel.createNewAccountUrl,
            type: 'post',
            async: false,
            data: {
                data: model.getData()
            }, success: function(data) {
                var response = $.parseJSON(data);
                var isError = false;
                if(!response.hasError) {
                    form.clearFields();
                } else {
                    isError = true;
                }
                form.showMessageResponse(response.msg, isError);
            }
        });
    },

    showMessageResponse: function(errorMessage, isError) {
        var messageColorClass = '';
        var messageTitle = '';
        if(isError) {
            messageColorClass = 'alert-warning';
            messageTitle = "Error";
        } else {
            messageColorClass = 'alert-success';
            messageTitle = "Success";
        }
        $("#saving-registration-response-message").show();
        $("#saving-registration-response-message").html('<div class="alert ' + messageColorClass + '">' +
            '<strong>' + messageTitle + ': </strong> ' + errorMessage +
            '</div>');
    },

    hideMessageResponse: function() {
        $("#saving-registration-response-message").hide();
        $("#saving-registration-response-message").html('');
    },

    clearFields: function() {
        var form = this;
        $("#txtLastname").val('');
        $("#txtFirstname").val('');
        $("#txtUsername").val('');
        $("#txtPassword").val('');
        $("#txtConfirmPassword").val('');
        $("#cboCountry option").prop('selected', function(){
            return this.defaultSelected;
        });
        $("#cboMonth option").prop('selected', function(){
            return this.defaultSelected;
        });
        $("#cboDay option").prop('selected', function(){
            return this.defaultSelected;
        });
        $("#cboYear option").prop('selected', function(){
            return this.defaultSelected;
        });
        $("#txtEmail").val('');
        form.initializeDefaultValues();
    },

    enableDisableFields: function(disabled) {
        $("#txtLastname").prop('disabled', disabled);
        $("#txtFirstname").prop('disabled', disabled);
        $("#txtUsername").prop('disabled', disabled);
        $("#txtPassword").prop('disabled', disabled);
        $("#txtConfirmPassword").prop('disabled', disabled);
        $("#cboCountry").prop('disabled', disabled);
        $("#cboMonth").prop('disabled', disabled);
        $("#cboDay").prop('disabled', disabled);
        $("#cboYear").prop('disabled', disabled);
        $("#txtEmail").prop('disabled', disabled);
    }
}




var registrationViewModel = {
    lastName: '',
    firstName: '',
    userName: '',
    password: '',
    confirmPassword: '',
    countryId: 0,
    birthdayMonth: 0,
    birthdayDay: 0,
    birthdayYear: 0,
    email: '',

    initializeDefaultValues: function() {
        this.lastName = '';
        this.firstName = '';
        this.userName = '';
        this.password = '';
        this.confirmPassword = '';
        this.countryId = 0;
        this.birthdayMonth = 0;
        this.birthdayDay = 0;
        this.birthdayYear = 0;
        this.email = '';
    },

    getData: function() {
        var data = {
            lastName: this.lastName,
            firstName: this.firstName,
            userName: this.userName,
            password: this.password,
            confirmPassword: this.confirmPassword,
            countryId: this.countryId,
            birthdayMonth: this.birthdayMonth,
            birthdayDay: this.birthdayDay,
            birthdayYear: this.birthdayYear,
            email: this.email,
            birthday: this.birthdayYear + "-" + this.birthdayMonth + "-" + this.birthdayDay,

            lastName_dataType: "char",
            firstName_dataType: "char",
            userName_dataType: "char",
            password_dataType: "password",
            confirmPassword_dataType: "password",
            countryId_dataType: "int_unsigned",
            birthdayMonth_dataType: "int_unsigned",
            birthdayDay_dataType: "int_unsigned",
            birthdayYear_dataType: "int_unsigned",
            email_dataType: "email",
            birthday_dataType: "date",

            lastName_field: "Last name",
            firstName_field: "First name",
            userName_field: "Username",
            password_field: "Password",
            confirmPassword_field: "Confirm Password",
            countryId_field: "Country",
            birthdayMonth_field: "Birthdate",
            birthdayDay_field: "Birthdate",
            birthdayYear_field: "Birthdate",
            email_field: "Email",
            birthday_field: "Birthdate",

            age_validation: true,
            age_validationFields: {
                birthday: this.birthdayYear + "-" + this.birthdayMonth + "-" + this.birthdayDay,
                birthday_field: "Age",
            }
        };
        return {
            data: data
        }
    }
}