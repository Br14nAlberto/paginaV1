


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacen</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
</head>

    <style>
        table, th, td{
            border:1px solid;
        }

        table{
            width: 80%;
            border-collapse:collapse;
        }
    </style>
<body>

<div class="container py-3">

        <h2 class="text-center">Participantes</h2>

        <div class="row justify-content-end">
        <div class="col-auto">
            <a href="#" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#nuevoModal"> <i class="fa-solid fa-circle-plus"></i> Nuevo Registro</a>
        </div>
        </div>

        

        <div class="col-auto">
            <label for="num_registros" class="col-form-label">Mostrar: </label>
        </div>

        <div class="col-auto">
            <select name="num_registros" id="num_registros" class="form-select">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
        </div>

        <div class="col-auto">
            <label for="num_registros" class="col-form-label">registros</label>
        </div>

        <div class="col-4"></div>

    <form action="" method="post">
    <div class="col-auto">
        <label for="campo" class="col-form-label">Buscar</label>
    </div>
    <div class="col-auto">
        <input type="text" name="campo" id="campo">
    </div>
    </form>

    <p></p>

    <table class="table table-sm table-striped table-hover mt-4">
                <thead class="table-dark">
                    <th>ID</th>
                    <th>nombre</th>
                    <th>apellidos</th>
                    <th>edad</th>
                    <th>pulsera</th>
                    <th></th>
                    <th></th>
                </thead>

                <tbody id="content">

                </tbody>
    </table>

        <div class="row">
            <div class="col-6">
                <label id="lbl-total"></label>
            </div>

            <div class="col-6" id ="nav-paginacion"></div>
        </div>
</div>        
        <script>
            let paginaActual = 1

            getData(paginaActual)

            document.getElementById("campo").addEventListener("keyup", function(){
                getData(1)
            }, false)
            document.getElementById("num_registros").addEventListener("change", function(){
                getData(paginaActual)
            }, false)


            /*Peticion de AJAX */
            function getData(pagina){
                let input = document.getElementById("campo").value
                let num_registros = document.getElementById("num_registros").value

                let content = document.getElementById("content")

                if(pagina != null){
                    paginaActual = pagina
                }

                let url = "load.php"
                let formaData = new FormData()
                formaData.append('campo', input)
                formaData.append('registros', num_registros)
                formaData.append('pagina', paginaActual)

                fetch(url,{
                    method:"POST",
                    body: formaData
                }).then(response => response.json())
                .then(data => {
                    content.innerHTML = data.data
                    document.getElementById("lbl-total").innerHTML = 'Mostrando ' + data.totalFiltro +
                    ' de ' + data.totalRegistros + ' registros'
                    document.getElementById("nav-paginacion").innerHTML = data.paginacion
                }).catch(err => console.log(err))
            }

        </script>

<?php include 'nuevoModal.php';?>
<?php include 'editaModal.php';?>


        <script>
            let editaModal = document.getElementById('editaModal')

            editaModal.addEventListener('shown.bs.modal', event =>{
                let button = event.relatedTarget
                let id = button.getAttribute('data-bs-id')

                let inputId = editaModal.querySelector('.modal-body #ID') 
                let inputNombre = editaModal.querySelector('.modal-body #nombre') 
                let inputApellido = editaModal.querySelector('.modal-body #apellido') 
                let inputEdad = editaModal.querySelector('.modal-body #edad') 
                let inputPulsera = editaModal.querySelector('.modal-body #pulsera') 

                let url = "getParticipantes.php"
                let formData = new FormData()
                formData.append('id', id)

                fetch(url,{
                    method: "POST",
                    body:formData 
                }).then(response => response.json())
                .then(data => {

                    inputId.value = data.id
                    inputNombre.value = data.nombre
                    inputApellido.value = data.apeliido
                    inputEdad.value = data.edad
                    inputPulsera.value = data.pulsera

                }). catch(err => console.log(err))
/**me quede en el minuto 52:58 */
/**48:03 */
            })
        </script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html> 