<?php require 'includes/head.php' ?>
<?php require 'includes/top-nav.php' ?>
<?php require 'includes/header.php' ?>
<main class="mx-auto max-w-7xl py-6 px-8">

    <div class="lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8">
        <div class="flex w-full">
            <img src="<?= $product->image ?>" title="" <?= $product->name ?> alt="Image of product: <?= $product->name ?>" class="w-full h-full object-cover object-center rounded-lg shadow-lg" />
        </div>

        <div>
            <div class="mt-10 px-4">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900">
                    <?= $product->name ?>
                </h2>

                <div class="mt-3">
                    <p class="text-3xl tracking-tight text-gray-800">
                        <?= format_money($product->price) ?>
                    </p>
                </div>

                <div class="mt-6">
                    <div class="space-y-6 text-base text-gray-700">
                        <p><?= $product->description ?></p>
                    </div>
                </div>

                <div class="mt-6 flex">
                    <button class="max-w-xs bg-gray-800 hover:bg-gray-700 text-base text-white font-medium focus:ring-gray-800 focus:ring-2 focus:ring-offset-2 px-4 py-2 rounded-lg">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>

</main>
<?php require 'includes/foot.php' ?>
