<form action="/" method="POST">
<input type="hidden" value = "<?PHP echo($CSRF_Token) ?>">
<label for="username">Username</label>
<input type="text" id="username" name="username">
<label for="password">Password</label>
<input type="password" id="password" name="password">
<input type="submit" value="submit">
</form>