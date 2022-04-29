<?php
    namespace App\Controller\Pages;
    use App\Utils\View;

    class Home extends Page
    {
        /**
         * Return the content of home
         * @return string
         */
        public static function getHome(): string
        {
            $content = View::render('pages/home', [
                'name' => 'Vinicius Silva',
                'github' => 'https://github.com/josevini',
                'linkedin' => 'https://www.linkedin.com/in/josevini/'
            ]);

            return parent::getPage('Home', $content);
        }
    }