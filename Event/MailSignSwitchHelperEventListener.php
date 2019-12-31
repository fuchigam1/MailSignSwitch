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
	 * 処理対象とするコントローラー
	 *
	 * @var array
	 */
	private $targetController = ['MailContents'];

	/**
	 * 処理対象とするアクション
	 *
	 * @var array
	 */
	private $targetAction = ['admin_edit', 'admin_add'];

	/**
	 * bcFormTableAfter
	 *
	 * @param CakeEvent $event
	 * @return string
	 */
	public function bcFormTableAfter(CakeEvent $event)
	{
		if (!BcUtil::isAdminSystem()) {
			return;
		}

		$View = $event->subject();
		if (!in_array($View->name, $this->targetController)) {
			return;
		}
		if (!in_array($View->request->params['action'], $this->targetAction)) {
			return;
		}

		if (in_array($event->data['id'], ['MailContentAdminEditForm'])) {
			// メールフォーム設定編集画面に設定欄を表示する
			echo $View->element($this->plugin . '.mail_sign_switch_form');
		}

		return;
	}
}
