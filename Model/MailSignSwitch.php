<?php
/**
 * [Model] MailSignSwitch
 *
 * @link			http://www.materializing.net/
 * @author			arata
 * @license			MIT
 */
class MailSignSwitch extends BcPluginAppModel {
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
 * ビヘイビア
 * 
 * @var array
 */
	public $actsAs = array('BcCache');
	
}
