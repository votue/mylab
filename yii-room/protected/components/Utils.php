<?php

/**
 * Various common functions
 */
class Utils extends CApplicationComponent
{
    public function init()
    {
        
    }

    public function encode($value,$options=array()){
        $options = array_merge(array(
            'default' => '',
            'pattern' => '{data}'
        ),$options);

        if(isset($value)){
            $result = str_replace("{data}",$value,$options['pattern']);
        }else{
            $result = $options['default'];
        }
        
        return $result;
    }

    public function getCurrentLink($link){
        if(!preg_match('^(http|https)://^', $link, $matches)){
            return 'http://'.$link;
        }
        return $link;
    }

    public function date_format($value, $type='datetime'){
        if (!is_numeric($value))
            $value = strtotime($value);
            
        if ($type == 'date') $format = 'd.m.Y';
        else $format = 'd.m.Y h:i A';
        
        return date($format, $value);
    }
	public static function uniqueFile($file){
        if(isset($file)){
            $name = explode('.',$file);
            $name[0] = uniqid('');
            
            end($name);
            $key = key($name);
            $name[$key] = '.'.$name[$key];
            $result = implode($name);
            
            return $result;
        }
        return '';
    }

    public static function deleteFile($rootpath,$file){
        if(self::checkExistAFile($file,$rootpath)){
            $path = $rootpath.$file;
            if(chmod($path, 0777)){
               if(unlink($path)){
                   return true; 
                }
                return false; 
            }
        }
        return true;
    }
    //return array
    public static function checkPathTempImg($pathString=''){
        $result = array();
        if(!empty($pathString) && $listFiles = array_filter(explode(',',$pathString)) ){
            $rootpath = Yii::getPathOfAlias("webroot").Yii::app()->params['asset_dir'];
            $string = self::checkExistMoreFiles($listFiles,$rootpath);
            if(!empty($string))
                return array_filter(explode(',',$string));
        }
        return false;
    }
    
    //return string ',name1.jpg,name2.jpg'
    public static function checkExistMoreFiles($listFiles,$rootpath){
        $result = '';
        if(!empty($listFiles)){
            foreach($listFiles as $item){
                if(self::checkExistAFile($item,$rootpath))
                    $result .= ','.$item;
            }
        }
        return $result;
    }
    
    public static function checkExistAFile($aFile,$rootpath){
        if(!empty($aFile) && file_exists($rootpath) && file_exists($rootpath.$aFile)){
            return true;
        }
        return false;
    }

    public function getTimeAgo($created){
        //setup timezone
        /*date_default_timezone_set('Australia/Melbourne');*/

        $date = date('Y-m-d H:i:s');

        $today_time = strtotime($date);
        $post_time = strtotime($created);

        $seconsdif=floor(abs($today_time - $post_time));

        $mindif=floor($seconsdif/60);
        $hrdif=floor($mindif/60);
        $dayDif=floor($hrdif/24);
        $weeksdif=floor($dayDif/7);
        $mthDif=floor($weeksdif/4.348);
        $yrsdif=floor($mthDif/12);

        if($yrsdif>0){
            if($yrsdif>1)
                $final= "cách đây ".$yrsdif. " năm";
            else
                $final= "cách đây ".$yrsdif. " năm"; 
        }else{
            if($mthDif>0){
                if($mthDif>1)
                    $final= "cách đây ".$mthDif. " tháng";
                else
                    $final= "cách đây ".$mthDif. " tháng";        
            }else{
                if($weeksdif>0){
                    if($weeksdif>1)
                        $final= "cách đây ".$weeksdif. " tuần";
                    else
                        $final= "cách đây ".$weeksdif. " tuần";       
                }else{
                    if($dayDif>0){
                        if($dayDif>1)
                            $final= "cách đây ".$dayDif. " ngày";
                        else
                            $final= "cách đây ".$dayDif. " ngày";          
                    }else{
                        if($hrdif>0){
                            if($hrdif>1)
                                $final= "cách đây ".$hrdif. " giờ";
                            else
                                $final= "cách đây "."cách đây ".$hrdif. " giờ";
                        }else{
                            if($mindif>0){
                                if($mindif>1)
                                    $final= "cách đây ".$mindif. " phút";
                                else
                                    $final= "cách đây ".$mindif. " phút";          
                            }else{
                                if($seconsdif>1)
                                    $final= "cách đây ".$seconsdif. " giây";
                                else
                                    $final= "cách đây ".$seconsdif. " giây";
                            }   
                        }     
                    }
                }
            }
        }
        return $final;
    }
}