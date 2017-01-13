<?php
$prev =  get_previous_posts_link();
$next = get_next_posts_link();
if (!empty($prev) || !empty($next)):
?>

    <div class="section is-wide">
        <?php if (!empty($prev)):?>
            <div class="is-pulled-left button is-primary is-outlined"><?=$prev?></div>
        <?php endif;?>
        <?php if (!empty($next)):?>
            <div class="is-pulled-right button is-primary is-outlined"><?=$next?></div>
        <?php endif;?>
    </div>

<?php endif;?>