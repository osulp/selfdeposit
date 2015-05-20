<?php

// Configuration file for the EasyDeposit application
// This file can be edited using the administrative interface at:
// http://example.com/easydeposit/admin
// !!! No config line is allowed to span multiple lines. !!!

// Admin username and password
// (The password is stored encrypted. 6da12e83ef06d1d59884a5ca724cbc75 is 'easydepositadmin'
// The password can be changed in the admin interface
$config['easydeposit_adminusername'] = "easydepositadmin";
$config['easydeposit_adminpassword'] = "e40581d0dfea94b7e3d92d8015573f9d";

// Location of the SWORD PHP library (this normally doesn't need to be changed)
$config['easydeposit_librarylocation'] = 'application/libraries/swordapp-php-library';

// The name of the application (as shown on the welcome page)
$config['easydeposit_welcome_title'] = "Welcome";

// The steps that a submission should take
// The first of these should be a login step that has public static methods _loggedin and _id
$config['easydeposit_steps'] = array('ldaplogin', 'depositcredentials', 'crossrefdoilookup', 'nihgrantmetadata', 'crossrefdoimetadata', 'submitorwaiver', 'uploadfiles', 'verify', 'deposit', 'email', 'thankyou', 'sendwaiver', 'waiver');

// Email address for support enquiries for users of the client
$config['easydeposit_supportemail'] = 'scholarsarchive@oregonstate.edu';

// LDAP login settings
$config['easydeposit_ldaplogin_netidname'] = "ONID";
$config['easydeposit_ldaplogin_server'] = "ldaps://ldap.example.com";
$config['easydeposit_ldaplogin_context'] = "OU=users,DC=example,DC=com";

// SSO login settings
$config['easydeposit_ssologin_username'] = 'HTTP_MAIL';
$config['easydeposit_ssologin_firstname'] = 'HTTP_GIVENNAME';
$config['easydeposit_ssologin_surname'] = 'HTTP_SN';
$config['easydeposit_ssologin_email'] = 'HTTP_MAIL';

// ServiceDocument Login settings
//$config['easydeposit_servicedocumentlogin_url'] = 'http://ir-dev.library.oregonstate.edu/sword/servicedocument';
//$config['easydeposit_servicedocumentlogin_url'] = 'http://lib-scholars-dev1.library.oregonstate.edu:8080/sword/servicedocument';
$config['easydeposit_servicedocumentlogin_url'] = 'http://ir.library.oregonstate.edu/sword/servicedocument';

// A list of service documents to provide in the selectrepository step
$config['easydeposit_selectrepository_list'] = array('http://localhost:8080/sword/servicedocument', 'http://demo.dspace.org/sword/servicedocument', 'http://sword.eprints.org/sword-app/servicedocument', 'http://sword.intralibrary.com/IntraLibrary-Deposit/');

// Credentials with which to retrieve a service document automatically
//$config['easydeposit_retrieveservicedocument_url'] = "http://ir-dev.library.oregonstate.edu/sword/servicedocument";
//$config['easydeposit_retrieveservicedocument_url'] = "http://lib-scholars-dev1.library.oregonstate.edu:8080/sword/servicedocument";
$config['easydeposit_retrieveservicedocument_url'] = "http://ir.library.oregonstate.edu/sword/servicedocument";
$config['easydeposit_retrieveservicedocument_username'] = "openaccess@library.oregonstate.edu";
$config['easydeposit_retrieveservicedocument_password'] = "v@lley3730";
$config['easydeposit_retrieveservicedocument_obo'] = "";

// Item types
$config['easydeposit_metadata_itemtypes'] = array('http://purl.org/eprint/type/JournalArticle' => 'Journal article', 'http://purl.org/eprint/type/ConferencePaper' => 'Conference paper', 'http://purl.org/eprint/type/ConferencePoster' => 'Conference poster', 'http://purl.org/eprint/type/Thesis' => 'Thesis or dissertation', 'http://purl.org/eprint/type/Book' => 'Book', 'http://purl.org/eprint/type/BookItem' => 'Book chapter', 'http://purl.org/eprint/type/BookReview' => 'Book review', 'http://purl.org/eprint/type/Report' => 'Report', 'http://purl.org/eprint/type/WorkingPapaer' => 'Working paper', 'http://purl.org/eprint/type/NewsItem' => 'News item', 'http://purl.org/eprint/type/Patent' => 'Patent', 'http://purl.org/eprint/type/Report' => 'Report');

