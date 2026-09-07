# AK Interiors & Civil — Premium Studio Website

A single-page-feel, multi-route website with an architectural studio aesthetic: charcoal/ivory palette, bronze accent, editorial serif headings, cinematic motion, and a working enquiry form that emails akinterior251@gmail.com.

## Visual identity

- Palette: Deep Charcoal #171717, Warm Ivory #F5F1E8, Architectural Beige #D8CBB8, Muted Taupe #9B8F80, Soft White #FAF9F6, Bronze #B8865B (accent only).
- Type: Cormorant Garamond for oversized editorial headings, DM Sans for body. Loaded via a font link in the site head.
- Motion: Framer Motion + scroll-driven reveals, parallax, drawn architectural lines, counters. Reduced-motion respected everywhere.
- Every section gets its own layout language — no repeated card grid.

## Pages

- `/` — Home: hero, intro (01), services, selected projects, featured project, before/after, materials, philosophy, why us, process, showcase statement, testimonials, stats, CTA, enquiry form, contact, footer.
- `/about`, `/services`, `/projects`, `/process`, `/contact` — dedicated routes reusing the same section components with their own titles/descriptions for search and sharing.

## Sections

1. Sticky header — transparent over hero, blurs to charcoal on scroll; nav with bronze underline hover; "Start Your Project" CTA; animated hamburger with sliding mobile panel.
2. Hero — full-screen image with slow parallax zoom, word-by-word heading reveal, label, two buttons, floating 01 DESIGN / 02 BUILD / 03 TRANSFORM measurement marks, self-drawing thin lines, scroll indicator.
3. Intro — asymmetric image + text, oversized "01".
4. Services — 8 interactive rows; hover reveals background image, shifts number/title, expands bronze line, animates arrow. Mobile becomes an accordion.
5. Projects — editorial masonry grid, animated filters (All / Residential / Commercial / Interiors / Construction), hover zoom + overlay + rising title.
6. Featured project — cinematic split with parallax and "01 / 06".
7. Before/After — draggable comparison slider (mouse + touch + keyboard).
8. Materials — Wood / Stone / Marble / Metal / Fabric / Lighting with hover reveals.
9. Why Us — vertical editorial list, animated numbers and connecting lines.
10. Process — scroll-driven timeline; line draws, active step highlights, image swaps.
11. Design showcase — full-bleed parallax statement.
12. Testimonials — horizontal carousel with oversized quote marks; content kept in one editable list.
13. Stats — dark section, counters animating on entry, values in one editable list.
14. CTA — dramatic, with consultation + WhatsApp buttons.
15. Enquiry form — all 8 fields, dropdowns as specified, validation, loading/success/error states.
16. Contact — details, Call/Email/WhatsApp actions, Chennai map area.
17. Footer — dark, logo, tagline, nav, contact, social placeholders, 2026 copyright.

Global: scroll progress bar, floating WhatsApp button with pulse + desktop tooltip, custom cursor on pointer devices only, magnetic buttons, smooth anchor scrolling.

## Enquiry email

- Lovable Cloud is enabled for backend capability; the form posts to a server function.
- Enquiries are stored so nothing is lost, then emailed to akinterior251@gmail.com with subject "New Website Project Enquiry – AK Interiors & Civil" and the full field list in the body.
- Email sending uses Resend; I will ask for the API key and store it as a secret. No key ever reaches the browser.

## Imagery

Generated architectural/interior imagery (modern Chennai homes, living rooms, kitchens, bedrooms, villas, offices, construction detail, materials), consistent crops, lazy loaded, descriptive alt text.

## SEO & accessibility

Per-page titles/descriptions/social tags, LocalBusiness structured data (AK Interiors & Civil, T. Murugan, Gandhi Street Chennai, phone, email), semantic headings, keyboard focus states, labelled form fields, tel: and mailto: links throughout.

## Technical notes

TanStack Start routes under `src/routes`; tokens defined in `src/styles.css` as design tokens (no hardcoded colors in components); Framer Motion for animation; enquiry handled by a server function with Zod validation plus a Cloud table and Resend delivery.
