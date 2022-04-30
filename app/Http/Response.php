<?php
    namespace App\Http;

    class Response
    {
        /**
         * Status code
         * @var int
         */
        private int $httpCode = 200;

        /**
         * Response header
         * @var array
        */
        private array $headers = [];

        /**
         * Response content type
         * @var string
        */
        private string $contentType = 'text/html';

        /**
         * Response content
         * @var mixed
        */
        private mixed $content;

        public function __construct($httpCode, $content, $contentType = 'text/html') {
            $this->httpCode = $httpCode;
            $this->content = $content;
            $this->setContentType($contentType);
        }

        /**
         * Set response content type
         * @param string $contentType
        */
        public function setContentType(string $contentType): void {
            $this->contentType = $contentType;
            $this->addHeader('Content-Type', $contentType);
        }

        /**
         * Add a value on the response header
         * @param string $key
         * @param string $value
         * @return void
         */
        public function addHeader(string $key, string $value): void {
            $this->headers[$key] = $value;
        }

        /**
         * Send response headers
         * @return void
        */
        public function sendHeaders(): void {
            foreach($this->headers as $key => $value) {
                header("$key: $value", response_code: $this->httpCode);
            }
        }

        /**
         * Send response
         * @return void
        */
        public function sendResponse(): void {
            $this->sendHeaders();
            switch($this->contentType) {
                case 'text/html':
                    echo $this->content;
                    break;
            }
        }
    }