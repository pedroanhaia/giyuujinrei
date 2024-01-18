<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RelTeacherCore $relTeacherCore
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Rel Teacher Core'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="relTeacherCore form content">
            <?= $this->Form->create($relTeacherCore) ?>
            <fieldset>
                <legend><?= __('Add Rel Teacher Core') ?></legend>
                <?php
                    echo $this->Form->control('idcore');
                    echo $this->Form->control('idteacher');
                    echo $this->Form->control('role');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
