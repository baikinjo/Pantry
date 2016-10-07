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
        $items[] = array('Name', 'Description', 'Price', 'Quantity', 'Order');

        // Add table rows
        foreach ($source as $record)
        {
            $num_input = array('type' => 'number', 'value' => '0', 'class' => 'input', 'name' => 'Quantity');
            $chk_data = array('name' => 'c_' . $record['id']);

            $items[] = array($record['name'], 
                             $record['desc'], 
                             $record['price'], 
                             form_input($num_input),
                             form_checkbox($chk_data, "", "", "class='checkbox'"));

        }

        $items[] = array(form_submit('', 'Submit', "class='submit'"), '', '', '', '');

        //Generate the materials table
        $this->data[$type.'_table'] = $this->table->generate($items);

        //$this->data['order_button'] = form_submit('', 'Submit', "class='submit'");
        //close form
        $this->data['form_close'] = form_close();
    }

    public function sales(){
        var_dump($_POST);
    }
}