<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

/**
 * Description of Search
 *
 * @author nacho
 */
require_once 'Profile.php';
require_once 'Category.php';
require_once 'Region.php';
require_once 'Province.php';
require_once 'City.php';
require_once 'Image.php';
class Search {
    
    var $id;
    var $username;
    var $name;
    var $description;
    var $imageURL;
    var $followers;
    var $city;
    var $province;
    var $region;
    var $status;
    var $context;
    
    public static function setSearch($text) {
        $prof = Profile::getProfileForSearch($text);
        $cate = Category::getCategoryForSearch($text);
        $regi = Region::getRegionForSearch($text);
        $prov = Province::getProvinceForSearch($text);
        $city = City::getCityForSearch($text);
        $a = self::makeListSearch($prof, $cate, $regi, $prov, $city);
        return $a;
    }
    
    public static function makeCollectList($prof, $cate, $regi, $prov, $city) {
        $listOne = array();
        $listTwo = array();
        $listThree = array();
        $listFour = array();
        $listFive = array();
        
        foreach ($prof as $p){
            $listOne[] = $p->username;
        }
        foreach ($cate as $c){
            $listTwo[] = $c->name;
        }
        foreach ($regi as $r){
            $listThree[] = $r->name;
        }
        foreach ($prov as $p){
            $listFour[] = $p->name;
        }
        foreach ($city as $c){
            $listFive[] = $c->name;
        }
        $obj = array_merge($listOne, $listTwo, $listThree, $listFour, $listFive);
        usort($obj, "strcmp");
        return $obj;
    }
    
    public static function validCurrent($param) {
        
    }


    public static function makeListSearch($prof, $cate, $regi, $prov, $city) {
        $obj = self::makeCollectList($prof, $cate, $regi, $prov, $city);
        $list = array();
        $n = 0;
        foreach ($obj as $text){
            foreach ($prof as $pe){
                if($text == $pe->username){
                    $sear = new Search();
                    $sear->id = $pe->id;
                    $sear->name = $pe->name;
                    $sear->username = $pe->username;
                    $sear->description = $pe->description;
                    $sear->imageURL = $pe->imageURL;
                    $sear->followers = $pe->followers;
                    $sear->status = $pe->status;
                    $sear->context = "Profile";
                    $list[] = $sear;
                    $n++;
                }
            }
            foreach ($cate as $ce){
                if($text == $ce->name){
                    $sear = new Search();
                    $sear->id = $ce->id;
                    $sear->name = $ce->name;
                    $sear->description = $ce->description;
                    $sear->imageURL = $ce->imageURL;
                    $sear->followers = $ce->followers;
                    $sear->status = $ce->status;
                    $sear->context = "Category";
                    $list[] = $sear;
                    $n++;
                }
            }
            foreach ($regi as $re){
                if($text == $re->name){
                    if($n == 0){
                        $sear = new Search();
                        $sear->id = $re->id;
                        $sear->name = $re->name;
                        $sear->description = $re->description;
                        $sear->imageURL = $re->imageURL;
                        $sear->followers = $re->followers;
                        $sear->status = $re->status;
                        $sear->context = "Region";
                        $list[] = $sear;
                        $n++;
                    }else{
                        $p = 0;
                        foreach ($list as $li){
                            if($li->context == "Region" && $li->name == $text){
                                $p++;
                            }
                        }
                        if($p == 0){
                            $sear = new Search();
                            $sear->id = $re->id;
                            $sear->name = $re->name;
                            $sear->description = $re->description;
                            $sear->imageURL = $re->imageURL;
                            $sear->followers = $re->followers;
                            $sear->status = $re->status;
                            $sear->context = "Region";
                            $list[] = $sear;
                        }
                    }
                    
                }
            }
            foreach ($prov as $pr){
                if($text == $pr->name){
                    if($n == 0){
                        $sear = new Search();
                        $sear->id = $pr->id;
                        $sear->name = $pr->name;
                        $sear->description = $pr->description;
                        $sear->imageURL = $pr->imageURL;
                        $sear->region = $pr->region;
                        $sear->followers = $pr->followers;
                        $sear->status = $pr->status;
                        $sear->context = "Province";
                        $list[] = $sear; 
                        $n++;
                    }else{
                        $p = 0;
                        foreach ($list as $li){
                            if($li->context == "Province" && $li->name == $text){
                                $p++;
                            }
                        }
                        if($p == 0){
                            $sear = new Search();
                            $sear->id = $pr->id;
                            $sear->name = $pr->name;
                            $sear->description = $pr->description;
                            $sear->imageURL = $pr->imageURL;
                            $sear->region = $pr->region;
                            $sear->followers = $pr->followers;
                            $sear->status = $pr->status;
                            $sear->context = "Province";
                            $list[] = $sear; 
                        }
                    }
                    
                }
            }
            foreach ($city as $ci){
                if($text == $ci->name){
                    if($n == 0){
                        $sear = new Search();
                        $sear->id = $ci->id;
                        $sear->name = $ci->name;
                        $sear->description = $ci->description;
                        $sear->imageURL = $ci->imageURL;
                        $sear->province = $ci->province;
                        $sear->followers = $ci->followers;
                        $sear->status = $ci->status;
                        $sear->context = "City";
                        $list[] = $sear;
                        $n++;
                    }else{
                        $p = 0;
                        foreach ($list as $li){
                            if($li->context == "City" && $li->name == $text){
                                $p++;
                            }
                        }
                        if($p == 0){
                            $sear = new Search();
                            $sear->id = $ci->id;
                            $sear->name = $ci->name;
                            $sear->description = $ci->description;
                            $sear->imageURL = $ci->imageURL;
                            $sear->province = $ci->province;
                            $sear->followers = $ci->followers;
                            $sear->status = $ci->status;
                            $sear->context = "City";
                            $list[] = $sear;
                        }
                    }
                    
                }
            }
            
        }
        //return $obj;
        return $list;
    }
    
}
