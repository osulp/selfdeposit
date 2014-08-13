<p>
	ONLY required if article is supported by NIH grants, otherwise leave it blank and click Next.  
</p>

<?php echo validation_errors(); ?>

<?php echo form_open('nihgrantmetadata'); ?>

<script type='text/javascript'>
$(function() {
 var scntDiv = $('#piresource');
 var i = $('#piresource p').size() + 1;
 var name = $('#piresource p');
 $('#piaddScnt').live('click', function() {
 	$('<tr><td>PI:</td><td class=\"\" id=\"\"><input id=\"pi\" name=\"pis[]\" type=\"text\" value=\"\"/></td><td><img class=\"minus\" id=\"piremScnt\" alt=\"[-]\"></td></tr>').appendTo($('#pitable'));
 	i++;
 	return false;
 });
 $('#piremScnt').live('click', function() {
 	if( i > 1 ) {
 	   $(this).parents('tr').remove();
	   i--;
 	}
	return false;
 });
 $('#submit').click(function(){
 	var rowCount = $('#pitable tr').length;
	$('#picount').val(rowCount);
 	})
});
</script>

<script type='text/javascript'>
$(function() {
 var scntDiv = $('#grantresource');
 var i = $('#grantresource p').size() + 1;
 var name = $('#grantresource p');
 $('#grantaddScnt').live('click', function() {
	 $('<tr><td>Grant Number:</td><td class=\"\" id=\"\"><input id=\"grant\" name=\"grants[]\" type=\"text\" value=\"\"/></td><td><img class=\"minus\" id=\"grantremScnt\" alt=\"[-]\"></td></tr>').appendTo($('#granttable'));
	 i++;
	 return false;
 });;
 $('#grantremScnt').live('click', function() {
	 if( i > 1 ) {
		 $(this).parents('tr').remove();
		 i--;
	 }
	 return false;
 });
 $('#submit').click(function(){
	 var rowCount = $('#granttable tr').length;
	 $('#grantcount').val(rowCount);
 })
});
</script>

<div class="section">
    <div class="formtext">
	As of February 2013, NIH policy requires that all articles produced from non-competing grant awards, starting July 1, 2013 or later, must show compliance with the NIHMS Public Access Policy (http://publicaccess.nih.gov/) by completing the submission process to PubMed Central within 3 months of publication. Please provide the following information and one of our staff will deposit your article into PubMed Central and ScholarsArchive@OSU on your behalf.
    </div>
</div>

<div class="section">
    <div class="formtext">
	Primary author email (This is the author that the NIH will contact to approve the submission of the article to PubMed Central and the person who will receive a PubMed Central ID (PMCID) from the NIH):
        <input type="text" id="nihgrantemail" name="nihgrantemail" size="50" value="<?php echo set_value('nihgrantemail'); ?>" />
    </div>
</div>

<div class="section">
  <div class="formtext">
  	<table cellpadding="0" cellspacing="0" id="pitable">
	<tr>
	 <td>PI:</td>
	 <td id="piresource">
	  <input class="" id="pi" name="pis[]" type="text" value="" />
	 </td>
	 <td>
	  <img class="add" id="piaddScnt" alt="[+]">&nbsp;</td>
	</tr>
	</table>
	<input type="hidden" id="picount" name="picount" value="" />
  </div> 
</div>

<div class="section">
  <div class="formtext">
  	<table cellpadding="0" cellspacing="0" id="granttable">
	<tr>
	 <td>Grant Number:</td>
	 <td id="grantresource">
	  <input class="" id="grant" name="grants[]" type="text" value="" />
	 </td>
	 <td>
	  <img class="add" id="grantaddScnt" alt="[+]">&nbsp;</td>
	</tr>
	</table>
	<input type="hidden" id="grantcount" name="grantcount" value="" />
  </div>
</div> 

<div class="section">

    <input type="Submit" name="submit" id="submit" value="Next &gt;" />

</div>

<?php echo form_close(); ?>
