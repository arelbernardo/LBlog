var newsFeedFormViewModel = {
    model: null,

    initialize: function() {
        var form = this;
        form.initializeDefaultValues();
        form.populateRecentNewsFeed();
        form.initializeEvents();
    },

    initializeDefaultValues: function() {
        var form = this;
        form.model = newsFeedViewModel;
    },

    initializeEvents: function() {
        var form = this;

        $(".linkPostName").click(function(){
            form.showPostDetails(this.id);
        });
    },

    populateRecentNewsFeed: function() {
        var form = this;
        $.ajax({
            url: baseViewModel.baseUrl + baseViewModel.showNewsFeedListUrl,
            type: 'get',
            async: false,
            data: {
                p: 1,
            },
            success: function(data) {
                var newsFeedList = $.parseJSON(data);
                $("#post-list-contents").html(newsFeedList.htmlView);
                if(newsFeedList.hasNewsFeedList) {
                    form.model.newsFeedList = newsFeedList.newsFeedList;
                }
            }
        })
    },

    showPostDetails: function(id) {
        var form = this;
        $.ajax({
            url: baseViewModel.baseUrl + baseViewModel.showPostDetailsUrl,
            type: 'post',
            async: true,
            data: {
                Id: id,
            },
            success: function(data) {
                var response = $.parseJSON(data);
                $("#post-content").html(response.htmlView);
            }
        });
    }
}

var newsFeedViewModel = {
    newsFeedList: null,
    initializeDefaultValues: function() {
        this.newsFeedList = null;
    },
    getData: function() {
        return {
            newsFeedList: this.newsFeedList
        }
    }
}