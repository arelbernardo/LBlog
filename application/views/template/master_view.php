<?php
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 14/09/2016
 * Time: 10:34 AM
 */
    $this->load->view('template/head', array("head" => $head, "hasSession" => $hasSession));
    $this->load->view('template/body',
        array(
            "body" => $body,
            "hasSession" => $hasSession,
            "naviBarFlag" => $naviBarFlag
        )
    );
    $this->load->view('template/footer');