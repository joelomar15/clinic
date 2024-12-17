<?php echo $this->extend('Plantilla/tema'); ?>
<?php echo $this->section("contenedor"); ?>



<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url() ?>template/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url() ?>template/select2/dist/select2-bootstrap4.css">

<div class="">
	<div class="row mb-3">
		<div class="col-12">
			<a href="<?= base_url() ?>ad/asignar" class="btn btn-info"><i class="fa fa-arrow-left"></i> Regresar</a>
		</div>
	</div>
	<form role="form" action="<?= base_url() ?>ad/asignar" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header bg-info text-white">Datos de la Asignación</div>
					<div class="card-body">
						<div class="form-group" style="padding-bottom: 3px;">
							<label>Selecione el Doctor:</label>
							<select class="form-control select2" style="width: 100%;" name="doctor">
								<option value="" selected="selected">...</option>
								<?php foreach ($doctor as $doc): ?>
									<option value="<?php echo $doc['id']; ?>" <?php echo set_select('doctor', $doc['id'], false); ?>>
										<?php echo $doc['nombre']; ?>&nbsp;&nbsp;&nbsp;
									</option>
								<?php endforeach; ?>
							</select>
							<p class="help-block" style="color:red;">
								<?php echo validation_show_error('doctor'); ?>
							</p>
						</div>
						<div class="form-group" style="padding-bottom: 3px;">
							<label>Selecione el Horario:</label>
							<select class="form-control select2" style="width: 100%;" name="horario">
								<option value="" selected="selected">...</option>
								<?php foreach ($horario as $hor): ?>
									<option value="<?php echo $hor['id']; ?>" <?php echo set_select('horario', $hor['id'], false); ?>>
										<?php echo $hor["hora_inicio"]." / ".$hor["hora_fin"]; ?>&nbsp;&nbsp;&nbsp;
									</option>
								<?php endforeach; ?>
							</select>
							<p class="help-block" style="color:red;">
								<?php echo validation_show_error('horario'); ?>
							</p>
						</div>
					</div>
				</div>
				<div class="text-center mt-3">
					<button type="submit" class="btn btn-info"><i class="fa fa-plus"></i> Agregar Nuevo</button>
				</div>
			</div>
		</div>
	</form>
</div>

<?php echo $this->endSection(); ?>

<?php echo $this->section("scripts"); ?>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>template/select2/dist/js/select2.full.min.js"></script>

<script>
	$(document).ready(function() {
		$('.select2').select2({
			placeholder: "Seleccione un Doctor...",
			allowClear: true
		});
	});
</script>
</body>

</html>

<?php echo $this->endSection(); ?>