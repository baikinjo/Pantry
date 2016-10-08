<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends Application
{

	function __construct()
	{
		parent::__construct();
	}
	
	

	/**
	 * Homepage for our app
	 */
	public function index()
	{

		// this is the view we want shown
		$this->data['pagebody'] = 'material_list';

		// build the list of authors, to pass on to our view
		$source = $this->Materials->all();

		$this->data['form_open'] = form_open('material/post');
		
		//$test = $this->Transactions->getMaterials();

        // Set table headers

        $items[] = array('Name','Cost/Case' ,'Stocked Cases', 'Cases Recieved');

        foreach ($source as $record)
        {
			$text_data = array('name' => $record['id'],);
			$case = $record['totalItem'] / $record['itemPerCase'];
            $items[] = array ($record['name'],"$ ".$record['price'],floor($case) ,form_input($text_data));
		
        }

        $items[] = array(form_submit('', 'Submit', "class='submit'"), '', '', '');


        $this->data['Materials_table'] = $this->table->generate($items);
		
		$this->data['form_close'] = form_close();
		$this->render();
		

	}

	public function get($id) {
		
		$this->data['pagebody'] = 'material_single';
		
		$record = $this->Materials->get($id);
		$this->data = array_merge($this->data, $record);
		
		$this->render();
	}
	
	public function post()
    {
		//var_dump($_POST);
		
		
		foreach ($_POST as $post_name => $post_value){
			$this->Transactions->setMaterials($post_name, $post_value);
		}
		
		var_dump($this->Transactions->getMaterials());	
		
		/*
		foreach (array_keys($_POST) as $entry){
			var_dump($entry);
			
		}
		
        $id = $_POST['key'];
        $value = $_POST['value'];

       
        $this->Transactions->setMaterials($id, $value);
*/

    }

	public function clear() {
		$this->session->unset_userdata('materials');
		echo 'materials transactions cleared!';
	}
}
