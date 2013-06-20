<?php
/**
 * Создание и отображение превьюшек
 */

class ResizeImage
{
    private $ext;
    private $image;
    private $newImage;
    private $origWidth;
    private $origHeight;
    private $resizeWidth;
    private $resizeHeight;

    /**
     * Class constructor requires to send through the image filename
     * @param string $filename - Filename of the image you want to resize
     */
    public function __construct($filename)
    {
        if (file_exists($filename)) {
            $this->setImage($filename);
        } else {
            throw new Exception('Image '.$filename.' can not be found, try another image.');
        }
    }
    /**
     * Set the image variable by using image create
     * @param string $filename - The image filename
     */
    private function setImage($filename)
    {
        $size = getimagesize($filename);
        $this->ext = $size['mime'];
        switch($this->ext)
        {
            case 'image/jpg':
            case 'image/jpeg':
                $this->image = imagecreatefromjpeg($filename);
                break;
            case 'image/gif':
                $this->image = @imagecreatefromgif($filename);
                break;
            case 'image/png':
                $this->image = @imagecreatefrompng($filename);
                break;
            default:
                throw new Exception("File is not an image, please use another file type.", 1);
        }
        $this->origWidth = imagesx($this->image);
        $this->origHeight = imagesy($this->image);
    }
    /**
     * Save the image as the image type the original image was
     * @param  String[type] $savePath     - The path to store the new image
     * @param  string $imageQuality       - The qulaity level of image to create
     * @return Saves the image
     */
    public function saveImage($savePath, $imageQuality=100, $show = false)
    {
        switch($this->ext)
        {
            case 'image/jpg':
            case 'image/jpeg':
                // Check PHP supports this file type
                if (imagetypes() & IMG_JPG) {
                    imagejpeg($this->newImage, $savePath, $imageQuality);
                }
                break;
            case 'image/gif':
                if (imagetypes() & IMG_GIF) {
                    imagegif($this->newImage, $savePath);
                }
                break;
            case 'image/png':
                $invertScaleQuality = 9 - round(((int)$imageQuality/100) * 9);
                if (imagetypes() & IMG_PNG) {
                    imagepng($this->newImage, $savePath, $invertScaleQuality);
                }
                break;
        }
        if ($show) {
            header("Content-Type: $this->ext");
            readfile($savePath);

        }
        imagedestroy($this->newImage);
    }
    /**
     * Resize the image to these set dimensions
     *
     * @param  int $width           - Max width of the image
     * @param  int $height          - Max height of the image
     * @param  string $resizeOption - Scale option for the image
     *
     * @return Save new image
     */
    public function resizeTo($width, $height, $resizeOption = 'default')
    {
        switch(strtolower($resizeOption))
        {
            case 'exact':
                $this->resizeWidth = $width;
                $this->resizeHeight = $height;
            break;
            case 'maxwidth':
                $this->resizeWidth  = $width;
                $this->resizeHeight = $this->resizeHeightByWidth($width);
            break;
            case 'maxheight':
                $this->resizeWidth  = $this->resizeWidthByHeight($height);
                $this->resizeHeight = $height;
            break;
            default:
                if ($this->origWidth > $width || $this->origHeight > $height) {
                    if ($this->origWidth > $this->origHeight) {
                         $this->resizeHeight = $this->resizeHeightByWidth($width);
                         $this->resizeWidth  = $width;
                    } else if ($this->origWidth < $this->origHeight) {
                        $this->resizeWidth  = $this->resizeWidthByHeight($height);
                        $this->resizeHeight = $height;
                    }
                } else {
                    $this->resizeWidth = $width;
                    $this->resizeHeight = $height;
                }
            break;
        }
        $this->newImage = imagecreatetruecolor($this->resizeWidth, $this->resizeHeight);
        imagecopyresampled($this->newImage, $this->image, 0, 0, 0, 0, $this->resizeWidth, $this->resizeHeight, $this->origWidth, $this->origHeight);
    }

    private function resizeHeightByWidth($width)
    {
        return floor(($this->origHeight/$this->origWidth)*$width);
    }

    private function resizeWidthByHeight($height)
    {
        return floor(($this->origWidth/$this->origHeight)*$height);
    }
}
?>