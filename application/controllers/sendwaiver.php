<?php

// Name: Sendwaiver
// Description: Send an email with waiver
// Notes: Run after thankyou

require_once('EasyDeposit.php');

class Sendwaiver extends EasyDeposit
{

    function Sendwaiver()
    {
        // Initalise the parent
        parent::__construct();
    }

	function index()
    {
        // Compile the email
	$message .= ' - Title: ' . $_SESSION['crossrefdoi-title']. ":\n";
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

http://cdss.library.oregonstate.edu/";

        // Send the email
        $to = $_SESSION['user-email'];
        $from = $this->config->item('easydeposit_email_from');
        $fromname = $this->config->item('easydeposit_email_fromname');
        $cc = $this->config->item('easydeposit_email_cc');
        $subject = $this->config->item('easydeposit_email_subject');

        $headers = 'From: ' . $fromname . ' <' . $from . ">\r\n";

        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/plain; charset=utf-8\r\n";
        $headers .= "Content-Transfer-Encoding: quoted-printable\r\n";

        if (!empty($cc))
        {
            $headers .= 'Cc: ' . $cc . "\r\n";
        }

        mail($to, $subject, $message, $headers);

        // Now go to the next step
        $this->_gotonextstep();
    }

}

?>
