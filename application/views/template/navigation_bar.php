<script type="text/javascript" src="<?php echo base_url(); ?>assets/viewmodel/welcome/homepageFormViewModel.js"></script>
<?php
    $baseUrl = base_url();
    $profileName = isset($_SESSION['username']) ? "[".$_SESSION['username']."]" : 'Home';
    $otherNavButtons = '';
    $siteName = '';
    if($hasSession) {
        $siteName = '<a class="navbar-brand" href="'.$baseUrl.'Home">LBlog</a>';
        switch($headFlags) {
            case "Main":
            case "Home":
            $otherNavButtons = '
                <!--<li>
                    <form class="navbar-form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-warning glyphicon glyphicon-search"></button>
                    </form>
                </li>-->
                <li class=""><a href="#">'.$profileName.'</a></li>
              <li id="btnMemberLogout"><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
            break;
            default:
                echo '';
            break;
        }
    } else {
        $siteName = '<a class="navbar-brand" href="'.$baseUrl.'">LBlog</a>';
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
            <?php echo $siteName; ?>
        </div>
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