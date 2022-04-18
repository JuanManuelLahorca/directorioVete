{include file='templates/header.tpl'}
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <title>Logueo</title>
</head>
<body>
    {include file='templates/navbar.tpl'}    
 <div>
    <div class="container-login">  
        <form action="verifyLogin" method="POST" class="container-form-login">
            <h1>Ingreso al sistema</h1>
                <label for="usuario">Mail de usuario</label>
                <input type="text" name="mail" id="mail" placeholder="Mail de Usuario" class="input-login" required>
                <label for="contraseña">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="Password" class="input-login"  required>
                <button type="submit" value="Login" class="btn_busc">Ingresar</button>
        </form>
    </div>
</div>
<h4>{$error} </h4>




{include file='templates/footer.tpl'}