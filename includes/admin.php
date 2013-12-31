<?php
    /************************************************************************************************   
     *   File name: includes/admin.php
     *
     *      Author: I. Pavlinic
     * Description: This is the admin script of SimplePHPSite to change configuration settings via a
     *              web page interface instead of manually editing includes/config.php.
     ************************************************************************************************/

	$config = include('includes/config.php');

	// This will only be executed if the form was submitted
	if (isset($_POST['btnSubmit'])) {
		if (isset($_POST['titleText']))
			$config['titleText'] = $_POST['titleText'];
		if (isset($_POST['pageDir']))
			$config['pageDir'] = $_POST['pageDir'];
		if (isset($_POST['pageParam']))
			$config['pageParam'] = $_POST['pageParam'];
		if (isset($_POST['indexPage']))
			$config['indexPage'] = $_POST['indexPage'];
		if (isset($_POST['logoPath']))
			$config['logoPath'] = $_POST['logoPath'];
		if (isset($_POST['logoText']))
			$config['logoText'] = $_POST['logoText'];

		if (isset($_POST['useImageLogo']) && $_POST['useImageLogo'] = "on")
			$config['useImageLogo'] = true;
		else
			$config['useImageLogo'] = false;

		if (isset($_POST['forceSSL']) && $_POST['forceSSL'] == "on")
			$config['forceSSL'] = true;
		else
			$config['forceSSL'] = false;
		
		if (isset($_POST['forceLocalSSL']) && $_POST['forceLocalSSL'] == "on")
			$config['forceLocalSSL'] = true;
		else
			$config['forceLocalSSL'] = false;

		try {
			file_put_contents('includes/config.php', '<?php return ' . var_export($config, true) . '; ?>');
			echo "<p><font color=\"lime\">Configuration saved successfully.</font></p>";
		} catch (Exception $ex) {
			echo "<p><font color=\"red\">Configuration could not be saved successfully.</font></p>";
		}
	}
?>

<form name="adminPanel" method="POST">
    <p>You can view and edit configuration settings for your SimplePHPSite installation here.</p>

	<p><strong>General Options</strong></p>

	<p>Window title text:</p>
	<input name="titleText" type="text" value="<?php echo $config['titleText']; ?>"><br/><br/>

	<p>Directory in which the pages are stored, i.e. /index.php?page=FILE where FILE is a file in the specified directory</p>
	<input name="pageDir" type="text" value="<?php echo $config['pageDir']; ?>"><br/><br/>

	<p>URL parameter used to get the requested page ID from, i.e. /index.php?<strong>parameter</strong>=file</p>
	<input name="pageParam" type="text" value="<?php echo $config['pageParam']; ?>"><br/><br/>

	<p>Default page (will be used if no page is specified through parameters)</p>
	<input name="indexPage" type="text" value="<?php echo $config['indexPage']; ?>"><br/><br/>

	<p><strong>Logo Options</strong></p>
	<input name="useImageLogo" type="checkbox" <?php if ($config['useImageLogo'] == true) echo "checked=checked"; ?>"> Use an image as a logo<br/><br/>

	<p>Path to your logo image, relative to the root of your directory (e.g. images/logo.png):</p>
	<input name="logoPath" type="text" value="<?php echo $config['logoPath']; ?>"><br/><br/>

	<p>Text to be used in place of logo / alt logo text:</p>
	<input name="logoText" type="text" value="<?php echo $config['logoText']; ?>"><br/><br/>

	<p><strong>Force SSL Options</strong></p>
	<input name="forceSSL" type="checkbox" <?php if ($config['forceSSL'] == true) echo "checked=checked"; ?>"> Force SSL?<br/>
	<input name="forceLocalSSL" type="checkbox" <?php if ($config['forceLocalSSL'] == true) echo "checked=checked"; ?>"> Force SSL on localhost?<br/><br/>

	<input name="btnSubmit" type="submit" value="Save Settings">
</form>
