var baseViewModel = {
    baseUrl: null,
    serverDate: null,

    //links

















    initialize: function(baseUrl) {
        var form = this;
        form.initializeDefaultValues(baseUrl);
    },

    initializeDefaultValues: function(baseUrl) {
        var form = this;
        form.baseUrl = baseUrl;
    }
}