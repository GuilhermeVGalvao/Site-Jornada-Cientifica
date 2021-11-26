<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="style_cadastro.css">
  <title>Login</title>
</head>
<body>
<div class="container flex flex-column flex-justify-center" id="background-div">
    <div class="container flex flex-column" id="cadastro-frame">
      <h1>Login de Administrador</h1>
      <form action="#" method="post">
        

        <div>
          <label for="email">email: </label>
          <input type="email" id="email" name="email" class="text" 
          placeholder="Digite seu email" requered>
        </div>
        
        <div>
          <label for="senha">Senha: </label>
          <input type="text" id="senha" name="senha" class="text" 
          placeholder="Digite sua senha" requered>
        </div>
        <div><button type="submit">Enviar</button></div>
      </form>
    </div>
  </div>
</body>
</html>