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
		$this->data['pagebody'] = 'sale_list';
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
            $num_input = array('type' => 'number', 'value' => '0', 'class' => 'num-field', 'name' => $record['id']);
            
            $items[] = array('<a href="/product/get/' .
                              $record['id']. '">' .
                              $record['name'] . '</a>',
                              $record['desc'],
                              $record['amount'],
                              $record['price'],
                              form_input($num_input));
        }

        //Generate the materials table
        $this->data[$type.'_table'] = $this->table->generate($items);
        //submit button
        $this->data['order_button'] = form_submit('', 'Order');
        //clear form
        $this->data['clear_data'] = form_reset('','Clear');
        //close form
        $this->data['form_close'] = form_close();
        $previous = array('onclick' =>'javascript:window.history.go(-1)');
        $this->data['previous'] = form_button($previous, 'Previous');
    }

    public function get($id){
        $this->data['pagebody'] = 'sale_single';

        $source = $this->Products->get($id);

        $items[] = array('Name', 'Description', 'Price');
        $items[] = array($source['name'], $source['desc'], $source['price']);

        $this->data['stock_table'] = $this->table->generate($items);
        $previous = array('onclick' =>'javascript:window.history.go(-1)');
        $this->data['previous'] = form_button($previous, 'Previous');
        $this->render();
    }

    public function sales(){
        $this->data['pagebody'] = 'sale_confirmation';
        //$inventory[] = array();
        foreach($_POST as $post_name => $post_value){
            $this->Transactions->setProducts($post_name, $post_value);
            $inventory[] = array('key' => $post_name, 'value' => $post_value);
        }

        $result = array();
        foreach($inventory as $source){

            if($source['value'] == 1){
                $record = $this->Products->get($source['key']);
                $result[] = array('line' => "You ordered " . $source['value'] . ' ' .  $record['name'] . "</br>");
            }else if($source['value'] > 1){
                $record = $this->Products->get($source['key']);
                $result[] = array('line' => "You ordered " . $source['value'] . ' ' .  $record['name'] ."s" . "</br>");
            }
        }
        $this->data['result'] = $result;
        $previous = array('onclick' =>'javascript:window.history.go(-1)');
        $this->data['previous'] = form_button($previous, 'Previous');
        $this->render();
    }

    public function clear() {
        $this->session->unset_userdata('products');
        echo 'products transactions cleared!';
    }
}