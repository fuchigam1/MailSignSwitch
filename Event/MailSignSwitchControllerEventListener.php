<?php
/**
 * [ControllerEventListener] MailSignSwitch
 *
 * @link			http://www.materializing.net/
 * @author			arata
 * @license			MIT
 */
class MailSignSwitchControllerEventListener extends BcControllerEventListener {
/**
 * 登録イベント
 * 
 * @var array
 */
	public $events = array(
		'Mail.Mail.beforeSendEmail'
	);
	
/**
 * mailMailBeforeSendEmail
 * 
 * @param CakeEvent $event
 * @return boolean
 */
	public function mailMailBeforeSendEmail(CakeEvent $event) {
		$Controller = $event->subject();
		$this->setUpModel();
		$mailSignSwitch = $this->MailSignSwitchModel->find('first', array(
			'conditions' => array(
				'MailSignSwitch.mail_content_id' => $Controller->dbDatas['mailContent']['MailContent']['id']
			),
			'recursive' => -1
		));
		if ($mailSignSwitch) {
			$Controller->dbDatas['mailConfig']['MailConfig'] = $mailSignSwitch['MailSignSwitch'];
			//$this->log($Controller->dbDatas['mailConfig']['MailConfig'], LOG_DEBUG);
		}
		return true;
	}
	
/**
 * MailSignSwitch モデルを準備する
 * 
 * @access private
 */
	private function setUpModel() {
		if (ClassRegistry::isKeySet('MailSignSwitch.MailSignSwitch')) {
			$this->MailSignSwitchModel = ClassRegistry::getObject('MailSignSwitch.MailSignSwitch');
		} else {
			$this->MailSignSwitchModel = ClassRegistry::init('MailSignSwitch.MailSignSwitch');
		}
	}
	
}
