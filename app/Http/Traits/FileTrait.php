<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;


trait FileTrait
{

    public function saveImage($photo, $folder, $subFolder = null)
    {
        $path = $folder;
        if ($subFolder !== null) {
            $path = 'uploads/' . $folder . '/' . $subFolder;
        }
        $file_extension = $photo->getClientOriginalExtension();
        $file_name = time() . '_' . '.' . $file_extension;

        $photo->storeAs($path, $file_name, 'public');
        $Fullpath = 'storage/' . $path . '/' . $file_name;
        return $Fullpath;


    }

    public function FileType($ex)
    {

        $imgTypes = array('jpg', 'png', 'gif', 'jpeg', 'svg', 'apng', 'avif', 'jfif', 'pjpeg', 'pjp', 'webp');
        $excelType = array('xls', 'xlsx', 'ods');
        $wordTypes = array('docx', 'dot', 'dotx', 'odt');

        if (in_array($ex, $imgTypes)) {
            return 'image';
        } elseif (in_array($ex, $excelType)) {
            return 'excel';
        } elseif (in_array($ex, $wordTypes)) {
            return 'word';
        } else {
            return 'pdf';
        }


    }



    public function deleteImage($filename)
    {
        $file = str_replace('storage/', '', $filename);

        if (Storage::disk('public')->exists($file)) {
            Storage::disk('public')->delete($file);
            return "Image deleted successfully.";

        }
        return "Image not found";

    }

}