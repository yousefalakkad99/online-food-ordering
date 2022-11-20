<?php

namespace App\Traits;



Trait images
{
    
    function save_image($photo,$folder)
    {
        $file_extencion=$photo->getclientoriginalextension();
        $file_name=time().'.'.$file_extencion;
        $path=$folder;
        $photo->storeAs($path,$file_name);
        return $file_name;
    }
}
