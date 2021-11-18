<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estación Meteorológica</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,500;0,700;0,900;1,300;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Roboto:ital,wght@0,100;0,400;0,500;0,700;0,900;1,300;1,500;1,700;1,900&display=swap" rel="stylesheet">

    
    <!--    Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>

    <!-- Styles CSS -->
    <link rel="stylesheet" type="text/css" href="css/styles.css"> 
</head>
<body>
    <input type="hidden" id="sensorInput1"></input>
    <input type="hidden" id="sensorInput2"></input>
    <input type="hidden" id="sensorInput3"></input>
    

    <div class="container">
        <div class="d-flex justify-content-around align-items-center">
            <img class="utld-logo" src="img/utld.png" alt="UTLD Logo">
            <article class="title-article">
                <h1 class="title">Estación Meteorológica</h1>
            </article>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-4 mb-4">
                       <div class="card">
                           <div class="card-body">
                    <table style="width:100%" id="tablaDatos" class="table table-striped table-bordered">
                        <thead class="text-center">
                            <th>Id</th>
                            <th>Sensor1</th>
                            <th>Sensor2</th>
                            <th>Sensor3</th>
                            <th>Sensor4</th>
                            <th>Sensor5</th>
                            <th>Sensor6</th>
                            <th>Sensor7</th>
                            <th>Sensor8</th>
                            <th>Sensor9</th>
                            <th>Sensor10</th>
                        </thead>
        
                        <tbody>
                    
                        </tbody>
                    </table>
                   </div>
               </div> 
            </div>

        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      
      
    <!--    Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  
      
      
    <script>
      $(document).ready(function() {
        var tabla = '';
        cargarTabla();
        const href = window.location.search;
       
       
        
        if(href !== ''){
            const urlParams = new URLSearchParams(href);
	        const sensorGet1 = urlParams.get('sensor1');
            const sensorGet2 = urlParams.get('sensor2');
            const sensorGet3 = urlParams.get('sensor3');
            const sensorGet4 = urlParams.get('sensor4');
            const sensorGet5 = urlParams.get('sensor5');
            const sensorGet6 = urlParams.get('sensor6');
            const sensorGet7 = urlParams.get('sensor7');
            const sensorGet8 = urlParams.get('sensor8');
            const sensorGet9 = urlParams.get('sensor9');
            const sensorGet10 = urlParams.get('sensor10');

            $.ajax({
				url:"insert.php",
				method:"POST",
				//enviar el codigo o serie de la herramienta
				data:{sensor1: sensorGet1, sensor2: sensorGet2, sensor3: sensorGet3, sensor4: sensorGet4, sensor5: sensorGet5, sensor6: sensorGet6, sensor7: sensorGet7, sensor8: sensorGet8, sensor9: sensorGet9, sensor10: sensorGet10},
				success:function(data)
				{
                    console.log("Data agregada");
                    cargarTabla();
				},
		    });
        } 

    

        function cargarTabla(){
        tabla = $('#tablaDatos').DataTable({
            "destroy": "true",
            "ajax": {
                "url": "consulta.php",
                "dataSrc": ""
            },
            "columns": [
                {"data": "id"},
                {"data": "sensor1"},
                {"data": "sensor2"},
                {"data": "sensor3"},
                {"data": "sensor4"},
                {"data": "sensor5"},
                {"data": "sensor6"},
                {"data": "sensor7"},
                {"data": "sensor8"},
                {"data": "sensor9"},
                {"data": "sensor10"},
            ],
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Todavía no hay registros",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "Todavía no hay registros",
                "infoFiltered": "(filtered from _MAX_ registros totales)",
                "search": 'Buscar',
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
                }
            });
        }


        setInterval( function () {
            tabla.ajax.reload(null,false);
        }, 5000 );
       
      });

    </script>

    
</body>
</html>
<!-- Recibir datos GET -->


