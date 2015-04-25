<?php
/**
 * [ADMIN] MailSignSwitch
 *
 * @link			http://www.materializing.net/
 * @author			arata
 * @license			MIT
 */
?>
</table>

<?php echo $this->BcForm->input('MailSignSwitch.id', array('type' => 'hidden')) ?>
<?php echo $this->BcForm->input('MailSignSwitch.mail_content_id', array('type' => 'hidden')) ?>
<table cellpadding="0" cellspacing="0" id="MailSignSwitchTable" class="form-table">
	<tr>
		<th><?php echo $this->BcForm->label('MailSignSwitch.site_name', '署名：WEBサイト名') ?></th>
		<td class="col-input">
			<?php echo $this->BcForm->input('MailSignSwitch.site_name', array('type' => 'text', 'size' => 35, 'maxlength' => 255)) ?>
			<?php echo $this->BcHtml->image('admin/icn_help.png', array('id' => 'helpSiteName', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
			<?php echo $this->BcForm->error('MailSignSwitch.site_name') ?>
			<div id="helptextSiteName" class="helptext">自動送信メールの署名に挿入されます。</div>
		</td>
	</tr>
	<tr>
		<th><?php echo $this->BcForm->label('MailSignSwitch.site_url', '署名：WEBサイトURL') ?></th>
		<td class="col-input">
			<?php echo $this->BcForm->input('MailSignSwitch.site_url', array('type' => 'text', 'size' => 35, 'maxlength' => 255)) ?>
			<?php echo $this->BcHtml->image('admin/icn_help.png', array('id' => 'helpSiteUrl', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
			<?php echo $this->BcForm->error('MailSignSwitch.site_url') ?>
			<div id="helptextSiteUrl" class="helptext">自動送信メールの署名に挿入されます。</div>
		</td>
	</tr>
	<tr>
		<th><?php echo $this->BcForm->label('MailSignSwitch.site_email', '署名：Eメール') ?></th>
		<td class="col-input">
			<?php echo $this->BcForm->input('MailSignSwitch.site_email', array('type' => 'text', 'size' => 35, 'maxlength' => 255)) ?>
			<?php echo $this->BcHtml->image('admin/icn_help.png', array('id' => 'helpSiteEmail', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
			<?php echo $this->BcForm->error('MailSignSwitch.site_email') ?>
			<div id="helptextSiteEmail" class="helptext">
				<ul>
					<li>自動送信メールの署名に挿入されます。</li>
					<li>メールの送信先ではありません。</li>
				</ul>
			</div>
		</td>
	</tr>
	<tr>
		<th><?php echo $this->BcForm->label('MailSignSwitch.site_tel', '署名：電話番号') ?></th>
		<td class="col-input">
			<?php echo $this->BcForm->input('MailSignSwitch.site_tel', array('type' => 'text', 'size' => 35, 'maxlength' => 255)) ?>
			<?php echo $this->BcHtml->image('admin/icn_help.png', array('id' => 'helpSiteTel', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
			<?php echo $this->BcForm->error('MailSignSwitch.site_tel') ?>
			<div id="helptextSiteTel" class="helptext">自動送信メールの署名に挿入されます。</div>
		</td>
	</tr>
	<tr>
		<th><?php echo $this->BcForm->label('MailSignSwitch.site_fax', '署名：FAX番号') ?></th>
		<td class="col-input">
			<?php echo $this->BcForm->input('MailSignSwitch.site_fax', array('type' => 'text', 'size' => 35, 'maxlength' => 255)) ?>
			<?php echo $this->BcHtml->image('admin/icn_help.png', array('id' => 'helpSiteFax', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
			<?php echo $this->BcForm->error('MailSignSwitch.site_fax') ?>
			<div id="helptextSiteFax" class="helptext">自動送信メールの署名に挿入されます。</div>
		</td>
	</tr>
