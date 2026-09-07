import { Mail, MapPin, Phone } from "lucide-react";
import { Eyebrow, Reveal } from "@/components/Reveal";
import { business } from "@/lib/site";

export function Contact() {
  return (
    <section id="contact" className="bg-softwhite py-24 sm:py-32">
      <div className="mx-auto max-w-[1400px] px-5 sm:px-8">
        <Reveal>
          <Eyebrow>Contact</Eyebrow>
          <h2 className="mt-6 max-w-3xl font-display text-[clamp(2rem,5vw,4rem)] leading-[1.03]">
            LET&apos;S CREATE SOMETHING BEAUTIFUL.
          </h2>
        </Reveal>

        <div className="mt-16 grid gap-12 lg:grid-cols-[0.9fr_1.1fr] lg:gap-16">
          <div>
            <p className="font-display text-2xl tracking-[0.1em]">AK INTERIORS &amp; CIVIL</p>
            <dl className="mt-10 space-y-8 border-t border-border pt-10">
              <div>
                <dt className="label-eyebrow text-bronze">Owner</dt>
                <dd className="mt-3 text-lg">{business.owner}</dd>
              </div>
              <div>
                <dt className="label-eyebrow text-bronze">Phone</dt>
                <dd className="mt-3 text-lg">
                  <a href={business.phoneHref} className="link-underline">
                    {business.phone}
                  </a>
                </dd>
              </div>
              <div>
                <dt className="label-eyebrow text-bronze">Email</dt>
                <dd className="mt-3 break-all text-lg">
                  <a href={business.emailHref} className="link-underline">
                    {business.email}
                  </a>
                </dd>
              </div>
              <div>
                <dt className="label-eyebrow text-bronze">Address</dt>
                <dd className="mt-3 text-lg">{business.address}</dd>
              </div>
            </dl>

            <div className="mt-10 flex flex-wrap gap-3">
              <a
                href={business.phoneHref}
                className="inline-flex items-center gap-2 border border-charcoal px-6 py-4 text-[11px] uppercase tracking-[0.2em] transition-colors hover:bg-charcoal hover:text-softwhite"
              >
                <Phone className="h-4 w-4" /> Call Us
              </a>
              <a
                href={business.emailHref}
                className="inline-flex items-center gap-2 border border-charcoal px-6 py-4 text-[11px] uppercase tracking-[0.2em] transition-colors hover:bg-charcoal hover:text-softwhite"
              >
                <Mail className="h-4 w-4" /> Email Us
              </a>
              <a
                href={business.whatsappHref}
                target="_blank"
                rel="noopener noreferrer"
                className="inline-flex items-center gap-2 bg-bronze px-6 py-4 text-[11px] uppercase tracking-[0.2em] text-charcoal transition-colors hover:bg-charcoal hover:text-bronze"
              >
                WhatsApp Us
              </a>
            </div>
          </div>

          <div>
            <div className="relative aspect-[4/3] w-full overflow-hidden border border-border">
              <iframe
                title="Map of Chennai, Tamil Nadu"
                src="https://www.openstreetmap.org/export/embed.html?bbox=80.10%2C12.90%2C80.35%2C13.15&layer=mapnik"
                loading="lazy"
                className="h-full w-full grayscale"
              />
            </div>
            <p className="mt-4 flex items-center gap-2 text-sm text-muted-foreground">
              <MapPin className="h-4 w-4 text-bronze" /> {business.address}
            </p>
          </div>
        </div>
      </div>
    </section>
  );
}