// Peer review status
$config['easydeposit_metadata_peerreviewstatus'] = array('http://purl.org/eprint/status/PeerReviewed' => 'Yes', 'http://purl.org/eprint/status/NonPeerReviewed' => 'No');

// The number of files to allow a user to upload
$config['easydeposit_uploadfiles_number'] = 5;

// Where to save files (remember trailing slash!)
$config['easydeposit_uploadfiles_savedir'] = 'private/uploadfiles/';

// Where to store packages (make sure these directories exist and the web server can write to them)
$config['easydeposit_deposit_packages'] = 'private/uploadfiles/';
$config['easydeposit_multipledeposit_packages'] = "private/uploadfiles/";

// Hard code depositurl, login and password if using the depositcredentials step
//$config['easydeposit_depositcredentials_depositurl'] = 'http://ir-dev.library.oregonstate.edu/sword/deposit/1957/38282';
//$config['easydeposit_depositcredentials_depositurl'] = 'http://lib-scholars-dev1.library.oregonstate.edu:8080/sword/deposit/1957/38282';
$config['easydeposit_depositcredentials_depositurl'] = 'http://ir.library.oregonstate.edu/sword/deposit/1957/43909';
$config['easydeposit_depositcredentials_username'] = 'openaccess@library.oregonstate.edu';
$config['easydeposit_depositcredentials_password'] = 'v@lley3730';
$config['easydeposit_depositcredentials_obo'] = '';

// Hard code depositurls, logins and passwords if using the multipledepositcredentials step
$config['easydeposit_multipledepositcredentials_depositurl'] = array('http://localhost/sword/deposit/123456789/2', 'http://localhost/sword/deposit/123456789/2');
$config['easydeposit_multipledepositcredentials_username'] = array('email@example.com', 'email@another.com');
$config['easydeposit_multipledepositcredentials_password'] = array('password1', 'password2');
$config['easydeposit_multipledepositcredentials_obo'] = array('', '');

// Email settings
$config['easydeposit_email_from'] = "scholarsarchive@oregonstate.edu";
$config['easydeposit_email_fromname'] = "ScholarsArchive";
$config['easydeposit_email_cc'] = "scholarsarchive@oregonstate.edu";
$config['easydeposit_email_subject'] = "Thank you for your cooperation";
$config['easydeposit_email_end'] = "Best wishes,\n\nThe repository team\nscholarsarchive@oregonstate.edu";

// CrossRef API DOI lookup configuration
// Register for a key at http://www.crossref.org/requestaccount/
// Your API KEY is the email address that you used to register
$config['easydeposit_crossrefdoilookup_apikey'] = "hui.zhang@oregonstate.edu";
$config['easydeposit_crossrefdoilookup_itemtypes'] = array('http://purl.org/eprint/type/JournalArticle' => 'Journal article', 'http://purl.org/eprint/type/ConferencePaper' => 'Conference paper', 'http://purl.org/eprint/type/ConferencePoster' => 'Conference poster', 'http://purl.org/eprint/type/Thesis' => 'Thesis or dissertation', 'http://purl.org/eprint/type/Book' => 'Book', 'http://purl.org/eprint/type/BookItem' => 'Book chapter', 'http://purl.org/eprint/type/BookReview' => 'Book review', 'http://purl.org/eprint/type/Report' => 'Report', 'http://purl.org/eprint/type/WorkingPapaer' => 'Working paper', 'http://purl.org/eprint/type/NewsItem' => 'News item', 'http://purl.org/eprint/type/Patent' => 'Patent', 'http://purl.org/eprint/type/Report' => 'Report');
$config['easydeposit_crossrefdoilookup_peerreviewstatus'] = array('http://purl.org/eprint/status/PeerReviewed' => 'Yes', 'http://purl.org/eprint/status/NonPeerReviewed' => 'No');

?>