<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 8/01/18
 * Time: 21:07
 */

class Pedidos_model extends CI_Model
{
    function getAllPedidos(){
        $ret = array();

        $ret['numeroPedido']  = "13142";
        $ret['realizadoPor']  = "usuario";
        $ret['fechaPeticion'] = "14-04-2017";
        $ret['estado']  = "En tramite";
        $ret['transportista'] = "CORREOS";
        return array($ret); // vacío de momento
    }
}