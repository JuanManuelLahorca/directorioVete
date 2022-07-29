{include file='templates/header.tpl'}

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
    <title>Editar registro</title>
</head>
<body>
{include file='templates/navbar.tpl'}
<h2> {$titulo}</h2>
<section id="registro" class="registro">  
    <div id="caja_izq" class="caja_izq"></div>           
    <div id="caja_reg" class="caja_reg">
        <h1>Complete el formulario con sus datos actualizados</h1>
        <form action="UpdateVetByAdmin" method="POST" class="form_reg" enctype="multipart/form-data"> 
            <input type="hidden" value="{$vet->id_Professional}" name="id_Vet" id="id_Vet" required>               
            <label for="nombre y apellido">Nombre y Apellido</label>
            <input type="text" name="name" class="input_busc" placeholder="{$vet->Name}" required>
            <label for="provincia">Provincia donde vivís</label>
            <input type="text" name="state" class="input_busc" placeholder="{$vet->State}"  required>
            <label for="ciudad">Ciudad donde vivís</label>
            <input type="text" name="city" class="input_busc" placeholder="{$vet->City}" required>
            <label for="teléfono">Teléfono (sin espacios) </label>
            <input type="tel" name="phone" class="input_busc" placeholder="{$vet->Phone}" required>
            <label for="mail">Mail (con esto vas a tener un usuario)</label>
            <input type="text" name="mail" class="input_busc" placeholder="{$vet->Mail}" required>
            <button type="submit" name="enviar" value="enviar datos" class="btn_enviar">Editar</button>
        </form>
    </div>
</section>
{include file='templates/footer.tpl'}