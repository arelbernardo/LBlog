var baseViewModel = {
    baseUrl: null,
    serverDate: null,

    //links
    //lookup
    getAllCountryListUrl:                                               'Lookup/getAllCountries',
    getDatePickerContentsUrl:                                           'Lookup/getDatePickerContents',

    //Registration
    createNewAccountUrl:                                                'Registration/createNewAccount',














    initialize: function(baseUrl, serverDate) {
        var form = this;
        form.initializeDefaultValues(baseUrl, serverDate);
    },

    initializeDefaultValues: function(baseUrl, serverDate) {
        var form = this;
        form.baseUrl = baseUrl;
        form.serverDate = serverDate;
    }
}

var base_nameHelper = {
    titleCasing: function(word){
        var name = word.toLowerCase().replace(/\b[a-z]/g, function(letter) {
            return letter.toUpperCase();
        });
        return name;
    }
}

var date_helper = {
    setDatePicker: function(elementMonth, elementDay, elementYear) {
        var date = null;
        $("#"+elementMonth).html(''); var monthContent = '';
        $("#"+elementDay).html(''); var dayContent = '';
        $("#"+elementYear).html(''); var yearContent = '';
        $.post(baseViewModel.baseUrl + baseViewModel.getDatePickerContentsUrl, function(data) {
            date = $.parseJSON(data);
        })
            .done(function() {
                monthContent = '<option value="0" selected="1">Month</option>';
                dayContent = '<option value="0" selected="1">Day</option>';
                yearContent = '<option value="0" selected="1">Year</option>';

                for(var x = 0, y = date.months.length; x < y; x++) {
                    monthContent += '<option value="' + (x + 1) + '">' +date.months[x]+ '</option>';
                }
                $("#"+elementMonth).html(monthContent);

                for(var x = 0, y = date.days.length; x < y; x++) {
                    dayContent += '<option value="' +date.days[x]+ '">' +date.days[x]+ '</option>';
                }
                $("#"+elementDay).html(dayContent);

                for(var x = 0, y = date.years.length; x < y; x++) {
                    yearContent += '<option value="' +date.years[x]+ '">' +date.years[x]+ '</option>';
                }
                $("#"+elementYear).html(yearContent);
            });
        ;

    }

}