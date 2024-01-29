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
<body class="flex flex-col align-middle bg-[#f8fafc] min-h-dvh">
    <div class="h-dvh w-full absolute top-0 bottom-0 opacity-25 bg-repeat object-fit bg-[url('../img/bg-page.jpg')]" style="background-size: 50%;"></div>
    <div class="w-full md:w-1/2 md:mx-auto lg:w-1/3 grid grid-cols-1 gap-4 h-fit p-5 mb-auto card">
        <div class="flex flex-col relative rounded-md min-h-48  shadow-xl">
            <div class="w-full h-full absolute top-0 bottom-0 rounded-md bg-no-repeat bg-cover bg-center bg-[url('../img/bg-header.jpg')]" style="transform: scaleX(-1)"></div>
            <div class="max-h-24 md:max-h-28 lg:max-h-32 p-2 rounded-full z-0">
                    <img src="assets/img/logo-met-ms-naar-de-top.svg" class="max-h-full rounded-full bg-white/75 ml-auto"  alt="cover photo of team met MS naar de TOP">
            </div>
            <div class="card-faders w-full h-full absolute top-0 bottom-0 rounded-md" style="z-index: -100">
                <img class="card-fader card-image rounded-md w-full h-full absolute top-0 bottom-0" src="./assets/img/bg-header.jpg" />
                <img class="card-fader card-image rounded-md w-full h-full absolute top-0 bottom-0" src="./assets/img/bg-header.jpg" />
                <img class="card-fader card-image rounded-md w-full h-full absolute top-0 bottom-0" src="./assets/img/bg-header.jpg" />
                <img class="card-fader card-image rounded-md w-full h-full absolute top-0 bottom-0" src="./assets/img/bg-header.jpg" />
                <img class="card-fader card-image rounded-md w-full h-full absolute top-0 bottom-0" src="./assets/img/bg-header.jpg" />
                <img class="card-fader card-image rounded-md w-full h-full absolute top-0 bottom-0" src="./assets/img/bg-header.jpg" />
                <img class="card-fader card-image rounded-md w-full h-full absolute top-0 bottom-0" src="./assets/img/bg-header.jpg" />
                <img class="card-fader card-image rounded-md w-full h-full absolute top-0 bottom-0" src="./assets/img/bg-header.jpg" />
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
    <div class="w-full md:w-1/2 md:mx-auto lg:w-1/3 grid grid-cols-1 gap-4 h-fit p-5 pb-1 text-right">
        <div class="text-xs text-gray-400">
            Made by <a href="https://www.sitenzo.nl/" target="_blank" title="Sitenzo" class="text-red-500">Sitenzo</a>
        </div>
    </div>
</body>
</html>