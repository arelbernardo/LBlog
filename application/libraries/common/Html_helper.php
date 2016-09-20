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
        $currentListCount = $posts['currentCountByLimit'];
        $counter = 0;
        if($posts['hasResult']) {
            foreach($posts['data'] as $post) {
                $counter++;
                $html .= '
                    <div class="post panel-body" id="post_id_'.$counter.'">
                        <span>
                            <img class="img-poster" src="'.base_url().'/assets/images/profile/beer-male.png"/>
                            <a class="linkPostName" id="aPid_'.$post->PostOwnerId.'_'.$post->PostId.'" href="#"><b>'.$post->PostOwner.'</b></a>
                        </span>
                        <span class="post-time">
                            @ '.$post->DatePosted.'
                        </span>
                    </div><hr/>
                ';
            }
            if($currentListCount < 10) {
                $html .= '
                    <div class="panel-body">
                        <p style="color: #838383; text-align: center;">
                            There are no following posts
                        </p>
                    </div>
                ';
            }
        } else {
            $html = '
                <div class="post panel-body">
                    <p style="color: #838383;">
                        There are no recent posts at the time.
                    </p>
                </div>
            ';
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
                        <img src="'.base_url().'/assets/images/profile/beer-male.png" id="img-post-owner-pic">
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