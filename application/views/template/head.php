<html>
    <?php
        if($hasSession) {
            $this->load->view('template/head_assets/mainpage_without_login');
        } else {
            $this->load->view('template/head_assets/mainpage_with_login');
        }
    ?>