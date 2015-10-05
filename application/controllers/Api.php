<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Api extends CI_Controller
{
	function __construct()
    {
        // Construct our parent class
        parent::__construct();
        
    }
    public function get_seller(){
    
		$seller = $this->seller_model->get_all();        
		$hasil=json_encode($seller);		
		echo $hasil;

    }	
     public function get_seller_id(){
    	$jsondata = $this->read_data_in();
         //var_dump($jsondata);
        if ($jsondata != NULL){
        		$id=$jsondata["sel_id"];
        		$seller = $this->seller_model->get_seller_id($id);        
				$hasil=json_encode($seller);		
				echo $hasil;
        }
		

    }	
	public function add_seller(){
		//var_dump($this->input->post("name"));

		$jsondata = $this->read_data_in();
         //var_dump($jsondata);
        if ($jsondata != NULL){
        	$data=json_decode(json_encode($jsondata), TRUE);
        	$this->seller_model->insert_seller($data);
   
        }


	}
	 public function update_seller(){
    
		$jsondata = $this->read_data_in();
         //var_dump($jsondata);
        if ($jsondata != NULL){
            $id=$jsondata["sel_id"];
        	$data=json_decode(json_encode($jsondata), TRUE);
        	unset($data['sel_id']);
        	$hasil=$this->seller_model->update_seller($id, $data);
        	
   
        }

    }
	 public function del_seller(){
    
		$jsondata = $this->read_data_in();
         //var_dump($jsondata);
        if ($jsondata != NULL){
        		 $id=$jsondata["sel_id"];
        		 $this->seller_model->delete_seller($id);

        }

    }	
	 private function read_data_in(){
                $p_data = json_decode(file_get_contents("php://input"), true);
                if ($p_data == null){
                        //echo '{"jsonrpc":"2.0","error":{"code":-32700,"message":"Parse error"},"id":null}';
                        echo '';
                        return NULL;
                }
                else return $p_data;
        }
}