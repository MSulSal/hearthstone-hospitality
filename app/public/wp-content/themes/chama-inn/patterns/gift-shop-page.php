<?php
if (!defined("ABSPATH")) {
    exit;
}

return <<<'HTML'
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"52px","bottom":"52px","left":"20px","right":"20px"}},"color":{"background":"#f3ebdd"}},"layout":{"type":"constrained","contentSize":"1020px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f3ebdd;padding-top:52px;padding-right:20px;padding-bottom:52px;padding-left:20px"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em","fontSize":"13px"},"color":{"text":"#5f7a73"}}} -->
<p class="has-text-color" style="color:#5f7a73;font-size:13px;letter-spacing:0.12em;text-transform:uppercase">Gift Shop</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Shop local goods from your phone</h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Think of this as the inn's Etsy/Shopify-style guest shop, but inside the same stay app experience. Guests browse, add to cart, and checkout for pickup or drop-off.</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><li>Small curated catalog</li><li>Live in-stock visibility</li><li>Front desk fulfillment workflow</li></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"44px","bottom":"48px","left":"20px","right":"20px"}},"color":{"background":"#f7f4ee"}},"layout":{"type":"constrained","contentSize":"1080px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f7f4ee;padding-top:44px;padding-right:20px;padding-bottom:48px;padding-left:20px"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Featured collection</h2>
<!-- /wp:heading -->

<!-- wp:html -->
<div class="chama-order-grid">
  <article class="chama-order-card">
    <h3>Chama Rail Mug</h3>
    <p class="chama-order-meta">Matte ceramic mug with station-inspired crest.</p>
    <p class="chama-order-price">$18</p>
    <div class="chama-order-actions wp-block-buttons">
      <div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Add to cart</a></div>
    </div>
  </article>
  <article class="chama-order-card">
    <h3>Station Inn Canvas Tote</h3>
    <p class="chama-order-meta">Natural canvas tote, ideal for train-day essentials.</p>
    <p class="chama-order-price">$22</p>
    <div class="chama-order-actions wp-block-buttons">
      <div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Add to cart</a></div>
    </div>
  </article>
  <article class="chama-order-card">
    <h3>Blue Corn Cookie Tin</h3>
    <p class="chama-order-meta">House favorite snack pack for your room or trip home.</p>
    <p class="chama-order-price">$16</p>
    <div class="chama-order-actions wp-block-buttons">
      <div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Add to cart</a></div>
    </div>
  </article>
</div>
<!-- /wp:html -->

<!-- wp:separator -->
<hr class="wp-block-separator has-alpha-channel-opacity"/>
<!-- /wp:separator -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Travel essentials</h2>
<!-- /wp:heading -->

<!-- wp:html -->
<div class="chama-order-grid">
  <article class="chama-order-card">
    <h4>Phone Charging Cable</h4>
    <p class="chama-order-meta">Compatible cable for common devices.</p>
    <p class="chama-order-price">$10</p>
    <div class="chama-order-actions wp-block-buttons">
      <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">Add item</a></div>
    </div>
  </article>
  <article class="chama-order-card">
    <h4>Emergency Toiletry Kit</h4>
    <p class="chama-order-meta">Travel-size basics in a compact zip pouch.</p>
    <p class="chama-order-price">$7</p>
    <div class="chama-order-actions wp-block-buttons">
      <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">Add item</a></div>
    </div>
  </article>
  <article class="chama-order-card">
    <h4>Sleep Mask + Earplug Set</h4>
    <p class="chama-order-meta">Comfort set for deeper rest.</p>
    <p class="chama-order-price">$8</p>
    <div class="chama-order-actions wp-block-buttons">
      <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">Add item</a></div>
    </div>
  </article>
  <article class="chama-order-card">
    <h4>Mountain Honey Jar</h4>
    <p class="chama-order-meta">Local small-batch honey.</p>
    <p class="chama-order-price">$14</p>
    <div class="chama-order-actions wp-block-buttons">
      <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">Add item</a></div>
    </div>
  </article>
</div>
<!-- /wp:html -->

<!-- wp:group {"className":"chama-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group chama-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Cart summary (demo)</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>Chama Rail Mug x1 - $18</li><li>Blue Corn Cookie Tin x1 - $16</li><li>Phone Charging Cable x1 - $10</li></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p><strong>Estimated total:</strong> $44</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Checkout cart</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">Set front desk pickup</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
HTML;
