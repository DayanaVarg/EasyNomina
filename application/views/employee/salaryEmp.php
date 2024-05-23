<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('./assets/css/easynomina.css') ?>">
    <link rel="stylesheet" href="<?= base_url('./assets/css/tabla.css') ?>">
	<link rel="stylesheet" href="<?= base_url('./assets/css/modal.css') ?>">
    <link rel="stylesheet" href="<?= base_url('./assets/css/navbar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('./assets/css/footer.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
    <link rel="shortcut icon" href="<?= base_url('./assets/img/easyNomina.png') ?>" type="image/x-icon">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/mobius1/vanilla-Datatables@latest/vanilla-dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/mobius1/vanilla-Datatables@latest/vanilla-dataTables.min.css">

    <title>Nóminas empleado</title>
</head>
<body>
    <?= $navbar ?>
    <div class="container">
        <?php  if (isset($error)): ?>
            <div id="errorAlert" class="alert ">
                <div class="alert-danger">
				    <span><?= $error?></span>
			    </div>
            </div>
	    <?php endif; ?>
	    <?php if ($msg = $this->session->flashdata('msg')): ?>
            <div id="successAlert"  class="alert ">
                <div class="alert-success">
				    <span><?= $msg ?></span>
			    </div>
            </div>
	    <?php endif; ?>
        <div class="spaceBtn1">
			<div class="botonespace">
				<a href="<?= base_url('employee/showEmployee') ?>">
        			<button  class="buttonR">Atrás</button>
				</a>
			</div>
		</div>

		<div class="spaceBtn2 btnOp">
			<div class="btnD">
				<a href="<?= base_url('employee/newSala/'.$id) ?>">
					<button>Agregar Nómina</button>
				</a>
			</div>
        </div>

        <div class="table tableV">       
        <table class="contT contTa" id="datat">
				<h1 class="titulo">Nóminas del empleado</h1>
				<thead >
					<tr>
                        <th>Identificación</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Pago</th>
                        <th colspan="2">Acciones</th>
					</tr>
				</thead>
					
				<tbody>
				<?php if (!empty($nom)){ ?>
					<?php foreach ($nom as $item): ?>
						<tr>
							<td><?= $item->IDENTIFICATION ?></td>
							<td><?= $item->NAME ?></td>
							<td><?= $item->LASTNAME ?></td>
							<td><?= $item->DATE_STAR ?></td>
			                <td><?= $item->DATE_END ?></td>
			                <td>$<?= $item->PAYMENT ?></td>
							<td><a href="<?= base_url('employee/updateSa/'.$item->ID_NOM.'/'.$item->IDENTIFICATION) ?>"><button class="button2 btnActu"><span>Editar</span></button></a></td>
							<td><a id="eliminarBtn" href="<?= base_url('employee/dropSa/'.$item->ID_NOM.'/'.$item->IDENTIFICATION) ?>"><button class="button2 btnelm" onclick="return comprobarEliminar()"><span>Eliminar</span></button></a></td>
							
						</tr>
					<?php endforeach; ?>
				<?php }else{?>
					<tr>
						<td colspan="7">No existen registros</td>
					</tr>
				<?php }?>
				</tbody>
			</table>
        </div>   
    </div>
    <?= $footer ?>
    <script>
		var datat=document.querySelector("#datat");
		var dataTable=new DataTable("#datat",{
			labels: {
				placeholder: "Busca por un campo...",
				noRows: "No se encontraron registros",
				perPage: "Motrar {select} registros por página",
				info: "Mostrando {start} a {end} de {rows} registros",
			}

		} ) ;
	</script>
	<script src="<?= base_url('./assets/js/validation.js') ?>"></script>
	<script src="<?= $script_url ?>"></script>
    <script>ajustarMargenes();</script>
</body>
</html>