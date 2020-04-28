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


 public static function youtubeinfo($video_id){
     $api_key='AIzaSyBAZg45J-HRBJtiOaBy8yIzIPGmzEHpkrI';
     $json_result = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=statistics&id=$video_id&key=$api_key");
     $obj = json_decode($json_result);

     $views=0;
     $likes=0;
     $dislikes=0;
     $date='';

     if(isset($obj->items[0])){
         $views= $obj->items[0]->statistics->viewCount;
         $likes = $obj->items[0]->statistics->likeCount;
         $dislikes = $obj->items[0]->statistics->dislikeCount;
     }



     $json_result = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=snippet&id=$video_id&key=$api_key");
     $obj = json_decode($json_result);

     if(isset($obj->items[0]))
     $date = $obj->items[0]->snippet->publishedAt;

     $inf=[
         'views'=>$views,
         'likes'=>$likes,
         'dislikes'=>$dislikes,
         'created_at'=>$date
         ];

     return $inf;
 }
}
