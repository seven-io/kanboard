<h2>sms77</h2>

<h3>
    <i class='fa fa-envelope fa-fw'></i>
    <?= t('SMS Two-Factor Authentication') ?>
</h3>

<div class='panel'>
    <?= $this->form->label(t('API Key'), 'sms77_api_key') ?>
    <?= $this->form->password('sms77_api_key', $values, [], [
        'maxlength=90',
    ]) ?>

    <?= $this->form->label(t('Sender Identifier'), 'sms77_from') ?>
    <?= $this->form->text('sms77_from', $values, [], [
        'maxlength=16',
    ]) ?>

    <div class='form-actions'>
        <input type='submit' value='<?= t('Save') ?>' class='btn btn-blue'/>
    </div>
</div>
