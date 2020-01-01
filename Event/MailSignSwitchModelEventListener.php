<?php
/**
 * [ModelEventListener] MailSignSwitch
 *
 * @link http://www.materializing.net/
 * @author arata
 * @license MIT
 */
class MailSignSwitchModelEventListener extends BcModelEventListener
{
	/**
	 * 登録イベント
	 *
	 * @var array
	 */
	public $events = [
		'Mail.MailContent.beforeFind',
		'Mail.MailContent.afterSave',
		'Mail.MailContent.afterDelete',
	];

	/**
	 * mailMailContentBeforeFind
	 * メールコンテンツ取得の際にメールサインスイッチ情報も併せて取得する
	 *
	 * @param CakeEvent $event
	 */
	public function mailMailContentBeforeFind(CakeEvent $event)
	{
		$Model = $event->subject();
		$Model->bindModel([
			'hasOne' => [
				'MailSignSwitch' => [
					'className' => 'MailSignSwitch.MailSignSwitch',
					'foreignKey' => 'mail_content_id',
				],
			],
		]);
	}

	/**
	 * mailMailContentAfterSave
	 * メールコンテンツ保存時にメールサインスイッチ情報も保存する
	 *
	 * @param CakeEvent $event
	 */
	public function mailMailContentAfterSave(CakeEvent $event)
	{
		$Model = $event->subject();
		// MailSignSwitch のデータがない場合は save 処理を実施しない
		if (!isset($Model->data['MailSignSwitch']) || empty($Model->data['MailSignSwitch'])) {
			return;
		}

		$saveData['MailSignSwitch'] = $Model->data['MailSignSwitch'];
		$saveData['MailSignSwitch']['mail_content_id'] = $Model->id;

		$created = $event->data[0];
		if ($created) {
			// admin_add, admin_ajax_copy
			unset($saveData['MailSignSwitch']['id']);
		}

		if ($saveData) {
			$MailSignSwitchModel = ClassRegistry::init('MailSignSwitch.MailSignSwitch');
			if (!$MailSignSwitchModel->save($saveData)) {
				CakeLog::write(LOG_MAIL_SIGN_SWITCH, 'メールサインスイッチ設定の保存に失敗しました。');
				CakeLog::write(LOG_MAIL_SIGN_SWITCH, print_r($saveData, true));
			}
		}
	}

	/**
	 * mailMailContentAfterDelete
	 * メールコンテンツ削除時にメールサインスイッチ情報も削除する
	 *
	 * @param CakeEvent $event
	 */
	public function mailMailContentAfterDelete(CakeEvent $event)
	{
		$Model = $event->subject();

		$MailSignSwitchModel = ClassRegistry::init('MailSignSwitch.MailSignSwitch');
		$data = $MailSignSwitchModel->find('first', [
			'conditions' => ['MailSignSwitch.mail_content_id' => $Model->id],
			'callbacks' => false,
			'recursive'	 => -1,
		]);
		if ($data) {
			if (!$MailSignSwitchModel->delete($data['MailSignSwitch']['id'])) {
				CakeLog::write(LOG_MAIL_SIGN_SWITCH, 'メールサインスイッチ設定の削除に失敗しました。');
				CakeLog::write(LOG_MAIL_SIGN_SWITCH, print_r($data, true));
			}
		}
	}

}
