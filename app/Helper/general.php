<?php

define('PAGINATION_COUNT', 10);

function getFolder()
{

    return app()->getLocale() == 'ar' ? '-rtl' : '';
}


function uploadImage($folder, $image)
{
    $image->store('/', $folder);
    $filename = $image->hashName();
    return $filename;
}