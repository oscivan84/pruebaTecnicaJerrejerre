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
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default" style="margin-top: 50px ">
                        <div class="panel-heading">GEMA SAS</div>
                        <div class="panel-body">
                            <a href="<?= $helper->url("usuarios", "accionSubirArchivo"); ?>"><< Volver</a>
                            <div class="row">
                                <div class="col-md-12" style="float: right;">
                                    <h4>Usuarios Activos</h4>
                                    <table  class="table table-bordered">
                                        <thead>
                                        <th>Email</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($usuariosActivos as $key => $value) {
                                                echo '<tr>';
                                                echo '<td>' . $value->email . '</td>';
                                                echo '<td>' . $value->nombre . '</td>';
                                                echo '<td>' . $value->apellido . '</td>';
                                                echo '</tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="float: right;">
                                    <h4>Usuarios Inactivos</h4>
                                    <table  class="table table-bordered">
                                        <thead>
                                        <th>Email</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($usuariosInactivos as $key => $value) {
                                                echo '<tr>';
                                                echo '<td>' . $value->email . '</td>';
                                                echo '<td>' . $value->nombre . '</td>';
                                                echo '<td>' . $value->apellido . '</td>';
                                                echo '</tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="float: right;">
                                    <h4>Usuarios en Espera</h4>
                                    <table  class="table table-bordered">
                                        <thead>
                                        <th>Email</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($usuariosEspera as $key => $value) {
                                                echo '<tr>';
                                                echo '<td>' . $value->email . '</td>';
                                                echo '<td>' . $value->nombre . '</td>';
                                                echo '<td>' . $value->apellido . '</td>';
                                                echo '</tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </body>
</html>