<h2>seven</h2>

<h3>
    <i class='fa fa-envelope fa-fw'></i>
    <?= t('SMS Two-Factor Authentication') ?>
</h3>

<div class='panel'>
    <?= $this->form->label(t('Phone Number'), 'phone_number') ?>
    <?= $this->form->text('phone_number', $values, [], [
        'maxlength=16',
    ]) ?>

    <div class='form-actions'>
        <input type='submit' value='<?= t('Save') ?>' class='btn btn-blue'/>
    </div>
</div>
