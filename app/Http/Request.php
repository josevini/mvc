<?php
    namespace App\Http;

    class Request
    {
        /**
         * Http Request Method
         * @var string
         */
        private string $httpMethod;

        /**
         * Page uri
         * @var string
        */
        private string $uri;

        /**
         * Url params ($_GET)
         * @var array
        */
        private array $queryParams;

        /**
         * Post vars ($_POST)
         * @var array
        */
        private array $postVars;

        /**
         * Request header
         * @var array
        */
        private array $headers;

        public function __construct() {
            $this->queryParams = $_GET ?? [];
            $this->postVars = $_POST ?? [];
            $this->headers = getallheaders();
            $this->httpMethod = $_SERVER['REQUEST_METHOD'] ?? '';
            $this->uri = $_SERVER['REQUEST_URI'] ?? '';
        }

        /**
         * Return http method
         * @return string
        */
        public function getHttpMethod(): string {
            return $this->httpMethod;
        }

        /**
         * Return uri
         * @return string
         */
        public function getUri(): string {
            return $this->uri;
        }

        /**
         * Return query params
         * @return array
         */
        public function getQueryParams(): array {
            return $this->queryParams;
        }

        /**
         * Return post vars
         * @return array
         */
        public function getPostVars(): array {
            return $this->postVars;
        }

        /**
         * Return headers
         * @return array
         */
        public function getHeaders(): array {
            return $this->headers;
        }
    }