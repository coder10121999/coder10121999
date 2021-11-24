The value of the cookie is: <?php echo $cookie_val; ?>

<br/>
<?php
   if($isPresent):
?>
The cookie is present.
<?php
   else:
?>
The cookie isn't present.
<?php
   endif;
?>
<br/>
<?php
   echo "The count of cookie before delete is :" .$count;
?>
<br/>
<?php
   echo "The count of cookie after delete is :" .$count_afterdelete;
?>