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
<script>
    $(function() {
        baseViewModel.initialize("<?php echo base_url(); ?>");
    });
</script>
</body>