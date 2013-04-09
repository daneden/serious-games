<h3>Profile Overview</h3>
    <img class="alignleft avatar" src="<?php get_profile_pic() ?>" width="48" height="48">
    <p class="standalone"><strong><?php get_user_fname(); ?> <?php get_user_sname(); ?></strong></p>
    <p><a href="/edit-profile.php">Edit profile/settings</a></p>
    <p class="standalone">Modules Completed: <?php get_modules_completed(); ?></p>
    <p>Average Score: <?php get_average_score(); ?>%</p>
    <p>Why not try...</p>
    <?php get_recommended(); ?>
    <hr>