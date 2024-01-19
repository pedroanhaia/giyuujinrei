<div class="col-md-12 content">
	<div class="card" >
		<div class="card-body">
			<?= $this->Form->create($assessment, ['class' => 'form-material  mt-2']) ?>
				<div class="row">
					<div class="col-lg-3 col-md-12">
						<label class="control-label text-muted"> Nome </label>
						<?= $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira o nome']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-12">
						<label class="control-label text-muted"> Idade mínima </label>
						<?= $this->Form->control('age_min', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira a idade mínima']) ?>
					</div>
					<div class="col-lg-3 col-md-12">
						<label class="control-label text-muted"> Idade máxima </label>
						<?= $this->Form->control('age_max', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira a idade máxima']) ?>
					</div>
					<div class="col-lg-3 col-md-12">
						<label class="control-label text-muted"> Área </label>
						<?= $this->Form->control('idrating', ['class' => 'form-control ', 'label' => false, 'required' => true, 'options' => $ratings, 'title' => 'Selecione a área']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-12">
						<div class="form-group">
							<label class="control-label text-muted"> Role </label>
							<?= $this->Form->control('role', ['class' => 'form-control', 'label' => false, 'required' => true, 'options' => C_RolesOptions]) ?>
						</div>
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