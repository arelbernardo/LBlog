<html>
    <head>
        <?php
            $baseUrl = base_url();
            $otherTags = '';
            switch($headFlags) {
                case "Main":
                    echo '<title>Lblog - Welcome</title>';
                    $otherTags = '<link rel="stylesheet" href="'.$baseUrl.'assets/styles/welcome/welcome.css">';
                break;
                case "Registration":
                    echo '<title>Lblog - Sign up</title>';
                    $otherTags = '<link rel="stylesheet" href="'.$baseUrl.'assets/styles/registration/registration.css">';
                break;
                case "Login":
                    echo '<title>Lblog - Login</title>';
                    $otherTags = '<link rel="stylesheet" href="'.$baseUrl.'assets/styles/login/login.css">';
                break;
                default:
                    echo '';
                    $otherTags = '';
                break;
            }
        ?>
        <link rel="stylesheet" href="<?php echo base_url()?>assets/library/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/library/jquery/jquery-ui.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/styles/main.css">
        <!---->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/library/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/library/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/library/bootstrap/js/bootstrap.min.js"></script>
        <!---->
        <script type="text/javascript" src="<?php echo base_url()?>assets/viewmodel/baseViewModel.js"></script>
        <?php echo $otherTags; ?>
    </head>
