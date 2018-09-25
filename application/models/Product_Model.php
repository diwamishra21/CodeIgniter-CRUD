<?php
class Product_Model extends CI_Model{
    
    
    
    public function get_products(){
        //$this->load->model('Product_Model');         
        /*if(!empty($this->input->get("search"))){
          $this->db->like('title', $this->input->get("search"));
          $this->db->or_like('description', $this->input->get("search")); 
        }*/
        //print_r('inside model');die;
        $query = $this->db->get('products')->result();
        //print_r($query);die;
        return $query;
    }
    
    
    
    public function insert_product()    
    {    
        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description')
        );
        return $this->db->insert('products', $data);
    }
    
    
    
    public function update_product($id) 
    {
        $data=array(
            'title' => $this->input->post('title'),
            'description'=> $this->input->post('description')
        );
        if($id==0){
            return $this->db->insert('products',$data);
        }else{
            $this->db->where('id',$id);
            return $this->db->update('products',$data);
        }        
    }
}
?>