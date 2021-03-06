<html>
    <head>
        <?php
            $baseUrl = base_url();
            $otherTags = '';
            $profileName = isset($_SESSION['username']) ? $_SESSION['username'] : '';
            switch($headFlags) {
                case "Home":
                    echo '<title>Lblog</title>';
                    $otherTags = '<link rel="stylesheet" href="'.$baseUrl.'assets/styles/home/home.css">';
                break;
                case "Login":
                    echo '<title>Lblog - Login</title>';
                    $otherTags = '<link rel="stylesheet" href="'.$baseUrl.'assets/styles/login/login.css">';
                    break;
                case "Main":
                    echo '<title>Lblog - Welcome</title>';
                    $otherTags = '<link rel="stylesheet" href="'.$baseUrl.'assets/styles/welcome/welcome.css">';
                break;
                case "Profile":
                    echo '<title>' . $profileName . '</title>';
                    $otherTags = '<link rel="stylesheet" href="'.$baseUrl.'assets/styles/profile/profile.css">';
                    break;
                case "Registration":
                    echo '<title>Lblog - Sign up</title>';
                    $otherTags = '<link rel="stylesheet" href="'.$baseUrl.'assets/styles/registration/registration.css">';
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
        <script type="text/javascript" src="<?php echo base_url()?>assets/viewmodel/messageFormViewModel.js"></script>

        <?php echo $otherTags; ?>
    </head>
