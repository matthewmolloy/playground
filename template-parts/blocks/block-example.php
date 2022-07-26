<?php

// Block example

$id = 'block-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$block_classes = '';

?>

<div class="<?php echo $block_classes ?>" id="<?php echo esc_attr($id); ?>">
    <div class="container">
    </div>
</div>