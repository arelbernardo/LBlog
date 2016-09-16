<script type="text/javascript" src="<?php echo base_url(); ?>assets/viewmodel/welcome/homepageFormViewModel.js"></script>
<nav class="navbar navbar-inverse navbar-static-top navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">LBlog</a>
        </div>
        <ul class="nav navbar-nav">

        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
                $baseUrl = base_url();
                if($hasSession) {
                    switch($headFlags) {
                        case "Main":
                            echo '
                                <li class="active"><a href="#">Home</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                            ';
                        break;
                        default:
                            echo '';
                        break;
                    }
                } else {
                    switch($headFlags) {
                        case "Main":
                            echo '
                                <li id="btnOpenSignUpForm"><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                                <li><a href="'.$baseUrl.'Login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            ';
                        break;
                        case "Registration":
                            echo '
                                <li><a href="'.$baseUrl.'Login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            ';
                        break;
                        default:
                            echo '';
                        break;
                    }
                }
            ?>
        </ul>
    </div>
</nav>
<script>
    $(function() {
        homepageFormViewModel.initialize();
        baseViewModel.initialize("<?php echo base_url(); ?>", "<?php echo date('Y-m-d'); ?>");
    });
</script>