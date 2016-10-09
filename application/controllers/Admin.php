<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Application
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // This is the view we want shown
        $this->data['pagebody'] = 'admin_list';

        $this->create_form('Materials');
        $this->create_form('Recipes');
        $this->create_form('Products');

        $this->render();
    }

    private function create_form($type) {

        //Open form
        $this->data['form_open'] = form_open('admin/post', '', array('name' => 'list-form'));

        // Get list of items

        $source = $this->$type->all();

        // Set table headers
        $items[] = array('Edit Item', 'Delete');

        // Add table rows
        foreach ($source as $record)
        {
            $chk_data = array('name' => 'c_' . $record['id']);

            $items[] = array('<a href="/admin/edit/' .
                             strtolower($type) . '/' .
                             $record['id']. '">' .
                             $record['name'] . '</a>',
                form_checkbox($chk_data, "", "", "class='checkbox'"));

        }

        // Add new items
        $items[] = array('');
        $items[] = array('Add New Item', '', '');
        $new_data = array('name' => 'a_');
        $items[] = array(form_input('a_', "", "class='input'"),
            '', form_submit('', 'Submit', "class='submit'"));
        

        //Generate the materials table
        $this->data[$type.'_table'] = $this->table->generate($items);

        //close form
        $this->data['form_close'] = form_close();

    }
    public function edit_item($type, $id){
        echo $type;
        $this->data['pagebody'] = 'admin_single';
        $record = $this->$type->get($id);

        // Create form for editing an item
        $this->data['admin_edit_form_open'] = form_open('admin/post', '', array('name' => 'edit-form'));
        $items[] = array('Property Name', 'Value', 'Update Name', 'Update Value', 'Delete');

        foreach (array_keys($record) as $key){
            echo $key . "</br>";
            if ($key != 'materials' && $key != 'id') {
                $items[] = array($key,
                                 $record[$key],
                                 form_input($this->set_input_params('n_', 'input', $id, $type)),
                                 form_input($this->set_input_params('v_', 'input', $id, $type)),
                                 form_checkbox($this->set_input_params('c_', 'checkbox', $id, $type)));
            } else if ($key == 'materials') {
                $materials = $record[$key];
            }
        }
        $items[] = array('');
        $items[] = array('Add new property');
        $items[] = array(form_input($this->set_input_params('nn_', 'input', $id, $type)),
                         form_input($this->set_input_params('nv_', 'input', $id, $type)));
        $items[] = array(form_reset('', 'Clear', "class='submit'"),
                         form_submit('', 'Submit', "class='submit'"), '' , '');
        // Display table
        $this->data['admin_main_edit'] = $this->table->generate($items);

        // Create table for editing recipe ingredients
        if (isset($materials)) {

            $ingredients[] = array('Name', 'Amount Needed',
                'Update Name', 'Update Amount Used', 'Delete');
            foreach ($materials as $item => $attrib) {
                $ingredients[] = array($attrib['name'], $attrib['amount'],
                    form_input("", "", "class='input'"), form_input("", "", "class='input'"), form_checkbox("", "", "", "class='checkbox'"));
            }
            $ingredients[] = array('');
            $ingredients[] = array('Add new ingredient');
            $ingredients[] = array(form_input("", "", "class='input'"), form_input("", "", "class='input'"));
            $ingredients[] = array(form_reset('', 'Clear', "class='submit'"),
                form_submit('', 'Submit', "class='submit'"), '' , '');
        }


        // Display table to modify ingredients only if a recipe was selected
        $this->data['admin_ingredients_edit'] =
            isset($materials) ? $this->table->generate($ingredients) : NULL;
        $this->data['admin_edit_form_close'] = form_close();
        $this->render();
    }

    private function set_input_params($prefix, $class, $id, $type) {
        return array(
            'class' => $class,
            'name' => $prefix . $type . '_' . $id
        );
    }

    public function post()
    {
        var_dump($_POST);
        $this->data['pagebody'] = 'admin_result';



        $checked = array();

        foreach(array_keys($_POST) as $entry)
        {
            if ($entry[0] == 'c') {
                array_push($checked, $entry);
                echo $entry . ' is checked' . PHP_EOL;
            } else if ($entry[0] == 'a') {
                echo $_POST[$entry] . ' will be created' . PHP_EOL;
            }
        }

        $this->render();

    }

}
