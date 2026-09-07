import { createFileRoute } from "@tanstack/react-router";
import { PageHeader, PageShell } from "@/components/PageShell";
import { Services } from "@/components/sections/Services";
import { Materials } from "@/components/sections/Materials";
import { Featured } from "@/components/sections/Featured";
import { CTA } from "@/components/sections/CTA";
import { EnquiryForm } from "@/components/sections/EnquiryForm";

const title = "Services | Interiors, Civil Construction & Turnkey Projects in Chennai";
const description =
  "Interior design, residential and commercial interiors, civil construction, renovation, modular kitchens and turnkey project delivery across Chennai.";

export const Route = createFileRoute("/services")({
  head: () => ({
    meta: [
      { title },
      { name: "description", content: description },
      { property: "og:title", content: title },
      { property: "og:description", content: description },
      { property: "og:type", content: "website" },
      { property: "og:url", content: "/services" },
    ],
    links: [{ rel: "canonical", href: "/services" }],
  }),
  component: ServicesPage,
});

function ServicesPage() {
  return (
    <PageShell>
      <PageHeader
        eyebrow="What we do"
        title="COMPLETE SOLUTIONS FOR SPACES BUILT TO LAST."
        intro="Eight disciplines, one team. Choose a single service or hand us the whole project from structure to styling."
      />
      <Services />
      <Featured />
      <Materials />
      <EnquiryForm />
      <CTA />
    </PageShell>
  );
}
