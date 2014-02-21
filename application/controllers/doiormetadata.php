<?php

// Name: Doiormetadata
// Description: Choose DOI or metadata
// Notes: Typically use before crossrefdoilookup

require_once('EasyDeposit.php');

class Doiormetadata extends EasyDeposit
{

    function Doiormetadata()
    {
        // Initalise the parent
        parent::__construct();
    }

    function index()
    {
        // Set the page title
        $data['page_title'] = 'DOIorMetadata';

	if (!empty($_POST['submitdoi']))
	{
	  $this->_gotostep($_POST['crossrefdoi']);
	} 

	if (!empty($_POST['submitmetadata']))
	{
	   $this->_gotostep($_POST['metadata']);
	} 

        // Display the header, page, and footer
        $this->load->view('header', $data);
        $this->load->view('doiormetadata');
        $this->load->view('footer');
    }

    public static function _verify($data)
    {
        // Nothing to do
        return $data;
    }

    public static function _package($package)
    {
        // Nothing to do
    }

    public static function _email($message)
    {
        // Nothing to do
        return $message;
    }
}

?>
