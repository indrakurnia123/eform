<?php

namespace App\Repositories;
use Image;

class ImageRepository
{
    public function fitImageUploads($image,$destinationPath)
    {
        
        $input['imagename']=time().'.'.$image->getClientOriginalExtension();
        $img = Image::make($image->path());
        $img->fit(450,600)->save($destinationPath.'\\'.$input['imagename']);

        $foto_debitur_path=$destinationPath.'/'.$input['imagename'];

        return $foto_debitur_path;
    }
}