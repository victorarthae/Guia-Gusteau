<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Cadastro de Tarefa</title>
</head>
<body>
<form action="{!!URL::route('cadastro')!!}" method="post">
    <label for="name">Nome:</label>
    <input type="text" name="name">
    <label for="login">Login:</label>
    <input type="text" name="login">
    <label for="email">Email:</label>
    <input type="text" name="email">
    <label for="senha">Senha:</label>
    <input type="text" name="password">
    <label for="password_confirmation">Confirme a senha:</label>
    <input type="text" name="password_confirmation">
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    <input type="submit">
</form>
</body>
</html>