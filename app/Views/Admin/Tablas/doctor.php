<?php echo $this->extend('Plantilla/tema'); ?>
<?php echo $this->section("contenedor"); ?>
<!-- /.box-header -->
<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="btn-group">
    <a id="link" href="<?= base_url() ?>ad/doctor/new" class="btn btn-info"><i class="fa fa-plus"></i> Nuevo
        Empleado</a>
</div>
<br><br>

<table id="example1" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
        <th>Nº</th>
            <th>Nombre</th>
            <th>Cédula</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Estado</th>
            <th>...</th>
        </tr>
    </thead>
    <tbody>
        <?php $cont = 0;
        foreach ($doctores as $doc):
            $cont++ ?>
            <tr>
                <td>
                    <?php echo $cont; ?>
                </td>
                <td>
                    <?php echo $doc["nombre"]; ?>
                </td>
                <td>
                    <?php echo $doc["cedula"]; ?>
                </td>
                <td>
                    <?php echo $doc["correo"]; ?>
                </td>
                <td>
                    <?php echo $doc["telefono"]; ?>
                </td>
                <td>
                    <p>
                        <?php if ($doc["estado"] == 0) { ?>
                            <span class="label label-danger">InActivo</span>
                        <?php } else { ?>
                            <span class="label label-success">Activo</span>
                        <?php } ?>
                    </p>
                </td>
                <td class="text-center">
                    <a href="<?= base_url() ?>/ad/doctor/<?php echo $doc["id"]; ?>/edit" class="btn btn-info"><i
                            class="fa fa-cog"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap 4 JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script>
    $('#example1').DataTable()
    $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
    })
</script>
<!-- /.box-body -->

<?php echo $this->endSection(); ?>