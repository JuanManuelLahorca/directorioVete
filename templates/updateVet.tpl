{include file='templates/header.tpl'}
<h2> {$titulo}</h2>
<section id="registro" class="registro">  
    <div id="caja_izq" class="caja_izq"></div>           
    <div id="caja_reg" class="caja_reg">
        <h1>Veterinarios de urgencias en grandes animales</h1>
        <form action="UpdateVet" method="POST" class="form_reg"> 
            <input type="hidden" value="{$vet->id_Professional}" name="id_Vet" id="id_Vet" required>               
            <label for="nombre y apellido">Nombre y Apellido</label>
            <input type="text" name="name" class="input_busc" placeholder="{$vet->Name}" required>
            <label for="provincia">Provincia donde vivís</label>
            <input type="text" name="state" class="input_busc" placeholder="{$vet->State}"  required>
            <label for="ciudad">Ciudad donde vivís</label>
            <input type="text" name="city" class="input_busc" placeholder="{$vet->City}" required>
            <label for="teléfono">Teléfono</label>
            <input type="tel" name="phone" class="input_busc" placeholder="{$vet->Phone}" required>
            <label for="mail">Mail (con esto vas a tener un usuario)</label>
            <input type="text" name="mail" class="input_busc" placeholder="{$vet->Mail}" required>
            <label for="password">Password (Contraseña de usuario)</label>
            <input type="password" name="pass" class="input_busc" placeholder="{$vet->Password}" required>
            <label for="terminos">¿Declarás que estás de acuerdo con hacer pública tu información de contacto?</label>
            <input type="radio" name="terms" value="si" required>
            <label for="si">Si</label>
            <label for="titulo">Título/Certificado de título en trámite/Matrícula</label>
            <input type="file" name="title" class="input_file" required>
            <label for="titulo">Al hacer click en "enviar datos" se aceptan los terminos y condiciones propuestos por este <a href="bases">documento</a> </label>
            <input type="hidden" name="rol" value="u" class="input_file" required>
            <button type="submit" name="enviar" value="enviar datos" class="btn_enviar">Editar</button>
        </form>
    </div>
</section>
{include file='templates/footer.tpl'}