<?php if (\Config\Services::validation()->getErrors()) {
?>
    <div class="alert alert-danger" role="alert">
        <?= \Config\Services::validation()->listErrors(); ?>
    </div>
<?php
}
?>

<form action="insertData" method="post">
    <div class="form-group">
        <div class="col-md-4 mb-3">
            <label for="nameInputLabel">Name:</label>
            <input type="text" class="form-control" id="nameInputLabel" name="name">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4 mb-3">
            <label for="emailInputLabel">E-mail:</label>
            <input type="text" class="form-control" id="emailInputLabel" name="email">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4 mb-3">
            <label for="passwdInputLabel">Password:</label>
            <input type="password" class="form-control" id="passwordInputLabel" name="password">
        </div>
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>