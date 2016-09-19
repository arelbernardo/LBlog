<?php

/**
 * Created by PhpStorm.
 * User: arel
 * Date: 17/09/2016
 * Time: 2:18 PM
 */
class Newsfeedmodel extends Core_model
{
    #constructor
    public function __construct() {
        parent::__construct();
    }

    #public region
    public function showNewsFeedList($personInformation, $from, $to) {
        $this->db->select("
                    POST.Id AS PostId,
                    POST.PersonId AS PostOwnerId,
                    DATE_FORMAT((POST.DatePosted), '%b %d, %Y') AS DatePosted,
                    CONCAT( (Person.Firstname), ' ', (Person.Lastname) ) AS PostOwner,
                    (BUDDY.PersonId) AS ReferencePosterId")
            ->from("post AS POST")
            ->join("buddy AS BUDDY", "POST.PersonId = BUDDY.BuddyId")
            ->join("person AS Person", "POST.PersonId = Person.Id");
        $query1 = $this->db->get_compiled_select();
        $this->db->reset_query();
        $this->db->select("
                    POST.Id AS PostId,
                    POST.PersonId AS PostOwnerId,
                    DATE_FORMAT((POST.DatePosted), '%b %d, %Y') AS DatePosted,
                    CONCAT( (Person.Firstname), ' ', (Person.Lastname) ) AS PostOwner,
                    (BUDDY.BuddyId) AS ReferencePosterId")
            ->from("post AS POST")
            ->join("buddy AS BUDDY", "POST.PersonId = BUDDY.BuddyId")
            ->join("person AS Person", "POST.PersonId = Person.Id");
        $query2 = $this->db->get_compiled_select();
        $this->db->reset_query();

        $this->db
            ->select("*")
            ->from("( ({$query1}) UNION ({$query2}) ) AS A")
            ->where("A.ReferencePosterId", $personInformation->PersonId)
            ->order_by("A.DatePosted, A.PostId")
            ->limit($to, $from);
        $query = $this->db->get_compiled_select();
        $result = $this->db->query($query);
        if($result->num_rows() > 0) {
            $response = array(
                "hasResult" => true,
                "data" => $result->result()
            );
        } else {
            $response = array(
                "hasResult" => false,
                "data" => ""
            );
        }
        return $response;
    }

    public function showPostDetailsByPosterDetails($personId, $postId) {
        $condition = array(
            "POST.PersonId" => $personId,
            "POST.Id" => $postId);
        $this->db->select("
                POST.Id AS PostId,
                POST.PersonId AS PostOwnerId,
                POST.Content AS PostContent,
                DATE_FORMAT(POST.DatePosted, '%M %d, %Y') AS DatePosted,
                POST.IsDeleted AS IsDeleted,
                POST.IsEdited AS IsEdited,
                CONCAT( (PERSON.Firstname), ' ', (PERSON.Lastname) ) AS PostOwner
        ")
            ->from("post AS POST")
            ->join("person AS PERSON", "POST.PersonId = PERSON.Id")
            ->where($condition);
        $query = $this->db->get_compiled_select();
        $result = $this->db->query($query);
        if($result->num_rows() > 0) {
            $response = array(
                "hasResult" => true,
                "data" => $result->row()
            );
        } else {
            $response = array(
                "hasResult" => false,
                "data" => ""
            );
        }
        return $response;
    }
    #end region
}