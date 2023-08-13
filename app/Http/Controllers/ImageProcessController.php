<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ImageProcessController extends Controller
{
    public static function ImageStore($photo, $name){
        $image_64 = $photo; //your base64 encoded data
        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
      
        $replace = substr($image_64, 0, strpos($image_64, ',')+1); 
      
      // find substring fro replace here eg: data:image/png;base64,
      
       $image = str_replace($replace, '', $image_64); 
      
       $image = str_replace(' ', '+', $image); 
       $imageName = $name.'.'.$extension;
       Storage::disk('assets')->put($imageName, base64_decode($image));
        $asset = asset('assets/' . $imageName);
       return stripslashes($asset);
    }
}
