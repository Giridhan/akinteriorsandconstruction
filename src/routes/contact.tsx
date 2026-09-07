import { createFileRoute } from "@tanstack/react-router";
import { PageHeader, PageShell } from "@/components/PageShell";
import { EnquiryForm } from "@/components/sections/EnquiryForm";
import { Contact } from "@/components/sections/Contact";
import { business } from "@/lib/site";

const title = "Contact AK Interiors & Civil | Interior & Construction Enquiry, Chennai";
const description =
  "Call +91 91769 22419, message us on WhatsApp or send a project enquiry to AK Interiors & Civil, Gandhi Street, Chennai, Tamil Nadu.";

export const Route = createFileRoute("/contact")({
  head: () => ({
    meta: [
      { title },
      { name: "description", content: description },
      { property: "og:title", content: title },
      { property: "og:description", content: description },
      { property: "og:type", content: "website" },
      { property: "og:url", content: "/contact" },
    ],
    links: [{ rel: "canonical", href: "/contact" }],
    scripts: [
      {
        type: "application/ld+json",
        children: JSON.stringify({
          "@context": "https://schema.org",
          "@type": "LocalBusiness",
          name: business.name,
          founder: business.owner,
          telephone: business.phone,
          email: business.email,
          address: {
            "@type": "PostalAddress",
            streetAddress: "Gandhi Street",
            addressLocality: "Chennai",
            addressRegion: "Tamil Nadu",
            addressCountry: "IN",
          },
        }),
      },
    ],
  }),
  component: ContactPage,
});

function ContactPage() {
  return (
    <PageShell>
      <PageHeader
        eyebrow="Start your project"
        title="LET'S TALK ABOUT YOUR SPACE."
        intro="Tell us the location, the scope and roughly what you have in mind. We will come back with next steps and a realistic estimate."
      />
      <EnquiryForm />
      <Contact />
    </PageShell>
  );
}
