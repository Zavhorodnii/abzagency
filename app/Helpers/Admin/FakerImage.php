<?php

namespace App\Helpers\Admin;

use Faker\Provider\Color;
use Faker\Provider\Lorem;
use phpDocumentor\Reflection\Types\This;

class FakerImage
{
    /**
     * @var string
     */
    public const BASE_URL = 'http://via.placeholder.com';
//    public const BASE_URL = "https://picsum.photos";

    /**
     * @var array
     *
     * @deprecated Categories are no longer used as a list in the placeholder API but referenced as string instead
     */
    protected static $categories = [
        'abstract', 'animals', 'business', 'cats', 'city', 'food', 'nightlife',
        'fashion', 'people', 'nature', 'sports', 'technics', 'transport',
    ];

    /**
     * Generate the URL that will return a random image
     *
     * Set randomize to false to remove the random GET parameter at the end of the url.
     *
     * @example 'http://via.placeholder.com/640x480.png/CCCCCC?text=well+hi+there'
     *
     * @param int         $width
     * @param int         $height
     * @param string|null $category
     * @param bool        $randomize
     * @param string|null $word
     * @param bool        $gray
     *
     * @return string
     */
    public static function imageUrl(
        $width = 640,
        $height = 480,
        $category = null,
        $randomize = true,
        $word = null,
        $gray = false
    ) {
        $size = sprintf('%dx%d.png', $width, $height);

        $imageParts = [];

        if ($category !== null) {
            $imageParts[] = $category;
        }

        if ($word !== null) {
            $imageParts[] = $word;
        }

        if ($randomize === true) {
            $imageParts[] = Lorem::word();
        }

        $backgroundColor = $gray === true ? 'CCCCCC' : str_replace('#', '', Color::safeHexColor());

        return sprintf(
            '%s/%s/%s%s',
            self::BASE_URL,
            $size,
            $backgroundColor,
            count($imageParts) > 0 ? '?text=' . urlencode(implode(' ', $imageParts)) : ''
        );
    }

    /**
     * Download a remote random image to disk and return its location
     *
     * Requires curl, or allow_url_fopen to be on in php.ini.
     *
     * @example '/path/to/dir/13b73edae8443990be1aa8f1a483bc27.png'
     *
     * @return bool|string
     */
    public static function image(
        $dir = null,
        $width = 640,
        $height = 480,
        $category = null,
        $fullPath = true,
        $randomize = true,
        $word = null,
        $gray = false
    ) {
        $dir = null === $dir ? sys_get_temp_dir() : $dir; // GNU/Linux / OS X / Windows compatible
        // Validate directory path
        if (!is_dir($dir) || !is_writable($dir)) {
            throw new \InvalidArgumentException(sprintf('Cannot write to directory "%s"', $dir));
        }

        // Generate a random filename. Use the server address so that a file
        // generated at the same time on a different server won't have a collision.
        $name = md5(uniqid(empty($_SERVER['SERVER_ADDR']) ? '' : $_SERVER['SERVER_ADDR'], true));
        $filename = $name . '.png';
        $filepath = $dir . DIRECTORY_SEPARATOR . $filename;

        $url = static::imageUrl($width, $height, $category, $randomize, $word, $gray);

        // save file
        if (function_exists('curl_exec')) {
            // use cURL
            $user_agent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36';

            $headers = array();
            $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';

            $referer = self::BASE_URL . "/";

            $path = $filepath;


            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
            curl_setopt($ch, CURLOPT_REFERER, $referer);

            $data = curl_exec($ch);
            curl_close($ch);

            $success = curl_getinfo($ch, CURLINFO_HTTP_CODE) === 200;
            file_put_contents($path, $data);


            if (!$success) {
                unlink($filepath);

                // could not contact the distant URL or HTTP error - fail silently.
                return false;
            }
        } elseif (ini_get('allow_url_fopen')) {
            // use remote fopen() via copy()
            $success = copy($url, $filepath);

            if (!$success) {
                // could not contact the distant URL or HTTP error - fail silently.
                return false;
            }
        } else {
            return new \RuntimeException('The image formatter downloads an image from a remote HTTP server. Therefore, it requires that PHP can request remote hosts, either via cURL or fopen()');
        }

        return $fullPath ? $filepath : $filename;
    }
}
