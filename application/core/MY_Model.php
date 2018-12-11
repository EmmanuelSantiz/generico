<?php
class MY_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * 
     * Crea un query para base de datos y regresa los resultados
     * @param String $type [all|first|count|list]
     * @param Array $params array([conditions|fields|order|limit|join])
     * @return Object o Array
     */
    function find($type, $params = array()) {
        $result = FALSE;
        $this->db->from($this->table);

        if(isset($params['conditions'])) {
            foreach ($params['conditions'] as $key) {
                switch ($key['type']) {
                    case 'like':
                        $this->db->like($key['campo'], $key['value']);
                        break;
                    case 'where':
                        $this->db->where($key['campo'], $key['value']);
                        break;
                    case 'where_in_not':
                        $this->db->where_not_in($key['campo'], $key['value']);
                        break;
                    case 'or_where':
                        $this->db->or_where_in($key['campo'], $key['value']);
                        break;
                    case 'or_like':
                        $this->db->or_like($key['campo'], $key['value']);
                        break;
                    case 'where_in':
                        $this->db->where_in($key['campo'], $key['value']);
                        break;
                }
            }
        }

        if(isset($params['join'])) {
            foreach($params['join']['clause'] as $join_table => $join_conditions) {
                if(isset($params['join'][$join_table]))
                    $this->db->join($join_table, $join_conditions, $params['join'][$join_table]);
                else
                    $this->db->join($join_table, $join_conditions);
            }
        }

        if(isset($params['fields'])) {
            if (isset($params['dist'])) {
                $this->db->distinct();
            }
            $this->db->select($params['fields']);
        }

        if(isset($params['order'])) {
            $this->db->order_by($params['order'][0], $params['order'][1]);
        }

        if(isset($params['order2'])) {
            $this->db->order_by($params['order2'][0], $params['order2'][1]);
        }

        if(isset($params['orderMult'])) {
            for($iteracion=0;$iteracion<count($params['orderMult']);$iteracion++){
                if(($iteracion % 2) == 0){
                    $tipo=$params['orderMult'][$iteracion];
                } else{
                    $order=$params['orderMult'][$iteracion];
                    $this->db->order_by($tipo, $order);
                }            
            }
        }

        if(isset($params['group'])) {
            $this->db->group_by($params['group']);
        }

        if($type == 'count')
            $result = $this->db->count_all_results();
        else {
            if($type == 'first')
                $this->db->limit(1);
            else if(isset($params['limit']) && !empty($params['limit'])) {
                if(is_array($params['limit'])) {
                    $cnt_params = count($params['limit']);
                    if($cnt_params) {
                        if($cnt_params == 1)
                            $this->db->limit($params['limit'][0]);
                        else
                            $this->db->limit($params['limit'][0], $params['limit'][1]);
                    }
                }
                else
                    $this->db->limit($params['limit']);
            }
            $query = $this->db->get();
            switch($type) {
                case 'list':
                    $result = array();
                    $tmp_result = $query->result_array();
                    $keys = array_values($params['fields']);

                    foreach($tmp_result as $tmp) {
                        $result[$tmp[$keys[0]]] = $tmp[$keys[1]];
                    }
                    break;
                case 'first':
                    $result = $query->row();
                    break;
                default:
                    $result = $query->result();
                    break;
            }
        }

        $this->db->last_query();
        return $result;
    }

    /**
     * 
     * Guarda o Actualiza un registro en la base de datos
     * @param Array $params campos para ser guardados
     * @return Int el id para actualizar si exsite o agregar si no existe
     */
    function save($params) {
        $already_exists = FALSE;
        if(count($params)) {
            if(isset($params['id'])) {
                //check if the record already exists in the database
                $found_record = $this->find('count', array('conditions' => array('id' => $params['id'])));
                if($found_record)
                    $already_exists = TRUE;
            }
            $this->db->set($params);
            if($already_exists) {
                $this->db->where('id', $params['id']);
                if($this->db->update($this->table))
                    return $params['id'];
                else
                    return FALSE;
            } else {
                $this->db->insert($this->table, $params); 
                if($this->db->affected_rows()) {
                    $new_record_id = $this->find('first', array('fields' => array('id'), 'order' => array('id' => 'DESC')));
                    return $new_record_id->id;
                }
                else
                    return FALSE;
            }
        }
        return FALSE;
    }

    /**
     *
     * Elimina registros de la base de datos
     * @param Array $params condiciones para eliminar registro(s)
     * @return INT el numero de campos afectados o FALSE si ocurrio error 
     */
    function delete($params) {
        return ($this->db->delete($this->table, $params) ? $this->db->affected_rows() : FALSE);
        /*if($this->db->delete($this->table, $params))
            return $this->db->affected_rows();
        else
            return FALSE;*/
    }
}

//https://github.com/ccruz17/certificados-sat-openssl
//http://www.expidetufactura.com.mx/cfdi_v3.2/pages/csd.txt
//http://desarrolladores.diverza.com/timbre/cfd/sello.html
?>