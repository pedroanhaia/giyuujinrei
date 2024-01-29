<?php
	use Cake\Routing\Router;
	echo $this->Html->css(['assessment.css']); 
?>
<?= $this->Form->create(null, ['class' => 'form-material  mt-2', 'id' => 'form-questions']) ?>
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
									<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-12 index">
										<div class="question">
											<label class='control-label' for="<?= $index->name ?>"> <?= ucfirst($index->name) ?>: </label>
											<input disabled class='input-range' type="range" name="assessment[<?= $assessment[$index->id]['id'] ?>]" id="<?= $index->id ?>" min="0" max="10" step="1" value="<?= $assessment[$index->id]['value'] ?>">
											<input type="text" name="assessment_value[<?= $index->id ?>]" value="<?= $assessment[$index->id]['value'] ?>" readonly>
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
			<?= $this->Html->link('Salvar avaliação', ['#'], ['class' => 'btn btn-success btn-submit-questions btn-lg float-right']) ?>
		</div>
	</div>
<?= $this->Form->end(); ?>
<script>
	$('.btn-submit-questions').hide();

	// Atualiza o valor do campo de texto com o valor do range
		$('input[type="range"]').on('input', function () {
			$(this).next('input[type="text"]').val($(this).val());
		});
	// Alterar 
		$('.btn-edit').click(function (e) {
			e.preventDefault();
			$('.btn-edit').hide();
			$('input').prop('disabled', false);
			$('.btn-submit-questions').show();
		});
	// Salvar 
		$('.btn-submit-questions').click(function (e) {
			e.preventDefault();
            $.ajax({
				url: "<?= Router::url([ 'controller' => 'Assessment', 'action' => 'questionsview', $idstudent, $idschedule], true); ?>",
                type: 'POST',
                dataType: 'json',
                data: $('#form-questions').serialize(),
                success: function (data) {
                    alert(data)
					$('#modal-questions').modal('toggle');
                },
                error: function (error) {alert(data)},
				beforeSend() { preLoadGira(1, 'Salvando avaliação...') },
				complete() { preLoadGira(0); }
            });
        });
	// 
</script>