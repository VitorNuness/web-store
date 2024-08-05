<?php require 'includes/head.php' ?>
<?php require 'includes/top-nav.php' ?>
<?php require 'includes/header.php' ?>
<main class="mx-auto max-w-7xl py-6 px-8">
    <h2 class="text-xl leading-6 font-bold text-gray-900">Products</h2>

    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-10">
        <?php foreach ($products as $product) : ?>
            <div class="p-4 bg-white rounded-lg shadow-md">
                <div class="relative">
                    <div class="relative h-72 w-full overflow-hidden rounded-lg">
                        <img src="<?= $product->image ?>" alt="Image of product: <?= $product->name ?>" class="w-full" />
                    </div>

                    <div class="relative mt-4">
                        <h3 class="text-sm font-medium text-gray-800">
                            <?= $product->name ?>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500 h-24 overflow-hidden hover:overflow-auto">
                            <?= $product->description ?>
                        </p>
                        <div class="mt-3 text-sm text-gray-800">
                            <?= format_money($product->price) ?>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="/product?id=<?= $product->id ?>" class="flex items-center justify-center rounded-md border-transparent bg-gray-200 hover:bg-gray-300 transition-all duration-15 px-8 py-2 text-sm font-medium">
                            Details
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>
<?php require 'includes/foot.php' ?>
