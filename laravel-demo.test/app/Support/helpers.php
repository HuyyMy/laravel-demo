<?php
/**
 * Created by PhpStorm.
 * User: hyyph
 * Date: 2018/7/12
 * Time: 13:30
 */

if (! function_exists('route_class')) {
    /**
     * 将路由名称转换为页面 div class 名称
     *
     * @return string
     */
    function route_class()
    {
        return str_replace('.', '-', \Route::currentRouteName());
    }

    if (! function_exists('make_excerpt')) {

        /**
         * @param $text
         * @param int $length
         *
         * @return string
         */
        function make_excerpt($text, $length = 200)
        {
            $excerpt = trim(preg_match('/\r\n|\r|\n+/', '', strip_tags($text)));

            return str_limit($excerpt, $length);
        }
    }
}
