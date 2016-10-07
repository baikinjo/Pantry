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
        $this->data['pagebody'] = 'admin';

        $this->create_form('Materials');
        $this->create_form('Recipes');
        $this->create_form('Products');

        $this->render();

    }

    private function create_form($type) {

        //Open form
        $this->data['form_open'] = form_open('admin/post');

        // Get list of items

        $source = $this->$type->all();

        // Set table headers
        $items[] = array('Name', 'Rename', 'Delete');

        // Add table rows
        foreach ($source as $record)
        {
            $text_data = array('name' => 'n_' . $record['id'],);
            $chk_data = array('name' => 'c_' . $record['id']);

            $items[] = array($record['name'],
                form_input($text_data, "", "class='input'"),
                form_checkbox($chk_data, "", "", "class='checkbox'"));

        }

        // Add new items
        $items[] = array('');
        $items[] = array('Add New Item', '', '');
        $new_data = array('name' => 'a_');
        $items[] = array(form_input($new_data, "", "class='input'"),
            '', form_submit('', 'Submit', "class='submit'"));

        // Submit button
//        $items[] = array('', '', );

        //table parameters
//        $params = array(
//            'table_open' => '<table class="table-mat" border="0" cellpadding="2" cellspacing="5">',
//            'cell_start' => '<td class="item-mat>',
//            'cell_alt_start' => '<td class="item-mat">'
//        );
//
//        $this->table->set_template($params);

        //Generate the materials table
        $this->data[$type.'_table'] = $this->table->generate($items);

        //close form
        $this->data['form_close'] = form_close();

    }



    public function post()
    {
        var_dump($_POST);
        $checked = array();
        $rename = array();

        foreach(array_keys($_POST) as $entry)
        {
            if ($entry[0] == 'c') {
                array_push($checked, $entry);
                echo $entry . ' is checked' . PHP_EOL;
            } else if ($entry[0] == 'n' && !empty(trim($_POST[$entry])) ) {
                array_push($rename, $entry);
                echo $_POST[$entry] . ' will be renamed' . PHP_EOL;
            } else if ($entry[0] == 'a') {
                echo $_POST[$entry] . ' will be created' . PHP_EOL;
            }
        }


    }

}
