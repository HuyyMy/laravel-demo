<?php

namespace App\Handlers;

use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class ImageHandler
{
    /**
     * 允许上传图片类型
     *
     * @var array
     */
    protected static $allowedExt = ["png", "jpg", "gif", 'jpeg'];

    /**
     * 上传图片
     *
     * @param UploadedFile $file
     * @param $folder
     * @param $prefix
     * @param bool $maxWidth
     *
     * @return array|bool
     */
    public function upload(UploadedFile $file, $folder, $prefix, $maxWidth = false)
    {
        $folder = 'uploads/images/'. $folder . '/' . date('Y/m/d');
        $ext = strtolower($file->getClientOriginalExtension()) ?: 'png';
        $filename = $prefix . '_' . time() . '_' . str_random(10) . '.' . $ext;

        if (! \in_array($ext, self::$allowedExt, true)) {
            return false;
        }
        $file->move($folder, $filename);

        if ($maxWidth && $ext !== 'gif') {
            $this->reduceSize("$folder/$filename", $maxWidth);
        }

        return [
            'path' => config('app.url') . "/$folder/$filename",
        ];
    }

    /**
     * 缩小尺寸
     *
     * @param $path
     * @param $width
     */
    public function reduceSize($path, $width)
    {
        $image = Image::make($path);
        $image->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $image->save();
    }
}
