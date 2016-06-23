<p>
	Please enter the <?php echo $netidname; ?> information of the person making the deposit.
</p>

<?php echo validation_errors(); ?>

<?php echo form_open('ldaplogin'); ?>

<div class="section">

    <div class="formtext">
        <label for="netid"><?php echo $netidname; ?> (ONID or email):</label>
        <input type="text" id="netid" name="netid" size="20" value="<?php echo set_value('netid'); ?>" />
    </div>

    <!--
    <div class="formtext">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" size="30" />
    </div> -->

</div>


<div class="section">

    <input type="Submit" name="submit" id="submit" value="Next &gt;" />

</div>

<?php echo form_close(); ?>
