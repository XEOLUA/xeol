<?php


namespace App\Services;


class GetSuffixByNumber
{
 static public function get_suffix($number){
  $suf = ["","і","ів"];
  $des=0;$od=0;
    if ($number>=1 && $number<=9) $od=$number; else
        if($number>=10 && $number<=99)  {$od=$number%10; $des=$number/10;}
            else {$od=$number%10; $des=$number%100/10;};

    return ($od==1 && $des!=1) ? $suf[0] :
        ($od>=2 && $od<=4 && $des!=1) ? $suf[1] : $suf[2];
 }
}
