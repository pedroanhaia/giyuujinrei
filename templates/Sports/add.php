<div class="col-md-12 content">
	<h3> <?= $title ?> </h3>
	<div class="card">
		<div class="card-body">
			<?= $this->Form->create($sport, ['class' => 'form-material  mt-2']) ?>
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12">
						<label class="control-label text-muted"> Nome </label>
						<?= $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira o nome']) ?>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<label class="control-label text-muted"> idforeign </label>
						<?= $this->Form->control('idforeign', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Insira o idforeign']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-12">
						<label class="control-label text-muted"> Obs. </label>
						<?= $this->Form->control('obs1', ['class' => 'form-control', 'label' => false]) ?>
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