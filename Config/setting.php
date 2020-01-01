<?php
/**
 * [Config] 設定ファイル
 *
 * @link http://www.materializing.net/
 * @author arata
 * @license MIT
 */
/**
 * 専用ログ
 */
define('LOG_MAIL_SIGN_SWITCH', 'log_mail_sign_switch');
CakeLog::config('log_mail_sign_switch', [
	'engine' => 'FileLog',
	'types' => ['log_mail_sign_switch'],
	'file' => 'log_mail_sign_switch',
	'size' => '3MB',
	'rotate' => 5,
]);
