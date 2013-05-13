<?php
namespace wcf\system\moderation\queue;

use wcf\data\moderation\queue\ModerationQueue;
use wcf\data\moderation\queue\ViewableModerationQueue;
use wcf\system\request\LinkHandler;
use wcf\system\exception\SystemException;

/**
 * Moderation queue implementation for outstanding content.
 * 
 * @author	Jean-Marc Licht
 * @copyright	2010 - 2013 web-produktion
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	com.web-produktion.wcf.moderation.outstanding
 * @subpackage	system.moderation.queue
 * @category 	Community Framework
 */
class ModerationQueueOutstandingManager extends AbstractModerationQueueManager {
	/**
	 * @see	wcf\system\moderation\queue\AbstractModerationQueueManager::$definitionName
	 */
	protected $definitionName = 'com.web-produktion.wcf.moderation.outstanding';

	/**
	 * mark as done affected content.
	 * 
	 * @param	wcf\data\moderation\queue\ModerationQueue	$queue
	 */
	public function markAsDoneContent(ModerationQueue $queue) {
		$this->getProcessor(null, $queue->objectTypeID)->markAsDoneContent($queue);
	}

	/**
	 * @see	wcf\system\moderation\queue\IModerationQueueManager::getLink()
	 */
	public function getLink($queueID) {
		return LinkHandler::getInstance()->getLink('ModerationOutstanding', array (
				'id' => $queueID 
		));
	}

	/**
	 * Returns rendered template for outstanding content.
	 * 
	 * @param	wcf\data\moderation\queue\ViewableModerationQueue	$queue
	 * @return	string
	 */
	public function getOutstandingContent(ViewableModerationQueue $queue) {
		return $this->getProcessor(null, $queue->objectTypeID)->getOutstandingContent($queue);
	}

	/**
	 * Adds a outstanding for specified content.
	 *
	 * @param	string		$objectType
	 * @param	integer		$objectID
	 * @param	string		$type
	 * @param	array		$additionalData
	 */
	public function addModeratedContent($objectType, $objectID, array $additionalData = array()) {
		if (! $this->isValid($objectType)) {
			throw new SystemException("Object type '" . $objectType . "' is not valid for definition 'com.web-produktion.wcf.moderation.outstanding'");
		}
		
		$this->addEntry($this->getObjectTypeID($objectType), $objectID, $this->getProcessor($objectType)->getContainerID($objectID), $additionalData);
	}

	/**
	 * Marks entries from moderation queue as done.
	 * 
	 * @param	string		$objectType
	 * @param	array<integer>	$objectIDs
	 */
	public function removeModeratedContent($objectType, array $objectIDs) {
		if (! $this->isValid($objectType)) {
			throw new SystemException("Object type '" . $objectType . "' is not valid for definition 'com.web-produktion.wcf.moderation.outstanding'");
		}
		
		$this->removeEntries($this->getObjectTypeID($objectType), $objectIDs);
	}
}
