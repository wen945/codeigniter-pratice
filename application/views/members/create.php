<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('members/create') ?>

    <label for="name">姓名:</label>
    <input type="input" name="member_name" /><br />

    <label for="acct">帳號:</label>
    <input type="input" name="member_acct" /><br />

    <label for="pawd">密碼:</label>
    <input type="input" name="member_pawd" /><br />

    <input type="submit" name="submit" value="新增" />

</form>