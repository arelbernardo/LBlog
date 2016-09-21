<?php
    $personInfo = $data;
    $personName = $personInfo['NormalPersonName'];
    switch($personInfo['buddyStatus']) {
        case "buddy":
            $buttonType = '<button type="button" class="btn btn-default" id="btnBuddyButton">
                              <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Buddy
                            </button>
            ';
        break;
        case "not_buddy":
            $buttonType = '<button type="button" class="btn btn-default" id="btnBuddyButton">
                              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add as Buddy
                            </button>
            ';
        break;
        default:
            $buttonType = '';
        break;
    }

?>
<div class="body-content container">
    <div id="profile-info-header-container" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div id="profile-container">
            <div id="profile-cover-background">
                <?php echo $buttonType; ?>
                <span><?php echo $personName; ?></span>
            </div>
            <div id="profile-picture-container">
                <img id="profile-img" src="<?php echo base_url();?>assets/images/profile/beer-male.png" />
            </div>
            <div id="basic-profile-info-container" class="panel panel-default">
                <div class="panel-body" id="basic-profile-info-content">
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 basic-profile-info">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
    <!---->
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 basic-profile-info">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--<div class="col-xs-12 col-md-12 col-md-8 col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Create a blog</h4>
            </div>
            <div class="panel-body">
                <textarea style="width: 100%;" rows="6"></textarea>
            </div>
            <div class="panel-footer text-right">
                <button class="btn btn-success">Post</button>
            </div>
        </div>
    </div>-->
</div>