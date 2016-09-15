<body>
<?php
    $this->load->view('template/nav_bar/navigation_bar',
        array(
            "naviBarFlag" => $naviBarFlag,
            "hasSession" => $hasSession
        )
    );
    $this->load->view($body);
?>
</body>