<?php
/**
 * Before / After Section Template Part
 *
 * @package ak-interiors-civil
 */
?>
<section id="before-after" class="bg-charcoal py-24 text-ivory sm:py-32">
    <div class="mx-auto max-w-[1400px] px-5 sm:px-8">
        <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
            <div class="ak-reveal">
                <span class="label-eyebrow inline-flex items-center gap-3 text-bronze">
                    <span aria-hidden="true" class="h-px w-8 bg-bronze"></span>
                    Before &rarr; After
                </span>
                <h2 class="mt-6 font-display text-[clamp(2rem,4.8vw,3.8rem)] leading-[1.05]">
                    FROM EMPTY SPACES<br>
                    TO BEAUTIFUL EXPERIENCES.
                </h2>
            </div>
            <div class="ak-reveal" style="transition-delay: 100ms;">
                <p class="label-eyebrow text-ivory/45">Drag the handle</p>
            </div>
        </div>

        <div class="ak-reveal mt-12" style="transition-delay: 120ms;">
            <div
                id="before-after-slider"
                class="relative h-[320px] w-full select-none overflow-hidden sm:h-[560px] cursor-ew-resize touch-none"
            >
                <!-- After Image (Base) -->
                <img
                    src="<?php echo ak_asset( 'images/after.jpg' ); ?>"
                    alt="Renovated living room with linen sofa, oak flooring and bronze floor lamp"
                    width="1200"
                    height="800"
                    loading="lazy"
                    class="absolute inset-0 h-full w-full object-cover pointer-events-none"
                >

                <!-- Before Image (Overlay with clip-path) -->
                <div
                    id="before-image-container"
                    class="absolute inset-0 pointer-events-none"
                    style="clip-path: inset(0 50% 0 0);"
                >
                    <img
                        src="<?php echo ak_asset( 'images/before.jpg' ); ?>"
                        alt="The same room before renovation, bare plaster walls and dusty tile floor"
                        width="1200"
                        height="800"
                        loading="lazy"
                        class="h-full w-full object-cover"
                    >
                </div>

                <!-- Labels -->
                <span class="label-eyebrow absolute left-5 top-5 bg-charcoal/70 px-3 py-2 text-ivory pointer-events-none">
                    Before
                </span>
                <span class="label-eyebrow absolute right-5 top-5 bg-charcoal/70 px-3 py-2 text-bronze pointer-events-none">
                    After
                </span>

                <!-- Divider Line with circular handle -->
                <div
                    id="slider-divider"
                    class="absolute inset-y-0 w-px bg-bronze pointer-events-none"
                    style="left: 50%;"
                >
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-bronze text-charcoal flex items-center justify-center shadow-lg font-bold text-xs pointer-events-none">
                        &harr;
                    </div>
                </div>

                <!-- Accessible Range Slider -->
                <input
                    type="range"
                    id="before-after-range"
                    min="0"
                    max="100"
                    value="50"
                    aria-label="Reveal the space before and after renovation"
                    class="absolute inset-x-0 bottom-6 mx-auto h-1 w-[70%] cursor-ew-resize appearance-none bg-ivory/25 accent-bronze z-20"
                >
            </div>
        </div>
    </div>
</section>
