<?php
/**
 * [ADMIN] MailSignSwitch
 *
 * @link http://www.materializing.net/
 * @author arata
 * @license MIT
 */
?>
<div class="section">
	<h3>署名設定</h3>
	<?php echo $this->BcForm->input('MailSignSwitch.id', ['type' => 'hidden']) ?>
	<?php echo $this->BcForm->input('MailSignSwitch.mail_content_id', ['type' => 'hidden']) ?>
	<table cellpadding="0" cellspacing="0" id="MailSignSwitchTable" class="form-table bca-form-table">
		<tr>
			<th class="col-head bca-form-table__label">
				<?php echo $this->BcForm->label('MailSignSwitch.status', '署名切替えの利用') ?>
			</th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('MailSignSwitch.status', [
					'type' => 'radio', 'options' => $this->BcText->booleanDoList('利用'),
				]) ?>
				<?php if ($siteConfig['admin_theme']): ?>
					<i class="bca-icon--question-circle btn help bca-help"></i>
				<?php else: ?>
					<?php echo $this->BcBaser->img('admin/icn_help.png', ['id' => 'helpMailSignSwitchStatus', 'class' => 'btn help', 'alt' => 'ヘルプ']) ?>
				<?php endif; ?>
				<?php echo $this->BcForm->error('MailSignSwitch.status') ?>
				<div id="helptextMailSignSwitchStatus" class="helptext">
					「利用しない」場合、
					<?php $this->BcBaser->link('メールプラグイン基本設定', ['admin' => true, 'plugin' => 'mail', 'controller' => 'mail_configs', 'action' => 'form']) ?>
					の署名内容が利用されます。
				</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label">
				<?php echo $this->BcForm->label('MailSignSwitch.site_name', 'WEBサイト名') ?>
			</th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('MailSignSwitch.site_name', [
					'type' => 'text', 'size' => 60, 'maxlength' => 255, 'placeholder' => $this->request->data['MailConfig']['site_name'],
				]) ?>
				<?php if ($siteConfig['admin_theme']): ?>
					<i class="bca-icon--question-circle btn help bca-help"></i>
				<?php else: ?>
					<?php echo $this->BcBaser->img('admin/icn_help.png', ['id' => 'helpMailSignSwitchSiteName', 'class' => 'btn help', 'alt' => 'ヘルプ']) ?>
				<?php endif; ?>
				<?php echo $this->BcForm->error('MailSignSwitch.site_name') ?>
				<div id="helptextMailSignSwitchSiteName" class="helptext">自動送信メールの署名に挿入されます。</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label">
				<?php echo $this->BcForm->label('MailSignSwitch.site_url', 'WEBサイトURL') ?>
			</th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('MailSignSwitch.site_url', [
					'type' => 'text', 'size' => 60, 'maxlength' => 255, 'placeholder' => $this->request->data['MailConfig']['site_url'],
				]) ?>
				<?php if ($siteConfig['admin_theme']): ?>
					<i class="bca-icon--question-circle btn help bca-help"></i>
				<?php else: ?>
					<?php echo $this->BcBaser->img('admin/icn_help.png', ['id' => 'helpMailSignSwitchSiteUrl', 'class' => 'btn help', 'alt' => 'ヘルプ']) ?>
				<?php endif; ?>
				<?php echo $this->BcForm->error('MailSignSwitch.site_url') ?>
				<div id="helptextMailSignSwitchSiteUrl" class="helptext">自動送信メールの署名に挿入されます。</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label">
				<?php echo $this->BcForm->label('MailSignSwitch.site_email', 'Eメール') ?>
			</th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('MailSignSwitch.site_email', [
					'type' => 'text', 'size' => 60, 'maxlength' => 255, 'placeholder' => $this->request->data['MailConfig']['site_email'],
				]) ?>
				<?php if ($siteConfig['admin_theme']): ?>
					<i class="bca-icon--question-circle btn help bca-help"></i>
				<?php else: ?>
					<?php echo $this->BcBaser->img('admin/icn_help.png', ['id' => 'helpMailSignSwitchSiteEmail', 'class' => 'btn help', 'alt' => 'ヘルプ']) ?>
				<?php endif; ?>
				<?php echo $this->BcForm->error('MailSignSwitch.site_email') ?>
				<div id="helptextMailSignSwitchSiteEmail" class="helptext">
					<ul>
						<li>自動送信メールの署名に挿入されます。</li>
						<li>メールの送信先ではありません。</li>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label">
				<?php echo $this->BcForm->label('MailSignSwitch.site_tel', '電話番号') ?>
			</th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('MailSignSwitch.site_tel', [
					'type' => 'text', 'size' => 60, 'maxlength' => 255, 'placeholder' => $this->request->data['MailConfig']['site_tel'],
				]) ?>
				<?php if ($siteConfig['admin_theme']): ?>
					<i class="bca-icon--question-circle btn help bca-help"></i>
				<?php else: ?>
					<?php echo $this->BcBaser->img('admin/icn_help.png', ['id' => 'helpMailSignSwitchSiteTel', 'class' => 'btn help', 'alt' => 'ヘルプ']) ?>
				<?php endif; ?>
				<?php echo $this->BcForm->error('MailSignSwitch.site_tel') ?>
				<div id="helptextMailSignSwitchSiteTel" class="helptext">自動送信メールの署名に挿入されます。</div>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label">
				<?php echo $this->BcForm->label('MailSignSwitch.site_fax', 'FAX番号') ?>
			</th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('MailSignSwitch.site_fax', ['type' => 'text', 'size' => 60, 'maxlength' => 255, 'placeholder' => $this->request->data['MailConfig']['site_fax']]) ?>
				<?php if ($siteConfig['admin_theme']): ?>
					<i class="bca-icon--question-circle btn help bca-help"></i>
				<?php else: ?>
					<?php echo $this->BcBaser->img('admin/icn_help.png', ['id' => 'helpMailSignSwitchSiteFax', 'class' => 'btn help', 'alt' => 'ヘルプ']) ?>
				<?php endif; ?>
				<?php echo $this->BcForm->error('MailSignSwitch.site_fax') ?>
				<div id="helptextMailSignSwitchSiteFax" class="helptext">自動送信メールの署名に挿入されます。</div>
			</td>
		</tr>
	</table>
</div>
