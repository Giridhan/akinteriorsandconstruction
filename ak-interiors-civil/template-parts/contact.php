<?php
/**
 * Contact Section Template Part
 *
 * @package ak-interiors-civil
 */

$biz = ak_get_business_info();
?>
<section id="contact" class="bg-softwhite py-24 sm:py-32">
    <div class="mx-auto max-w-[1400px] px-5 sm:px-8">
        <div class="ak-reveal">
            <span class="label-eyebrow inline-flex items-center gap-3 text-bronze">
                <span aria-hidden="true" class="h-px w-8 bg-bronze"></span>
                Contact
            </span>
            <h2 class="mt-6 max-w-3xl font-display text-[clamp(2rem,5vw,4rem)] leading-[1.03]">
                LET'S CREATE SOMETHING BEAUTIFUL.
            </h2>
        </div>

        <div class="mt-16 grid gap-12 lg:grid-cols-[0.9fr_1.1fr] lg:gap-16">
            <!-- Details Column -->
            <div class="ak-reveal">
                <p class="font-display text-2xl tracking-[0.1em]"><?php echo esc_html( $biz['name'] ); ?></p>
                <dl class="mt-10 space-y-8 border-t border-border pt-10">
                    <div>
                        <dt class="label-eyebrow text-bronze">Owner</dt>
                        <dd class="mt-3 text-lg"><?php echo esc_html( $biz['owner'] ); ?></dd>
                    </div>
                    <div>
                        <dt class="label-eyebrow text-bronze">Phone</dt>
                        <dd class="mt-3 text-lg">
                            <a href="<?php echo esc_attr( $biz['phone_href'] ); ?>" class="link-underline">
                                <?php echo esc_html( $biz['phone'] ); ?>
                            </a>
                        </dd>
                    </div>
                    <div>
                        <dt class="label-eyebrow text-bronze">Email</dt>
                        <dd class="mt-3 break-all text-lg">
                            <a href="<?php echo esc_attr( $biz['email_href'] ); ?>" class="link-underline">
                                <?php echo esc_html( $biz['email'] ); ?>
                            </a>
                        </dd>
                    </div>
                    <div>
                        <dt class="label-eyebrow text-bronze">Address</dt>
                        <dd class="mt-3 text-lg"><?php echo esc_html( $biz['address'] ); ?></dd>
                    </div>
                    <div>
                        <dt class="label-eyebrow text-bronze">Service Coverage</dt>
                        <dd class="mt-3 text-lg">Chennai, Pondicherry / Puducherry &amp; All Tamil Nadu</dd>
                    </div>
                </dl>

                <div class="mt-10 flex flex-wrap gap-3">
                    <a
                        href="<?php echo esc_attr( $biz['phone_href'] ); ?>"
                        class="inline-flex items-center gap-2 border border-charcoal px-6 py-4 text-[11px] uppercase tracking-[0.2em] transition-colors hover:bg-charcoal hover:text-softwhite"
                    >
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        Call Us
                    </a>
                    <a
                        href="<?php echo esc_attr( $biz['email_href'] ); ?>"
                        class="inline-flex items-center gap-2 border border-charcoal px-6 py-4 text-[11px] uppercase tracking-[0.2em] transition-colors hover:bg-charcoal hover:text-softwhite"
                    >
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                        Email Us
                    </a>
                    <a
                        href="<?php echo esc_url( $biz['whatsapp_url'] ); ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 bg-bronze px-6 py-4 text-[11px] uppercase tracking-[0.2em] text-charcoal transition-colors hover:bg-charcoal hover:text-bronze"
                    >
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01C17.18 3.03 14.69 2 12.04 2zm0 18.16c-1.38 0-2.74-.36-3.94-1.08l-.29-.17-3.12.82.83-3.04-.17-.28c-.8-1.27-1.22-2.87-1.22-4.51 0-4.54 3.7-8.24 8.24-8.24 2.2 0 4.27.86 5.82 2.42 1.56 1.56 2.41 3.63 2.41 5.82 0 4.55-3.7 8.25-8.24 8.25zm4.52-6.19c-.25-.12-1.47-.72-1.7-.81-.23-.08-.39-.12-.56.12-.17.25-.64.81-.79.98-.14.16-.29.18-.54.06-.25-.12-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.38-1.72-.15-.25-.02-.38.11-.5.11-.11.25-.29.38-.44.12-.15.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.12-.56-1.34-.76-1.84-.2-.49-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.07s.89 2.4 1.02 2.57c.12.17 1.76 2.68 4.26 3.76.6.26 1.06.41 1.42.53.6.19 1.14.16 1.57.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.1-.23-.17-.48-.29z"/></svg>
                        WhatsApp Us
                    </a>
                </div>
            </div>

            <!-- Map Column -->
            <div class="ak-reveal" style="transition-delay: 150ms;">
                <div class="relative aspect-[4/3] w-full overflow-hidden border border-border shadow-md">
                    <iframe
                        title="Map of Chennai, Tamil Nadu"
                        src="https://www.openstreetmap.org/export/embed.html?bbox=80.10%2C12.90%2C80.35%2C13.15&amp;layer=mapnik"
                        loading="lazy"
                        class="h-full w-full grayscale"
                    ></iframe>
                </div>
                <p class="mt-4 flex items-center gap-2 text-sm text-muted-foreground">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="text-bronze"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                    <?php echo esc_html( $biz['address'] ); ?>
                </p>
            </div>
        </div>
    </div>
</section>
