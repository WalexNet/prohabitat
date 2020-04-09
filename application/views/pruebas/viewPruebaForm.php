<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <form action="http://prohabitat.com/Pruebas/upload" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <div class="form-group">
            <label for="inputNombre">Nombre</label>
            <input name="nombre" type="text" class="form-control" id="inputNombre">
            <small class="form-text text-muted">Nunca compartiremos sus datos con nadie mas</small>
        </div>
        <div class="form-group">
            <label for="inputApellido">Apellido</label>
            <input name="apellido" type="text" class="form-control" id="inputApellido">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label name="conforme" class="form-check-label" for="exampleCheck1">Seleccione</label>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Suba un archivo</label>
            <input name="archivoWal" class="form-control-file" type="file" size="20" id="exampleFormControlFile1"/>
        </div>
        
        <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    
</body>
</html>