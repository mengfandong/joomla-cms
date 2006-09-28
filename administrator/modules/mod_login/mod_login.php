<?php
/**
* @version $Id$
* @package Joomla
* @copyright Copyright (C) 2005 - 2006 Open Source Matters. All rights reserved.
* @license GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

//$browserLang = JLanguageHelper::detectLanguage();
// forced to default
$browserLang = null;
$lang = JFactory::getLanguage();

$languages = array();
$languages = JLanguageHelper::createLanguageList($browserLang );
array_unshift( $languages, mosHTML::makeOption( '', JText::_( 'Default' ) ) );
$langs = mosHTML::selectList( $languages, 'lang', ' class="inputbox"', 'value', 'text', $browserLang );
?>

<form action="index.php" method="post" name="loginForm" id="loginForm" style="clear: both;">
	<p>
		<label for="username"><?php echo JText::_('Username'); ?></label>
		<input name="username" id="username" type="text" class="inputbox" size="15" />
	</p>

	<p>
		<label for="password"><?php echo JText::_('Password'); ?></label>
		<input name="passwd" id="password" type="password" class="inputbox" size="15" />
	</p>
	<?php
	$errors = JError::getErrors();
	if(JError::isError($errors[0])) {
		echo '<p>';
		echo $errors[0]->getMessage();
		echo '<p>';
		array_shift($errors);
	}
	?>
	<p>
		<label for="lang"><?php echo JText::_('Language'); ?></label>
		<?php echo $langs; ?>
	</p>
	<p class="button">
		<button type="submit" class="<?php echo $lang->isRTL() ? 'button1-right' : 'button1-left'; ?>">
			<a class="<?php echo $lang->isRTL() ? 'prev' : 'next'; ?>"><?php echo JText::_( 'Login' ); ?></a>
		</button>
		<div class="clr"></div>
	</p>
	<input type="hidden" name="option" value="com_login" />
	<input type="hidden" name="task" value="login" />
	<input type="hidden" name="token" value="<?php echo JUtility::getToken(); ?>" />
</form>
