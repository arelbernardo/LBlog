<body>
<?php
    $this->load->view('template/navigation_bar',
        array(
            "headFlags" => $headFlags,
            "hasSession" => $hasSession
        )
    );
    $this->load->view($body);
?>
</body>