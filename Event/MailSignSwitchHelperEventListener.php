<?php
/**
 * [HelperEventListener] MailSignSwitch
 *
 * @link			http://www.materializing.net/
 * @author			arata
 * @license			MIT
 */
class MailSignSwitchHelperEventListener extends BcHelperEventListener {
/**
 * 登録イベント
 *
 * @var array
 */
	public $events = array(
		// Form.afterForm Or Form.afterOptionForm
		'Form.afterOptionForm',
	);
	
/**
 * 処理対象とするコントローラー
 * 
 * @var array
 */
	public $judgeControllers = array('MailContents');
	
/**
 * 処理対象とするアクション
 * 
 * @var array
 */
	public $judgeActions = array('admin_edit', 'admin_add');
	
/**
 * formAfterCreate
 * 
 * @param CakeEvent $event
 * @return string
 */
	public function formAfterOptionForm(CakeEvent $event) {
		$View = $event->subject();
		if (!BcUtil::isAdminSystem()) {
			return;
		}
		
		if (in_array($View->name, $this->judgeControllers)) {
			if (in_array($View->request->params['action'], $this->judgeActions)) {
				// メールフォーム設定編集画面に設定欄を表示する
				echo $View->element('MailSignSwitch.mail_sign_switch_form');
			}
		}
		return;
	}
	
}
