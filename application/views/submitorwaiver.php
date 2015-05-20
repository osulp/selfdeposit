<p>

</p>

<?php echo validation_errors(); ?>

<?php echo form_open('submitorwaiver'); ?>

<div class="section">


<div class="leftdiv">
<p>
<input type="submit" name="deposit" value="Deposit"/>
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

<?php echo form_close(); ?>
