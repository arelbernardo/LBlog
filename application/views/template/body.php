<body>
<?php
    $this->load->view('template/navigation_bar',
        array(
            "headFlags" => $headFlags,
            "hasSession" => $hasSession
        )
    );
    $this->load->view($body, $data);
?>
<div class="container">
    <div class="modal fade" id="modal-container" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create a Blog</h4>
                </div>
                <div class="modal-body">
                    <p>yahoooooo sample!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>