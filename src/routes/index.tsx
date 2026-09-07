import { createFileRoute } from "@tanstack/react-router";
import { PageShell } from "@/components/PageShell";
import { Hero } from "@/components/sections/Hero";
import { Intro } from "@/components/sections/Intro";
import { Services } from "@/components/sections/Services";
import { Projects } from "@/components/sections/Projects";
import { Featured } from "@/components/sections/Featured";
import { BeforeAfter } from "@/components/sections/BeforeAfter";
import { Materials } from "@/components/sections/Materials";
import { Showcase } from "@/components/sections/Showcase";
import { WhyUs } from "@/components/sections/WhyUs";
import { Process } from "@/components/sections/Process";
import { Testimonials } from "@/components/sections/Testimonials";
import { Stats } from "@/components/sections/Stats";
import { CTA } from "@/components/sections/CTA";
import { EnquiryForm } from "@/components/sections/EnquiryForm";
import { Contact } from "@/components/sections/Contact";
import { business } from "@/lib/site";

const title = "AK Interiors & Civil | Interior Design & Civil Construction in Chennai";
const description =
  "AK Interiors & Civil provides premium interior design, residential interiors, commercial interiors, civil construction, renovation and turnkey project solutions in Chennai.";

export const Route = createFileRoute("/")({
  head: () => ({
    meta: [
      { title },
      { name: "description", content: description },
      { property: "og:title", content: title },
      { property: "og:description", content: description },
      { property: "og:type", content: "website" },
      { property: "og:url", content: "/" },
      { name: "twitter:card", content: "summary_large_image" },
    ],
    links: [{ rel: "canonical", href: "/" }],
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
          areaServed: "Chennai, Tamil Nadu",
          description,
        }),
      },
    ],
  }),
  component: Home,
});

function Home() {
  return (
    <PageShell overHero>
      <Hero />
      <Intro />
      <Services />
      <Projects />
      <Featured />
      <BeforeAfter />
      <Materials />
      <Showcase />
      <WhyUs />
      <Process />
      <Testimonials />
      <Stats />
      <CTA />
      <EnquiryForm />
      <Contact />
    </PageShell>
  );
}
