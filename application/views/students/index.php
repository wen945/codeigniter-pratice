<h2><?php echo $title ?></h2>

<?php foreach ($all_student as $student): ?>

        <h3><?php echo $student['name'] ?></h3>
        <div class="main">
                <?php echo $student['intro'] ?>

        

<?php endforeach ?>