<?php

/**
 * @author l2qnew@gmail.com
 * @package QTools Yii extension
 * @copyright 2011 - http://wwww.l2qnew.info
 */
class QTools extends CApplicationComponent {

    /**
     * Get all name of controller in a module
     *
     * @param type $moduleName
     * If $modulename is null, it will get all controllers in base project
     * @return array 
     * return array if success else return false
     */
    public static function getAllNameControllerOfModule($moduleName = null) {
        $listController = array();
        $pathControllers = Yii::app()->getBasePath() . '\controllers';
        if (null != $moduleName) {
            $pathControllers = Yii::app()->getModule($moduleName)->getBasePath() . '\controllers';
        }
        $setPathFiles = Yii::app()->file->set($pathControllers, true);
        $listPathFiles = $setPathFiles->getContents(false, '/Controller.php/');
        foreach ($listPathFiles as $pathFile) {
            $file = Yii::app()->file->set($pathFile, true);
            $fileName = $file->getFilename();
            $controllerName = preg_replace('/Controller/', '', $fileName);
            array_push($listController, $controllerName);
        }
        if ($listController)
            return $listController;
        else
            return false;
    }

    /**
     * Set menu for all controller of module
     * @param type $moduleName
     * @return array 
     */
    public static function setMenuControllerOfModule($moduleName = null) {
        $menuControllers = array();
        $listLabel = self::getAllNameControllerOfModule($moduleName);
        if ($listLabel) {
            /* @var $listLabel type */
            foreach ($listLabel as $menu) {
                $menu = strtolower($menu);
                if (null == $moduleName)
                    $url = '/' . $menu;
                else
                    $url = '/' . $moduleName . '/' . $menu;
                $label = 'Manage ' . $menu;
                $item = array('label' => $label, 'url' => array($url));
                array_push($menuControllers, $item);
            }
            return $menuControllers;
        }
        else
            return FALSE;
    }

    /**
     * Get image link 
     * @param type $image 
     * @param type $folder
     * @return string 
     */
    static function getImageLink($image,$folder) {
        $img_link = Yii::app()->request->baseUrl .$folder.$image;
        return $img_link;
    }
    /**
     * Get image thumnail link 
     * @param type $image
     * @param type $folder
     * @return string 
     */
    static function getImageThumbnailLink($image,$folder) {
        $img_link = Yii::app()->request->baseUrl .$folder. $image;
        return $img_link;
    }

}

