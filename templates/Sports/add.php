<div class="col-md-12 content">
	<div class="card" >
		<div class="card-body">
			<?= $this->Form->create($sport, ['class' => 'form-material  mt-2']) ?>
				<div class="row">
					<div class="col-lg-3 col-md-12">
						<label class="control-label text-muted"> Nome </label>
						<?= $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira o nome']) ?>
					</div>
					<div class="col-lg-3 col-md-12">
						<label class="control-label text-muted"> idforeign </label>
						<?= $this->Form->control('idforeign', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira o idforeign']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-12">
						<label class="control-label text-muted"> Obs. </label>
						<?= $this->Form->control('obs1', ['class' => 'form-control', 'label' => false]) ?>
					</div>
					<div class="col-lg-4 col-md-12">
						<label class="control-label text-muted"> Role </label>
						<?= $this->Form->control('role', ['class' => 'form-control', 'label' => false, 'required' => true, 'options' => C_RolesOptions]) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?= $this->Form->button('Salvar esporte', ['class' => 'btn btn-success btn-lg']) ?>
					</div>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>