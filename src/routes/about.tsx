import { createFileRoute } from "@tanstack/react-router";
import { PageHeader, PageShell } from "@/components/PageShell";
import { Intro } from "@/components/sections/Intro";
import { WhyUs } from "@/components/sections/WhyUs";
import { Materials } from "@/components/sections/Materials";
import { Stats } from "@/components/sections/Stats";
import { Testimonials } from "@/components/sections/Testimonials";
import { CTA } from "@/components/sections/CTA";

const title = "About AK Interiors & Civil | Chennai Design & Build Studio";
const description =
  "Led by T. Murugan, AK Interiors & Civil is a Chennai studio delivering interior design and civil construction under one accountable team.";

export const Route = createFileRoute("/about")({
  head: () => ({
    meta: [
      { title },
      { name: "description", content: description },
      { property: "og:title", content: title },
      { property: "og:description", content: description },
      { property: "og:type", content: "website" },
      { property: "og:url", content: "/about" },
    ],
    links: [{ rel: "canonical", href: "/about" }],
  }),
  component: AboutPage,
});

function AboutPage() {
  return (
    <PageShell>
      <PageHeader
        eyebrow="Who we are"
        title="A STUDIO THAT DESIGNS AND BUILDS."
        intro="We combine creative interior design with dependable civil construction so a single team stays responsible from the first sketch to the final handover."
      />
      <Intro />
      <WhyUs />
      <Materials />
      <Stats />
      <Testimonials />
      <CTA />
    </PageShell>
  );
}
