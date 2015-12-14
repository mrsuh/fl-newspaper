<?php

namespace Mrsuh\NewspaperBundle\Service;

class Common
{
    public static function dashesToCamelCase($string, $littleFirstLetter = false)
    {
        $words = explode('_', $string);
        if($littleFirstLetter){
            $str = array_shift($words);
        } else {
            $str = '';
        }
        foreach($words as $w) {
            $str .= str_replace(' ', '',(ucfirst($w)));
        }
        return $str;
    }
    public static function setParams($obj, array $params, array $data, $necessery = false)
    {
        foreach ($params as $v) {
            if (isset($data[$v]) && !is_null($data[$v])) {
                $s = 'set' . self::dashesToCamelCase($v);
                $obj->$s($data[$v]);
            } elseif ($necessery) {
                throw new \Exception('Parameter: ' . $v . ' is necessery');
            }
        }
    }
}