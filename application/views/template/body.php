<body>
<?php
    $this->load->view($body, array("hasSession" => $hasSession));
?>
<script>
    $(function() {
        baseViewModel.initialize("<?php echo base_url(); ?>");
    });
</script>
</body>