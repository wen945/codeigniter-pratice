<h2><?php echo $title ?></h2>

<?php foreach ($all_member as $member): ?>

        <h3><?php echo $member['member_name'] ?></h3>
        <div class="main">
                <?php 
                        echo '帳號:'. $member['member_acct'];
                        echo '密碼:'.$member['member_pawd'];
                        echo '新增日期:'.$member['system_cdate']; 
                        // echo $member['system_id'];                
                ?>
        <!-- </div> 
        <p><a href="members/<?php echo $member['system_id'] ?>">View details</a></p> -->

<?php endforeach ?>

