<?php
$config = file_get_contents(__DIR__ . '/php/config.json');
$config = json_decode($config);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Met MS naar de TOP</title>
    <link type="text/css" rel="stylesheet" href="./assets/css/output.css?<?= time() ?>">
</head>
<body class="flex justify-center align-middle bg-[#f8fafc] h-screen">
    <div class="h-full w-full absolute top-0 left-0 right-0 bottom-0 opacity-25" style="background-image: url(./assets/img/bg-page.jpg);"></div>

    <div class="w-full lg:w-1/2 grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6 h-fit p-5  mb-[40px]">
        <div class="flex flex-col relative rounded-md border border-slate-150 bg-clip-content min-h-60 bg-no-repeat bg-fixed bg-[center_top_-7rem]" style="background-image: url(./assets/img/bg-header.jpg);transform: scaleX(-1)">
            <div class="max-h-60 p-5">
                <img src="assets/img/logo-met-ms-naar-de-top.svg" class="max-h-full rounded-full bg-white/75" style="transform: scaleX(-1)">
            </div>
        </div>
        <?php
        foreach ($config as $walk)
        {
            ?>
            <div class="flex flex-col relative rounded-md bg-[#f8fafc] border border-slate-150 px-4 py-6 shadow-none">
                <div class="flex justify-between content-center">
                    <h2 class="text-lg font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                        <?= $walk->title ?>
                    </h2>
                    <span class="uppercase text-xs text-gray-400 h-fit self-center"><?= $walk->days ?></span>
                </div>
                <div class="pt-2">
                    <p class="italic">
                        <?= $walk->description ?>
                    </p>
                </div>
                <div class="h-5 relative bg-slate-200 rounded-full w-full mt-3 ring-1 ring-slate-400">
                    <span class="h-5 absolute right-0 top-0  text-xs pr-2 inline-block align-middle z-10 uppercase pt-px">€ <?= number_format($walk->data[1],2,',','.') ?></span>
                    <div class="h-5 relative overflow-hidden rounded-full bg-green-600 text-xs pr-2 text-right text-white pt-px" style="width: <?= $walk->data[2] ?>%">€ <?= number_format($walk->data[0],2,',','.') ?></div>
                </div>
                <div class="w-full mt-2 text-right<?php if($walk->data[2] > 99){echo ' hidden';} ?> ">
                    <a href="<?= $walk->donate_url ?>" target="_blank" class="rounded-full px-4 uppercase w-1/2 btn border border-[#0ea5e9]/30 bg-[#0ea5e9]/10 font-medium text-[#0ea5e9] hover:bg-[#0ea5e9]/20 focus:bg-[#0ea5e9]/20 active:bg-[#0ea5e9]/25">
                        Doneren
                    </a>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="w-full lg:w-1/2 absolute bottom-0 text-xs text-right text-gray-400 flex justify-end py-2 px-4 sm:px-5 lg:px-6">
        <div>
            Made by <a href="https://www.sitenzo.nl/" target="_blank" title="Sitenzo" class="text-red-500">Sitenzo</a>
        </div>
    </div>

</body>
</html>