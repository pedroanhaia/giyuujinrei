<div class="row">
	<div class="col-12 text-center">
		<?= $this->Html->image($urlpicture, ['style' => 'max-height: 133px; max-width: 100px;'])?>
	</div>
</div>
<?php foreach ($ratings as $rating): ?>
	<div class="row">
		<div class="col-12">
			<?php if($studentAge <= $rating->age_max && $studentAge >= $rating->age_min) { ?>
				<div class="rating-group" id="rating<?= $rating->id ?>">
					<span class='rating-title'> <?= $rating->name ?> </span>
					<div class="row">
						<?php foreach ($rating->indexes as $index): ?>
							<?php if($studentAge <= $index->age_max && $studentAge >= $index->age_min) { ?>
								<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-xs-12 index">
									<div class="question">
										<label class='control-label' for="<?= $index->name ?>"> <?= ucfirst($index->name) ?>: </label>
										<input class='input-range' type="range" name="index[<?= $index->id ?>]" id="<?= $index->id ?>" min="0" max="10" step="1" value="5">
										<input type="text" name="index_value[<?= $index->id ?>]" value="5" readonly>
									</div>
								</div>
							<?php } ?>
						<?php endforeach; ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
<?php endforeach; ?>
<div class="row mt-5">
	<div class="col-12">
		<?= $this->Form->button('Salvar avaliação', ['class' => 'btn btn-success btn-lg float-right']) ?>
	</div>
</div>
<script>
	//  Atualiza o valor do campo de texto com o valor do range
		$('input[type="range"]').on('input', function () {
			$(this).next('input[type="text"]').val($(this).val());
		});
	// 
</script>