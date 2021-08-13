<h2><?php echo $title ?></h2>

<?php foreach ($all_member as $member): ?>

        <h3><?php echo $member['member_name'] ?></h3>
        <p><a href="view/<?php echo $member['number'] ?>">View details</a></p>

<?php endforeach ?>

