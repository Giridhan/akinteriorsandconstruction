import { Reveal, Eyebrow, DrawLine } from "@/components/Reveal";
import { images } from "@/lib/site";

export function Intro() {
  return (
    <section className="relative bg-softwhite py-24 sm:py-32">
      <div className="mx-auto max-w-[1400px] px-5 sm:px-8">
        <div className="grid items-start gap-12 lg:grid-cols-[0.95fr_1.05fr] lg:gap-20">
          <Reveal className="relative lg:pt-16">
            <span
              aria-hidden
              className="pointer-events-none absolute -left-3 -top-10 font-display text-[9rem] leading-none text-charcoal/[0.06] sm:text-[13rem]"
            >
              01
            </span>
            <img
              src={images.intro}
              alt="Entrance foyer of a modern Indian home with teak slat screen and stone flooring"
              width={1024}
              height={1280}
              loading="lazy"
              className="relative w-full object-cover"
            />
          </Reveal>

          <div className="lg:pt-24">
            <Reveal>
              <Eyebrow>Who we are</Eyebrow>
            </Reveal>
            <Reveal delay={0.08}>
              <h2 className="mt-8 font-display text-[clamp(2rem,4.6vw,3.6rem)] leading-[1.05]">
                DESIGNING WITH PURPOSE.
                <br />
                BUILDING WITH PRECISION.
              </h2>
            </Reveal>
            <div className="my-10">
              <DrawLine />
            </div>
            <Reveal delay={0.14}>
              <p className="max-w-lg text-base leading-relaxed text-muted-foreground">
                AK Interiors &amp; Civil combines creative interior design with dependable civil
                construction to deliver complete spaces from concept to completion.
              </p>
            </Reveal>
            <Reveal delay={0.2}>
              <dl className="mt-12 grid max-w-lg grid-cols-2 gap-y-8">
                {[
                  ["Studio", "Chennai, Tamil Nadu"],
                  ["Led by", "T. Murugan"],
                  ["Disciplines", "Interiors & Civil"],
                  ["Delivery", "Turnkey execution"],
                ].map(([k, v]) => (
                  <div key={k}>
                    <dt className="label-eyebrow text-bronze">{k}</dt>
                    <dd className="mt-3 text-sm text-charcoal">{v}</dd>
                  </div>
                ))}
              </dl>
            </Reveal>
          </div>
        </div>
      </div>
    </section>
  );
}
