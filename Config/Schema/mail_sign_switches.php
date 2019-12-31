<?php 
class MailSignSwitchesSchema extends CakeSchema {

	public $file = 'mail_sign_switches.php';

	public $connection = 'plugin';

	public function before($event = []) {
		return true;
	}

	public function after($event = []) {
	}

	public $mail_sign_switches = [
		'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary', 'comment' => 'ID'],
		'mail_content_id' => ['type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => 'メールコンテンツID'],
		'status' => ['type' => 'boolean', 'null' => true, 'default' => '0', 'comment' => 'デフォルト署名の利用'],
		'site_name' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'comment' => 'サイト名', 'charset' => 'utf8'],
		'site_url' => ['type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'サイトURL', 'charset' => 'utf8'],
		'site_email' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'comment' => 'サイトEメール', 'charset' => 'utf8'],
		'site_tel' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'comment' => '電話番号', 'charset' => 'utf8'],
		'site_fax' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'comment' => 'FAX番号', 'charset' => 'utf8'],
		'created' => ['type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '作成日時'],
		'modified' => ['type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '更新日時'],
		'indexes' => [
			'PRIMARY' => ['column' => 'id', 'unique' => 1]
		],
		'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB']
	];

}
