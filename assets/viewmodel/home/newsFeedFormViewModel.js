var newsFeedFormViewModel = {

    initialize: function() {
        var form = this;
        form.initializeDefaultValues();
        form.initializeEvents();
        form.populateRecentNewsFeed();
    },

    initializeDefaultValues: function() {
        var form = this;
    },

    initializeEvents: function() {
        var form = this;
    },

    populateRecentNewsFeed: function() {
        var form = this;
        $.ajax({
            url: baseViewModel.baseUrl + baseViewModel.showNewsFeedListUrl,
            type: 'get',
            async: false,
            data: {
                p: 1,
            }, success: function(data) {
                var newsFeedList = data;
                $("#post-list-contents").html(newsFeedList + newsFeedList);
            }
        })
    }
}