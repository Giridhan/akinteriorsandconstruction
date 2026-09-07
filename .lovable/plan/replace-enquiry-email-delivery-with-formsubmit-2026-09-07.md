# Replace Enquiry Email Delivery with FormSubmit

## Scope
- Keep the website’s current form styling, typography, animation, layout, phone link, and WhatsApp link unchanged.
- Replace the JavaScript/server email flow with a normal browser POST to `https://formsubmit.co/akinterior251@gmail.com`.
- Remove the Resend-specific function and package dependency so no email API key or paid email provider is required.

## Form behavior
- Preserve the eight visible fields and give them readable submission names: `name`, `phone`, `email`, `project_type`, `location`, `budget`, `start_date`, and `message`.
- Add FormSubmit settings for the requested subject, table email template, disabled hCaptcha, visitor Reply-To, and a hidden honeypot.
- Add native client validation: required fields, length limits, email validation, phone pattern, and a minimum message length.
- Include hidden business details so each delivered enquiry clearly identifies AK Interiors & Civil, T. Murugan, the business phone, and Gandhi Street address.

## Success and failure experience
- Add a branded `/enquiry-success` page with the exact confirmation copy and a “Back to Website” button.
- Point FormSubmit’s `_next` field to the published site’s real success URL.
- Keep submission honest: the browser leaves the site for FormSubmit and only returns to the success page after that service accepts the submission.
- Add direct call, WhatsApp, and email guidance alongside the form for browser-side validation problems; FormSubmit/network failures remain visible as genuine submission failures rather than a false success.

## Verification
- Confirm no Resend/API-key references remain.
- Verify field names, endpoint, recipient, subject, Reply-To mapping, honeypot, validation, and redirect in the rendered form.
- Exercise validation and inspect desktop/mobile rendering and browser console.
- Send one clearly labeled test enquiry to FormSubmit and inspect the resulting POST response. The first FormSubmit submission may trigger FormSubmit’s one-time recipient activation email, which only the mailbox owner can approve.
