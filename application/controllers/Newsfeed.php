<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 17/09/2016
 * Time: 2:12 PM
 * @property Newsfeedmodel $Newsfeedmodel                       Newsfeedmodel
 * @property Personmodel $Personmodel                           Personmodel
 */
class Newsfeed extends Core_controller
{
    #constructor
    public function __construct() {
        parent::__construct();
        $this->load->model("Newsfeedmodel");
        $this->load->model("Personmodel");
    }

    #public region
    public function showNewsFeedList() {
        $page = $this->input->get("p");
        if($page == 1) {
            $from = 1;
            $to = 10;
        } else {
            $from = ($page * 10) - 9;
            $to = $page * 10;

        }
        $session = $this->session_helper->getActiveSession();
        $personInformation = $this->Personmodel->getMemberInformationBySessionCode($session['usercode']);
        $newsFeedList = $this->Newsfeedmodel->showNewsFeedList($personInformation, $from, $to);
        $newsFeedLayoutList = '';
        if($newsFeedList['hasResult']) {
            foreach($newsFeedList['data'] AS $post) {
                $newsFeedLayoutList .= $this->html_helper->createHTMLLayoutForNewsFeedList($post);

            }
        }
        echo $newsFeedLayoutList;
    }
    #end region
}