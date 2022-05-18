<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>OEIT - DIRESA</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta name="description" content="PAGINA DIRESA PASCO">
        <meta name="keywords" content="OEIT DIRESA-PASCO">
        <link rel="shortcut icon" href="./img/logo.jpg">

        <!-- bootstrap -->
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

        <!-- estilos css -->
        <link rel="stylesheet" href="{{ asset('./css/estilos.css') }}"/>
        <link rel="stylesheet" href="{{ asset('./css/style.css') }}"/>

        <!-- link para iconos -->
        <link rel="stylesheet" href="./css/materialdesignicons.min.css">

        <!-- VUE -->
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

        <!-- JQUERY -->
        <script src="./js/jquery-3.6.0.min.js"></script>

        <!-- notificaciones toastr -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    </head>
    <body>
        <img class="fond" src="img/ag.png">
        <div class="content" id="appVaccine"><br>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                        <img src="img/diresa.png" alt="Imagen de Usuario" style="width: 100%;">
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="img/LOGOCV.png" style="width: 50%;"><br>
                        <div v-show="view"><br>
                            <h2 class="title_welcome">Bienvenido</h2>
                            <div class="mt-4 mb-4">
                                <img src="{{ asset('img') }}/btnDni.png" width="50%" id="searchDni" @click="searchDni" role="button">
                            </div>
                            <div class="mt-5 mb-4">
                                <img src="{{ asset('img') }}/btnQr.png" width="50%" id="searchDni" @click="searchDni" role="button">
                            </div>
                        </div>
                        <div v-show="!view">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10 text-end mt-4">
                                    <div class="card">
                                        <div class="card-body p-2 border border-primary">
                                            <form method='post' id="generador">
                                                <div class="row">
                                                    <div class="col-md-8 filter_fed mb-2 mt-1">
                                                        <input class="form-control validanumericos" type="text" name="documento" id="documento" placeholder="Ingrese su dni..." maxlength="12" v-model="buscador" @keyup="searchVaccine">
                                                    </div>
                                                    <div class="col-md-4 mt-1 p-0">
                                                        <div class="d-flex justify-content-center">
                                                            <button class="btn btn-primary btn-sm m-1" type="button" id="btnBuscarVacuna" @click="searchVaccine"> Buscar</button>
                                                            <button class="btn btn-secondary btn-sm m-1" type="button" id="clearV"> Limpiar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1 mt-4">
                                    <button class="btn btn-outline-danger rounded-circle mt-3" @click="back"><span class="mdi mdi-backburger"></span></button>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-1"></div>
                                <div class="col-md-10 mt-3 mb-4">
                                    <div class="vacunas_covid">
                                        <div class="card" style="box-shadow: 10px 10px 4px 0 rgba(0, 0, 0, 20%);">
                                            <div class="card-body">
                                                <div style="background: #3c82e9; width: 92%; height: 5em; position: absolute;"></div>
                                                <div class="text-center mt-2" style="margin-left: 135px;">
                                                    <b class="img-covid position-relative">Mis Vacunas Contra la Covid-19</b>
                                                </div>
                                                <div class="row position-relative text-start" v-for="(format, index) in listaVacunas">
                                                    <div class="col-md-5 text-center">
                                                        <img src="./img/profile_woman.png" class="img-user mb-2" alt="Imagen Usuario" width="100">
                                                        <h6 class="text-primary">DNI: [[ format.NUM_DOC ]] </h6>
                                                    </div>
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-6 p-2 mt-3">
                                                        <p class="font-17 mb-1"><b>Primera Dosis</b></p>
                                                        <p class="font-11 m-0"><b>Fecha: </b>[[ format.PRIMERA ]]</p>
                                                        <p class="font-11 m-0"><b>Fabricante: </b>[[ format.PRIMERA_FAB ]]</p>
                                                        <p class="font-11 m-0"><b>Grupo de Riesgo: </b>[[ format.PRIMERA_GRUPO ]]</p>
                                                    </div>
                                                    <div class="col-md-6 p-2">
                                                        <p class="font-17 mb-1"><b>Segunda Dosis</b></p>
                                                        <p class="font-11 m-0"><b>Fecha: </b>[[ format.SEGUNDA ]]</p>
                                                        <p class="font-11 m-0"><b>Fabricante: </b>[[ format.SEGUNDA_FAB ]]</p>
                                                        <p class="font-11 m-0"><b>Grupo de Riesgo: </b>[[ format.SEGUNDA_GRUPO ]]</p>
                                                    </div>
                                                    <div class="col-md-6 p-2">
                                                        <p class="font-17 mb-1"><b>Tercera Dosis</b></p>
                                                        <p class="font-11 m-0"><b>Fecha: </b>[[ format.TERCERA ]]</p>
                                                        <p class="font-11 m-0"><b>Fabricante: </b>[[ format.TERCERA_FAB ]]'</p>
                                                        <p class="font-11 m-0"><b>Grupo de Riesgo: </b>[[ format.TERCERA_GRUPO ]]</p>
                                                    </div>
                                                    <div class="col-md-6 p-2">
                                                        <p class="font-17 mb-1"><b>Cuarta Dosis</b></p>
                                                        <p class="font-11 m-0"><b>Fecha: </b>[[ format.CUARTA ]]</p>
                                                        <p class="font-11 m-0"><b>Fabricante: </b>[[ format.CUARTA_FAB ]]</p>
                                                        <p class="font-11 m-0"><b>Grupo de Riesgo: </b>[[ format.CUARTA_GRUPO ]]</p>
                                                    </div>
                                                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                                                        <img src="./img/temp/70969129.png" class="" alt="Imagen Usuario" width="100">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="./js/vue/base.js"></script>
        <script>
            $("#searchDni").click(function(){
                document.getElementById("documento").focus();
            });
        </script>
    </body>
</html>