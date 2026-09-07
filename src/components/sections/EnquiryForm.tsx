import { useState, type FormEvent } from "react";
import { motion } from "motion/react";
import { Eyebrow, Reveal } from "@/components/Reveal";
import { budgets, business, projectTypes } from "@/lib/site";
import { getLeadAttribution } from "@/lib/leadTracking";

const fieldClass =
  "w-full border-0 border-b border-input bg-transparent py-3 text-base text-charcoal placeholder:text-taupe/70 focus:border-bronze focus:outline-none";

const formEndpoint = "https://formsubmit.co/akinterior251@gmail.com";
const successUrl = "https://chennai-creations-studio.lovable.app/enquiry-success";

export function EnquiryForm() {
  const [showError, setShowError] = useState(false);
  const [replyTo, setReplyTo] = useState("");

  function onSubmit(e: FormEvent<HTMLFormElement>) {
    if (!navigator.onLine) {
      e.preventDefault();
      setShowError(true);
      return;
    }

    const attribution = getLeadAttribution();
    const values: Record<string, string> = {
      "Tracking Consent": attribution.consent,
      "Visitor ID": attribution.visitorId,
      "Session ID": attribution.sessionId,
      "First Source": attribution.firstSource,
      "First Medium": attribution.firstMedium,
      "First Campaign": attribution.firstCampaign,
      "First Content": attribution.firstContent,
      "First Term": attribution.firstTerm,
      "Latest Source": attribution.latestSource,
      "Latest Medium": attribution.latestMedium,
      "Latest Campaign": attribution.latestCampaign,
      "Latest Content": attribution.latestContent,
      "Latest Term": attribution.latestTerm,
      "Landing Page": attribution.landingPage,
      Referrer: attribution.referrer,
      "Pages Viewed": attribution.pagesViewed,
      "First Visit": attribution.firstVisitTime,
      "Latest Visit": attribution.latestVisitTime,
      "Enquiry Submitted": new Date().toISOString(),
      "Device Category": attribution.deviceCategory,
      Browser: attribution.browser,
      "Operating System": attribution.operatingSystem,
    };
    Object.entries(values).forEach(([name, value]) => {
      const input = e.currentTarget.elements.namedItem(name);
      if (input instanceof HTMLInputElement) input.value = value;
    });
    setShowError(false);
  }

  return (
    <section id="enquiry" className="bg-ivory py-24 sm:py-32">
      <div className="mx-auto max-w-[1400px] px-5 sm:px-8">
        <div className="grid gap-12 lg:grid-cols-[0.75fr_1.25fr] lg:gap-20">
          <Reveal>
            <Eyebrow>Enquiry</Eyebrow>
            <h2 className="mt-6 font-display text-[clamp(2rem,4.4vw,3.4rem)] leading-[1.05]">
              LET&apos;S TALK ABOUT YOUR PROJECT
            </h2>
            <p className="mt-6 max-w-sm text-sm leading-relaxed text-muted-foreground">
              Share a few details and {business.owner} will get back to you personally. You can also
              reach us on{" "}
              <a href={business.phoneHref} className="link-underline text-charcoal">
                {business.phone}
              </a>
              .
            </p>
          </Reveal>

          <div className="relative">
            <motion.form
              action={formEndpoint}
              method="POST"
              onSubmit={onSubmit}
              initial={{ opacity: 0 }}
              animate={{ opacity: 1 }}
              className="grid gap-8 sm:grid-cols-2"
            >
                  <input type="hidden" name="_subject" value="NEW WEBSITE LEAD - AK INTERIORS & CIVIL" />
                  <input type="hidden" name="_template" value="table" />
                  <input type="hidden" name="_hcaptcha" value="false" />
                  <input type="hidden" name="_captcha" value="false" />
                  <input type="hidden" name="_next" value={successUrl} />
                  <input type="hidden" name="_replyto" value={replyTo} />
                  <input type="text" name="_honey" className="hidden" tabIndex={-1} autoComplete="off" aria-hidden="true" />
                  <input type="hidden" name="Lead Type" value="FORM ENQUIRY" />
                  <input type="hidden" name="Lead Heading" value="NEW WEBSITE LEAD — AK INTERIORS & CIVIL" />
                  <input type="hidden" name="Customer Details" value="CUSTOMER DETAILS" />
                  <input type="hidden" name="Lead Source / Attribution" value="LEAD SOURCE / ATTRIBUTION" />
                  {[
                    "Tracking Consent", "Visitor ID", "Session ID", "First Source", "First Medium", "First Campaign",
                    "First Content", "First Term", "Latest Source", "Latest Medium", "Latest Campaign", "Latest Content",
                    "Latest Term", "Landing Page", "Referrer", "Pages Viewed", "First Visit", "Latest Visit",
                    "Enquiry Submitted", "Device Category", "Browser", "Operating System",
                  ].map((name) => <input key={name} type="hidden" name={name} defaultValue="Not collected" />)}
                  <input type="hidden" name="Business Details" value="BUSINESS DETAILS" />
                  <input type="hidden" name="Website" value="AK Interiors & Civil" />
                  <input type="hidden" name="Owner" value="T. Murugan" />
                  <input type="hidden" name="Business Phone" value="+91 91769 22419" />
                  <input type="hidden" name="Business Email" value="akinterior251@gmail.com" />
                  <input type="hidden" name="Business Address" value="Gandhi Street, Chennai, Tamil Nadu" />
                  <div>
                    <label htmlFor="name" className="label-eyebrow text-taupe">
                      Full Name
                    </label>
                    <input id="name" name="name" required minLength={2} maxLength={100} autoComplete="name" className={fieldClass} />
                  </div>
                  <div>
                    <label htmlFor="phone" className="label-eyebrow text-taupe">
                      Phone Number
                    </label>
                    <input
                      id="phone"
                      name="phone"
                      type="tel"
                      required
                       minLength={7}
                      maxLength={20}
                       autoComplete="tel"
                       title="Enter a valid phone number using 7 to 20 digits"
                      className={fieldClass}
                    />
                  </div>
                  <div>
                    <label htmlFor="email" className="label-eyebrow text-taupe">
                      Email
                    </label>
                    <input
                      id="email"
                      name="email"
                      type="email"
                      required
                      maxLength={255}
                      autoComplete="email"
                      value={replyTo}
                      onChange={(event) => setReplyTo(event.currentTarget.value)}
                      className={fieldClass}
                    />
                  </div>
                  <div>
                    <label htmlFor="project_type" className="label-eyebrow text-taupe">
                      Project Type
                    </label>
                    <select id="project_type" name="project_type" required className={fieldClass} defaultValue="">
                      <option value="" disabled>
                        Select
                      </option>
                      {projectTypes.map((t) => (
                        <option key={t} value={t}>
                          {t}
                        </option>
                      ))}
                    </select>
                  </div>
                  <div>
                    <label htmlFor="location" className="label-eyebrow text-taupe">
                      Location
                    </label>
                    <input id="location" name="location" required minLength={2} maxLength={120} autoComplete="address-level2" className={fieldClass} />
                  </div>
                  <div>
                    <label htmlFor="budget" className="label-eyebrow text-taupe">
                      Approximate Budget
                    </label>
                    <select id="budget" name="budget" required className={fieldClass} defaultValue="">
                      <option value="" disabled>Select</option>
                      {budgets.map((b) => (
                        <option key={b} value={b}>
                          {b}
                        </option>
                      ))}
                    </select>
                  </div>
                  <div>
                    <label htmlFor="start_date" className="label-eyebrow text-taupe">
                      Preferred Start Date
                    </label>
                    <input id="start_date" name="start_date" type="date" required className={fieldClass} />
                  </div>
                  <div className="sm:col-span-2">
                    <label htmlFor="message" className="label-eyebrow text-taupe">
                      Message
                    </label>
                    <textarea id="message" name="message" rows={4} required minLength={20} maxLength={2000} className={fieldClass} />
                  </div>

                  {showError && (
                    <div role="alert" className="sm:col-span-2 border-l-2 border-bronze pl-5 text-sm leading-relaxed text-charcoal">
                      <p className="font-medium">Unable to submit your enquiry right now.</p>
                      <p className="mt-1 text-muted-foreground">Please try again or contact us directly.</p>
                      <p className="mt-3">
                        Call: <a className="link-underline" href={business.phoneHref}>{business.phone}</a><br />
                        WhatsApp: <a className="link-underline" href={business.whatsappHref} target="_blank" rel="noopener noreferrer">{business.phone}</a><br />
                        Email: <a className="link-underline" href={business.emailHref}>{business.email}</a>
                      </p>
                    </div>
                  )}

                  <div className="sm:col-span-2">
                    <button
                      type="submit"
                      className="inline-flex items-center gap-3 bg-charcoal px-10 py-5 text-[11px] uppercase tracking-[0.22em] text-softwhite transition-colors hover:bg-bronze hover:text-charcoal disabled:opacity-60"
                    >
                      Send Enquiry
                    </button>
                  </div>
            </motion.form>
          </div>
        </div>
      </div>
    </section>
  );
}
