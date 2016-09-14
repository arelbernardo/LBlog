var homepageFormViewModel = {

    initialize: function() {
        var form = this;
        form.initializeEvents();
    },

    initializeEvents: function() {
        var form = this;
        $("#btnSignUp").click(function() {
            window.location.href = baseViewModel.baseUrl + 'Registration';
        });
    }



}