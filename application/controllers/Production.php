<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Production extends Application
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
		$this->data['pagebody'] = 'production_list';

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
            $this->data['pagebody'] = 'production_single';
            
            $materials = array();
            $record = $this->Recipes->get($id);
            
            //form inits
            $inputForm = array('type' => 'number', 'value' => '1', 'class' => 'num-field', 'name' => 'amountToCraft');
            $formHidden = array('recipeId' => $id);
	    
            
            //Creates an array of Materials needed and their respective amounts
            foreach ($record['materials'] as $material)
            {
                $stock = $this->Materials->getMaterialWithName($material['name']);
                $materials[] = array ('name' => $material['name'], 'amount' => $material['amount'], 'inStock' => $stock['totalItem']);
            }
            
            $this->data['materialList'] = $materials;
            $this->data['itemName'] = $record['name'];
            
            //form related vars
            $this->data['form_open'] = form_open('production/craft', '', $formHidden);
            $this->data['amountToCraftForm'] = form_input($inputForm, "", "class='input'");
            $this->data['craftButton'] = form_submit('mysubmit', 'Craft', "class='submit'");
            $this->data['form_close'] = form_close();
            
            //Previous Button
            $previous = array('onclick' =>'javascript:window.history.go(-1)');
            $this->data['previous'] = form_button($previous, 'Previous', "class='submit'");
            
            echo $this->session->flashdata('craftResult');
            $this->render();
            
        }

        /**
         * When user clicks craft
         * Processes if there is enough material to craft and crafts as much
         * as possible
         * DOES NOT reduce stock number at the moment
         * Currently displays result as flash message on same page
         */
        public function craft() {
            $amountToCraft = $_POST['amountToCraft'];
            $recipeId = $_POST['recipeId'];
            $numberCrafted = 0;
            
            $record = $this->Recipes->get($recipeId);
            $tempStocks = array();
                
            //Checks how many items you can craft
            foreach ($record['materials'] as $material)
            {
                $stock = $this->Materials->getMaterialWithName($material['name']);
                $temp = floor($stock['totalItem'] / $material['amount']);

                if($numberCrafted == 0) {
                    $numberCrafted = $temp;
                }elseif($temp < $numberCrafted){
                    $numberCrafted = $temp;
                }
            }
            
            if($numberCrafted > $amountToCraft) {
                $numberCrafted = $amountToCraft;    
            }
            
            //Displays flash message depending on result
            if($numberCrafted == 0) {
                $result = "Unable to craft " . $record['name'] . ", not enough materials.";                    
                $this->session->set_flashdata('craftResult', $result);
                        
                redirect("production/get/" . $recipeId);
            }else{
                $result = "Crafted " . $numberCrafted . " " . $record['name'] . ".<br>";
                $this->session->set_flashdata('craftResult', $result);
                $this->Transactions->setRecipes($record['name'], $numberCrafted);
                        
                redirect("production/get/" . $recipeId);
            }
        }
        
        public function clear() {
            $this->session->unset_userdata('recipes');
            echo 'recipes transactions cleared!';
        }
}
