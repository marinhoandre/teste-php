<?php

namespace Src\Models;

use Conn\Connection;
use PDO;

class Product
{
    public function getProduct(array $args = null, array $order = ["id asc"], $limit = "")
    {
        $connection = new Connection();

        $where = " WHERE bit_active = 1 ";
        if (!is_null($args)) {
            if (count($args) > 0) {
                foreach ($args as $arg) {
                    $where .= "AND ".$arg;
                }
            }
        }

        $orderBy = " ";
        if (!is_null($order)) {
            if (count($order) > 0) {
                foreach ($order as $ord) {
                    if ($orderBy == " ") {
                        $orderBy .= " ORDER BY " . $ord;
                    } else {
                        $orderBy .= ", " . $ord;
                    }
                }
            }
        }

        if ($limit != "") {
            $limit = " LIMIT ".$limit;
        }

        $sql = "SELECT * FROM product";

        $sql .= $where.$orderBy.$limit;

        $arrayProducts = $connection->getConn()->prepare($sql);
        $arrayProducts->execute();

        $result = $arrayProducts->fetchAll();

        return $result;
    }

    public function setProduct(array $params, array $params_obrigatorios, array $campos_numericos)
    {
        $return = array('status_code'=>0,'message'=>'Não foi possível salvar este produto');
        $return_required = array();

        if (count($params) > 0) {
            foreach ($params as $key => $value) {
                if (array_key_exists($key, $params_obrigatorios) && $value == '') {
                    $return_required[] = $params_obrigatorios[$key];
                } else {
                    if ($value != '') {
                        $column[] = $key;
                        if (in_array($key, $campos_numericos)) {
                            $value = str_replace('.', '', $value);
                            $value = str_replace(',', '.', $value);
                            $values[] = $value;
                        } else {
                            $values[] = "'".$value."'";
                        }
                    }
                }
            }

            if (count($return_required) > 0) {
                $return = array(
                    'status_code'=>2,
                    'message'=>'Preenchimento  obrigatório do campo: '. implode(', ', $return_required)
                );
            } else {
                $column = implode(',', $column);
                $values = implode(',', $values);

                $connection = new Connection();

                try {
                    $sql = "Insert into product (" . $column . ") values (" . $values . ")";
                    $setProducts = $connection->getConn()->prepare($sql);
                    $success = $setProducts->execute();

                    if ($success) {
                        $return = array('status_code'=>1,'url'=>'products');
                    }
                } catch (Exception $e) {
                }
            }
        }

        return $return;
        exit;
    }

    public function updProduct(array $params, array $params_obrigatorios, array $campos_numericos, $id)
    {
        $return = array('status_code'=>0,'message'=>'Não foi possível salvar este produto');
        $return_required = array();

        if (count($params) > 0) {
            foreach ($params as $key => $value) {
                if (array_key_exists($key, $params_obrigatorios) && $value == '') {
                    $return_required[] = $params_obrigatorios[$key];
                } else {
                    if ($value != '') {
                        if (in_array($key, $campos_numericos)) {
                            $value = str_replace('.', '', $value);
                            $value = str_replace(',', '.', $value);
                            $column[] = $key ."=".$value;
                        } else {
                            $column[] = $key ."='".$value."'";
                        }
                    }
                }
            }

            if (count($return_required) > 0) {
                $return = array(
                    'status_code'=>2,
                    'message'=>'Preenchimento  obrigatório dos campos: '. implode(', ', $return_required)
                );
            } else {
                $column = implode(',', $column);

                $connection = new Connection();

                try {
                    $sql = "Update product set ".$column.", date_update = now() where id = ".$id;
                    $updProducts = $connection->getConn()->prepare($sql);
                    $success = $updProducts->execute();

                    if ($success) {
                        $return = array('status_code'=>1, 'url'=>'../../product');
                    }
                } catch (Exception $e) {
                }
            }
        }

        return $return;
        exit;
    }

    public function delProduct($id)
    {
        $connection = new Connection();

        try {
            $sql = "Update product set bit_active = 0 where id = ".$id;
            $delProducts = $connection->getConn()->prepare($sql);
            $success = $delProducts->execute();
        } catch (Exception $e) {
        }

        return $return;
        exit;
    }

    public function updStok($id, $quantity)
    {
        $connection = new Connection();

        try {
            $sql = "Update product set quantity = quantity+".$quantity.", date_update = now() where id = ".$id;
            $upStok = $connection->getConn()->prepare($sql);
            $success = $upStok->execute();

            if ($success) {
                $return = array('status_code'=>1,'url'=>'../../product');
            }
        } catch (Exception $e) {
        }

        return $return;
        exit;
    }

    public function downStok($id, $quantity)
    {
        $connection = new Connection();

        try {
            $sql = "Update product set quantity = quantity-".$quantity.", date_update = now() where id = ".$id;
            $upStok = $connection->getConn()->prepare($sql);
            $success = $upStok->execute();

            if ($success) {
                $return = array('status_code'=>1,'url'=>'../../product');
            }
        } catch (Exception $e) {
        }

        return $return;
        exit;
    }
}
