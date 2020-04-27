<?php


namespace App\Services;


class GetUrlYoutube
{
 public static function geturl($text){
         $p1=-1; $p2=-1;$ph=0;$pv=0;$h=0;$w=0;
         $s='';
         $p1 = strpos($text, "<iframe");
         $p2 = strpos($text, "</iframe>");
         if ($p1!=false && $p2!=false) $s=substr($text, $p1, $p2-$p1+9);  else $s='';
         $pe=strpos($s, "embed");
         if ($pe!=false) $src=substr($s, $pe+6, 11);  else $src='';
     return $src;
 }
}
