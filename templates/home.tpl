{include file='templates/header.tpl'}
{*
<button><a class="btn btn-danger" href="homeUser">Loguearse</a></button>

    

*}

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <title>Directorio Veterinario</title>
</head>
<body>
    {include file='templates/navbar.tpl'}
       
    <section id= "primera" class="primera">
        <div id="buscador" class="centrado">     
            <form action="" class="form_busc"> 
                <h1>Buscador por localidad</h1>
                <label for="provincia">Provincia</label>
                <input type="text" name="provincia" placeholder="ej: Buenos Aires" class="input_busc">
                
                <label for="localidad">Localidad</label>
                <input type="text" name="localidad" placeholder="ej: Tandil" class="input_busc">
                <input type="hidden" name="latitud">
                <input type="hidden" name="longitud">
            
                <button type="submit" value="Buscar" class="btn_busc">Buscar</button>
            </form>
        </div>
        <div id="boton" class="boton">
            <h1>¿Querés formar parte de Directorio Veterinario?</h1>
            <p>Si sos profesional y querés formar parte del listado de urgencias de Directorio Veterinario, hacé click en el botón 
                <strong>Registrarse</strong>, completá el formulario y nos ponemos en contacto con vos.</p>
            <button class="btn_registro">
                <a href="showCreateVet" target="_blanck">Registrarse</a>
            </button>
        </div>
    </section> 
    <ul id="list-vets" class="list-vets">
    </ul>
    <div class="mapa">
        <h1>Mapa de veterinarios disponibles</h1>
        <h2>Otra manera de encontrar al veterinario más cercano</h2>
        <iframe src="https://www.google.com/maps/d/embed?mid=1X_SXOqSXjR-ebcJTGBxE-izOp42lmamW&ehbc=2E312F" width="460" height="320"></iframe>
    </div>

    
    <script src="./js/app.js"></script>
{include file='templates/footer.tpl'}







