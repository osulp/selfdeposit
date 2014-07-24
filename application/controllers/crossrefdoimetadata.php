<?php

// Name: CrossRefDOIMetadata
// Description: Display metadata that has been downloaded from a DOI using the CrossRef API
// Notes: This step must be preceeded by the CrossRefDOILookup step

require_once('EasyDeposit.php');

class CrossRefDOIMetadata extends EasyDeposit
{
    function CrossREFDOIMetadata()
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
            $data['page_title'] = 'Check the item description';

            // Display the header, page, and footer
            $this->load->view('header', $data);
            $this->load->view('crossrefdoimetadata');
            $this->load->view('footer');
        }
        else
        {
            // Store the metadata back into the session
            $_SESSION['crossrefdoi-title'] = $_POST['title'];
	    //make sure it matches the lookup number
            for ($authorpointer = 1; $authorpointer <= $_SESSION['crossrefdoi-authorcount']; $authorpointer++)
            {
                $_SESSION['crossrefdoi-author' . $authorpointer] = $_POST['author' . $authorpointer];
            }

            $_SESSION['crossrefdoi-year'] = $_POST['year'];
            $_SESSION['crossrefdoi-volume'] = $_POST['volume'];
            $_SESSION['crossrefdoi-issue'] = $_POST['issue'];

            $types = $this->config->item('easydeposit_metadata_itemtypes');
            $_SESSION['crossrefdoi-type'] = $types[$_POST['type']];

            $peer = $this->config->item('easydeposit_metadata_peerreviewstatus');
            $_SESSION['crossrefdoi-peerreviewed'] = $peer[$_POST['peerreviewed']];

            // Go to the next page
            $this->_gotonextstep();

	    //Go to submitorwaiver step skip metadata
	    //$this->_gotostep('submitorwaiver');
        }
    }

    public static function _verify($data)
    {
        // Verify the metadata that has been stored
        $data[] = array('Title', $_SESSION['crossrefdoi-title'], 'crossrefdoimetadata', 'true');
	//make sure it matches the lookup number
        for ($authorpointer = 1; $authorpointer <= $_SESSION['crossrefdoi-authorcount']; $authorpointer++)
        {
            $data[] = array('Author ' . $authorpointer, $_SESSION['crossrefdoi-author' . $authorpointer], 'crossrefdoimetadata', 'true');
        }
        $data[] = array('Type of item', $_SESSION['crossrefdoi-type'], 'crossrefdoimetadata', 'true');
        $data[] = array('Has the item been peer reviewed?', $_SESSION['crossrefdoi-peerreviewed'], 'crossrefdoimetadata', 'true');
        if (!empty($_SESSION['crossrefdoi-year']))
        {
            $data[] = array('Year', $_SESSION['crossrefdoi-year'], 'crossrefdoimetadata', 'true');
        }
        if (!empty($_SESSION['crossrefdoi-volume']))
        {
            $data[] = array('Volume', $_SESSION['crossrefdoi-volume'], 'crossrefdoimetadata', 'true');
        }
        if (!empty($_SESSION['crossrefdoi-issue']))
        {
            $data[] = array('Issue', $_SESSION['crossrefdoi-issue'], 'crossrefdoimetadata', 'true');
        }

        return $data;
    }

    public static function _package($package)
    {
        // Use the metadata in making the package 
	// As currently, grant information will be appended and packed to title
	$grantstring = '';
	for ($grantpointer = 1; $grantpointer < $_SESSION['ldaplogin-grantcount']; $grantpointer++) {
		$grantstring .= $_SESSION['ldaplogin-grant' . $grantpointer] . ', ';
	}
	$grantstring .= $_SESSION['ldaplogin-grant' . $_SESSION['ldaplogin-grantcount']];


        $package->setTitle($_SESSION['crossrefdoi-title'] . ' (Grant: ' . $grantstring . ')');
        $citation = '';
	//make sure it matches the lookup number
        for ($authorpointer = 1; $authorpointer <= $_SESSION['crossrefdoi-authorcount']; $authorpointer++)
        {
            $package->addCreator($_SESSION['crossrefdoi-author' . $authorpointer]);
            $citation .= $_SESSION['crossrefdoi-author' . $authorpointer] . ','; 
        }
        $citation .= ' ' . $_SESSION['crossrefdoi-year'] . '. ';
        $citation .= $_SESSION['crossrefdoi-title'] . '. ';
        $citation .= $_SESSION['crossrefdoi-journaltitle'] . ' ';
        $citation .= $_SESSION['crossrefdoi-volume'] . ' (';
        $citation .= $_SESSION['crossrefdoi-issue'] . ')';

        $package->setCitation($citation);
        $data[] = array('Type of item', $_SESSION['crossrefdoi-type'], 'metadata', 'true');
        $data[] = array('Has the item been peer reviewed?', $_SESSION['crossrefdoi-peerreviewed'], 'metadata', 'true');
    }

    public static function _email($message)
    {
        // Add the details
        $message .= "Thank you for depositing an electronic copy of your item '" . $_SESSION['crossrefdoi-title'] . "'" . ":\n";
	//make sure it matches the lookup number
        for ($authorpointer = 1; $authorpointer <= $_SESSION['crossrefdoi-authorcount']; $authorpointer++)
        {
            $message .= ' - Author: ' . $_SESSION['crossrefdoi-author' . $authorpointer] . "\n";            
        }
        if (!empty($_SESSION['crossrefdoi-journaltitle']))
        {
            $message .= ' - Journal title: ' . $_SESSION['crossrefdoi-journaltitle'] . "\n";
        }
        if (!empty($_SESSION['crossrefdoi-year']))
        {
            $message .= ' - Year: ' . $_SESSION['crossrefdoi-year'] . "\n";
        }
        if (!empty($_SESSION['crossrefdoi-volume']))
        {
            $message .= ' - Journal volume: ' . $_SESSION['crossrefdoi-volume'] . "\n";
        }
        if (!empty($_SESSION['crossrefdoi-issue']))
        {
            $message .= ' - Journal issue: ' . $_SESSION['crossrefdoi-issue'] . "\n";
        }
        $message .= "\n";

        return $message;
    }
}

?>
