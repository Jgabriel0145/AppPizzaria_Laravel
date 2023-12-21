<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        body{
            padding: 1%;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    <form action="{{ route('login.autenticar') }}" method="post">@csrf
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="senha" placeholder="Senha">

        <button type="submit">Login</button>
    </form>

    
    <h5>
        Para entrar a primeira vez use:<br> 
        Email -> admin@gmail.com<br>
        Senha -> admin
    </h5>

</body>
</html>