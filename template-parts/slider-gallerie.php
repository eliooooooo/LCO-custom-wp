<div class="swiper-css swiper-activites">
    <div class="swiper-wrapper">
        <!-- Slides -->
        <?php if(is_array($gallerie)) { ?>
            <?php foreach($gallerie as $photo){ ?>
                <?php if(is_array($photo) && isset($photo['url'])){ ?>
                    <div class="swiper-slide h-auto ">
                        <img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>" class="w-full rounded-md">
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>

    <div class="swiper-pagination"></div>

    <div class="swiper-button-prev text-white">
        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
        </svg>
    </div>
    <div class="swiper-button-next text-white">
        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
        </svg>
    </div>
</div>