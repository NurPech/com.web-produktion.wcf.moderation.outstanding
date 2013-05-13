<?php
namespace wcf\form;

use wcf\system\moderation\queue\ModerationQueueOutstandingManager;
use wcf\system\WCF;

/**
 * Shows the moderation outstanding form.
 * 
 * @author	Jean-Marc Licht
 * @copyright	2010 - 2013 web-produktion
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	com.web-produktion.wcf.moderation.outstanding
 * @subpackage	form
 * @category 	Community Framework
 */
class ModerationOutstandingForm extends AbstractModerationForm {

	/**
	 * @see	wcf\page\IPage::assignVariables()
	 */
	public function assignVariables() {
		parent::assignVariables();
		
		WCF::getTPL()->assign(array (
				'outstandingContent' => ModerationQueueOutstandingManager::getInstance()->getOutstandingContent($this->queue) 
		));
	}
}
