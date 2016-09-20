<script type="text/javascript" src="<?php echo base_url(); ?>assets/viewmodel/home/newsFeedFormViewModel.js"></script>
<div class="body-content container">
    <div id="homepage-content">
        <div class="col-xs-12 col-sm-12 col-md-8 col-md-8 post-margin">
            <div class="panel panel-default adjust-post-panel" id="create-post-panel">
                <div class="panel-body">
                    <h4>Something came up on your mind? Or any expressions? Why don't you create a blog for it now? :)</h4>
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal-container">Write a Blog</button>
                </div>
            </div>
            <div class="panel panel-default adjust-post-panel">
                <div id="panel-header">
                    <button class="btn btn-link" id="prev-post">&laquo;&nbsp;prev</button>
                    <button class="btn btn-link pull-right" id="next-post">next&nbsp;&raquo;</button>
                </div>
                <div id="post-content">

                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-md-4 post-margin" id="post-list-container">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="input-group">
                        <input type="text" id="txtSearchQuery" placeholder="Search query..." class="form-control"/>
                        <span class="input-group-btn">
                            <button class="btn btn-warning" type="button">Search</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="panel panel-default" id="post-list">
                <div class="panel-heading">
                    <h4>Recent Posts</h4>
                </div>
                <div id="post-list-contents">

                </div>
                <div class="panel-footer">
                    <div class="text-center" id="post-list-pager">
                        <ul class="pagination">
                            <li class="page-item" id="prev-list">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;&nbsp;prev</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item" id="next-list">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">next&nbsp;&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        newsFeedFormViewModel.initialize();
    })
</script>