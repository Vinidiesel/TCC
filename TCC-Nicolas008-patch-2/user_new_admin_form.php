<center><div style="background-color: black; width: 50%; justify-content: center;"><h1>Novo usuário</h1>
<form action="user_new_admin.php" method="post">
<table>
<tr><td>Email: <td><input type="text" name="email" id="email" size="10">

<tr><td>Nome: <td><input type="text" name="nome" id="nome" size="30" maxlength="30">

<tr><td>Tipo: <td><select name="tipo" id="tipo">
<option value="1">Administrador</option>
<option value="2">Escritor</option>
</select>

<tr><td>Senha: <td><input type="password" name="senha1" id="senha1" size="10" maxlength="10">

<tr><td>Confirme Senha: <td><input type="password" name="senha2" id="senha2" size="10" maxlength="10">

<tr><td><input type="submit" value="Gravar Usuário">
</table>
</form>
</div></center>