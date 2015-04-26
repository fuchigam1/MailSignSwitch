<?php
/**
 * メールサインスウィッチ 1.1.0 バージョン アップデートスクリプト
 *
 * ----------------------------------------
 * 　アップデートの仕様について
 * ----------------------------------------
 * アップデートスクリプトや、スキーマファイルの仕様については
 * 次のファイルに記載されいているコメントを参考にしてください。
 *
 * /baser/controllers/updaters_controller.php
 *
 * スキーマ変更後、モデルを利用してデータの更新を行う場合は、
 * ClassRegistry を利用せず、モデルクラスを直接イニシャライズしないと、
 * スキーマのキャッシュが古いままとなるので注意が必要です。
 *
 * @link			http://www.materializing.net/
 * @author			arata
 * @license			MIT
 */
/**
 * mail_sign_switches テーブルの構造変更
 */
if ($this->loadSchema('1.1.0', 'MailSignSwitch', '', 'alter')){
	$this->setUpdateLog('mail_sign_switches テーブルの構造変更に成功しました。');
} else {
	$this->setUpdateLog('mail_sign_switches テーブルの構造変更に失敗しました。', true);
}
