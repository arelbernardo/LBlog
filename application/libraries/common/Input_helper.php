<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 16/09/2016
 * Time: 1:05 PM
 *
 */
class Input_helper
{

    const REGEXP_CHAR_ONLY = '/[a-zA-Z\s]+$/',
        REGEXP_VARCHAR_ONLY = '/[a-zA-Z0-9#,]+$/',
        REGEXP_NUM_ONLY = '/[0-9]+$/',
        REGEXP_PASSWORD = '/[a-zA-Z0-9@#!]+$/',
        DATA_TYPE_KEY_INDEX = '/_dataType/i',
        FIELD_KEY_INDEX = '/_field/i',
        FIELD_VALIDATION = '/_validation/i',
        MINIMUM_MEMBER_AGE = 18;

    public function __construct() {

    }

    public function validateFields($fields = array()) {
        $data = $fields['data'];
        $fieldCount = count($data);
        $hasError = false;
        $hasAgeValidation = isset($fields['data']['age_validation']) ? $fields['data']['age_validation'] : false;

        $errorMessage = "";
        if($fieldCount > 0) {
            foreach($data as $key => $value) {
                if(!preg_match(self::DATA_TYPE_KEY_INDEX, $key) && !preg_match(self::FIELD_KEY_INDEX, $key) && !preg_match(self::FIELD_VALIDATION, $key)) {
                    $isValid = $this->checkIfDataIsValid($value, $data[$key."_dataType"]);
                    if(!$isValid) {
                        $dataErrorField = $data[$key."_field"];
                        if($data[$key."_dataType"] == 'password') {
                            $errorMessage = $dataErrorField . " is not valid. (@, #, !) are special characters that are acceptable.";
                        } else {
                            $errorMessage = $dataErrorField . " is not valid.";
                        }
                        $hasError = true;
                        break;
                    }
                }
            }
        }

        if(!$hasError && $hasAgeValidation) {
            $ageData = $fields['data']['age_validationFields'];
            foreach($ageData as $key => $value) {
                if(!preg_match(self::DATA_TYPE_KEY_INDEX, $key) && !preg_match(self::FIELD_KEY_INDEX, $key) && !preg_match(self::FIELD_VALIDATION, $key)) {
                    $dateHelper = new Date_helper();
                    $age = $dateHelper->getAgeByDate($ageData[$key]);
                    if($age < 18) {
                        $dataErrorField = $ageData[$key."_field"];
                        $hasError = true;
                        $errorMessage = $dataErrorField . " must be 18 and above to join.";
                        break;
                    }
                }
            }
        }
        return array(
            "hasError" => $hasError,
            "msg" => $errorMessage
        );
    }

    public function checkIfDataIsValid($value, $dataType) {
        switch($dataType) {
            case "char":
                $isValid = preg_match(self::REGEXP_CHAR_ONLY, $value);
            break;
            case "varchar":
                $isValid = preg_match(self::REGEXP_VARCHAR_ONLY, $value);
            break;
            case "password":
                $isValid = preg_match(self::REGEXP_PASSWORD, $value);
            break;
            case "int_unsigned":
                $isValid = $value > 0;
            break;
            case "email":
                $isValid = filter_var($value, FILTER_VALIDATE_EMAIL);
            break;
            case "date":
                $value = explode("-", $value);
                $isValid = checkdate((int) $value[1], $value[2], $value[0]);
            break;
            default:
                $isValid = true;
            break;
        }
        return $isValid;
    }
}