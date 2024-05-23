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
    <title>Actualizar Empleado</title>
</head>
<body>
    <?= $navbar ?>
    <div class="cont"> 
        <div class="btnA">
            <a href="<?= base_url('employee/showEmployee')?>"><button>Atrás</button></a>
        </div>

        <div class="formC">
            <form class="form" action="<?= base_url('employee/update') ?>" method="POST" onsubmit="return comprobarActualizarEmp()">
            <div class="titleF">
                    <h2>Actualizar Empleado </h2>
                    <div class="line lineF"></div>
                </div>
                <div class="contenedorFor">
                    <div class="spaceF1">
                        <div class="input-g">
                            <div class="input-g1">
                                <label>Tipo de documento <br>
                                    <select name="tipoIde" required>
                                        <option  value="<?= $emp['TIPO_IDE'] ?>"><?= $emp['TIPO_IDE'] ?></option>
                                        <option value="TI">TI</option>
                                        <option value="CC">CC</option>
                                        <option alue="CE">CE</option>
                                    </select>
                                </label> 
                            </div>
                            <div class="input-g1">
                                <label>Número de documento<br>
                                    <input type="text" name="ide" value="<?= $emp['IDENTIFICATION'] ?>"  readonly>
                                </label> 
                            </div>
                        </div>
                        <div class="input-g">
                            <div class="input-g1">
                                <label>Nombre <br>
                                    <input type="text" name="name" value="<?= $emp['NAME'] ?>"  required >
                                </label>
                            </div>
                            <div class="input-g1">
                                <label>Apellido <br>
                                    <input type="text" name="lastname" value="<?= $emp['LASTNAME'] ?>"  required>
                                </label> 
                            </div>
                        </div>
                        
                        <div class="inputE">
                            <label>Email <br>
                                <input type="email"  name="email" value="<?= $emp['EMAIL'] ?>"  required>
                            </label> 
                        </div>
                        
                        <div class="input-g">
                            <div class="input-g1">
                                <label>Cargo  <br>
                                    <input type="text" name="position" value="<?= $emp['POSITION'] ?>"  required>
                                </label>
                            </div>
                    
                            <div class="input-g1">
                                <label>Área  <br>
                                    <input type="text" name="area" value="<?= $emp['AREA'] ?>"  required >
                                </label>
                            </div>
                        </div>
                       
                    </div>
                </div>
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