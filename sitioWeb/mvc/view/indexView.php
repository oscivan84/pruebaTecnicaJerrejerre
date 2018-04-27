<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Prueba técnica</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <style>
            input{
                margin-top:5px;
                margin-bottom:5px;  
            }
            .right{
                float:right;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <form action="<?php echo $helper->url("usuarios", "accionSubirArchivo"); ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default" style="margin-top: 50px ">
                            <div class="panel-heading">GEMA SAS</div>
                            <div class="panel-body">
                                <h4>Formulario de carga de información</h4>   
                                <div class="row">
                                    <div class="col-md-12" style="float: right;">
                                        <input type="file"  name="info"  id="info">
                                        <span class="error" style="color: red"><?= isset($mensaje) ? $mensaje : "" ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="float: right;">
                                        <div style="float: right; ">
                                            <input type="submit" value="Enviar Formulario"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </form>
        </div>

    </body>
</html>