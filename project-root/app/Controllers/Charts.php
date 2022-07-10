<?php
 
class Chart extends CI_Controller {
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url','html','form'));
    }       

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function bar_chart_js() {
   
        $query =  $this->db->query("SELECT id, name, color from items;"); 
 
        $record = $query->result();
        $data = [];
 
        foreach($record as $row) {
            $data['id'][] = $row->id;
            $data['name'][] = $row->name;
            $data['color'][] = $row->color;
        }
        $data['chart_data'] = json_encode($data);
        $this->load->view('/dashboard',$data);
    }
}
?>