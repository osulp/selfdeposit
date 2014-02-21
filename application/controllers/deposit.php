<?php

// Name: Deposit
// Description: Perform the SWORD package and deposit
// Notes: This step creates the submission package, and then deposits it using SWORD

require_once('EasyDeposit.php');

class Deposit extends EasyDeposit
{

    function Deposit()
    {
        // Initalise the parent
        parent::__construct();
    }

    function index()
    {
        // A variable to hold an error message
        $error = '';

        try
        {
            // Check to see if the packager directory exists, and if not
            // make the directory to save the files in
            $path = str_replace('index.php', '', $_SERVER["SCRIPT_FILENAME"]);            
            $id = $this->userid;
            $savepath = $path . $this->config->item('easydeposit_uploadfiles_savedir') . $id;
            if (!file_exists($savepath))
            {
                mkdir($savepath);
            }

            // Allow each step to contribute to the package
            require_once($this->config->item('easydeposit_librarylocation') . '/packager_mets_swap.php');
            $package = new PackagerMetsSwap($this->config->item('easydeposit_uploadfiles_savedir'),
                                            $this->userid,
                                            $this->config->item('easydeposit_deposit_packages'),
                                            $this->userid . '.zip');
            foreach ($this->easydeposit_steps as $stepname)
            {
                if ($stepname == 'deposit')
                {
                    break;
                }
                include_once(APPPATH . 'controllers/' . $stepname . '.php');
                $stepclass = ucfirst($stepname);
                call_user_func(array($stepclass, '_package'), $package);
            }
            $package->create();

            // Deposit the package
            require_once($this->config->item('easydeposit_librarylocation') . '/swordappclient.php');
            $sac = new SWORDAPPClient();
            $contenttype = "application/zip";
            $format = "http://purl.org/net/sword-types/METSDSpaceSIP";
            $response = $sac->deposit($_SESSION['depositurl'],
                                      $_SESSION['sword-username'],
                                      $_SESSION['sword-password'],
                                      $_SESSION['sword-obo'],
                                      $this->config->item('easydeposit_deposit_packages') .
                                              $this->userid . '.zip',
                                      $format,
                                      $contenttype);

            if (($response->sac_status >= 200) && ($response->sac_status < 300))
            {
                $_SESSION['deposited-response'] = $response->sac_xml;
                $_SESSION['deposited-url'] = (string)$response->sac_id;
            }
            else
            {
                $error = 'Server returned status code: ' . $response->sac_status . "\n\n";
                $error .= 'Server provided response: ' . $response->sac_xml;
            }
        }
        catch (Exception $e)
        {
            // Catch the exception for reporting
            $error = 'Error: ' . $e->getMessage() . "\n\n";
            $error .= 'Deposit URL: ' . $_SESSION['depositurl'] . "\n";
            $error .= 'Deposit username: ' . $_SESSION['sword-username'] . "\n";
            $error .= 'Package file: ' . $this->config->item('easydeposit_deposit_packages') . $this->userid . '.zip' . "\n";                                                         

            if (!empty($response->sac_xml))
            {
                $error .= "\n\nResponse:" . $response->sac_xml;
            }

            $_SESSION['deposited-response'] = $error;
        }

        // If there was an error, send it to the administrator
        if (!empty($error))
        {
            $to = $this->config->item('easydeposit_supportemail');
            $subject = 'Error with EasyDeposit system';
            $headers = 'From: ' . $to . ' <' . $to . ">\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/plain; charset=utf-8\r\n";
            $headers .= "Content-Transfer-Encoding: quoted-printable\r\n";
            mail($to, $subject, $error, $headers);
        }

        // Go to the next stage
        $this->_gotonextstep();
    }

    public static function _email($message)
    {
        // Add the URL if set
        if (!empty($_SESSION['deposited-url'])) {
            $message .= 'Once approved, the Libraries\' Center for Digital Scholarship and Services will make the article live in: http://ir.library.oregonstate.edu/xmlui/handle/1957/43909' . "\n\n";
        }

	if ($_SESSION['afterdepositaction'] == 'sendwaiver') {
	    $message .= "A waiver has been granted\n\n";
	    $message .= "Thank you for this notice accepted on behalf of the Faculty Senate Library Committee, the Provost's designate for waivers of the Oregon State University Faculty Open Access Policy.

As noted in the policy:  \"At the request of a Faculty member via an online form, the OSU Faculty Senate Library Committee, as the Provost’s designate, will waive application of the license for a particular article, or delay access to a particular article for a specified period of time.\"

The Oregon State University Open Access Policy is therefore waived for this article by receipt of your message below.

Thank you, and best wishes for your publication,

Michael Boock (on behalf of the Faculty Senate Library Committee)

----------------------------

Michael Boock, Associate Professor

Head, Center for Digital Scholarship and Services

Oregon State University Libraries

121 The Valley Library

Corvallis, OR 97331

541-737-9155

scholarsarchive@oregonstate.edu

http://cdss.library.oregonstate.edu/" . "\n\n";
	}


        return $message;
    }
}

?>
