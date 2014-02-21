<p>
	Choose metadata entry method:
</p>

<?php echo validation_errors(); ?>

<?php echo form_open('doiormetadata'); ?>

<div class="section">

If there is a DOI for the article, it is the prefered method for efficiency and accuracy.
<input type="submit" name="submitdoi" value="Use CrossRef DOI"/>
<input type="hidden" name="crossrefdoi" value="crossrefdoilookup"/>

</div>

<div class="section">

Otherwise, manually enter the basic metadata such as title and author in the next page.
<input type="submit" name="submitmetadata" value="Enter Metadata"/>
<input type="hidden" name="metadata" value="metadata"/>

</div>

<?php echo form_close(); ?>
