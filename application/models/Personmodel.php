<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 17/09/2016
 * Time: 2:22 PM
 */
class Personmodel extends Core_model
{
    #constructor
    public function __construct() {
        parent::__construct();
    }

    #public region
    public function getNextUserCode() {
        return (string) $this->db->query("
            SELECT    IF( MAX(Id) IS NULL, LPAD(1, 11, '0'), LPAD(Id + 1, 11, '0') ) AS UserCode
            FROM      member")->row()->UserCode;
    }

    public function getMemberInformationBySessionCode($usercode) {
        $sessionInfo = $this->session_helper->getActiveSession();
        $sessionCode = $sessionInfo['usercode'];
        $this->db
            ->select("
                M.Id AS MemberId,
                M.Username AS Username,
                M.IsActive AS IsActive,
                P.Id AS PersonId,
                CONCAT( (P.Lastname), ', ', (P.Firstname) ) AS PersonName,
                CONCAT( (P.Firstname), ' ', (P.Lastname) ) AS NormalPersonName,
                P.Birthday AS Birthday,
                IFNULL(P.Address, '') AS Address,
                P.EmailAddress,
                C.Id AS CountryId,
                C.CountryName AS CountryName,
                IF( (M.UserCode) = ({$sessionCode}), (1), (0)) AS IsCurrentProfile")
            ->from("member AS M")
            ->join("person AS P","M.PersonId = P.Id")
            ->join("country AS C","C.Id = P.CountryId")
        ->where(array(
            "M.UserCode" => $usercode,
            "M.IsActive" => 1));
        $query = $this->db->get_compiled_select();
        $result = $this->db->query($query);
        return $result->row();
    }

    public function validateIfUsernameIsExisting($username) {
        $this->db->select("*")->from("member")->where(array("Username" => $username));
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

    public function validateIfPersonIsBuddyByPersonId($buddyId) {
        $session = $this->session_helper->getActiveSession();
        $sessionUserCode = $session['usercode'];
        $personInfo = $this->getMemberInformationBySessionCode($sessionUserCode);
        $personId = $personInfo->PersonId;
        if($buddyId == $personId) {
            $result = new stdClass();
            $result->buddyStatus = 'self';
        } else {
            $condition = array(
                "BuddyId" => $buddyId,
                "PersonId" => $personId
            );
            $this->db
                ->select("
                CASE
                    WHEN COUNT(*) > 0 THEN 'buddy'
                    ELSE 'not_buddy'
                    END AS buddyStatus")
                ->from("buddy")
                ->where($condition);
            $query = $this->db->get_compiled_select();
            $result = $this->db->query($query)->row();
        }
        return $result->buddyStatus;
    }
    #end region
}