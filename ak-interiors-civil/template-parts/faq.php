<?php
/**
 * Local Intent FAQ Section Template Part
 *
 * Real, customer-focused answers to common homeowner and commercial questions.
 * Helps search engines and visitors understand exact service scope and process.
 *
 * @package ak-interiors-civil
 */

$biz = ak_get_business_info();

$faqs = array(
    array(
        'q' => 'What interior design services do you provide in Chennai?',
        'a' => 'AK Interiors & Civil provides complete residential and commercial interior solutions across Chennai. Our work includes interior architectural layout planning, custom modular kitchens, bespoke bedroom wardrobes, living room styling, false ceilings, electrical lighting plans, and turnkey fit-outs for villas, apartments, and corporate offices.',
    ),
    array(
        'q' => 'Do you handle complete turnkey home interior projects?',
        'a' => 'Yes. Turnkey execution is one of our primary specialties. We take bare concrete structures or existing flats and deliver finished, move-in-ready spaces. We oversee design conceptualization, 3D visualization, material selection, on-site carpentry, electrical, plumbing, painting, and final deep cleaning under one contract.',
    ),
    array(
        'q' => 'Do you undertake ground-up civil construction and structural works?',
        'a' => 'Yes. Unlike standalone interior studios, AK Interiors & Civil has dedicated civil engineering and masonry teams. We construct independent houses, villas, and commercial buildings from foundation to roof slab, as well as structural modifications, extensions, and complete renovations.',
    ),
    array(
        'q' => 'Which areas in Chennai and Tamil Nadu do you serve?',
        'a' => 'Our studio is located on Gandhi Street in Chennai, and we serve clients across the entire Chennai metropolitan area—including Anna Nagar, Adyar, Besant Nagar, ECR, OMR, Velachery, Guindy, Porur, and Tambaram. We also undertake projects across Tamil Nadu and in Pondicherry / Puducherry.',
    ),
    array(
        'q' => 'Do you take up interior design and construction projects in Pondicherry / Puducherry?',
        'a' => 'Yes. We actively execute residential villa interiors, holiday homes, and renovation projects in Pondicherry and Puducherry. Our project supervisors manage scheduled site visits and direct material delivery to ensure consistent quality.',
    ),
    array(
        'q' => 'How can I request a project consultation and cost estimate?',
        'a' => 'You can reach out directly to our founder T. Murugan by phone at +91 91769 22419 or via WhatsApp. Alternatively, submit the enquiry form on this website with your project location and approximate floor area. We will discuss your requirements and provide an itemized, transparent cost estimate.',
    ),
);
?>
<section id="faq" class="bg-ivory py-24 sm:py-32 border-t border-border">
    <div class="mx-auto max-w-[1400px] px-5 sm:px-8">
        <div class="ak-reveal">
            <span class="label-eyebrow inline-flex items-center gap-3 text-bronze">
                <span aria-hidden="true" class="h-px w-8 bg-bronze"></span>
                Common Inquiries
            </span>
            <h2 class="mt-6 font-display text-[clamp(2.2rem,5vw,4rem)] leading-[1.04]">
                FREQUENTLY ASKED QUESTIONS
            </h2>
            <p class="mt-4 max-w-xl text-sm leading-relaxed text-muted-foreground">
                Straightforward answers about our interior design, civil contracting, pricing transparency, and service coverage in Chennai and Tamil Nadu.
            </p>
        </div>

        <div class="mt-14 grid gap-6 md:grid-cols-2">
            <?php foreach ( $faqs as $i => $faq ) : ?>
                <div class="ak-reveal border border-border bg-white/60 p-7 sm:p-9 shadow-sm" style="transition-delay: <?php echo esc_attr( $i * 50 ); ?>ms;">
                    <h3 class="font-display text-xl sm:text-2xl leading-snug text-charcoal">
                        <?php echo esc_html( $faq['q'] ); ?>
                    </h3>
                    <p class="mt-4 text-sm leading-relaxed text-muted-foreground">
                        <?php echo esc_html( $faq['a'] ); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-12 ak-reveal flex flex-wrap items-center justify-between gap-6 border-t border-border pt-8">
            <p class="text-sm text-charcoal">
                Have a specific question about your plot or apartment? Speak directly with <strong><?php echo esc_html( $biz['owner'] ); ?></strong>.
            </p>
            <div class="flex gap-4">
                <a
                    href="<?php echo esc_attr( $biz['phone_href'] ); ?>"
                    class="border border-charcoal px-5 py-3 text-[11px] uppercase tracking-[0.2em] transition-colors hover:bg-charcoal hover:text-white"
                >
                    Call <?php echo esc_html( $biz['phone'] ); ?>
                </a>
                <a
                    href="<?php echo esc_url( $biz['whatsapp_url'] ); ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="bg-bronze px-5 py-3 text-[11px] uppercase tracking-[0.2em] text-charcoal transition-colors hover:bg-charcoal hover:text-bronze"
                >
                    WhatsApp Chat
                </a>
            </div>
        </div>
    </div>
</section>
