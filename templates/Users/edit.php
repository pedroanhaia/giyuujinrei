<div class="col-md-12 content">
	<h3> <?= $title ?> </h3>
	<div class="card" >
		<div class="card-body">
			<?= $this->Form->create($user, ['class' => 'form-material  mt-2']) ?>
				<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
						<label class="control-label text-muted"> Nome </label>
						<?= $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira o nome']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
						<label class="control-label text-muted"> E-mail </label>
						<?= $this->Form->control('email', ['class' => 'form-control', 'label' => false]) ?>
					</div>
					<?php if($role >= C_RoleTudo) { ?>
						<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
							<label class="control-label text-muted"> Dojô </label>
							<?= $this->Form->control('idcore', ['class' => 'form-control selectpicker', 'data-live-search', 'label' => false, 'required' => true, 'options' => $cores, 'title' => 'Selecione o dojô']) ?>
						</div>
					<?php } ?>
				</div>
				<?php if($role >= C_RoleTudo) { ?>
					<div class="row">
						<div class="col-lg-4 col-md-6 col-xs-12">
							<label class="control-label text-muted"> Role </label>
							<?= $this->Form->control('role', ['class' => 'form-control', 'label' => false, 'required' => true, 'options' => C_RolesOptions]) ?>
						</div>
					</div>
					<div class="row mt-2">
						<div class="col-12">
							<label class="control-label text-muted"> Status </label>
							<?=  $this->Form->input('inactive', ['label' => ['class' => 'control-label'], 'type' => 'radio', 'options' => [0 => 'Ativo', 1 => 'Inativo']]); ?>
						</div>
					</div>
				<?php } ?>
				<div class="row">
					<div class="col-md-12">
						<?= $this->Form->button('Salvar usuário', ['class' => 'btn btn-success btn-lg']) ?>
						<?php if($iduserLogado == $user->id || $role == C_RoleTudo) echo $this->Html->link(__('Alterar senha'), ['action' => 'alterarsenha', $user->id], ['class' => 'btn btn-lg btn-warning text-white']) ?>
					</div>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>