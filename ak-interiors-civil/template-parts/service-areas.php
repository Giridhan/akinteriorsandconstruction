<?php
/**
 * Service Areas Section Template Part
 *
 * Local SEO section communicating geographic coverage across Chennai,
 * Pondicherry / Puducherry, and statewide Tamil Nadu without deceptive branch claims.
 *
 * @package ak-interiors-civil
 */

$chennai_localities = array(
    'Anna Nagar',
    'Adyar',
    'Besant Nagar',
    'ECR (East Coast Road)',
    'OMR (Old Mahabalipuram Rd)',
    'Velachery',
    'Guindy',
    'Porur',
    'Tambaram',
    'Perungudi',
    'Sholinganallur',
    'Medavakkam',
    'Pallikaranai',
    'Thoraipakkam',
    'T Nagar',
    'Nungambakkam',
    'Mylapore',
    'Ambattur',
    'Avadi',
);
?>
<section id="service-areas" class="bg-charcoal py-24 text-ivory sm:py-32 border-t border-white/10">
    <div class="mx-auto max-w-[1400px] px-5 sm:px-8">
        <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
            <div class="ak-reveal">
                <span class="label-eyebrow inline-flex items-center gap-3 text-bronze">
                    <span aria-hidden="true" class="h-px w-8 bg-bronze"></span>
                    Service Coverage
                </span>
                <h2 class="mt-6 font-display text-[clamp(2.2rem,5vw,4rem)] leading-[1.04]">
                    SERVING CHENNAI, PONDICHERRY<br>
                    &amp; ALL OF TAMIL NADU
                </h2>
            </div>
            <div class="ak-reveal" style="transition-delay: 100ms;">
                <p class="max-w-md text-sm leading-relaxed text-ivory/60">
                    Interior design and civil construction services across Tamil Nadu, with a strong focus on Chennai and Pondicherry.
                </p>
            </div>
        </div>

        <div class="mt-16 grid gap-8 lg:grid-cols-3">
            <!-- Chennai Column -->
            <div class="ak-reveal border border-white/10 bg-charcoal/60 p-8 sm:p-10" style="transition-delay: 120ms;">
                <div class="flex items-center justify-between border-b border-white/10 pb-6">
                    <div>
                        <span class="label-eyebrow text-bronze">Primary Hub</span>
                        <h3 class="mt-2 font-display text-2xl sm:text-3xl text-ivory">Chennai</h3>
                    </div>
                    <span class="text-xs uppercase tracking-[0.2em] text-ivory/40">Metro Region</span>
                </div>
                <p class="mt-6 text-sm leading-relaxed text-ivory/65">
                    Serving clients across Chennai with comprehensive interior design, villa construction, modular kitchens, and apartment renovations.
                </p>
                <div class="mt-6">
                    <p class="text-xs uppercase tracking-[0.18em] text-bronze font-medium mb-3">Key Chennai Localities Served:</p>
                    <div class="flex flex-wrap gap-2">
                        <?php foreach ( $chennai_localities as $loc ) : ?>
                            <span class="inline-block border border-white/10 bg-white/5 px-2.5 py-1 text-[11px] text-ivory/80 tracking-wide">
                                <?php echo esc_html( $loc ); ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Pondicherry / Puducherry Column -->
            <div class="ak-reveal border border-white/10 bg-charcoal/60 p-8 sm:p-10" style="transition-delay: 200ms;">
                <div class="flex items-center justify-between border-b border-white/10 pb-6">
                    <div>
                        <span class="label-eyebrow text-bronze">Coastal Projects</span>
                        <h3 class="mt-2 font-display text-2xl sm:text-3xl text-ivory">Pondicherry</h3>
                    </div>
                    <span class="text-xs uppercase tracking-[0.2em] text-ivory/40">Puducherry</span>
                </div>
                <p class="mt-6 text-sm leading-relaxed text-ivory/65">
                    We undertake home interiors, boutique villa construction, and civil contracting in Pondicherry / Puducherry. Our project engineers coordinate site supervision, material transport, and specialized joinery directly from our Chennai workshops.
                </p>
                <div class="mt-8 border-t border-white/10 pt-6">
                    <p class="text-xs uppercase tracking-[0.18em] text-bronze font-medium mb-2">Capabilities in Pondicherry:</p>
                    <ul class="space-y-2 text-xs text-ivory/75">
                        <li class="flex items-center gap-2">
                            <span class="h-1 w-1 rounded-full bg-bronze"></span>
                            Bespoke Villa &amp; Coastal Residence Interiors
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="h-1 w-1 rounded-full bg-bronze"></span>
                            Structural Civil Construction &amp; Extensions
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="h-1 w-1 rounded-full bg-bronze"></span>
                            Turnkey Renovation of Older Properties
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="h-1 w-1 rounded-full bg-bronze"></span>
                            Modular Kitchen &amp; Custom Cabinetry Fitting
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Tamil Nadu Statewide Column -->
            <div class="ak-reveal border border-white/10 bg-charcoal/60 p-8 sm:p-10" style="transition-delay: 280ms;">
                <div class="flex items-center justify-between border-b border-white/10 pb-6">
                    <div>
                        <span class="label-eyebrow text-bronze">Statewide Reach</span>
                        <h3 class="mt-2 font-display text-2xl sm:text-3xl text-ivory">Tamil Nadu</h3>
                    </div>
                    <span class="text-xs uppercase tracking-[0.2em] text-ivory/40">State Coverage</span>
                </div>
                <p class="mt-6 text-sm leading-relaxed text-ivory/65">
                    For standalone villas, farmhouses, residential layouts, and commercial properties anywhere in Tamil Nadu, AK Interiors &amp; Civil delivers end-to-end turnkey solutions.
                </p>
                <div class="mt-8 border-t border-white/10 pt-6">
                    <p class="text-xs uppercase tracking-[0.18em] text-bronze font-medium mb-2">Turnkey Guarantee:</p>
                    <p class="text-xs leading-relaxed text-ivory/70">
                        One single accountable team handles architectural plans, civil engineering, material logistics, interior joinery, and on-schedule handover across the state.
                    </p>
                    <a
                        href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
                        class="mt-6 inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.22em] text-bronze hover:text-ivory transition-colors"
                    >
                        Check Coverage for Your Location &rarr;
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
