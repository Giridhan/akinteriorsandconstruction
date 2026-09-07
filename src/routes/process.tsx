import { createFileRoute } from "@tanstack/react-router";
import { PageHeader, PageShell } from "@/components/PageShell";
import { Process } from "@/components/sections/Process";
import { WhyUs } from "@/components/sections/WhyUs";
import { Stats } from "@/components/sections/Stats";
import { EnquiryForm } from "@/components/sections/EnquiryForm";

const title = "Our Process | From Consultation to Handover — AK Interiors & Civil";
const description =
  "Six clear stages: consultation, concept and design, planning, construction, interiors and final handover — how AK Interiors & Civil delivers a project in Chennai.";

export const Route = createFileRoute("/process")({
  head: () => ({
    meta: [
      { title },
      { name: "description", content: description },
      { property: "og:title", content: title },
      { property: "og:description", content: description },
      { property: "og:type", content: "website" },
      { property: "og:url", content: "/process" },
    ],
    links: [{ rel: "canonical", href: "/process" }],
  }),
  component: ProcessPage,
});

function ProcessPage() {
  return (
    <PageShell>
      <PageHeader
        eyebrow="Our process"
        title="FROM IDEA TO REALITY."
        intro="A sequenced way of working that keeps costs visible, timelines realistic and quality checked at every stage."
      />
      <Process />
      <WhyUs />
      <Stats />
      <EnquiryForm />
    </PageShell>
  );
}
