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
        $this->data['form_open'] = form_open('admin/post');

        // Get list of items

        $source = $this->$type->all();

        // Set table headers
        $items[] = array('Name', 'Description', 'Price');

        // Add table rows
        foreach ($source as $record)
        {
            $items[] = array($record['name'], $record['desc'], $record['price']);

        }

        //Generate the materials table
        $this->data[$type.'_table'] = $this->table->generate($items);

        //close form
        $this->data['form_close'] = form_close();
    }
}