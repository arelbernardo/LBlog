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

    public function createHTMLLayoutForNewsFeedList($posts) {
        $html = '';
        if($posts['hasResult']) {
            foreach($posts['data'] as $post) {
                $html .= '
                    <div class="panel-body post">
                        <span>
                            <img class="img-poster" src=""/>
                            <a class="linkPostName" id="aPid_'.$post->PostOwnerId.'_'.$post->PostId.'" href="#"><b>'.$post->PostOwner.'</b></a>
                        </span>
                        <span class="post-time">
                            @ '.$post->DatePosted.'
                        </span>
                    </div><hr/>
                ';
            }
        }
        return $html;
    }

    public function createHTMLLayoutForPost($post) {
        if($post['hasResult']) {
            $post = $post['data'];
            $html = '
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span>
                        <img src="" id="img-post-owner-pic">
                        <a href="#" id="link-profile-name">'.$post->PostOwner.'</a>
                    </span>
                </div>
                <div class="panel-body" id="post-detail-content">
                    '.$post->PostContent.'
                </div>
                <div class="panel-footer" id="post-datetime">
                     - '.$post->DatePosted.'
                </div>
                <div class="panel-footer">
                    <div class="text-right">
                        <button class="btn btn-danger">Cheers!</button>
                        <button class="btn btn-primary">Comment</button>
                    </div>
                </div>
            </div>
        ';
        } else {
            $html = '
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>
                            <img src="" id="img-post-owner-pic">
                            <a href="#" id="link-profile-name">Anonymous</a>
                        </span>
                    </div>
                    <div class="panel-body" id="post-detail-content">
                        Sorry but it seems missing. The post might be deleted.
                    </div>
                    <div class="panel-footer" id="post-datetime">
                         -
                    </div>
                    <div class="panel-footer">
                        <div class="text-right">
                            <button class="btn btn-danger" disabled>Cheers!</button>
                            <button class="btn btn-primary" disabled>Comment</button>
                        </div>
                    </div>
                </div>
            ';
        }
        return $html;
    }


}