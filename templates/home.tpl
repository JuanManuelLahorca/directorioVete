{include file='templates/header.tpl'}
{*
<button><a class="btn btn-danger" href="homeUser">Loguearse</a></button>

    

*}

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <title>Directorio Veterinario</title>
</head>
<body>
    {include file='templates/navbar.tpl'}
    <section class="listado">
        <p id="title-table-vets"></p>
        <table id="table-vets" class="table-vets">
        </table> 
    </section>   
    <section id= "primera" class="primera">
        <div id="buscador" class="centrado">     
            <form action="" class="form_busc"> 
                <h1>Buscador por localidad</h1>
                <label for="provincia">Provincia (Obligatorio)</label>
                <input type="text" id="provincia" name="provincia" placeholder="ej: Buenos Aires" class="input_busc">
                <label for="localidad-obligatorio">Localidad (Obligatorio - </label>
                <label for="localidad-correcto">Tipear correctamente para fitrar)</label>
                <input type="text" id="localidad" name="localidad" placeholder="ej: Tandil" class="input_busc">
                <button id="btn-submit" type="submit" value="Buscar" class="btn_busc">Buscar</button>
            </form>
        </div>
        <div id="boton" class="boton">
            <h1>¿Querés formar parte de Directorio Veterinario?</h1>
            <p>Si sos profesional y querés formar parte del listado de urgencias de Directorio Veterinario, hacé click en el botón 
                <strong>Registrarse</strong>, completá el formulario y nos ponemos en contacto con vos.</p>
            <button class="btn_registro">
                <a href="showCreateVet">Registrarse</a>
            </button>
        </div>
    </section>
  
    <section class="caja-mapa">
        <h1>Mapa de veterinarios disponibles</h1>
        <h2>Otra manera de encontrar al veterinario más cercano</h2>
        <div class="mapa">
        <iframe src="https://www.google.com/maps/d/embed?mid=1X_SXOqSXjR-ebcJTGBxE-izOp42lmamW&ehbc=2E312F" width="460" height="320"></iframe>
        </div>
    </section>

    
    <script src="./js/app.js"></script>
{include file='templates/footer.tpl'}







