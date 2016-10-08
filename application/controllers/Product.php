<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Application
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
		$this->data['pagebody'] = 'stock_list';
		$this->create_form('Products');
		$this->render();
	}

	private function create_form($type) {

        //Open form
        $this->data['form_open'] = form_open('product/sales');

        // Get list of items

        $source = $this->$type->all();

        // Set table headers
        $items[] = array('Name', 'Description', 'Stock', 'Price', 'Quantity');

        // Add table rows
        foreach ($source as $record)
        {
            $num_input = array('type' => 'number', 'value' => '0', 'class' => 'num-field', 'name' => 'quantity' . $record['id']);
            
            $items[] = array($record['name'], 
                             $record['desc'], 
                             $record['amount'], 
                             $record['price'],
                             form_input($num_input));
        }

        //Generate the materials table
        $this->data[$type.'_table'] = $this->table->generate($items);
        //submit button
        $this->data['order_button'] = form_submit('mysubmit', 'Order');
        //clear form
        $this->data['clear_data'] = form_reset('reset','Clear');
        //close form
        $this->data['form_close'] = form_close();
    }

    public function sales(){

        foreach($_POST as $post_name => $post_value){
            $this->Transactions->setProducts($post_name, $post_value);
        }    
            
        var_dump($this->Transactions->getProducts());
    }

    public function clear() {
        $this->session->unset_userdata('products');
        echo 'products transactions cleared!';
    }
}