{include file='templates/header.tpl'}
{*
<div >
    <h2>{$titulo}</h2>    
    <form action="createVet" method="POST" class="container-login">
        <input type="text" name="name" id="name" placeholder="Nombre de Usuario" required>
        <input type="text" name="city" id="city" placeholder="ciudad" required>
        <input type="text" name="state" id="state" placeholder="provincia" required>
        <input type="int" name="contact" id="contact" placeholder="numero celular" required>
        <input type="submit" class="btn btn-primary" value="enviar">
    </form>
</div>
*}

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
    <title>Registro</title>
</head>
<body>
    {include file='templates/navbar.tpl'}
    <section id="registro" class="registro">  
        <div id="caja_izq" class="caja_izq"></div>           
        <div id="caja_reg" class="caja_reg">
            <h1 class="titleReg">Veterinarios de urgencias en grandes animales</h1>
            <form action="createNewVet" method="POST" class="form_reg">                
                <label for="nombre y apellido">Nombre y Apellido</label>
                <input type="text" name="name" class="input_busc" required>
                <label for="provincia">Provincia donde vivís</label>
                <input type="text" name="state" class="input_busc" required>
                <label for="ciudad">Ciudad donde vivís</label>
                <input type="text" name="city" class="input_busc" required>
                <label for="teléfono">Teléfono</label>
                <input type="tel" name="phone" class="input_busc" required>
                <label for="mail">Mail (con esto vas a tener un usuario)</label>
                <input type="text" name="mail" class="input_busc" required>
                <label for="password">Password (Contraseña de usuario)</label>
                <input type="password" name="pass" class="input_busc" required>
                <label for="terminos">¿Declarás que estás de acuerdo con hacer pública tu información de contacto?</label>
                <input type="radio" name="terms" value="si" required>
                <label for="si">Si</label>
                <label for="titulo">Título/Certificado de título en trámite/Matrícula</label>
                <input type="file" name="title" class="input_file" required>
                <label for="titulo">Al hacer click en "enviar datos" se aceptan los terminos y condiciones propuestos por este <a href="bases">documento</a> </label>
                <input type="hidden" name="rol" value="u" class="input_file" required>
                <button type="submit" name="enviar" value="enviar datos" class="btn_enviar">Enviar datos</button>
            </form>
        </div>
    </section>


{include file='templates/footer.tpl'}