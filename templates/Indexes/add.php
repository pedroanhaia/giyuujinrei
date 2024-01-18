<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Index $index
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Indexes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="indexes form content">
            <?= $this->Form->create($index) ?>
            <fieldset>
                <legend><?= __('Add Index') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('age_min');
                    echo $this->Form->control('age_max');
                    echo $this->Form->control('role');
                    echo $this->Form->control('idrating');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
