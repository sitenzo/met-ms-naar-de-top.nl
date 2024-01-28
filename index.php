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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="flex flex-col justify-between align-middle bg-[#f8fafc] min-h-dvh">
    <div class="h-dvh w-full absolute top-0 bottom-0 opacity-25 bg-repeat object-fit bg-[url('../img/bg-page.jpg')]"></div>
    <div class="w-full grid grid-cols-1 gap-4 h-fit p-5 mb-auto">
        <div class="flex flex-col relative rounded-md min-h-48 bg-no-repeat bg-cover bg-center shadow-xl bg-[url('../img/bg-header.jpg')]" style="transform: scaleX(-1)">
            <div class="max-h-24 p-2 rounded-full">
                    <img src="assets/img/logo-met-ms-naar-de-top.svg" class="max-h-full rounded-full bg-white/75" style="transform: scaleX(-1)" alt="cover photo of team met MS naar de TOP">
            </div>



        </div>
        <?php
        foreach ($config as $walk)
        {
            ?>
            <div class="flex flex-col relative rounded-md bg-gray-100 px-4 py-6 shadow-xl">
                <div class="flex flex-row justify-center items-center">
                    <div class="flex flex-col grow">
                        <h2 class="text-lg">
                            <?= $walk->title ?>
                        </h2>
                        <span class="text-xs text-gray-500 h-fit">Doel: € <?= number_format($walk->data[1],2,',','.') ?> / Opgehaald: € <?= number_format($walk->data[0],2,',','.') ?></span>
                        <span class="lowercase text-xs text-gray-400 h-fit"><?= $walk->days ?></span>
                    </div>
                    <div class="flex items-center justify-center shrink">
                        <svg class="w-16 h-16 flex items-center justify-center" viewBox="0 0 100 100">
                            <!-- Background circle -->
                            <circle
                                    class="text-gray-200 stroke-current"
                                    stroke-width="10"
                                    cx="50"
                                    cy="50"
                                    r="40"
                                    fill="transparent"
                            ></circle>
                            <!-- Progress circle -->
                            <circle
                                    class="text-green-600  progress-ring__circle stroke-current"
                                    stroke-width="10"
                                    stroke-linecap="round"
                                    cx="50"
                                    cy="50"
                                    r="40"
                                    fill="transparent"
                                    stroke-dashoffset="calc(400 - (250 * <?= $walk->data[2] ?>) / 100)"
                            ></circle>
                            <span class="absolute text-md text-green-600"><?= $walk->data[2] ?>%</span>
                    </div>
                </div>
                <div class="pt-2 mb-4">
                    <p class="text-sm">
                        <?= $walk->description ?>
                    </p>
                </div>

                <div class="flex flex-row justify-center <?php if($walk->data[2] > 99){echo ' hidden';} ?>">
                    <div class="flex items-center justify-center basis-1/2">
                        <div class="relative group w-full">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-[#4fbccc] to-[#db6a65] rounded-lg blur transition duration-200 animate-tilt"></div>
                            <a href="<?= $walk->donate_url ?>" target="_blank" class="relative w-full px-4 py-2 bg-black rounded-lg leading-none flex items-center justify-center bg-gradient-to-r from-[#db6a65] to-[#4fbccc] font-medium text-white uppercase">
                                Doneren
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="w-full grid grid-cols-1 gap-4 h-fit p-5 text-right">
        <div class="text-xs text-gray-400">
            Made by <a href="https://www.sitenzo.nl/" target="_blank" title="Sitenzo" class="text-red-500">Sitenzo</a>
        </div>
    </div>
</body>
</html>

<!--

    <div class="w-full lg:w-1/2 xl:w-1/2 2xl:w-1/2 grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6 h-fit p-5  mb-[40px]">
        <div class="flex flex-col relative rounded-md border border-slate-150 bg-clip-content min-h-60 bg-no-repeat bg-fixed bg-[center_top_-7rem] bg-cover" style="background-image: url(./assets/img/bg-header.jpg);transform: scaleX(-1)">
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
                    <span class="uppercase text-md text-gray-600 h-fit self-center"><?= $walk->days ?></span>
                </div>
                <div class="pt-2">
                    <p class="italic">
                        <?= $walk->description ?>
                    </p>
                </div>
                <div class="h-7 relative bg-slate-200 rounded-full w-full mt-3 ring-1 ring-slate-400">
                    <span class="h-7 absolute inline-flex items-center right-0 top-0 text-xs pr-2 font-medium uppercase">€ <?= number_format($walk->data[1],2,',','.') ?></span>
                    <div class="h-7 relative inline-flex items-center justify-end overflow-hidden rounded-full bg-green-600 text-xs font-medium pr-2 text-white" style="width: <?= $walk->data[2] ?>%">€ <?= number_format($walk->data[0],2,',','.') ?></div>
                </div>
                <div class="w-full mt-2 text-right<?php if($walk->data[2] > 99){echo ' hidden';} ?> ">
                    <a href="<?= $walk->donate_url ?>" target="_blank" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-[#4fbccc] to-[#db6a65] hover:bg-gradient-to-l px-3 py-2 text-sm font-semibold uppercase text-white shadow-sm ring-1 ring-inset ring-gray-300 w-full text-center">
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
-->