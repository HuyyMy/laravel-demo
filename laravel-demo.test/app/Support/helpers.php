<?php

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
            $excerpt = trim(preg_replace('/\r\n|\r|\n+/', '', strip_tags($text)));

            return str_limit($excerpt, $length);
        }
    }

    if (!function_exists('clean')) {

        /**
         * @param $dirty
         * @param null $config
         * @return mixed
         */
        function clean($dirty, $config = null)
        {
            return app('purifier')->clean($dirty, $config);
        }
    }
}
