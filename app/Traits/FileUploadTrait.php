<?php

use Symfony\Component\HttpFoundation\File\UploadedFile;

trait FileUploadTrait
{

    /**
     * Upload the file with slugging to a given path
     *
     * @param UploadedFile $image
     * @param $path
     * @return string
     */
    public function uploadFile(UploadedFile $image, $path)
    {
        $extension = $image->getClientOriginalExtension();
        $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $image_name = str_slug(date('Y-m-d-h-i-s') . $name . str_random()) . '.' . $extension;
        $image->move($path, $image_name);

        return $image_name;
    }
}
