# Privacy-Respecting First-Party Lead Attribution

## What will be added
- A bottom cookie banner matching the existing charcoal, ivory, bronze, typography, spacing, and motion system.
- A compact Cookie Preferences dialog with Essential, Analytics, and Lead Attribution controls; Essential is always active.
- A persistent “Cookie Preferences” footer link so visitors can revise or withdraw optional consent.

## Consent and storage
- Centralize configuration and behavior in a dedicated lead-tracking module.
- Save consent locally and avoid showing the banner again after a choice.
- Only after the relevant consent, create a random `AKVISITOR-…` identifier with a configurable 12-month lifetime and a random session identifier stored for the browser session.
- Never use personal form values, browser fingerprinting, precise location, or sensitive device data for identification.
- If optional consent is withdrawn, remove optional identifiers and attribution/history stored by this feature.

## Attribution and page activity
- Capture first and latest UTM source, medium, campaign, content, and term; preserve the original first touch.
- Fall back to the referring site when available, otherwise label the source Direct.
- Record landing page, referrer, first/latest timestamps, page title/URL, and consented page history locally.
- Add coarse device category, browser family, and operating-system family without fingerprinting.
- Track page changes throughout the existing TanStack navigation without changing page design.

## Existing enquiry and contact actions
- Keep the current visible form fields and standard FormSubmit POST.
- Update the form subject to `NEW WEBSITE LEAD - AK INTERIORS & CIVIL` and add hidden, human-readable customer, attribution, device, page-history, business, and submission-time fields immediately before a valid submission.
- Label the form email as `FORM ENQUIRY` and keep the existing success page unchanged.
- Record `whatsapp_click` and `phone_click` locally only when Lead Attribution is allowed, while always allowing WhatsApp and phone links to work.
- Send consented click-attribution notifications through the same no-key FormSubmit mechanism in a hidden target, labeled `WHATSAPP CLICK` or `PHONE CLICK`; no customer name or email will be implied.

## Validation
- Test first visit, Essential Only, granular preferences, Accept All, withdrawal, UTM first/latest touch, multi-page history, enquiry payload, click conversions, and persistence.
- Verify no optional tracking occurs without consent, no API keys or Resend references exist, and core form/call/WhatsApp behavior remains available.
- Check phone, tablet, and desktop layouts plus console and hydration errors.
