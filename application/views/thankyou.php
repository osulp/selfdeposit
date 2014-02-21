<p>
	<?php if ($ok == TRUE) { ?>
	        Thank you for depositing your item. Once approved, the Libraries' Center for Digital Scholarship and Services will make the articles live in:<br>
	        <a href="http://ir.library.oregonstate.edu/xmlui/handle/1957/43909">Open Access Articles Collection(OSU Faculty)</a><?php
          }
          else
          { ?>
            An error has occurred with your deposit. Please contact
            <a href="mailto:<?php echo $supportemail; ?>"><?php echo $supportemail; ?></a>
            for assistance, quoting reference '<?php echo $id; ?>'.<?php
          }
    ?>
</p>
