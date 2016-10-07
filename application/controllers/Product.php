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

		// build the list of items, to pass on to our view
		$source = $this->Products->all();
		$items = array ();
		foreach ($source as $record)
		{
			$items[] = array ('name' => $record['name']);
		}
		$this->data['items'] = $items;

		$this->render();
	}
        
        /**
         * Elayne Boolsters quote Issue #4
         */
        public function get($id) {
            $this->data['pagebody'] = 'stock_single';
            
            $record = $this->Products->get($id);
            $this->data = array_merge($this->data, $record);
            
            $this->render();
        }

        public function clear() {
            $this->session->unset_userdata('products');
            echo 'products transactions cleared!';
        }
}
