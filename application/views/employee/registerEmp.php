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
    <title>Nuevo Empleado</title>
</head>
<body>
    <?= $navbar ?>
    <div class="cont"> 
        <div class="btnA">
            <a href="<?= base_url('employee/showEmployee')?>"><button>Atrás</button></a>
        </div>

        <div class="formC">
            <form class="form" action="<?= base_url('employee/create') ?>" method="POST">
                <div class="titleF">
                    <h2>Registrar Empleado </h2>
                    <div class="line lineF"></div>
                </div>
                <div class="contenedorFor">
                    <div class="spaceF1">
                        <div class="input-g">
                            <div class="input-g1">
                                <label>Tipo de documento <br>
                                    <select name="tipoIde" required>
                                        <option >Seleccione una opción</option>
                                        <option value="TI">TI</option>
                                        <option value="CC">CC</option>
                                        <option alue="CE">CE</option>
                                    </select>
                                </label> 
                            </div>
                            <div class="input-g1">
                                <label>Número de documento<br>
                                    <input type="text" name="ide" pattern=".{9,10}"  required>
                                </label> 
                            </div>
                        </div>
                        <div class="input-g">
                            <div class="input-g1">
                                <label>Nombre <br>
                                    <input type="text" name="name" required >
                                </label>
                            </div>
                            <div class="input-g1">
                                <label>Apellido <br>
                                    <input type="text" name="lastname" required>
                                </label> 
                            </div>
                        </div>
                        
                        <div class="inputE">
                            <label>Email <br>
                                <input type="email"  name="email" required>
                            </label> 
                        </div>
                        
                        <div class="input-g">
                            <div class="input-g1">
                                <label>Cargo  <br>
                                    <input type="text" name="position" required>
                                </label>
                            </div>
                    
                            <div class="input-g1">
                                <label>Área  <br>
                                    <input type="text" name="area" required >
                                </label>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="btnForm">
                    <button type="submit">Registrar</button>
                </div>
            </form>
        </div>
    </div>
    <?= $footer ?>
</body>
</html>