import { Link, createFileRoute } from "@tanstack/react-router";
import { Check } from "lucide-react";
import { PageShell } from "@/components/PageShell";

const title = "Enquiry Received | AK Interiors & Civil";
const description = "Your project enquiry has been received by AK Interiors & Civil in Chennai.";

export const Route = createFileRoute("/enquiry-success")({
  head: () => ({
    meta: [
      { title },
      { name: "description", content: description },
      { name: "robots", content: "noindex, follow" },
      { property: "og:title", content: title },
      { property: "og:description", content: description },
      { property: "og:type", content: "website" },
      { name: "twitter:card", content: "summary_large_image" },
    ],
  }),
  component: EnquirySuccessPage,
});

function EnquirySuccessPage() {
  return (
    <PageShell>
      <section className="flex min-h-[78svh] items-center bg-charcoal px-5 pb-20 pt-40 text-ivory sm:px-8 sm:pt-48">
        <div className="mx-auto w-full max-w-[1400px]">
          <div className="max-w-2xl border-l border-bronze pl-6 sm:pl-10">
            <span className="flex h-12 w-12 items-center justify-center border border-bronze text-bronze" aria-hidden="true">
              <Check className="h-5 w-5" />
            </span>
            <h1 className="mt-8 font-display text-[clamp(3rem,7vw,6rem)] leading-none">Thank You!</h1>
            <p className="mt-7 text-lg leading-relaxed text-ivory/70">
              Your project enquiry has been received successfully.
              <br />
              Our team will contact you shortly.
            </p>
            <Link
              to="/"
              className="mt-10 inline-flex bg-bronze px-8 py-4 text-[11px] uppercase tracking-[0.22em] text-charcoal transition-colors hover:bg-ivory"
            >
              Back to Website
            </Link>
          </div>
        </div>
      </section>
    </PageShell>
  );
}