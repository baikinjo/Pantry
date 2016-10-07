<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Recipe extends Application
{

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Page that displays all available recipes
	 */
	public function index()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'recipe_list';

		// build the list of items, to pass on to our view
		$source = $this->Recipes->all();
		$items = array();
		foreach ($source as $record)
		{
			$items[] = array ('id' => $record['id'], 'name' => $record['name']);
		}
		$this->data['items'] = $items;

		$this->render();
	}
        
        /**
         * Displays selected recipe. Allows users to craft.
         */
        public function get($id) {
            $this->data['pagebody'] = 'recipe_single';
            
            $materials = array();
            $record = $this->Recipes->get($id);
            
            //form inits
            $inputForm = array('type' => 'number', 'value' => '1', 'class' => 'num-field', 'name' => 'amountToCraft');
            $formHidden = array('recipeId' => $id);
	    
            
            //Creates an array of Materials needed and their respective amounts
            foreach ($record['materials'] as $material)
            {
                $stock = $this->Materials->getMaterialWithName($material['name']);
                $materials[] = array ('name' => $material['name'], 'amount' => $material['amount'], 'inStock' => $stock['amount']);
            }
            
            $this->data['materialList'] = $materials;
            $this->data['itemName'] = $record['name'];
            
            //form related vars
            $this->data['form_open'] = form_open('recipe/craft', '', $formHidden);
            $this->data['amountToCraftForm'] = form_input($inputForm);
            $this->data['craftButton'] = form_submit('mysubmit', 'Craft');
            $this->data['form_close'] = form_close();
            
            $this->render();
        }

        /**
         * When user clicks craft
         * Processes if there is enough material to craft
         */
        public function craft() {
            $amountToCraft = $_POST['amountToCraft'];
            $recipeId = $_POST['recipeId'];
            
            $record = $this->Recipes->get($recipeId);
            $tempStocks = array();
            
            //Stores temp available stocks since we aren't suppose to update amount at the moment
            foreach ($record['materials'] as $material)
            {
                $stock = $this->Materials->getMaterialWithName($material['name']);

                $tempStocks[$stock['name']] = $stock['amount'];
            }
            
            //Goes through the temp stocks and stops crafting when it runs out
            for($i = 0; $i < $amountToCraft; $i++) {
                foreach ($record['materials'] as $material)
                {   
                    if($material['amount'] > $tempStocks[$material['name']]) {
                        echo "Unable to craft item, not enough " . $material['name'] . ".";
                        return;
                    }else{
                        $tempStocks[$material['name']] -= $material['amount'];
                    }
                }
                
                echo "Crafted 1 " . $record['name'] . ".<br>";
            }
           
        }
        
        public function clear() {
            $this->session->unset_userdata('recipes');
            echo 'recipes transactions cleared!';
        }
}
