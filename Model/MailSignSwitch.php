<?php
/**
 * [Model] MailSignSwitch
 *
 * @link http://www.materializing.net/
 * @author arata
 * @license MIT
 */
class MailSignSwitch extends BcPluginAppModel
{
	/**
	 * ModelName
	 *
	 * @var string
	 */
	public $name = 'MailSignSwitch';

	/**
	 * PluginName
	 *
	 * @var string
	 */
	public $plugin = 'MailSignSwitch';

	/**
	 * 初期値を取得する
	 *
	 * @return array
	 */
	public function getDefaultValue()
	{
		$data = [
			$this->name => [
				'status' => false,
			],
		];
		return $data;
	}

}
