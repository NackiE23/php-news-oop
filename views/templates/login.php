<h1>Login Page</h1>

<form class="form" action="/login" method="POST">
    <div class="form_case">
        <label class="form_case_label" for="email_field">Email: </label>
        <input type="email" id="email_field" name="email" required>
    </div>
    <div class="form_case">
        <label class="form_case_label" for="password_field" required>Password: </label>
        <input type="password" id="password_field" name="password">
    </div>

    <input type="submit" value="Log In">
</form>
