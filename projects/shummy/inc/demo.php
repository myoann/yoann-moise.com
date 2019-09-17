<?php
	require_once("http://www.shummy.pw/inc/lib/streams.php");
	require_once("http://www.shummy.pw/inc/lib/gettext.php");

	$locle_lang = $_GET['lang'];
	$locale_file = new FileReader("locale/$locle_lang/LC_MESSAGES/messages.mo");
	$locale_fetch = new gettext_reader($locale_file);

	function _($text) {
		global $locale_fetch;
		return $locale_fetch->translate($text);
	}
?>

<h1><?php echo _("Translate using gettext") ?></h1>
<p><?php echo _("This video show a simple tutorial of how to") ?></p>