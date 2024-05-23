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
    <title>Registro Nómina</title>
</head>
<body>
    <?= $navbar ?>
    <div class="cont"> 
        <div class="btnA">
            <a href="<?= base_url('employee/viewSalary/'.$id)?>"><button>Atrás</button></a>
        </div>

        <div class="formC formN">
            <form class="form" action="<?= base_url('employee/createSa') ?>" method="POST">
                <div class="titleF">
                    <h2>Registrar Nómina </h2>
                    <div class="line lineF"></div>
                </div>
                <div class="contenedorFor">
                    <div class="spaceF1">
                        <div class="input-g">
                            <div class="input-g1">
                                <label>Fecha Comienzo <br>
                                    <input type="date" name="dateStart" required>
                                </label> 
                            </div>
                            <div class="input-g1">
                                <label>Fecha Fin<br>
                                    <input type="date" name="dateEnd"  required>
                                </label> 
                            </div>
                        </div>
                
                        <div class="inputE">
                            <label>Pago <br>
                                <input type="number"  name="salary" required>
                            </label> 
                        </div>
                    </div>
                </div>
                <input type="hidden" name="identification" value="<?= $id ?>">
                <div class="btnForm">
                    <button type="submit">Registrar</button>
                </div>
            </form>
        </div>
    </div>
    <?= $footer ?>
</body>
</html>