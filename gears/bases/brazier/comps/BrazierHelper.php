<?php
namespace Bright;

class BrazierHelper
{
    public static function simplyMinimizeCode(string & $text){
        $text = preg_replace('/[^\S ]+/', ' ', $text);
        $text = preg_replace('/ {2,}/', ' ', $text);
    }
}