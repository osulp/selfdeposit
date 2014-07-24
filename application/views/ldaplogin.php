<p>
	Please enter the <?php echo $netidname; ?> username of the person making the deposit.
</p>

<?php
 echo "<script type='text/javascript'>";
 echo "$(function() {";
 echo "	var scntDiv = $('#resource');";
 echo "	var i = $('#resource p').size() + 1;";
 echo "	var name = $('#resource p');";
 echo "	$('#addScnt').live('click', function() {";
 echo "	 $('<tr><td>Grant:</td><td class=\"\" id=\"\"><input id=\"grant\" name=\"grants[]\" type=\"text\" value=\"\"/></td><td><img class=\"minus\" id=\"remScnt\" alt=\"[-]\"></td></tr>').appendTo($('#table'));";
 echo "	 i++;";
 echo "	 return false;";
 echo "	});";
 echo " $('.minus').live('click', function() {";
 echo "	 if( i > 1 ) {";
 echo "	  $(this).parents('tr').remove();";
 echo "	  i--;";
 echo "	 }";
 echo "	 return false;";
 echo "	});";
 echo " $('#submit').click(function(){";
 echo "  var rowCount = $('#table tr').length;";
 echo "  $('#grantcount').val(rowCount);";
 echo " })";
 echo "});";
 echo "</script>";
?>

<?php echo validation_errors(); ?>

<?php echo form_open('ldaplogin'); ?>

<div class="section">

    <div class="formtext">
        <label for="netid"><?php echo $netidname; ?>:</label>
        <input type="text" id="netid" name="netid" size="10" value="<?php echo set_value('netid'); ?>" />
    </div>

    <!--
    <div class="formtext">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" size="30" />
    </div> -->

</div>

<div class="section">
  <div class="formtext">
  	<table cellpadding="0" cellspacing="0" id="table">
	<tr>
	 <td>Grant:</td>
	 <td id="resource">
	  <input class="" id="grant" name="grants[]" type="text" value="" />
	 </td>
	 <td>
	  <img class="add" id="addScnt" alt="[+]">&nbsp;</td>
	</tr>
	</table>
	<input type="hidden" id="grantcount" name="grantcount" value="" />
  </div> 
</div>

<div class="section">

    <input type="Submit" name="submit" id="submit" value="Next &gt;" />

</div>

<?php echo form_close(); ?>
