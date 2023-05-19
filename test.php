<?php 
echo "btooooo";
// we face error 403
// so we add => to composer.json => "post-install-cmd" list
// then on terminal we write => echo web: run this thing >Procfile


//It is happening due to a different encoding type in your Procfile.
// Open your Procfile in a text editor, preferably, Notepad.
// Save the file and in the encoding option, change the encoding to UTF-8 (default is UTF-16).
// Replace your current Procfile with this file in the root folder of your project and remove the .txt extension.

?>

