<h1>Welcome to IntraPool</h1>
    <h4>Your companys carpooling service</h4>
<form action="login.php" method="POST" class="m-md-5">
    <div class="form-group">
    <label>Email:</label>
    <input class="form-control" type="text" name="username">
</div>
<div class="form-group">
    <label>Password:</label>
    <input class="form-control" type="password" name="password" id="password">
</div>
    <input class="btn btn-primary btn-md" id="loginButton" type="submit" value="Login">
    </form>
    <p>Not a user yet? Tap here to create a new account:</p>
    <input class="btn btn-success btn-lg" id="registerButton" type="button" value="Register" onclick="goRegister()">

<script>
    function goRegister() {
        window.location.href = '?p=register';
    }
</script>