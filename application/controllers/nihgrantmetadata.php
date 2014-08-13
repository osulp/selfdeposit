<?php

// Name: Nihgrantmetadata
// Description: Articles supported by NIH grants

require_once('EasyDeposit.php');

class Nihgrantmetadata extends EasyDeposit
{
    function NIHGrantMetadata()
    {
        // Initalise the parent
        parent::__construct();
    }

    function index()
    {
        // Validate the form
	// without appending 'required' with callback, one bypass form check means empty email is ok
	// TODO: callback entergrantinfo
        $this->form_validation->set_rules('nihgrantemail', 'Email', '_clean|callback__entergrantinfo');
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
            $_SESSION['nihgrantmetadata-email'] = $_POST['nihgrantemail'];
	    $grantcount = $_POST['grantcount'];
            $picount = $_POST['picount'];
            
                $_SESSION['nihgrantmetadata-grantcount'] = $grantcount;
                $grantpointer = 1;
                foreach ($_POST['grants'] as $key=>$value) {
                        $_SESSION['nihgrantmetadata-grant' . $grantpointer] = $value;
                        $grantpointer++;
                }

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
	$data[] = array('Primary Author Email', $_SESSION['nihgrantmetadata-email'], 'nihgrantmetadata', 'true');

	return $data;
    }

    public static function _package($package)
    {
	//get all citation from session
	$citation = $_SESSION['crossrefmetadata-citation'];         
 
	      // As currently, grant information will be appended and packed to citation
                $grantstring = '';
                for ($grantpointer = 1; $grantpointer < $_SESSION['nihgrantmetadata-grantcount']; $grantpointer++) {
                        $grantstring .= $_SESSION['nihgrantmetadata-grant' . $grantpointer] . ', ';
                }
                $grantstring .= $_SESSION['nihgrantmetadata-grant' . $_SESSION['nihgrantmetadata-grantcount']];

                $pistring = '';
                for ($pipointer = 1; $pipointer < $_SESSION['nihgrantmetadata-picount']; $pipointer++) {
                        $pistring .= $_SESSION['nihgrantmetadata-pi' . $pipointer] . ', ';
                }
                $pistring .= $_SESSION['nihgrantmetadata-pi' . $_SESSION['nihgrantmetadata-picount']];

                if (!empty($_SESSION['nihgrantmetadata-email'])) {
                        $citation .= ' NIH Grant: ' . '(' . $_SESSION['nihgrantmetadata-email'] . '; ' . $grantstring . '; ' . $pistring . ')';
                }
	
        $package->setCitation($citation);

    }

    public static function _email($message)
    {
        
	if (!empty($_SESSION['nihgrantmetadata-email'])) {
                $message .= '- PI Email: ' . $_SESSION['nihgrantmetadata-email'] . "\n";

                for ($grantpointer =1; $grantpointer <= $_SESSION['nihgrantmetadata-grantcount']; $grantpointer++) {
                        $message .= '- Grant Number: ' . $_SESSION['nihgrantmetadata-grant' . $grantpointer] . "\n";
                }

                for ($pipointer =1; $pipointer <= $_SESSION['nihgrantmetadata-picount']; $pipointer++) {
                        $message .= '- PI: ' . $_SESSION['nihgrantmetadata-pi' . $pipointer] . "\n";
                }
        }

        $message .= "\n";
	
        return $message;
    }
}

?>
