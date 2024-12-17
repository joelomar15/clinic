<?php echo $this->extend('Plantilla/tema'); ?>
<?php echo $this->section("contenedor"); ?>



<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url() ?>template/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url() ?>template/select2/dist/select2-bootstrap4.css">

<div class="">
	<div class="row mb-3">
		<div class="col-12">
			<a href="<?= base_url() ?>ad/oferta" class="btn btn-info"><i class="fa fa-arrow-left"></i> Regresar</a>
		</div>
	</div>
	<form role="form" action="<?= base_url() ?>ad/oferta" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header bg-info text-white">Datos de la Oferta</div>
					<div class="card-body">
						<div class="form-group" style="padding-bottom: 3px;">
							<label>Selecione el Producto:</label>
							<select class="form-control select2" style="width: 100%;" name="producto">
								<option value="" selected="selected">...</option>
								<?php foreach ($producto as $pro): ?>
									<option value="<?php echo $pro['id']; ?>" <?php echo set_select('producto', $pro['id'], false); ?>>
										<?php echo $pro['nombre']; ?>&nbsp;&nbsp;&nbsp;
									</option>
								<?php endforeach; ?>
							</select>
							<p class="help-block" style="color:red;">
								<?php echo validation_show_error('producto'); ?>
							</p>
						</div>

						<div class="form-group">
							<label for="porcentaje">Porcentaje:</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-percent"></i></span>
								</div>
								<input type="text" class="form-control" id="porcentaje" name="porcentaje" value="<?php echo set_value('porcentaje') ?>">
							</div>
							<small class="text-danger"><?php echo validation_show_error('porcentaje'); ?></small>
						</div>
						<div class="form-group">
							<label for="descripcion">Descripción:</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-comment"></i></span>
								</div>
								<input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo set_value('descripcion') ?>">
							</div>
							<small class="text-danger"><?php echo validation_show_error('descripcion'); ?></small>
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
			placeholder: "Seleccione un Producto...",
			allowClear: true
		});
	});
</script>
</body>

</html>

<?php echo $this->endSection(); ?>