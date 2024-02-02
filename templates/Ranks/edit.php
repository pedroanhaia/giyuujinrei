<div class="col-md-12 content">
	<h3> <?= $title ?> </h3>
	<div class="card" >
		<div class="card-body">
			<?= $this->Form->create($rank, ['class' => 'form-material  mt-2']) ?>
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12">
						<label class="control-label text-muted"> Nome </label>
						<?= $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira o nome']) ?>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-12">
						<label class="control-label text-muted"> Cor </label>
						<?= $this->Form->control('color', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira a cor']) ?>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-12">
						<label class="control-label text-muted"> Esporte </label>
						<?= $this->Form->control('idsport', ['class' => 'form-control selectpicker', 'data-live-search', 'label' => false, 'required' => true, 'options' => $sports, 'title' => 'Selecione o esporte']) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<label class="control-label text-muted"> Descrição </label>
						<?= $this->Form->control('description', ['class' => 'form-control', 'label' => false, 'required' => true, 'placeholder' => 'Insira a descrição']) ?>
					</div>
				</div>
				<div class="row">
				<div class="col-lg-3 col-md-12">
						<label class="control-label text-muted"> Obs. 1 </label>
						<?= $this->Form->control('obs1', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Insira a obs']) ?>
					</div>
					<div class="col-lg-3 col-md-12">
						<label class="control-label text-muted"> Obs. 2 </label>
						<?= $this->Form->control('obs2', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Insira a obs']) ?>
					</div>
					<div class="col-lg-6 col-md-12">
						<label class="control-label text-muted"> Url Imagem </label>
						<?= $this->Form->control('urlimage', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Insira a url']) ?>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-12">
						<label class="control-label text-muted"> Status </label>
						<?=  $this->Form->input('inactive', ['label' => ['class' => 'control-label'], 'type' => 'radio', 'options' => [0 => 'Ativo', 1 => 'Inativo']]); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?= $this->Form->button('Salvar graduação', ['class' => 'btn btn-success btn-lg']) ?>
					</div>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>