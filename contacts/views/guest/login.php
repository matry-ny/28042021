<?php

/**
 * @var array $errors
 */

?>
<main class="form-signin">
    <form method="POST">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input type="text"
                   name="login"
                   class="form-control"
                   id="floatingInput"
                   placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
            <?php if (array_key_exists('login', $errors)): ?>
                <span class="text-danger"><?= $errors['login'] ?></span>
            <?php endif ?>
        </div>
        <div class="form-floating">
            <input type="password"
                   name="password"
                   class="form-control"
                   id="floatingPassword"
                   placeholder="Password">
            <label for="floatingPassword">Password</label>
            <?php if (array_key_exists('password', $errors)): ?>
                <span class="text-danger"><?= $errors['password'] ?></span>
            <?php endif ?>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <p>or <a href="/guest/registration">register</a></p>
        <p class="mt-5 mb-3 text-muted">&copy; <?= date('Y') ?></p>
    </form>
</main>