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
        $session = $this->session_helper->getActiveSession();
        $personInformation = $this->Personmodel->getMemberInformationBySessionCode($session['usercode']);
        $page = $this->input->get("p");
        if($page == 1) {
            $from = 0;
            $to = 10;
        } else {
            $from = ($page * 10) - 10;
            $to = $page * 10;

        }
        $newsFeedList = $this->Newsfeedmodel->showNewsFeedList($personInformation, $from, $to);
        $newsFeedLayoutList = $this->html_helper->createHTMLLayoutForNewsFeedList($newsFeedList);
        echo json_encode(
            array(
                "htmlView" => $newsFeedLayoutList,
                "newsFeedList" => $newsFeedList['hasResult'] ? $newsFeedList : '',
                "hasNewsFeedList" => $newsFeedList['hasResult']
            )
        );
    }

    public function showPostDetails() {
        $id = $this->input->post("Id");
        $id = explode("_", $id);
        $personId = $id[1];
        $postId = $id[2];
        $result = $this->Newsfeedmodel->showPostDetailsByPosterDetails($personId, $postId);
        $response = $this->html_helper->createHTMLLayoutForPost($result);
        echo json_encode(
            array(
                "htmlView" => $response
            )
        );
    }
    #end region
}