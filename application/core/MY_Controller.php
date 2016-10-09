<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2016, James L. Parry
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller
{

	/**
	 * Constructor.
	 * Establish view parameters & load common helpers
	 */

	function __construct()
	{
		parent::__construct();

		//  Set basic view parameters
		$this->data = array ();
		$this->data['pagetitle'] = 'RPGCrafter';
		$this->data['ci_version'] = (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>'.CI_VERSION.'</strong>' : '';
	}

	/**
	 * Render this page
	 */
	function render($template = 'template')
	{
        //previous button
        $previous = array('onclick' =>'javascript:window.history.go(-1)');
        $this->data['previous'] = form_button($previous, 'Previous', "class='submit'");

		$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
		$this->parser->parse('template', $this->data);


	}

    /*
     * Display string as currency
     */
    function toDollars($value){
        return '$' . number_format($value, 2);
    }

}
