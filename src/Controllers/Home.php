<?php

namespace Src\Controllers;

use Core\View;
use Src\Models\Product;

class Home
{

    public function index()
    {
        $result = array();
        $arrayProducts = new Product();

        /*---- Products Low Stock ----*/
        $result['ProductsLowStock'] = $arrayProducts->getProduct(["quantity <= 3"]);

        /*---- Last Products Movement ----*/
        $result['ProductsMovement'] = $arrayProducts->getProduct(['date_update <> "" '], ['date_update desc'], 5);

        $loadView = new View('Views/Home', $result);
        $loadView->render();
    }
}
