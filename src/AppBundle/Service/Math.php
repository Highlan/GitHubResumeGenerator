<?php

namespace AppBundle\Service;


class Math
{
    public function getPercentage(int $total, int $quantity, int $precision)
    {
        return round($quantity / $total * 100, $precision);
    }
}