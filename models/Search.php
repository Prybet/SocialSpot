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
    var $bannerURL;
    var $imageURL;
    var $followers;
    var $follows;
    var $city;
    var $province;
    var $region;
    var $status;
    var $posts;
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

        foreach ($prof as $p) {
            $listOne[] = $p->username;
        }
        foreach ($cate as $c) {
            $listTwo[] = $c->name;
        }
        foreach ($regi as $r) {
            $listThree[] = $r->name;
        }
        foreach ($prov as $p) {
            $listFour[] = $p->name;
        }
        foreach ($city as $c) {
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
        foreach ($obj as $text) {
            foreach ($prof as $pe) {
                if ($text == $pe->username) {
                    $sear = new Search();
                    $sear->id = $pe->id;
                    $sear->name = $pe->name;
                    $sear->username = $pe->username;
                    $sear->description = $pe->description;
                    $sear->bannerURL = $pe->bannerURL;
                    $sear->imageURL = $pe->imageURL;
                    $sear->followers = $pe->followers;
                    $sear->follows = $pe->follows;
                    $sear->posts = $pe->myPosts;
                    $sear->status = $pe->status;
                    $sear->context = "Profile";
                    $list[] = $sear;
                    $n++;
                }
            }
            foreach ($cate as $ce) {
                if ($text == $ce->name) {
                    $sear = new Search();
                    $sear->id = $ce->id;
                    $sear->name = $ce->name;
                    $sear->description = $ce->description;
                    $sear->imageURL = $ce->imageURL;
                    $sear->bannerURL = $ce->bannerURL;
                    $sear->followers = $ce->followers;
                    $sear->members = $ce->onLine;
                    $sear->posts = $ce->posts;
                    $sear->context = "Category";
                    $list[] = $sear;
                    $n++;
                }
            }
            foreach ($regi as $re) {
                if ($text == $re->name) {
                    if ($n == 0) {
                        $sear = new Search();
                        $sear->id = $re->id;
                        $sear->name = $re->name;
                        $sear->description = $re->description;
                        $sear->imageURL = $re->imageURL;
                        $sear->followers = $re->followers;
                        $sear->posts = $re->posts;
                        $sear->status = $re->status;
                        $sear->context = "Region";
                        $list[] = $sear;
                        $n++;
                    } else {
                        $p = 0;
                        foreach ($list as $li) {
                            if ($li->context == "Region" && $li->name == $text) {
                                $p++;
                            }
                        }
                        if ($p == 0) {
                            $sear = new Search();
                            $sear->id = $re->id;
                            $sear->name = $re->name;
                            $sear->description = $re->description;
                            $sear->imageURL = $re->imageURL;
                            $sear->posts = $re->posts;
                            $sear->followers = $re->followers;
                            $sear->status = $re->status;
                            $sear->context = "Region";
                            $list[] = $sear;
                        }
                    }
                }
            }
            foreach ($prov as $pr) {
                if ($text == $pr->name) {
                    if ($n == 0) {
                        $sear = new Search();
                        $sear->id = $pr->id;
                        $sear->name = $pr->name;
                        $sear->description = $pr->description;
                        $sear->imageURL = $pr->imageURL;
                        $sear->region = $pr->region;
                        $sear->posts = $pr->posts;
                        $sear->followers = $pr->followers;
                        $sear->status = $pr->status;
                        $sear->context = "Province";
                        $list[] = $sear;
                        $n++;
                    } else {
                        $p = 0;
                        foreach ($list as $li) {
                            if ($li->context == "Province" && $li->name == $text) {
                                $p++;
                            }
                        }
                        if ($p == 0) {
                            $sear = new Search();
                            $sear->id = $pr->id;
                            $sear->name = $pr->name;
                            $sear->description = $pr->description;
                            $sear->imageURL = $pr->imageURL;
                            $sear->region = $pr->region;
                            $sear->posts = $pr->posts;
                            $sear->followers = $pr->followers;
                            $sear->status = $pr->status;
                            $sear->context = "Province";
                            $list[] = $sear;
                        }
                    }
                }
            }
            foreach ($city as $ci) {
                if ($text == $ci->name) {
                    if ($n == 0) {
                        $sear = new Search();
                        $sear->id = $ci->id;
                        $sear->name = $ci->name;
                        $sear->description = $ci->description;
                        $sear->imageURL = $ci->imageURL;
                        $sear->province = $ci->province;
                        $sear->followers = $ci->followers;
                        $sear->posts = $ci->posts;
                        $sear->status = $ci->status;
                        $sear->context = "City";
                        $list[] = $sear;
                        $n++;
                    } else {
                        $p = 0;
                        foreach ($list as $li) {
                            if ($li->context == "City" && $li->name == $text) {
                                $p++;
                            }
                        }
                        if ($p == 0) {
                            $sear = new Search();
                            $sear->id = $ci->id;
                            $sear->name = $ci->name;
                            $sear->description = $ci->description;
                            $sear->imageURL = $ci->imageURL;
                            $sear->province = $ci->province;
                            $sear->followers = $ci->followers;
                            $sear->posts = $ci->posts;
                            $sear->status = $ci->status;
                            $sear->context = "City";
                            $list[] = $sear;
                        }
                    }
                }
            }
        }
        return $list;
    }

    public function getContext() {
        switch ($this->context) {
            case "Profile":
                return "Perfil";
            case "Category":
                return "Categoría";
            case "Region":
                return "Region";
            case "Province":
                return "Provincia";
            case "City":
                return "Cuidad";
            default :
                return "";
        }
    }

    public function getImages() {
        switch ($this->context) {
            case "Profile":
                if ($this->imageURL == "") {
                    return"../img/perfil.png";
                } else {
                    return "../../SSpotImages/UserMedia/" . $this->username . "-Folder/ProfileImages/" . $this->imageURL;
                }
            case "Category":
                return self::buildImages($this->imageURL, "CategoryImages");
            case "Region":
                return self::buildImages($this->imageURL, "RegionImages");
            case "Province":
                return self::buildImages($this->imageURL, "ProvinceImages");
            case "City":
                return self::buildImages($this->imageURL, "CityImages");
            default :
                return "";
        }
    }
    public static function buildImages($banner, $pos) {
        if ($banner == "") {
            return "../img/perfil.png";
        } else {
            return "../../SSpotImages/InterestsImages/" . $pos . "/ProfileImages/" . $banner;
        }
    }

    public function getBanner() {
        switch ($this->context) {
            case "Profile":
                if ($this->bannerURL == "") {
                    return "../img/banner.jpg";
                } else {
                    return "../../SSpotImages/UserMedia/" . $this->username . "-Folder/BannerImages/" . $this->bannerURL;
                }
            case "Category":
                return self::buildBanner($this->bannerURL, "CategoryImages");

            case "Region":
                return self::buildBanner($this->bannerURL, "RegionImages");
            case "Province":
                return self::buildBanner($this->bannerURL, "ProvinceImages");
            case "City":
                return self::buildBanner($this->bannerURL, "CityImages");
            default :
                return "";
        }
    }

    public static function buildBanner($banner, $pos) {
        if ($banner == "") {
            return "../img/banner.jpg";
        } else {
            return "../../SSpotImages/InterestsImages/" . $pos . "/BannerImages/" . $banner;
        }
    }

    public function getNomFollowers() {
        switch ($this->context) {
            case "Profile":
                if (count($this->followers) == 1) {
                    return "Seguidor";
                } else {
                    return "Seguidores";
                }
            case "Category":
                $t = self::ValidOfNomFollowers($this->followers);
                return $t;
            case "Region":
                $t = self::ValidOfNomFollowers($this->followers);
                return $t;
            case "Province":
                $t = self::ValidOfNomFollowers($this->followers);
                return $t;
            case "City":
                $t = self::ValidOfNomFollowers($this->followers);
                return $t;
            default :
                return "";
        }
    }

    //lo tengo que usar
    public function ValidOfNomFollowers($foll) {
        if (count($foll) == 1) {
            return "Miembro";
        } else {
            return "Miembros";
        }
    }

    public function getNomFollow() {
        switch ($this->context) {
            case "Profile":
                if (count($this->follows) <= 1) {
                    return "Seguido";
                } elseif (count($this->follows) >= 2) {
                    return "Seguidos";
                }
                return "Seguidos";
            case "Category":
                return "Online";
            default :
                return "";
        }
    }

    public function getFollow() {
        switch ($this->context) {
            case "Profile":
                return count($this->follows);
            case "Category":
                return $this->members;
            default :
                return "";
        }
    }

    public function getNom() {
        switch ($this->context) {
            case "Profile":
                return $this->username;
            case "Category":
                return $this->name;
            case "Region":
                return $this->name;
            case "Province":
                return $this->name;
            case "City":
                return $this->name;
            default :
                return "";
        }
    }


    public function getNomPost() {
        if (count($this->posts) == 1) {
            return "Publicación";
        } else {
            return "Publicaciones";
        }
    }
    
    public static function getThis($id, $context) {
        switch ($context){
            case "Province":
                return Province::getProvince($id);
                break;
            case "Region":
                return Region::getFullRegion($id);
                break;
            case "City":
                return City::getFullCity($id);
                break;
            case "Category":
                return Category::getFullCategoy($id);
                break;
            default:
                return"";
        }
    }

}
