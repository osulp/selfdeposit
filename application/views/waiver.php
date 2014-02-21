<p>
	<?php if ($ok == TRUE) { ?>
	        Thank you for using the open access form. A waiver has been granted and sent to:
	        <a href="<?php echo $_SESSION['user-email']; ?>"><?php echo $_SESSION['user-email']; ?></a><?php
          }
          else
          { ?>
            An error has occurred with your request. Please contact
            <a href="mailto:<?php echo $supportemail; ?>"><?php echo $supportemail; ?></a>
            for assistance, quoting reference '<?php echo $id; ?>'.<?php
          }
    ?>
</p>
