<?php
/**
 * [HelperEventListener] MailSignSwitch
 *
 * @link http://www.materializing.net/
 * @author arata
 * @license MIT
 */
class MailSignSwitchHelperEventListener extends BcHelperEventListener
{
	/**
	 * 登録イベント
	 *
	 * @var array
	 */
	public $events = [
		'BcFormTable.after',
	];

	/**
	 * bcFormTableAfter
	 *
	 * @param CakeEvent $event
	 */
	public function bcFormTableAfter(CakeEvent $event)
	{
		if (!BcUtil::isAdminSystem()) {
			return;
		}

		$View = $event->subject();
		if (!in_array($View->name, ['MailContents'])) {
			return;
		}
		if (!in_array($View->request->params['action'], ['admin_edit', 'admin_add'])) {
			return;
		}

		if (in_array($event->data['id'], ['MailContentAdminEditForm'])) {
			// メールフォーム設定編集画面に設定欄を表示する
			echo $View->element($this->plugin . '.mail_sign_switch_form');
		}
	}

}
