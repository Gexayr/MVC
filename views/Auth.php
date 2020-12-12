<?php
require_once 'header.php'
?>
<div class="container">
    <form action="/login" class="col-md-6 offset-md-3" method="post">
        <div class="form-group">
            <label for="login">Login:</label>
            <input type="text" class="form-control" placeholder="Login" name="login" id="login">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" name="password" id="pwd">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php
require_once 'footer.php';
