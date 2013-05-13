/**
 * @author	Jean-Marc Licht
 * @copyright	2010 - 2013 web-produktion
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 */

/**
 * Namespace for outstanding related classes.
 */
WCF.Moderation.Outstanding = { };

/**
 * Manages outstanding content within moderation.
 * 
 * @see	WCF.Moderation.Management
 */
WCF.Moderation.Outstanding.Management = WCF.Moderation.Management.extend({
	/**
	 * @see	WCF.Moderation.Management.init()
	 */
	init: function(queueID, redirectURL) {
		this._buttonSelector = '#markAsDoneContent';
		this._className = 'wcf\\data\\moderation\\outstanding\\ModerationQueueOutstandingAction';
		
		this._super(queueID, redirectURL, 'wcf.moderation.outstanding.{actionName}.confirmMessage');
	}
});
