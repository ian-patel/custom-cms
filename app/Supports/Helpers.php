<?php

if (!function_exists('render')) {

    /**
     * Render layout.
     *
     * @param string|null $layout
     * @return void
     */
    function render(string $layout = null)
    {
        $path = "layout/{$layout}.php";
        if (file_exists($path)) {
            require $path;
        }
    }
}

if (!function_exists('input')) {

    /**
     * Get value from query string.
     *
     * @param string|null $key
     * @param null $default
     * @return mixed
     */
    function input(string $key = null, $default = null)
    {
        return $_GET[$key] ?? $default;
    }
}
