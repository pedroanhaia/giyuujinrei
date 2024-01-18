<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Core $core
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $core->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $core->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Cores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cores form content">
            <?= $this->Form->create($core) ?>
            <fieldset>
                <legend><?= __('Edit Core') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('city');
                    echo $this->Form->control('cont_student');
                    echo $this->Form->control('type');
                    echo $this->Form->control('contact');
                    echo $this->Form->control('positioncontact');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('email');
                    echo $this->Form->control('role');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
