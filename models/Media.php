<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

/**
 * Description of Media
 *
 * @author Prybet
 */
class Media {

    var $id;
    var $URL;
    var $post;
    var $status;
    var $context;

    public function __construct($id, $URL, $post, $status, $context) {
        $this->id = $id;
        $this->URL = $URL;
        $this->post = $post;
        $this->status = $status;
        $this->context = $context;
    }

    /* Le das las 2 listas que tiene un post Imagenes y Videos, Te devuelve una lista con los dos
      juntos y con su contexto */

    static function toMedia($images, $videos) {
        $list = array();
        if ($videos != null) {
            foreach ($videos as $v) {
                $list[] = new Media($v->id, $v->URL, $v->post, $v->status, "video");
            }
        }
        if ($images != null) {
            foreach ($images as $i) {
                $list[] = new Media($i->id, $i->URL, $i->post, $i->status, "image");
            }
        }
        return $list;
    }

}
