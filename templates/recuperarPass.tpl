{include file='templates/header.tpl'}
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <title>Logueo</title>
</head>
<body>
    {include file='templates/navbar.tpl'}    
 <div>
    <div class="container-login">  
        <form action="GenerarPass" method="POST" class="container-form-login">
            <h1>Recupero de Contraseña</h1>
                <label for="usuario">Mail de usuario</label>
                <input type="text" name="mail" id="mail" placeholder="Mail de Usuario" class="input-login" required>
                <button type="submit" value="Login" class="btn_busc">Enviar Nueva Contraseña</button>
        </form>
    </div>
</div>
{include file='templates/footer.tpl'}