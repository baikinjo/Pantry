<?php

class Materials extends CI_Model {

	var $data = array(
		array(	'id' => '1', 
				'name' => 'empty bottle',
				'price' => 100,
				'itemPerCase' => 12,
				'totalItem'=> 36),

		array(	'id' => '2', 
				'name' => 'red herb',
				'price' => 150,
				'itemPerCase' => 6,
				'totalItem'=> 15),

		array(	'id' => '3', 
				'name' => 'blue herb',
				'price' => 150,
				'itemPerCase' => 6,
				'totalItem'=> 14),

		array(	'id' => '4', 
				'name' => 'iron ingot',
				'price' => 500,
				'itemPerCase' => 10,
				'totalItem'=> 20),

		array(	'id' => '5', 
				'name' => 'steel ingot',
				'price' => 500,
				'itemPerCase' => 10,
				'totalItem'=> 18),

		array(	'id' => '6', 
				'name' => 'leather',
				'price' => 250,
				'itemPerCase' => 20,
				'totalItem'=> 69),

		array(	'id' => '7', 
				'name' => 'wood',
				'price' => 250,
				'itemPerCase' => 50,
				'totalItem'=> 250),

		array(	'id' => '8', 
				'name' => 'scroll',
				'price' => 100,
				'itemPerCase' => 100,
				'totalItem'=> 40),

		array(	'id' => '9', 
				'name' => 'ruby dust',
				'price' => 1000,
				'itemPerCase' => 5,
				'totalItem'=> 12),

		array(	'id' => '10', 
				'name' => 'sapphire dust',
				'price' => 1000,
				'itemPerCase' => 5,
				'totalItem'=> 11),

		array(	'id' => '11', 
				'name' => 'topaz dust',
				'price' => 1000,
				'itemPerCase' => 5,
				'totalItem'=> 9),

		array(	'id' => '12', 
				'name' => 'emerald dust',
				'price' => 1000,
				'itemPerCase' => 5,
				'totalItem'=> 6)

	);

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	public function getMaterialWithName($name)
	{
		// iterate over the data until we find the one we want
		foreach ($this->data as $record)
			if ($record['name'] == $name)
				return $record;
		return null;
	}
	
	public function get($which)
	{
		// iterate over the data until we find the one we want
		foreach ($this->data as $record)
			if ($record['id'] == $which)
				return $record;
		return null;
	}

	// retrieve all of the quotes
	public function all()
	{
		return $this->data;
	}

}
