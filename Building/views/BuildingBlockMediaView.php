<?php

require_once 'Building/views/BuildingBlockView.php';

/**
 * @package   Building
 * @copyright 2014 silverorange
 * @license   http://www.opensource.org/licenses/mit-license.html MIT License
 */
abstract class BuildingBlockMediaView extends BuildingBlockView
{
	// {{{ protected properties

	/**
	 * @var SiteJwMediaPlayerDisplay
	 */
	protected $media_player = null;

	// }}}
	// {{{ public function setMediaPlayer()

	public function setMediaPlayer(SiteJwMediaPlayerDisplay $player)
	{
		$this->media_player = $player;
	}

	// }}}
}

?>
