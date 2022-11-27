<h1>Create News</h1>

<form class="form" action="/news/create" method="POST">
    <div class="form_case">
        <!-- <label class="form_case_label" for="title_field">Title: </label> -->
        <input type="text" id="title_field" name="title" placeholder="Title">
    </div>
    <div class="form_case">
        <!-- <label class="form_case_label" for="main_text_field">Main text: </label> -->
        <textarea name="main_text" id="main_text_field" cols="30" rows="10" placeholder="Main Text"></textarea>
    </div>

    <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?>">
    <input type="submit" value="Create news">
</form>
