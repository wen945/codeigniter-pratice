<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('members/create') ?>

    <label for="member_name">Title</label>
    <input type="input" name="member_name" /><br />

    <label for="text">Text</label>
    <textarea name="text"></textarea><br />

    <input type="submit" name="submit" value="Create news item" />

</form>