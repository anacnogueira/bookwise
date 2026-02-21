<?php

$projects = [
    [
        "title" => "Travelgram",
        "description" => "Rede social onde as pessoas mostram os registros de suas viagens pelo mundo",
        "stack" => [
            ["name" => "PHP", "color" => "fuchsia"],
            ["name" => "HTML", "color" => "lime"],
            ["name" => "CSS", "color" => "sky"],
            ["name" => "JS", "color" => "rose"],
        ],
        "img" => "/img/projects/travelgram.png"
    ],
    [
        "title" => "Página de receita",
        "description" => "Página com o passo a passo de uma receita para cupcakes.",
        "stack" => [
            ["name" => "PHP", "color" => "fuchsia"],
            ["name" => "HTML", "color" => "lime"],
            ["name" => "CSS", "color" => "sky"],
            ["name" => "JS", "color" => "rose"],
        ],
        "img" => "/img/projects/receita.png"
    ],
    [
        "title" => "Tech News",
        "description" => "Homepage de um portal de notícias sobre a área da tecnologia",
        "stack" => [
            ["name" => "PHP", "color" => "fuchsia"],
            ["name" => "HTML", "color" => "lime"],
            ["name" => "CSS", "color" => "sky"],
            ["name" => "JS", "color" => "rose"],
        ],
        "img" => "/img/projects/technews.png"
    ],
    [
        "title" => "Refund",
        "description" => "Um sistema para pedido e acompanhamento de reembolso",
        "stack" => [
            ["name" => "PHP", "color" => "fuchsia"],
            ["name" => "HTML", "color" => "lime"],
            ["name" => "CSS", "color" => "sky"],
            ["name" => "JS", "color" => "rose"],
        ],
        "img" => "/img/projects/refund.png"
    ],
    [
        "title" => "Página de turismo",
        "description" => "Página com as principais informações para quem quer viajar para Busan",
        "stack" => [
            ["name" => "PHP", "color" => "fuchsia"],
            ["name" => "HTML", "color" => "lime"],
            ["name" => "CSS", "color" => "sky"],
            ["name" => "JS", "color" => "rose"],
        ],
        "img" => "/img/projects/turismo.png"
    ],
    [
        "title" => "Zingen",
        "description" => "Landing Page completa e responsiva de um aplicativo de Karaokê",
        "stack" => [
            ["name" => "PHP", "color" => "fuchsia"],
            ["name" => "HTML", "color" => "lime"],
            ["name" => "CSS", "color" => "sky"],
            ["name" => "JS", "color" => "rose"],
        ],
        "img" => "/img/projects/zingen.png"
    ],


];
?>
<section class="pt-[72px]">
    <div class="text-center mb-[56px]">
        <h1 class="text-[#E3646E] mb-[8px] text-[20px] font-[inconsolata]">Meu trabalho</h1>
        <p class="text-[#E2E4E9] font-bold text-[24px] font-[asap]">Veja os projetos em destaque</p>
    </div>
    <div class="mx-auto max-w-[1200px]">
        <div class="grid grid-cols-1 sm:grid-cols-1 p-10 lg:grid-cols-2 gap-6">
            <?php foreach ($projects as $project): ?>
                <div class="sm:flex bg-[#292C34] p-2 rounded-[12px] border-1 justify-between space-x-3 hover:border-solid hover:border-gray-200 shadow-lg shadow-slate-900 hover:cursor-pointer">
                     <div class="mb-5 w-full sm:w-3/4 sm:h-full md:w-2/4 lg:w-2/4">
                        <img class="h-full w-full rounded-lg object-cover" src="<?=$project['img']?>" alt="<?=$project['title']?>">
                    </div>
                    <div class="sm:w-3/4 sm:pt-5 md:w-3/4 lg:w-3/4 pl-3 space-y-3">
                        <h3 class="text-[#E2E4E9] font-bold font-[asap] text-[16px]"><?=$project['title']?></h3>
                        <p class="text-[#C0C4CE] font-[maven pro] text-[14px] leading-[140%] lg:mb-10"><?=$project['description']?></p>
                         <div class="flex flex-wrap space-x-2 mt-10 sm:mt-18 md:mt-30 lg:mt-0">
                            <?php foreach ($project['stack'] as $language): ?>
                                <span class="bg-<?=$language['color']?>-400  text-<?= $language['color'] ?>-900 rounded-md px-2 py-1 mb-2 font-semibold text-xs"><?=$language['name'] ?></span>
                            <?php endforeach; ?>
                         </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>              
