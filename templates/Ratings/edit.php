<div class="col-md-12 content">
	<h3> <?= $title ?> </h3>
	<div class="card" >
		<div class="card-body">
			<?= $this->Form->create($index, ['class' => 'form-material  mt-2']) ?>
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12">
						<label class="control-label text-muted"> Nome </label>
						<?= $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira o nome']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label class="control-label text-muted"> Idade mínima </label>
						<?= $this->Form->control('age_min', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira a idade mínima']) ?>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label class="control-label text-muted"> Idade máxima </label>
						<?= $this->Form->control('age_max', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira a idade máxima']) ?>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label class="control-label text-muted"> Área </label>
						<?= $this->Form->control('idrating', ['class' => 'form-control ', 'label' => false, 'required' => true, 'options' => $ratings, 'title' => 'Selecione a área']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?= $this->Form->button('Salvar dojô', ['class' => 'btn btn-success btn-lg']) ?>
					</div>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>