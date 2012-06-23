<?php
//wcf imports
require_once(WCF_DIR.'lib/data/user/achievement/object/DefaultAchievementObject.class.php');

/**
 * Earn achievement on gallery comment add.
 *
 * @author	Jeffrey 'Kiv' Reichardt
 * @copyright	2012 devlabor.com
 * @package     com.web-produktion.achievements.user.gallery
 * @license	CC BY-NC-SA 3.0 <http://creativecommons.org/licenses/by-nc-sa/3.0/legalcode>
 * @subpackage	data.user.achievement.object
 */
class UserGalleryCommentsAchievementObject extends DefaultAchievementObject{
	// system
	public $workerExecution = true;
	
	/**
	 * @see AbstractAchievementObject::execute
	 */
	public function execute($eventObj){
		if(isset($_GET['photoID']) && isset($_GET['action'])){
			if(StringUtil::trim($_GET['action']) == 'add')
				parent::execute($eventObj);
		}
	}

	/**
	 * @see AbstractAchievementObject::getProgress
	 */
	public function getProgress(){
		parent::getProgress();
		
		$sql = "SELECT COUNT(*) AS count 
			FROM wcf".WCF_N."_user_gallery_comment comment
			WHERE (comment.userID = ".$this->user->userID.")";
		$row = WCF::getDB()->getFirstRow($sql);
		return $row['count'];
	}
}
?>