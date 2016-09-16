<script type="text/javascript" src="<?php echo base_url(); ?>assets/viewmodel/welcome/homepageFormViewModel.js"></script>
<?php
    $baseUrl = base_url();
    $profileName = isset($_SESSION['username']) ? "[".$_SESSION['username']."]" : 'Home';
    $otherNavButtons = '';
    if($hasSession) {
        switch($headFlags) {
            case "Main":
            case "Home":
            $otherNavButtons = '<li class="active"><a href="#">'.$profileName.'</a></li>
                      <li id="btnMemberLogout"><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
                break;
            default:
                echo '';
                break;
        }
    } else {
        switch($headFlags) {
            case "Main":
                $otherNavButtons = '<li id="btnOpenSignUpForm"><a href="#"><span class="glyphicon glyphicon-user"></span> Create an Account</a></li>
                    <li><a href="'.$baseUrl.'Login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                break;
            case "Registration":
                $otherNavButtons = '<li><a href="'.$baseUrl.'Login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                break;
            case "Login":
                $otherNavButtons = '<li id="btnOpenSignUpForm"><a href="#"><span class="glyphicon glyphicon-user"></span> Create an Account</a></li>';
                break;
            default:
                echo '';
                break;
        }
    }
?>
<nav class="navbar navbar-inverse navbar-static-top navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">LBlog</a>
        </div>
        <ul class="nav navbar-nav">

        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php echo $otherNavButtons; ?>
        </ul>
    </div>
</nav>
<script>
    $(function() {
        homepageFormViewModel.initialize();
        baseViewModel.initialize("<?php echo base_url(); ?>", "<?php echo date('Y-m-d'); ?>");
    });
</script>