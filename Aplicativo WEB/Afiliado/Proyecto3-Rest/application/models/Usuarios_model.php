<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function buscar($cedula)
    {
         $query = $this->db->query("Select nombre_afiliado,montoaprobado_credito,sum(saldovigente_credito) as saldo
             FROM afiliado,movimiento,credito where afiliado.cedula=credito.cedula_afiliado and credito.id=movimiento.id_credito 
                and afiliado.cedula=".$cedula." GROUP BY nombre_afiliado,montoaprobado_credito");
        return $query->row();
    }

    function obtenerAfiliado($cedula)
    {
        $this->db->where('cedula',$cedula);
        $query = $this->db->get('afiliado');
        return $query->result();
    }

}

