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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $assessment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $assessment->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Assessment'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="assessment form content">
            <?= $this->Form->create($assessment) ?>
            <fieldset>
                <legend><?= __('Edit Assessment') ?></legend>
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
