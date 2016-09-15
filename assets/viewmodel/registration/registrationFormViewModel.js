var registrationFormViewModel = {

    initialize: function() {
        var form = this;
        form.initializeEvents();
        form.initializeDefaultValues();
        form.populateCountryList();
    },

    initializeEvents: function() {
        var form = this;
        $("#txtLastname").focus();
        $("#txtBirthday").datepicker();
        $("#txtBirthday").datepicker({
            maxDate: -1
        });

        $("#txtLastname").focusout(function(){
           this.value = base_nameHelper.titleCasing(this.value);
        });

        $("#txtFirstname").focusout(function(){
            this.value = base_nameHelper.titleCasing(this.value);
        });

        $("#btnSignUp").click(function(){

        });
    },

    initializeDefaultValues: function() {
        var form = this;
    },

    populateCountryList: function() {
        $("#cboCountry").html("");
        $.post(baseViewModel.baseUrl + baseViewModel.getAllCountryListUrl, function(data) {
            var html = '<option selected disabled value="0">Select Country</option>';
            var countryList = $.parseJSON(data);
            for(var x = 0, y = countryList.length; x < y; x++) {
                html += '<option value="' + countryList[x].Id + '">' + countryList[x].CountryName + '</option>\n';
            }
            $("#cboCountry").html(html);
        });
    }
}