<?php
/**
 * [ModelEventListener] MailSignSwitch
 * 
 * @link			http://www.materializing.net/
 * @author			arata
 * @license			MIT
 */
class MailSignSwitchModelEventListener extends BcModelEventListener {
/**
 * 登録イベント
 *
 * @var array
 */
	public $events = array(
		'Mail.MailContent.beforeFind',
		'Mail.MailContent.afterSave',
		'Mail.MailContent.afterDelete',
	);
	
/**
 * メールサインスイッチ設定モデル
 * 
 * @var Object
 */
	public $MailSignSwitchModel = null;
	
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
	
/**
 * mailMailContentBeforeFind
 * メールコンテンツ取得の際にメールレシーバースイッチ情報も併せて取得する
 * 
 * @param CakeEvent $event
 */
	function mailMailContentBeforeFind(CakeEvent $event) {
		$Model = $event->subject();
		$association = array(
			'MailSignSwitch' => array(
				'className' => 'MailSignSwitch.MailSignSwitch',
				'foreignKey' => 'mail_content_id'
			)
		);
		$Model->bindModel(array('hasOne' => $association));
	}
	
/**
 * mailMailContentAfterSave
 * メールコンテンツ保存時にメールレシーバースイッチ情報も保存する
 * 
 * @param CakeEvent $event
 */
	public function mailMailContentAfterSave(CakeEvent $event) {
		$Model = $event->subject();
		$saveData = $this->generateContentSaveData($Model, $Model->id);
		if ($saveData) {
			if (!$this->MailSignSwitchModel->save($saveData)) {
				$this->log(sprintf('ID：%s のメールサインスイッチ設定の保存に失敗しました。', $Model->data['MailSignSwitch']['id']));
			}
		}
	}
	
/**
 * mailMailContentAfterDelete
 * メールコンテンツ削除時にメールレシーバースイッチ情報も削除する
 * 
 * @param CakeEvent $event
 */
	public function mailMailContentAfterDelete(CakeEvent $event) {
		$Model = $event->subject();
		$this->setUpModel();
		$data = $this->MailSignSwitchModel->find('first', array(
			'conditions' => array('MailSignSwitch.mail_content_id' => $Model->id),
			'recursive' => -1
		));
		if ($data) {
			if (!$this->MailSignSwitchModel->delete($data['MailSignSwitch']['id'])) {
				$this->log('ID:' . $data['MailSignSwitch']['id'] . 'のメールレシーバースイッチ設定の削除に失敗しました。');
			}
		}
	}
	
/**
 * 保存するデータの生成
 * 
 * @param Object $Model
 * @param int $contentId
 * @return array
 */
	public function generateContentSaveData($Model, $contentId) {
		if ($Model->alias != 'MailContent') {
			return false;
		}
		
		$this->setUpModel();
		$params = Router::getParams();			// 動作判定のため取得
		$data = array();						// 保存対象データ
		$foreignId = $contentId;				// 外部キー設定
		if (isset($params['pass'][0])) {
			$oldModelId = $params['pass'][0];	// ajax処理に入ってくる処理対象モデルID
		}
		
		switch ($params['action']) {
			case 'admin_add':		// メールフォーム追加時
				$data['MailSignSwitch'] = $Model->data['MailSignSwitch'];
				$data['MailSignSwitch']['mail_content_id'] = $foreignId;
				unset($data['MailSignSwitch']['id']);
				break;
			
			case 'admin_edit':		// メールフォーム編集時
				$data['MailSignSwitch'] = $Model->data['MailSignSwitch'];
				break;
			
			case 'admin_ajax_copy':	// Ajaxコピー処理時に実行
				// メールフォームコピー保存時にエラーがなければ保存処理を実行
				if (empty($Model->validationErrors)) {
					// ajax 処理の際は、複製するモデルのデータのみ取得している状態なので、プラグイン側では改めて複製対象を取得する
					$cloneData = $this->MailSignSwitchModel->find('first', array(
						'conditions' => array(
							'MailSignSwitch.mail_content_id' => $oldModelId
						),
						'recursive' => -1
					));
					if ($cloneData) {
						// コピー元データがある時
						$data = Hash::merge($data, $cloneData);
						$data['MailSignSwitch']['mail_content_id'] = $contentId;
						unset($data['MailSignSwitch']['id']);
					} else {
						// コピー元データがない時
						$data['MailSignSwitch']['mail_content_id'] = $foreignId;
					}
				}
				break;
			
			default:
				break;
		}
		
		return $data;
	}
	
}
