<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Application
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // This is the view we want shown
        $this->data['pagebody'] = 'dashboard';

        $this->data['materials_cost'] = $this->calculate_value_purchased(
            'Materials', $this->Transactions->getMaterials());

        $this->data['recipes_cost'] = $this->calculate_value_purchased(
            'Recipes', $this->Transactions->getRecipes());

        $this->data['products_cost'] = $this->calculate_value_purchased(
            'Products', $this->Transactions->getProducts());

        $this->render();

    }

    public function calculate_value_purchased($type, $getInventory){
        $inventory = $getInventory;
        $sum = 0;
        for ($i = 2; $i <= count($inventory); $i++){
            if ($inventory[$i]!= 0){
                $record = $this->$type->get($i);
                $sum += $record['price'] * $inventory[$i];
            }
        }
        return $sum;
    }


}
