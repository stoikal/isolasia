<?php
include __DIR__ . '/../../inc/options.php';
?>

<div
  class="h-11 px-2 flex items-center"
  style="--toggle-bg-color: <?= $he_color_text  ?>; --toggle-slider-color: <?= $he_color_bg  ?>"
>
  <label
    class="isolasia_toggle-label"
    style=""
  >
    <input
      class="isolasia_dark-mode-toggle-input"
      type="checkbox"
      checked
    >
    <span></span>
  </label>
</div>

