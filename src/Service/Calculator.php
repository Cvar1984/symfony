<?php

namespace App\Service;

use Psr\Log\LoggerInterface;

/**
 * Class: Calculator
 *
 */
class Calculator
{
    /**
     * logger
     *
     * @var mixed
     */
    private $logger;
    /**
     * __construct
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    /**
     * tambah
     *
     * @param int $a
     * @param int $b
     */
    public function tambah(int $a, int $b)
    {
        $this->logger->info('tambah : '.$a.' + '.$b.' = '. ($a + $b));
        return $a + $b;
    }
    /**
     * kurang
     *
     * @param int $a
     * @param int $b
     */
    public function kurang(int $a, int $b)
    {
        $this->logger->info('kurang : '.$a.' - '.$b.' = '. ($a - $b));
        return $a - $b;
    }
    /**
     * kali
     *
     * @param int $a
     * @param int $b
     */
    public function kali(int $a, int $b)
    {
        $this->logger->info('kali : '.$a.' * '.$b.' = '. ($a * $b));
        return $a * $b;
    }
    /**
     * bagi
     *
     * @param int $a
     * @param int $b
     */
    public function bagi(int $a, int $b)
    {
        $this->logger->info('bagi : '.$a.' / '.$b.' = '. ($a / $b));
        return $a/$b;
    }
    /**
     * percen
     *
     * @param int $percen
     * @param int $nilai
     */
    public function percen(int $percen, int $nilai)
    {
        return $nilai * $percen / 100;
    }
}
