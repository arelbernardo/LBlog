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
        $this->db
            ->select("
                M.Id AS MemberId,
                M.Username AS Username,
                M.IsActive AS IsActive,
                P.Id AS PersonId,
                CONCAT( (P.Lastname), ', ', (P.Firstname) ) AS PersonName,
                P.Birthday AS Birthday,
                P.Address AS Address,
                P.EmailAddress,
                C.Id AS CountryId,
                C.CountryName AS CountryName")
            ->from("member AS M")
            ->join("person AS P","M.PersonId = P.Id")
            ->join("country AS C","C.Id = P.CountryId")
        ->where("M.UserCode", $usercode);
        $query = $this->db->get_compiled_select();
        $result = $this->db->query($query);
        return $result->row();
    }

    #end region
}