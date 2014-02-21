<?php

// Name: Waiver
// Description: Prints a thank you message to the user at the end of the obtain waiver process
// Notes: Typically the last step in a obtain waiver process. Can also be used to display an error if the obtain waiver failed

require_once('EasyDeposit.php');

class Waiver extends EasyDeposit
{
    function Waiver()
    {
        // Initalise the parent
        parent::__construct();
    }

    function index()
    {
        // Set the page title
        $data['page_title'] = 'Thank you';

        // Set the message to thank the user
        if (isset($_SESSION['user-email']))
        {
            $data['ok'] = TRUE;
        }
        else
        {
            $data['ok'] = FALSE;
        }
        $data['id'] = $this->userid;
        $data['supportemail'] = $this->config->item('easydeposit_supportemail');

        // Display the header, page, and footer
        $this->load->view('header', $data);
        $this->load->view('waiver', $data);
        $this->load->view('footer');

        // Clear the session data so they can submit again
	    session_destroy();
    }

}

?>
