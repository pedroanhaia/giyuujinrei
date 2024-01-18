<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assessment $assessment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Assessment'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="assessment form content">
            <?= $this->Form->create($assessment) ?>
            <fieldset>
                <legend><?= __('Add Assessment') ?></legend>
                <?php
                    echo $this->Form->control('idindex');
                    echo $this->Form->control('idteacher');
                    echo $this->Form->control('idstudent');
                    echo $this->Form->control('value');
                    echo $this->Form->control('idschedule');
                    echo $this->Form->control('role');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
