var baseViewModel = {
    baseUrl: null,
    serverDate: null,

    //links
    //lookup
    getAllCountryListUrl:                                               'Lookup/getAllCountries',















    initialize: function(baseUrl) {
        var form = this;
        form.initializeDefaultValues(baseUrl);
    },

    initializeDefaultValues: function(baseUrl) {
        var form = this;
        form.baseUrl = baseUrl;
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