<p>

</p>

<?php echo validation_errors(); ?>

<?php echo form_open('submitorwaiver'); ?>

<div class="section">


<div class="leftdiv">
<p>
<input type="submit" name="deposit" value="Deposit into ScholarsArchive"/>
<input type="hidden" name="uploadfilesstep" value="uploadfiles"/>
</p>
<b>Important:</b> Deposit the author's accepted (post-peer review, pre-typeset) manuscipt of the article (preferably PDF). The article will be deposited to ScholarsArchive@OSU. Publisher embargoes will be observed.
</div>

</div>

<div class="section">


<div class="leftdiv">
<p>
<input type="submit" name="waiver" value="Obtain a waiver"/>
<input type="hidden" name="sendwaiverstep" value="sendwaiver"/>
</p>
Waivers to the OSU OA policy are automatically granted upon request.
</div>

</div>

<div class="section">


<div class="leftdiv">
<p>
<input type="submit" name="both" value="Deposit and obtain a waiver"/>
<input type="hidden" name="bothstep" value="uploadfiles"/>
</p>
It is not mandatory, but an author's accepted (post-peer review, pre-typeset) manuscript of the article (preferably PDF) may be deposited, even when getting a waiver. The article will be deposited to ScholarsArchive@OSU for archival purposes, but only metadata will be available, unless the publisher allows deposit. There are many benefits to depositing even if one opts out of the OpenAccess policy: ensuring that a permanently archived copy will be preserved and potentially made more broadly available in the future; facilitating the creation of a dossier of publications in the promotion and tenure review process; and creating a metadata record that facilitates discovery and citation of your work. 
</div>

</div>



<?php echo form_close(); ?>
