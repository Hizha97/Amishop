
<?php
echo form_open_multipart('articulos/do_upload');
echo '<input type="file" name="userfile">';
echo '<input type="submit" value="upload">';
echo form_close();
?>

