<?php

class Materials extends CI_Model {

	var $data = array(
		array(	'id' => '1', 
				'name' => 'empty bottle',
				'amount' => 12),

		array(	'id' => '2', 
				'name' => 'red herb',
				'amount' => 22),

		array(	'id' => '3', 
				'name' => 'blue herb',
				'amount' => 13),

		array(	'id' => '4', 
				'name' => 'iron ingot',
				'amount' => 41),

		array(	'id' => '5', 
				'name' => 'steel ingot',
				'amount' => 8),

		array(	'id' => '6', 
				'name' => 'leather',
				'amount' => 21),

		array(	'id' => '7', 
				'name' => 'wood',
				'amount' => 9),

		array(	'id' => '8', 
				'name' => 'scroll',
				'amount' => 19),

		array(	'id' => '9', 
				'name' => 'ruby dust',
				'amount' => 20),

		array(	'id' => '10', 
				'name' => 'sapphire dust',
				'amount' => 4),

		array(	'id' => '11', 
				'name' => 'topaz dust',
				'amount' =>2),

		array(	'id' => '12', 
				'name' => 'emerald dust',
				'amount' => 9)
	
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
