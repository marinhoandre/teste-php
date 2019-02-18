<?php

namespace Src\Helper;

class Functions
{
    public function convertPriceUStoBR($price)
    {
        $value = $price;

        if (is_numeric($price)) {
            $value = number_format( $price , 2, ',', '.');
        }

        return $value;
    }
}
