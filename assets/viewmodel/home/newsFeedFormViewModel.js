var newsFeedFormViewModel = {
    model: null,
    currentPage: 1,
    maxPageList: 0,
    maxItemOnList: 0,
    currentPostIndex: 0,

    initialize: function() {
        var form = this;
        form.initializeDefaultValues();
        form.populateRecentNewsFeed(false, true);
        form.initializeEvents();
    },

    initializeDefaultValues: function() {
        var form = this;
        form.model = newsFeedViewModel;
        form.currentPage = 1;
        form.maxPageList = 0;
        form.maxItemOnList = 0;
        form.currentPostIndex = 0;
    },

    initializeEvents: function() {
        var form = this;

        $("#prev-list").click(function() {
           if(form.currentPage > 1) {
               form.currentPage--;
               form.populateRecentNewsFeed(false, true);
           }
        });

        $("#next-list").click(function() {
            if(form.currentPage < form.maxPageList) {
                form.currentPage++;
                form.populateRecentNewsFeed(false, true);
            }
        });
    },

    initializeClickItems: function() {
        var form = this;

        $(".linkPostName").click(function() {
            form.showPostDetails(this);
            form.setCurrentPostIndexByAnchorElement(this);
        });

        $(".linkPostName").on('click', function() {
            $(this).parent().parent().toggleClass('checked').siblings().removeClass('checked');
        });

        $("#next-post").click(function(e) {
            if(form.currentPostIndex < 9 && form.currentPostIndex < form.maxItemOnList - 1) {
                form.currentPostIndex++;
                form.showPostDetailsByIndexId(form.currentPostIndex);
            } else if(form.currentPage < form.maxPageList) {
                form.currentPage++;
                form.populateRecentNewsFeed(false, false);
            }
            e.stopImmediatePropagation();
        });

        $("#prev-post").click(function(e) {
            if(form.currentPostIndex > 0) {
                form.currentPostIndex--;
                form.showPostDetailsByIndexId(form.currentPostIndex);
            } else if (form.currentPage > 1) {
                form.currentPage--;
                form.populateRecentNewsFeed(true, false);
            }
            e.stopImmediatePropagation();
        });
    },

    populateRecentNewsFeed: function(isPrevious, isPagerClicked) {
        var form = this;
        $.ajax({
            url: baseViewModel.baseUrl + baseViewModel.showNewsFeedListUrl,
            type: 'get',
            async: false,
            data: {
                p: form.currentPage
            },
            success: function(data) {
                var newsFeedList = $.parseJSON(data);
                $("#post-list-contents").html(newsFeedList.htmlView);
                form.maxPageList = newsFeedList.maxPageList;
                form.maxItemOnList = newsFeedList.maxItemOnList;
                if(newsFeedList.hasNewsFeedList) {
                    form.model.newsFeedList = newsFeedList.newsFeedList;
                    form.initializeClickItems();
                    if(isPrevious && !isPagerClicked) {
                        form.currentPostIndex = form.maxItemOnList - 1 ;
                    } else {
                        form.currentPostIndex = 0;
                    }
                    form.showPostDetailsByIndexId(form.currentPostIndex);
                }
            }
        });
    },

    showPostDetailsByIndexId: function(indexId) {
        var form = this;
        $("#post_id_" + (indexId + 1) + " span a.linkPostName").trigger("click");
    },

    showPostDetails: function(element) {
        var form = this;
        $.ajax({
            url: baseViewModel.baseUrl + baseViewModel.showPostDetailsUrl,
            type: 'post',
            async: true,
            data: {
                Id: element.id,
            },
            success: function(data) {
                var response = $.parseJSON(data);
                $("#post-content").html(response.htmlView);
            }
        });
    },

    setCurrentPostIndexByAnchorElement: function(element) {
        var form = this;
        var parentId = $("#"+element.id).parent().parent()[0].id;
        var parentId = parentId.split("_");
        form.currentPostIndex = parentId[2] - 1;
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