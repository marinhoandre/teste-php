<?php

namespace Src\Controllers;

use Core\View;
use Src\Models\Product as ProductModel;

class Product
{

    public function index()
    {
        $result = array();
        $arrayProducts = new ProductModel();

        $result['Products'] = $arrayProducts->getProduct();

        $loadView = new View('Views/Products', $result);
        $loadView->render();
    }

    public function new()
    {
        $loadView = new View('Views/Products_form');
        $loadView->render();
    }

    public function details($id = null)
    {
        $id = (int) $id;

        if ($id != "") {
            $product = new ProductModel();
            $details['product'] = $product->getProduct(["id = ".$id]);
        }

        $loadView = new View('Views/Products_details', $details);
        $loadView->render();
    }

    public function edit($id = null)
    {
        $id = (int) $id;

        if ($id != "") {
            $product = new ProductModel();
            $details['product'] = $product->getProduct(["id = ".$id]);
        }

        $loadView = new View('Views/Products_form', $details);
        $loadView->render();
    }

    public function save()
    {
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $id = $dados['id'];
        $salvarDados = new ProductModel();

        unset($dados["id"]);
        unset($dados["url"]);

        $campos_obrigatorios = ['name'=>'Nome do Produto'];
        $campos_numericos = ['quantity','price'];
        if ($id == 0) {
            $return = $salvarDados->setProduct($dados, $campos_obrigatorios, $campos_numericos);
        } else {
            $return = $salvarDados->updProduct($dados, $campos_obrigatorios, $campos_numericos, $id);
        }

        echo json_encode($return);
        exit();
    }

    public function delete($id = null)
    {
        $id = (int) $id;

        if ($id != "") {
            $excluirDados = new ProductModel();
            $return = $excluirDados->delProduct($id);
        }

        header('Location: ../../product');
    }

    public function up()
    {
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $id = $dados["id"];
        $quantity = 1;

        $upStok = new ProductModel();
        $return = $upStok->updStok($id, $quantity);

        echo json_encode($return);
        exit();
    }

    public function down()
    {
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $id = $dados["id"];
        $quantity = 1;

        $upStok = new ProductModel();
        $return = $upStok->downStok($id, $quantity);

        echo json_encode($return);
        exit();
    }
}
