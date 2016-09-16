var homepageFormViewModel = {

    initialize: function() {
        var form = this;
        form.initializeEvents();
    },

    initializeEvents: function() {
        var form = this;
        $("#btnOpenSignUpForm").click(function() {
            window.location.href = baseViewModel.baseUrl + 'Registration';
        });
    }



}