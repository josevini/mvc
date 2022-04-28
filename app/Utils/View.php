<?php
    namespace App\Utils;

    class View
    {
        /**
         * Return the content of view
         * @param string $view
         * @return string
        */
        private static function getContentView(string $view): string {
            $file = __DIR__."/../../resources/view/$view.html";
            return file_exists($file) ? file_get_contents($file) : '';
        }

        /**
         * Render a view
         * @param string $view
         * @param array $vars
         * @return string
        */
        public static function render(string $view, array $vars = []): string {
            $contentView = self::getContentView($view);
            $keys = array_keys($vars);
            $keys = array_map(function($item) {
                return "{{{$item}}}";
            }, $keys);

            return str_replace($keys, array_values($vars), $contentView);
        }
    }