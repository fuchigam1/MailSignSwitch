<?php
/**
 * [ADMIN] MailSignSwitch
 *
 * @link http://www.materializing.net/
 * @author arata
 * @license MIT
 */
// データベース初期化
$this->Plugin->initDb('plugin', 'MailSignSwitch');
/**
 * メールフォーム情報を元にデータを作成する
 * ・設定データがないメールフォーム用のデータのみ作成する
 */
App::uses('MailContent', 'Mail.Model');
App::uses('MailConfig', 'Mail.Model');

$MailConfigModel = new MailConfig();
$mailConfigDatas = $MailConfigModel->find('first', ['recursive' => -1]);

$MailContentModel = new MailContent();
$mailContentDatas = $MailContentModel->find('list', ['recursive' => -1]);
if ($mailContentDatas) {
	CakePlugin::load('MailSignSwitch');
	App::uses('MailSignSwitch', 'MailSignSwitch.Model');
	$MailSignSwitchModel = new MailSignSwitch();
	foreach ($mailContentDatas as $key => $mail) {
		$mailSignSwitch = $MailSignSwitchModel->findByMailContentId($key);
		$savaData = [];
		$savaData['MailSignSwitch'] = $mailConfigDatas['MailConfig'];
		unset($savaData['MailSignSwitch']['id']);
		if (!$mailSignSwitch) {
			$savaData['MailSignSwitch']['mail_content_id'] = $key;
			$savaData['MailSignSwitch']['status'] = true;
			$MailSignSwitchModel->create($savaData);
			$MailSignSwitchModel->save($savaData, false);
		}
	}
	clearAllCache();
}
