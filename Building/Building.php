<?php

require_once 'Swat/SwatUI.php';
require_once 'Site/SiteViewFactory.php';

/**
 * Container for package-wide static methods
 *
 * @package   Building
 * @copyright 2014 silverorange
 * @license   http://www.opensource.org/licenses/mit-license.html MIT License
 */
class Building
{
	// {{{ constants

	/**
	 * The gettext domain for building
	 *
	 * This is used to support multiple locales.
	 */
	const GETTEXT_DOMAIN = 'building';

	// }}}
	// {{{ public static function _()

	/**
	 * Translates a phrase
	 *
	 * This is an alias for {@link Building::gettext()}.
	 *
	 * @param string $message the phrase to be translated.
	 *
	 * @return string the translated phrase.
	 */
	public static function _($message)
	{
		return self::gettext($message);
	}

	// }}}
	// {{{ public static function gettext()

	/**
	 * Translates a phrase
	 *
	 * This method relies on the php gettext extension and uses dgettext()
	 * internally.
	 *
	 * @param string $message the phrase to be translated.
	 *
	 * @return string the translated phrase.
	 */
	public static function gettext($message)
	{
		return dgettext(self::GETTEXT_DOMAIN, $message);
	}

	// }}}
	// {{{ public static function ngettext()

	/**
	 * Translates a plural phrase
	 *
	 * This method should be used when a phrase depends on a number. For
	 * example, use ngettext when translating a dynamic phrase like:
	 *
	 * - "There is 1 new item" for 1 item and
	 * - "There are 2 new items" for 2 or more items.
	 *
	 * This method relies on the php gettext extension and uses dngettext()
	 * internally.
	 *
	 * @param string $singular_message the message to use when the number the
	 *                                  phrase depends on is one.
	 * @param string $plural_message the message to use when the number the
	 *                                phrase depends on is more than one.
	 * @param integer $number the number the phrase depends on.
	 *
	 * @return string the translated phrase.
	 */
	public static function ngettext($singular_message, $plural_message, $number)
	{
		return dngettext(
			self::GETTEXT_DOMAIN,
			$singular_message,
			$plural_message,
			$number
		);
	}

	// }}}
	// {{{ public static function setupGettext()

	public static function setupGettext()
	{
		$path = '@DATA-DIR@/Building/locale';
		if (substr($path, 0, 1) === '@') {
			$path = __DIR__.'/../locale';
		}

		bindtextdomain(self::GETTEXT_DOMAIN, $path);
		bind_textdomain_codeset(self::GETTEXT_DOMAIN, 'UTF-8');
	}

	// }}}
	// {{{ private function __construct()

	/**
	 * Don't allow instantiation of the Building object
	 *
	 * This class contains only static methods and should not be instantiated.
	 */
	private function __construct()
	{
	}

	// }}}
}

Building::setupGettext();

SiteViewFactory::addPath('Building/views');
SiteViewFactory::registerView('building-block-audio', 'BuildingBlockAudioView');
SiteViewFactory::registerView('building-block-video', 'BuildingBlockVideoView');
SiteViewFactory::registerView('building-block-image', 'BuildingBlockImageView');
SiteViewFactory::registerView('building-block-xhtml', 'BuildingBlockXHTMLView');
SiteViewFactory::registerView('building-block-attachment', 'BuildingBlockAttachmentView');
SiteViewFactory::registerView('building-block', 'BuildingBlockCompositeView');
SiteViewFactory::registerView('building-block-admin', 'BuildingBlockAdminCompositeView');

SwatUI::mapClassPrefixToPath('Building', 'Building');

?>
