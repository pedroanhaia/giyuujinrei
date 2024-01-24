<div class="col-md-12 content">
	<h3> <?= $title ?> </h3>
	<div class="card">
		<div class="card-body">
			<?= $this->Form->create($teacher, ['class' => 'form-material  mt-2']) ?>
				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label class="control-label text-muted"> Nome </label>
						<?= $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira o nome']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
						<label class="control-label text-muted"> Fone </label>
						<?= $this->Form->control('phone', ['class' => 'form-control', 'label' => false]) ?>
					</div>
					<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
						<label class="control-label text-muted"> RG </label>
						<?= $this->Form->control('rg', ['class' => 'form-control', 'label' => false]) ?>
					</div>
					<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
						<label class="control-label text-muted"> Tipo </label>
						<?= $this->Form->control('type', ['class' => 'form-control', 'label' => false]) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label class="control-label text-muted"> E-mail </label>
						<?= $this->Form->control('email', ['class' => 'form-control', 'label' => false]) ?>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label class="control-label text-muted"> Usuário </label>
						<?= $this->Form->control('iduser', ['class' => 'form-control', 'label' => false]) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?= $this->Form->button('Salvar professor', ['class' => 'btn btn-success btn-lg']) ?>
					</div>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>