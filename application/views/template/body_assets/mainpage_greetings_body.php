<script type="text/javascript" src="<?php echo base_url(); ?>assets/viewmodel/welcome/homepageFormViewModel.js"></script>
<nav class="navbar navbar-inverse navbar-static-top navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">LBlog</a>
        </div>
        <ul class="nav navbar-nav">

        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
                if($hasSession) {
                    echo '
                        <li id="btnSignUp"><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    ';
                } else {
                    echo '
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    ';
                }
            ?>
        </ul>
    </div>
</nav>
</div>

<div class="body-content container" id="body-welcome-page">
    <div id="div-container-form">
        <div id="greetings-container">
            <h1>Welcome!</h1>
                </br></br></br>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam suscipit magna velit, quis dapibus odio gravida id.
                Sed dictum efficitur laoreet. Curabitur ex tortor, laoreet sit amet nibh vitae, aliquet luctus nunc. Nunc viverra
                metus non ullamcorper bibendum. Duis a volutpat tellus. Aenean mattis bibendum nunc, nec pharetra nisi sollicitudin
                et. Mauris vitae sem ut purus egestas posuere. Nam vehicula lectus at posuere ultricies.</br></br>

                Phasellus vitae vehicula tellus. Curabitur ut ultrices turpis. Ut ac faucibus est. Nam mollis tempor lacus nec
                pellentesque. In hac habitasse platea dictumst. Curabitur porttitor augue ex, ut consequat est commodo et. Proin
                dignissim congue porta. Nullam luctus nisi vitae ex feugiat tincidunt. Integer lectus nulla, dapibus vel magna at,
                fermentum scelerisque urna. Quisque euismod semper metus, nec laoreet massa rhoncus in.</br></br>

                Donec vitae felis orci. Proin rhoncus, risus eget eleifend tincidunt, enim lectus tempor diam, in feugiat libero eros
                sed lectus. Donec auctor porttitor sodales. Proin euismod mollis semper. Phasellus pharetra odio quam, sed elementum
                neque placerat vel. Maecenas vestibulum, felis eget blandit egestas, augue purus rutrum nibh, quis condimentum quam
                mauris a neque. Ut nisi ligula, sodales in ligula sed, lacinia luctus magna. Nulla facilisi. Aenean urna magna, finibus
                sed diam luctus, molestie pulvinar sapien. Donec maximus augue nec sapien mattis scelerisque. Vestibulum porttitor
                tincidunt neque posuere sollicitudin.</br></br>

                Sed accumsan nunc a purus auctor, eu rhoncus neque facilisis. Nullam nec dui sit amet lorem sollicitudin aliquam. Fusce
                gravida erat quis lorem aliquam, sed finibus ante eleifend. Suspendisse sit amet dignissim diam, ut tristique nisl.
                Suspendisse risus mauris, interdum ac finibus ut, euismod quis ipsum. Morbi sollicitudin ligula eget mauris pharetra,
                nec ornare ante lobortis. Nulla facilisi. Sed sit amet turpis et nunc vulputate ullamcorper.</br></br>

                Sed faucibus leo et sollicitudin dapibus. Sed mauris sapien, rutrum at nulla ut, accumsan aliquet mauris. Aliquam viverra
                metus purus, non porttitor neque interdum in. Proin sit amet enim ligula. Suspendisse eget odio dui. Donec vel nisl lacinia,
                vestibulum ante vitae, vehicula lorem. In euismod ultrices mi non suscipit.
            </p>
        </div>
    </div>
</div>
<script>
    $(function() {
        homepageFormViewModel.initialize();
    });
</script>
