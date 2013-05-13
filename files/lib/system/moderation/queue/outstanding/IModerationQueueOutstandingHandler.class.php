<?php
namespace wcf\system\moderation\queue\outstanding;

use wcf\data\moderation\queue\ModerationQueue;
use wcf\data\moderation\queue\ViewableModerationQueue;
use wcf\system\moderation\queue\IModerationQueueHandler;

/**
 * Default interface for moderation queue outstanding handlers.
 * 
 * @author	Jean-Marc Licht
 * @copyright	2010 - 2013 web-produktion
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	com.web-produktion.wcf.moderation.outstanding
 * @subpackage	system.moderation.queue.outstanding
 * @category 	Community Framework
 */
interface IModerationQueueOutstandingHandler extends IModerationQueueHandler {

	/**
	 * mark as done affected content.
	 * 
	 * @param	wcf\data\moderation\queue\ModerationQueue	$queue
	 */
	public function markAsDoneContent(ModerationQueue $queue);

	/**
	 * Returns rendered template for outstanding content.
	 * 
	 * @param	wcf\data\moderation\queue\ViewableModerationQueue	$queue
	 * @return	string
	 */
	public function getOutstandingContent(ViewableModerationQueue $queue);
}
