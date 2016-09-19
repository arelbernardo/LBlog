<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 17/09/2016
 * Time: 4:17 PM
 */
class Html_helper
{
    public function __construct() {

    }

    public function createHTMLLayoutForNewsFeedList($post) {
        $html = '
            <div class="panel-body post">
                <span>
                    <img class="img-poster" src=""/>
                    <a class="linkPostName" href="#"><b>'.$post->PostOwner.'</b></a>
                </span>
                <span class="post-time">
                    @ '.$post->DatePosted.'
                </span>
            </div><hr/>
        ';
        return $html;
    }

}