<?php
class MailSignSwitchesSchema extends CakeSchema {

	public $file = 'mail_sign_switches.php';

	public function before($event = []) {
		return true;
	}

	public function after($event = []) {
	}

	public $mail_sign_switches = [
		'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary', 'comment' => 'ID'],
		'mail_content_id' => ['type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => 'メールコンテンツID'],
		'status' => ['type' => 'boolean', 'null' => true, 'default' => '0', 'comment' => 'デフォルト署名の利用'],
		'site_name' => ['type' => 'string', 'null' => true, 'default' => null, 'comment' => 'サイト名'],
		'site_url' => ['type' => 'string', 'null' => true, 'default' => null, 'comment' => 'サイトURL'],
		'site_email' => ['type' => 'string', 'null' => true, 'default' => null, 'comment' => 'サイトEメール'],
		'site_tel' => ['type' => 'string', 'null' => true, 'default' => null, 'comment' => '電話番号'],
		'site_fax' => ['type' => 'string', 'null' => true, 'default' => null, 'comment' => 'FAX番号'],
		'created' => ['type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '作成日時'],
		'modified' => ['type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '更新日時'],
		'indexes' => [
			'PRIMARY' => ['column' => 'id', 'unique' => 1]
		],
	];

}
