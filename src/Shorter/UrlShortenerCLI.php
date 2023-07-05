<?php

namespace App\Shorter;

use App\Shorter\UrlShortener;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;

use App\Shorter\UrlValidator;

class UrlShortenerCLI
{
    private UrlShortener $shortener;
//    private LoggerInterface $logger;

    public function __construct(UrlShortener $shortener)
    {
        $this->shortener = $shortener;
//        $this->logger = $logger;
    }

    public function handle($command, $url): void
    {

        if ($command == 'encode') {
            try {
                $code = $this->shortener->encode($url);
//                $this->logger->info("Shortened URL: {$code}");
                echo "Shortened URL: {$code}\n";
            } catch (InvalidArgumentException $e) {
//                $this->logger->error($e->getMessage());
                echo $e->getMessage() . "\n";
                exit(1);
            }
        } elseif ($command === 'expand') {
            $code = $url;
            try {
                $url = $this->shortener->decode($code);
//                $this->logger->info("Expanded URL: {$url}");
                echo "Expanded URL: {$url}\n";
            } catch (InvalidArgumentException $e) {
//                $this->logger->error($e->getMessage());
                echo $e->getMessage() . "\n";
                exit(1);
            }
        } else {

//            $this->logger->error("Invalid command");
            echo "Invalid command\n";
            exit(1);
        }
    }
}