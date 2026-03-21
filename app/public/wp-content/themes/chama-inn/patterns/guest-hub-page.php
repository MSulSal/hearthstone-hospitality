<?php
if (!defined("ABSPATH")) {
    exit;
}

return <<<'HTML'
<!-- wp:group {"align":"full","className":"chama-guest-hub-intro","style":{"spacing":{"padding":{"top":"48px","bottom":"48px","left":"20px","right":"20px"}},"color":{"background":"#e8ddcc"}},"layout":{"type":"constrained","contentSize":"940px"}} -->
<div class="wp-block-group alignfull chama-guest-hub-intro has-background" style="background-color:#e8ddcc;padding-top:48px;padding-right:20px;padding-bottom:48px;padding-left:20px"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">Guest Hub</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Choose what you need right now. Each action opens directly into the matching stay workflow.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"36px","bottom":"56px","left":"20px","right":"20px"}},"color":{"background":"#f7f4ee"}},"layout":{"type":"constrained","contentSize":"1080px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f7f4ee;padding-top:36px;padding-right:20px;padding-bottom:56px;padding-left:20px"><!-- wp:shortcode -->
[chama_guest_action_grid]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
HTML;
