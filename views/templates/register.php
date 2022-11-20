<h1>Register Page</h1>

<form class="form" action="/register" method="POST">
    <div class="form_case">
        <label class="form_case_label" for="email_field">Email: </label>
        <input type="email" id="email_field" name="email">
    </div>
    <div class="form_case">
        <label class="form_case_label" for="username_field">Username: </label>
        <input type="text" id="username_field" name="username">
    </div>
    <div class="form_case">
        <label class="form_case_label" for="password_field">Password: </label>
        <input type="password" id="password_field" name="password">
    </div>
    <div class="form_case">
        <label class="form_case_label" for="password_confirm_field">Password confirm: </label>
        <input type="password" id="password_confirm_field" name="password_confirm">
    </div>

    <input type="submit" value="Register">
</form>