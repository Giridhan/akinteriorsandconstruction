<?php
/**
 * Enquiry Form Section Template Part
 *
 * @package ak-interiors-civil
 */

$biz = ak_get_business_info();
$field_class = 'w-full border-0 border-b border-input bg-transparent py-3 text-base text-charcoal placeholder:text-taupe/70 focus:border-bronze focus:outline-none transition-colors';

$project_types = array(
    'Interior Design',
    'Residential Interior',
    'Commercial Interior',
    'Civil Construction',
    'Renovation',
    'Modular Kitchen',
    'Turnkey Project',
    'Other',
);

$budgets = array(
    'Below ₹5 Lakhs',
    '₹5–10 Lakhs',
    '₹10–20 Lakhs',
    '₹20–50 Lakhs',
    '₹50 Lakhs+',
);
?>
<section id="enquiry" class="bg-ivory py-24 sm:py-32">
    <div class="mx-auto max-w-[1400px] px-5 sm:px-8">
        <div class="grid gap-12 lg:grid-cols-[0.75fr_1.25fr] lg:gap-20">
            <!-- Left Header / Intro -->
            <div class="ak-reveal">
                <span class="label-eyebrow inline-flex items-center gap-3 text-bronze">
                    <span aria-hidden="true" class="h-px w-8 bg-bronze"></span>
                    Enquiry
                </span>
                <h2 class="mt-6 font-display text-[clamp(2rem,4.4vw,3.4rem)] leading-[1.05]">
                    LET'S TALK ABOUT YOUR PROJECT
                </h2>
                <p class="mt-6 max-w-sm text-sm leading-relaxed text-muted-foreground">
                    Share a few details and <?php echo esc_html( $biz['owner'] ); ?> will get back to you personally. You can also reach us on
                    <a href="<?php echo esc_attr( $biz['phone_href'] ); ?>" class="link-underline text-charcoal font-medium">
                        <?php echo esc_html( $biz['phone'] ); ?>
                    </a>.
                </p>
            </div>

            <!-- Right Form -->
            <div class="relative ak-reveal" style="transition-delay: 100ms;">
                <form
                    id="main-enquiry-form"
                    action="<?php echo esc_url( $biz['form_endpoint'] ); ?>"
                    method="POST"
                    class="grid gap-8 sm:grid-cols-2"
                >
                    <!-- FormSubmit Configuration & Spam Protection -->
                    <input type="hidden" name="_subject" value="NEW WEBSITE LEAD - AK INTERIORS & CIVIL">
                    <input type="hidden" name="_template" value="table">
                    <input type="hidden" name="_hcaptcha" value="false">
                    <input type="hidden" name="_captcha" value="false">
                    <input type="hidden" name="_next" id="form-next-url" value="<?php echo esc_url( home_url( '/enquiry-success/' ) ); ?>">
                    <input type="hidden" name="_replyto" id="form-replyto" value="">
                    <input type="text" name="_honey" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true">

                    <!-- Structure Identifiers -->
                    <input type="hidden" name="Lead Type" value="FORM ENQUIRY">
                    <input type="hidden" name="Lead Heading" value="NEW WEBSITE LEAD — AK INTERIORS & CIVIL">
                    <input type="hidden" name="Customer Details" value="CUSTOMER DETAILS">
                    <input type="hidden" name="Lead Source / Attribution" value="LEAD SOURCE / ATTRIBUTION">

                    <!-- Lead Attribution Hidden Fields populated via lead-tracking.js -->
                    <?php
                    $attribution_fields = array(
                        'Tracking Consent', 'Visitor ID', 'Session ID', 'First Source', 'First Medium',
                        'First Campaign', 'First Content', 'First Term', 'Latest Source', 'Latest Medium',
                        'Latest Campaign', 'Latest Content', 'Latest Term', 'Landing Page', 'Referrer',
                        'Pages Viewed', 'First Visit', 'Latest Visit', 'Enquiry Submitted', 'Device Category',
                        'Browser', 'Operating System',
                    );
                    foreach ( $attribution_fields as $field_name ) :
                    ?>
                        <input type="hidden" name="<?php echo esc_attr( $field_name ); ?>" value="Not collected" class="attribution-field">
                    <?php endforeach; ?>

                    <input type="hidden" name="Business Details" value="BUSINESS DETAILS">
                    <input type="hidden" name="Website" value="<?php echo esc_attr( $biz['name'] ); ?>">
                    <input type="hidden" name="Owner" value="<?php echo esc_attr( $biz['owner'] ); ?>">
                    <input type="hidden" name="Business Phone" value="<?php echo esc_attr( $biz['phone'] ); ?>">
                    <input type="hidden" name="Business Email" value="<?php echo esc_attr( $biz['email'] ); ?>">
                    <input type="hidden" name="Business Address" value="<?php echo esc_attr( $biz['address'] ); ?>">

                    <!-- Full Name -->
                    <div>
                        <label for="enquiry-name" class="label-eyebrow text-taupe block mb-1">Full Name</label>
                        <input
                            id="enquiry-name"
                            name="name"
                            type="text"
                            required
                            minlength="2"
                            maxlength="100"
                            autocomplete="name"
                            placeholder="Your full name"
                            class="<?php echo esc_attr( $field_class ); ?>"
                        >
                    </div>

                    <!-- Phone Number -->
                    <div>
                        <label for="enquiry-phone" class="label-eyebrow text-taupe block mb-1">Phone Number</label>
                        <input
                            id="enquiry-phone"
                            name="phone"
                            type="tel"
                            required
                            minlength="7"
                            maxlength="20"
                            autocomplete="tel"
                            placeholder="+91 XXXXX XXXXX"
                            title="Enter a valid phone number using 7 to 20 digits"
                            class="<?php echo esc_attr( $field_class ); ?>"
                        >
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="enquiry-email" class="label-eyebrow text-taupe block mb-1">Email</label>
                        <input
                            id="enquiry-email"
                            name="email"
                            type="email"
                            required
                            maxlength="255"
                            autocomplete="email"
                            placeholder="your.email@example.com"
                            class="<?php echo esc_attr( $field_class ); ?>"
                        >
                    </div>

                    <!-- Project Type -->
                    <div>
                        <label for="enquiry-project-type" class="label-eyebrow text-taupe block mb-1">Project Type</label>
                        <select
                            id="enquiry-project-type"
                            name="project_type"
                            required
                            class="<?php echo esc_attr( $field_class ); ?> cursor-pointer"
                        >
                            <option value="" disabled selected>Select</option>
                            <?php foreach ( $project_types as $pt ) : ?>
                                <option value="<?php echo esc_attr( $pt ); ?>"><?php echo esc_html( $pt ); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Location -->
                    <div>
                        <label for="enquiry-location" class="label-eyebrow text-taupe block mb-1">Location</label>
                        <input
                            id="enquiry-location"
                            name="location"
                            type="text"
                            required
                            minlength="2"
                            maxlength="120"
                            autocomplete="address-level2"
                            placeholder="e.g. Anna Nagar, Chennai"
                            class="<?php echo esc_attr( $field_class ); ?>"
                        >
                    </div>

                    <!-- Approximate Budget -->
                    <div>
                        <label for="enquiry-budget" class="label-eyebrow text-taupe block mb-1">Approximate Budget</label>
                        <select
                            id="enquiry-budget"
                            name="budget"
                            required
                            class="<?php echo esc_attr( $field_class ); ?> cursor-pointer"
                        >
                            <option value="" disabled selected>Select</option>
                            <?php foreach ( $budgets as $b ) : ?>
                                <option value="<?php echo esc_attr( $b ); ?>"><?php echo esc_html( $b ); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Preferred Start Date -->
                    <div class="sm:col-span-2">
                        <label for="enquiry-start-date" class="label-eyebrow text-taupe block mb-1">Preferred Start Date</label>
                        <input
                            id="enquiry-start-date"
                            name="start_date"
                            type="date"
                            required
                            class="<?php echo esc_attr( $field_class ); ?>"
                        >
                    </div>

                    <!-- Message -->
                    <div class="sm:col-span-2">
                        <label for="enquiry-message" class="label-eyebrow text-taupe block mb-1">Message</label>
                        <textarea
                            id="enquiry-message"
                            name="message"
                            rows="4"
                            required
                            minlength="20"
                            maxlength="2000"
                            placeholder="Tell us about the space, requirements, and scope..."
                            class="<?php echo esc_attr( $field_class ); ?>"
                        ></textarea>
                    </div>

                    <!-- Error Alert (Hidden by default) -->
                    <div id="form-error-alert" role="alert" class="hidden sm:col-span-2 border-l-2 border-bronze pl-5 text-sm leading-relaxed text-charcoal bg-white/60 p-4">
                        <p class="font-medium">Unable to submit your enquiry right now.</p>
                        <p class="mt-1 text-muted-foreground">Please try again or contact us directly.</p>
                        <p class="mt-3 space-y-1">
                            <span>Call: <a class="link-underline font-medium" href="<?php echo esc_attr( $biz['phone_href'] ); ?>"><?php echo esc_html( $biz['phone'] ); ?></a></span><br>
                            <span>WhatsApp: <a class="link-underline font-medium" href="<?php echo esc_url( $biz['whatsapp_url'] ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $biz['phone'] ); ?></a></span><br>
                            <span>Email: <a class="link-underline font-medium" href="<?php echo esc_attr( $biz['email_href'] ); ?>"><?php echo esc_html( $biz['email'] ); ?></a></span>
                        </p>
                    </div>

                    <!-- Submit Button -->
                    <div class="sm:col-span-2">
                        <button
                            type="submit"
                            id="enquiry-submit-btn"
                            class="inline-flex items-center gap-3 bg-charcoal px-10 py-5 text-[11px] uppercase tracking-[0.22em] text-softwhite transition-all hover:bg-bronze hover:text-charcoal disabled:opacity-60"
                        >
                            <span id="submit-btn-text">Send Enquiry</span>
                            <span id="submit-btn-spinner" class="hidden animate-spin h-4 w-4 border-2 border-current border-t-transparent rounded-full"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
