<?php

// Name: NIHGrantMetadata
// Description: Articles supported by NIH grants
// Notes: This step must be preceeded by the CrossRefDOIMetadata step

require_once('EasyDeposit.php');

class NIHGrantMetadata extends EasyDeposit
{
    function NIHGrantMetadata()
    {
        // Initalise the parent
        parent::__construct();
    }

    function index()
    {
        // Validate the form
        $this->form_validation->set_rules('title', 'Title', '_clean|required');
        if ($this->form_validation->run() == FALSE)
        {
            // Set the page title
            $data['page_title'] = 'NIH Grant Metadata';

            // Display the header, page, and footer
            $this->load->view('header', $data);
            $this->load->view('nihgrantmetadata');
            $this->load->view('footer');
        }
        else
        {
            // Store the metadata back into the session
            $_SESSION['nihgrantmetadata-email'] = $_POST['nihgrantemail'];
	
	    //$grantcount = count($_POST['grants']); cause cross site reference error
            //get from hidden field
            $grantcount = $_POST['grantcount'];
            $_SESSION['nihgrantmetadata-grantcount'] = $grantcount;
            $grantpointer = 1;
            foreach ($_POST['grants'] as $key=>$value) {
           	$_SESSION['nihgrantmetadata-grant' . $grantpointer] = $value;
             	$grantpointer++;
            }

            $picount = $_POST['picount'];
            $_SESSION['nihgrantmetadata-picount'] = $picount;
            $pipointer = 1;
            foreach ($_POST['pis'] as $key=>$value) {
                $_SESSION['nihgrantmetadata-pi' . $pipointer] = $value;
                $pipointer++;
            }

            // Go to the next page
            $this->_gotonextstep();
        }
    }

    public static function _verify($data)
    {
        // No metadata to verify - this is done in the crossrefdoimetadata step
        return $data;
    }

    public static function _package($package)
    {
        // No metadata to package - this is done in the crossrefdoimetadata step
    }

    public static function _email($message)
    {
        // No metadata to email - this is done in the crossrefdoimetadata step
        return $message;
    }
}

?>
