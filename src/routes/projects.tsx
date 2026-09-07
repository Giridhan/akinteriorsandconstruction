import { createFileRoute } from "@tanstack/react-router";
import { PageHeader, PageShell } from "@/components/PageShell";
import { Projects } from "@/components/sections/Projects";
import { Featured } from "@/components/sections/Featured";
import { BeforeAfter } from "@/components/sections/BeforeAfter";
import { Showcase } from "@/components/sections/Showcase";
import { CTA } from "@/components/sections/CTA";

const title = "Projects | Homes, Villas & Commercial Interiors in Chennai";
const description =
  "Selected residential, villa, apartment, office and construction projects delivered by AK Interiors & Civil across Chennai.";

export const Route = createFileRoute("/projects")({
  head: () => ({
    meta: [
      { title },
      { name: "description", content: description },
      { property: "og:title", content: title },
      { property: "og:description", content: description },
      { property: "og:type", content: "website" },
      { property: "og:url", content: "/projects" },
    ],
    links: [{ rel: "canonical", href: "/projects" }],
  }),
  component: ProjectsPage,
});

function ProjectsPage() {
  return (
    <PageShell>
      <PageHeader
        eyebrow="Portfolio"
        title="SELECTED PROJECTS."
        intro="Homes, villas, workplaces and structures we have designed, built and finished across the city."
      />
      <Projects />
      <Featured />
      <BeforeAfter />
      <Showcase />
      <CTA />
    </PageShell>
  );
}
