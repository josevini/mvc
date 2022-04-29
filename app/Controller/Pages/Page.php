<?php
    namespace App\Controller\Pages;
    use App\Utils\View;

    class Page
    {
        /**
         * Return the content of header
         * @return string
         */
        private static function getHeader(): string {
            return View::render('pages/header');
        }

        /**
         * Return the content of footer
         * @return string
         */
        private static function getFooter(): string {
            return View::render('pages/footer');
        }

        /**
         * Return the content of generic page
         * @param string $title
         * @param string $content
         * @return string
         */
        public static function getPage(string $title, string $content): string
        {
            return View::render('pages/page', [
                'title' => $title,
                'header' => self::getHeader(),
                'content' => $content,
                'footer' => self::getFooter()
            ]);
        }
    }