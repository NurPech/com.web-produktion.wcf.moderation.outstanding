<?php
namespace wcf\data\moderation\queue;

use wcf\system\exception\PermissionDeniedException;
use wcf\system\moderation\queue\ModerationQueueOutstandingManager;

/**
 * Executes actions for opens.
 * 
 * @author	Jean-Marc Licht
 * @copyright	2010 - 2013 web-produktion
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	com.web-produktion.wcf.moderation.outstanding
 * @subpackage	data.moderation.queue
 * @category 	Community Framework
 */
class ModerationQueueOutstandingAction extends ModerationQueueAction {
	/**
	 * @see	wcf\data\AbstractDatabaseObjectAction::$allowGuestAccess
	 */
	protected $allowGuestAccess = array (
			'markAsDoneContent' 
	);
	
	/**
	 * moderation queue editor object
	 * @var	wcf\data\moderation\queue\ModerationQueueEditor
	 */
	public $queue = null;

	/**
	 * Validates parameters to mark as done content.
	 */
	public function validateMarkAsDoneContent() {
		$this->queue = $this->getSingleObject();
		// @TODO: add permission check for mark as done
		if (! $this->queue->canEdit()) {
			throw new PermissionDeniedException();
		}
	}

	/**
	 * mark as done content.
	 */
	public function markAsDoneContent() {
		// mark as done content
		ModerationQueueOutstandingManager::getInstance()->markAsDoneContent($this->queue->getDecoratedObject());
		
		$this->queue->markAsDone();
	}
}
