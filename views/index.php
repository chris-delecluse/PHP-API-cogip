<?php $title = "home" ?>
<?php ob_start() ?>

    <main class="h-screen w-full bg-[#1A2238]">
        <h1 class="text-center pt-20 text-5xl text-[#FF6A3D]">Cogip API by chris</h1>
    </main>

<?php $content = ob_get_clean() ?>
<?php require('layouts/layout.php') ?>