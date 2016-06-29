# Repository Self Deposit Tool for Researchers (SelfDeposit)

SelfDeposit is a web-based tool for researchers to deposit articles and datasets into institutional repository who are un-familar with the UI of a repostiory. It also has the feature of auto-filling metadata records by integrating with the CrossRef API.

##Technology stack:
1. DSpace 3.0 and above
2. Php and CodeIgniter
3. Easydeposit library

##Configuration:
1. Enable SWORD server with DSpace
2. Setup DSpace repository for SWORD ingestions, including creation of collection, EPerson at the receiving end
3. Change the config of SelfDeposit tool (easydeposit.php) to match the DSpace repository setup

##Contact information:
hui.zhang@oregonstate.edu
