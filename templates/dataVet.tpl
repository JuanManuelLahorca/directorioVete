{include file='templates/header.tpl'}
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
  <title>Directorio Veterinario</title>
</head>
<body>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
<nav class="navbar">
</nav> 
<div id="navbarNav" class="conteiner-ulnav">
  <ul class="ulnav">
      <li class="nav-item">
        <a class="nav-link" href="home">Cerrar Sesión</a>
      </li>  
  </ul> 
</div>
 <button class="btn-menu" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-expanded="false" aria-controls="collapseExample"><i class="fa-solid fa-bars"></i></button>
 <div id="menu" class="collapse navbar-collapse">
  <ul class="ul-collapse">
      <li class="nav-item">
        <a class="nav-link" href="">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login">Iniciar Sesión</a>
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="showCreateVet">Registrarse</a>
      </li>
  </ul> 
</div>   
  <h1>Ingreso exitoso</h1>
  {if $user->Role !== "a" } 
    <div class="conteiner-list-dataVet">
      <div class="list-dataVet">
        <h3>Datos del usuario registrado</h3>
        <p>Nombre y Apellido : {$user->Name}</p>
        <p>Provincia : {$user->State}</p>
        <p>Localidad : {$user->City}</p>
        <p>Numero de telefono : {$user->Phone}</p>
        <p>Mail registrado : {$user->Mail}</p>
        <a href="goUpdateVet/{$user->id_Professional}"  class="btn_busc">Modificar datos</a>
      </div>
    </div>
  {else} 
    <div class="conteiner-tableDelete">
      <table class="table-deleteVet">
          <tr scope="col">
              <th>Nombre Completo</th>
              <th>Estado/ Provincia</th>
              <th>Ciudad</th>
              <th>Telefono</th>
              <th>Mail</th>
              <th>Borrar</th>
              <th>Modificar</th>
              <th>Publicar</th>
              <th>Ocultar</th>
          </tr>
          <tr>
              {foreach from=$vets item=$vet}
                  <tr>    
                      <td> {$vet->Name} </td>
                      <td> {$vet->State} </td>                           
                      <td> {$vet->City} </td>                           
                      <td> {$vet->Phone} </td>
                      <td> {$vet->Mail} </td>
                      <td> <a class="btn btn-danger" href="deleteVet/{$vet->id_Professional}">Borrar</a></td>                
                      <td> <a class="btn btn-success" href="goUpdateVetByAdmin/{$vet->id_Professional}">Modificar</a></td> 
                      <td> <a class="btn btn-primary" href="PublicOnVet/{$vet->id_Professional}">Publicar</a></td>                
                      <td> <a class="btn btn-dark" href="PublicOffVet/{$vet->id_Professional}">Ocultar</a></td>                                        
                  </tr>
              {/foreach}
          </tr> 
      </table>
    </div>        
  {/if}
  <script src="./js/dataVet.js"></script>

   <footer> 
    <script src="./js/btn-menu.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>   
    <div class="primer-footer">   
      <p><a href="home" class="link-primerfooter"><i class="fa-solid fa-user-check"></i> Cerrar Sesión  </a> | <a href="bases" class="link-primerfooter"><i class="fa-solid fa-file-circle-exclamation"></i> Reglamentación </a></p>
    </div> 
    <div class="segundo-footer"> 
        <p>Seguinos en nuesras redes</p>     
        <a href="https://www.linkedin.com/" target="_blank" class="link-segundofooter"><i class="fab fa-linkedin-in"></i></a>
        <a href="https://www.facebook.com/" target="_blank" class="link-segundofooter"><i class="fa-brands fa-facebook-square"></i></a>
        <a href="https://www.instagram.com/" target="_blank" class="link-segundofooter"><i class="fab fa-instagram"></i></a>
    </div>   
    <div class="tercer-footer">
      <p>© 2022 Copyright - </p><a href="home" class="link-tercerfooter">Directorio Veterinario</a><p> - Todos los derechos reservados</p>
    </div>  
  </footer>
</body>
</html>
 