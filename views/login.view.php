<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Inicio de Sesión</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="Views/css/style.css">

</head>
<body>
  <div class="container">
    <div class="login-form">
        <form action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> " method="post" name="login">
            <h2 class="text-center mb-3">Iniciar Sesión</h2>
            <div class="form-group mb-3">
                <input type="text" class="form-control" placeholder="Correo electrónico" name="area" >
            </div>
            <div class="form-group mb-3">
                <input type="password" class="form-control" placeholder="Contraseña" name="contraseña" >
            </div>
            <div class="text-center form-group mb-3">
                <button type="submit" class="btn btn-primary btn-block" onclick="login.submit()">Ingresar</button>
            </div>
            <?php
            if(!empty($errores)): ?>
                <div class="text-center form-group mb-3">

                    <?php  echo $errores; ?>

                </div>
            <?php endif;?>
            <div class="clearfix">
                <!--<label class="float-left form-check-label"><input type="checkbox"> Recordar</label>-->
                
            </div>


        </form>
        
    </div>
</div>

</body>
</html>
