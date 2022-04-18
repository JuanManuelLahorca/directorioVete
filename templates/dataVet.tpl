{include file='templates/header.tpl'}



  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
  <title>Directorio Veterinario</title>
</head>
<body>
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
<nav class="navbar">
  <div id="navbarNav">
    <ul class="ulnav">    
        <li class="nav-item">
          <a class="nav-link" href="logout">Cerrar sesión</a>
        </li>
    </ul>
  </div>
</nav>
<h1>Ingreso exitoso</h1>
{if $user->rol == "u" } 
  <div class="conteiner-list-dataVet">
    <div class="list-dataVet">
      <h3>Datos del usuario registrado</h3>
      <p>Nombre y Apellido : {$user->Name}</p>
      <p>Provincia : {$user->State}</p>
      <p>Localidad : {$user->City}</p>
      <p>Numero de telefono : {$user->Phone}</p>
      <p>Mail registrado : {$user->Mail}</p>
      <a href="goUpdateVet/{$user->id_Professional}">Modificar datos</a>
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
                    <td> <a class="btn btn-success" href="goUpdateVet/{$vet->id_Professional}">Modificar</a></td>                                         
                </tr>
            {/foreach}
        </tr> 
    </table>
  </div>        
{/if}
<script src="./js/dataVet.js"></script>
<footer>    
  <div class="primer-footer">      
    <section>   
      <a
        class="btn btn-primary btn-floating m-1"
        style="background-color: #333333;"
        href="logout"
        role="button"
        ><i class="fab fa-github">Cerrar sesión</i
      ></a>
    </section>    
  </div>   
  <div class="segundo-footer">
      <p>© 2022 Copyright: <a href="">Directorio Veterinario</a></p>
  </div>  
</footer>
 