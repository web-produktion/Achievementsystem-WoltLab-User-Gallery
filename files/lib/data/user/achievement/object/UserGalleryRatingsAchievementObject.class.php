<?php
//wcf imports
require_once(WCF_DIR.'lib/data/user/achievement/object/DefaultAchievementObject.class.php');

/**
 * Earn achievement on rate gallery photo.
 *
 * @author	Jeffrey 'Kiv' Reichardt
 * @copyright	2012 devlabor.com
 * @package     com.web-produktion.achievements.user.gallery
 * @license	CC BY-NC-SA 3.0 <http://creativecommons.org/licenses/by-nc-sa/3.0/legalcode>
 * @subpackage	data.user.achievement.object
 */
class UserGalleryRatingsAchievementObject extends DefaultAchievementObject{
	// system
	public $workerExecution = true;
	    
	
	/**
	 * @see AbstractAchievementObject::getProgress
	 */
	public function getProgress(){
		parent::getProgress();
		
		$sql = "SELECT COUNT(*) AS count 
			FROM wcf".WCF_N."_rating rating
			WHERE (rating.userID = ".$this->user->userID.") AND (objectName = 'com.woltlab.wcf.user.gallery.photo')";
		$row = WCF::getDB()->getFirstRow($sql);
		return $row['count'];
	}
}
?>
