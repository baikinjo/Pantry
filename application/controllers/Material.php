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
		$items = array ();
		foreach ($source as $record)
		{
			$items[] = array ('name' => $record['name']);
		}
		$this->data['items'] = $items;

        $mattrans = $this->Transactions->getMaterials();
        var_dump($mattrans);
        //$this->data['test'] = 'material_list';

		$this->render();

	}

	public function get($id) {
		//$this->data['pagebody'] = 'material_single';
		
		$record = $this->Materials->get($id);
		$this->data = array_merge($this->data, $record);
		
		$this->render();
	}
	
	public function getMaterialWithName($name)
	{
		// iterate over the data until we find the one we want
		foreach ($this->data as $record)
			if ($record['name'] == $name)
				return $record;
		return null;
	}

	public function clear() {
		$this->session->unset_userdata('materials');
		echo 'materials transactions cleared!';
	}
}
