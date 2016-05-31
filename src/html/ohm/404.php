<?php
/*  */

the_post();
$Azbn->post['id'] = get_the_ID();

get_header();

get_search_form();

get_footer();
