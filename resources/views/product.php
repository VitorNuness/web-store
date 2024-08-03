<?php require 'includes/head.php' ?>
<?php require 'includes/top-nav.php' ?>
<?php require 'includes/header.php' ?>
<main class="mx-auto max-w-7xl py-6 px-8">
    <h2 class="text-xl leading-6 font-bold text-gray-900">
        <?= $product->name ?>
    </h2>
    <?= format_money($product->price) ?>
</main>
<?php require 'includes/foot.php' ?>
