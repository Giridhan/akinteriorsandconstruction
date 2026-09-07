import { Eyebrow, Reveal } from "@/components/Reveal";
import { motion } from "motion/react";
import { whyUs } from "@/lib/site";

export function WhyUs() {
  return (
    <section className="bg-softwhite py-24 sm:py-32">
      <div className="mx-auto max-w-[1400px] px-5 sm:px-8">
        <Reveal>
          <Eyebrow>Why us</Eyebrow>
          <h2 className="mt-6 max-w-3xl font-display text-[clamp(2rem,5vw,4rem)] leading-[1.03]">
            WHY AK INTERIORS &amp; CIVIL?
          </h2>
        </Reveal>

        <div className="relative mt-16 pl-8 sm:pl-16">
          <motion.span
            aria-hidden
            initial={{ scaleY: 0 }}
            whileInView={{ scaleY: 1 }}
            viewport={{ once: true, margin: "-120px" }}
            transition={{ duration: 1.6, ease: [0.22, 1, 0.36, 1] }}
            className="absolute left-0 top-0 h-full w-px origin-top bg-bronze/50 sm:left-4"
          />

          <ul className="space-y-12">
            {whyUs.map((w, i) => (
              <Reveal as="li" key={w.n} delay={i * 0.05} className="relative">
                <span
                  aria-hidden
                  className="absolute -left-8 top-3 h-px w-6 bg-bronze/60 sm:-left-12 sm:w-8"
                />
                <div className="grid gap-3 md:grid-cols-[auto_1fr] md:gap-12">
                  <span className="font-display text-4xl text-charcoal/20 md:text-5xl">{w.n}</span>
                  <div className="max-w-2xl">
                    <h3 className="font-display text-2xl sm:text-3xl">{w.title}</h3>
                    <p className="mt-3 text-sm leading-relaxed text-muted-foreground">{w.text}</p>
                  </div>
                </div>
              </Reveal>
            ))}
          </ul>
        </div>
      </div>
    </section>
  );
}
