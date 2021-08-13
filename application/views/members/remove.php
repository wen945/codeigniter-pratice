<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('members/remove') ?>
    <label for="member_name">姓名:</label>
    <input type="input" name="member_name" /><br />

    <input type="submit" name="submit" value="刪除" />

</form>