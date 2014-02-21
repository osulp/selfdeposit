<?php

// Name: Submitorwaiver
// Description: Choose submit or waiver
// Notes: Typically use after metadata

require_once('EasyDeposit.php');

class Submitorwaiver extends EasyDeposit
{

    function Submitorwaiver()
    {
        // Initalise the parent
        parent::__construct();
    }

    function index()
    {
        // Set the page title
        $data['page_title'] = 'Deposit article or obtain waiver';

	if (!empty($_POST['deposit']))
	{
	  $this->_gotostep($_POST['uploadfilesstep']);
	} 

	if (!empty($_POST['waiver']))
	{
	   $this->_gotostep($_POST['sendwaiverstep']);
	} 

	if (!empty($_POST['both']))
	{
	   $_SESSION['afterdepositaction'] = 'sendwaiver';
	   $this->_gotostep($_POST['bothstep']);
	}



        // Display the header, page, and footer
        $this->load->view('header', $data);
        $this->load->view('submitorwaiver');
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
