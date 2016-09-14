<?php
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 14/09/2016
 * Time: 10:34 AM
 */
    $this->load->view('template/head', $hasSession);
    $this->load->view('template/body', $body, $hasSession);
    $this->load->view('template/footer');