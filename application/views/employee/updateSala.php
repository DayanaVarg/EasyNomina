<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('./assets/css/easynomina.css') ?>">
    <link rel="stylesheet" href="<?= base_url('./assets/css/navbar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('./assets/css/footer.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
	<link rel="shortcut icon" href="<?= base_url('./assets/img/easyNomina.png') ?>" type="image/x-icon">
    <title>Editar Nómina</title>
</head>
<body>
    <?= $navbar ?>
    <div class="cont"> 
        <div class="btnA">
            <a href="<?= base_url('employee/viewSalary/'.$id)?>"><button>Atrás</button></a>
        </div>

        <div class="formC formN">
            <form class="form" action="<?= base_url('employee/updateS') ?>" method="POST" onsubmit="return comprobarActualizarNom()">
                <div class="titleF">
                    <h2>Editar Nómina </h2>
                    <div class="line lineF"></div>
                </div>
                <div class="contenedorFor">
                    <div class="spaceF1">
                        <div class="input-g">
                            <div class="input-g1">
                                <label>Fecha Comienzo <br>
                                    <input type="date" name="dateStart" value="<?= $nom['DATE_STAR']?>" required>
                                </label> 
                            </div>
                            <div class="input-g1">
                                <label>Fecha Fin<br>
                                    <input type="date" name="dateEnd" value="<?= $nom['DATE_END']?>"   required>
                                </label> 
                            </div>
                        </div>
                
                        <div class="inputE">
                            <label>Pago <br>
                                <input type="number"  name="salary" value="<?= $nom['PAYMENT']?>" required>
                            </label> 
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?= $id?>">
                <input type="hidden" name="idSa" value="<?= $nom['ID_NOM']?>">
                <div class="btnForm">
                    <button type="submit">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="<?= base_url('./assets/js/validation.js') ?>"></script>
    <?= $footer ?>
</body>
</html>