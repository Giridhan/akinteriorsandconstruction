import { useRef } from "react";
import { motion, useReducedMotion, useScroll, useTransform } from "motion/react";
import { Eyebrow, Reveal } from "@/components/Reveal";
import { images } from "@/lib/site";

export function Featured() {
  const ref = useRef<HTMLElement>(null);
  const reduce = useReducedMotion();
  const { scrollYProgress } = useScroll({ target: ref, offset: ["start end", "end start"] });
  const y = useTransform(scrollYProgress, [0, 1], ["-6%", "6%"]);

  return (
    <section ref={ref} className="bg-softwhite py-24 sm:py-32">
      <div className="mx-auto max-w-[1400px] px-5 sm:px-8">
        <div className="grid gap-12 lg:grid-cols-[1.15fr_0.85fr] lg:gap-16">
          <div className="relative overflow-hidden">
            <motion.img
              src={images.featured}
              alt="Double-height living and dining space of a modern Chennai residence"
              width={1600}
              height={1200}
              loading="lazy"
              style={reduce ? {} : { y }}
              className="h-[420px] w-full scale-110 object-cover sm:h-[620px]"
            />
          </div>

          <div className="flex flex-col justify-center">
            <Reveal>
              <Eyebrow>Featured project</Eyebrow>
            </Reveal>
            <Reveal delay={0.08}>
              <p className="mt-8 font-display text-6xl text-charcoal/15">01 / 06</p>
              <h2 className="mt-4 font-display text-[clamp(2rem,4vw,3.4rem)] leading-[1.05]">
                Modern Chennai Residence
              </h2>
            </Reveal>
            <Reveal delay={0.14}>
              <p className="mt-7 max-w-md text-base leading-relaxed text-muted-foreground">
                A four-bedroom home taken from bare structure to finished interiors. We opened the
                ground floor into a single daylight-led volume, rebuilt the staircase in stone, and
                detailed every wardrobe, kitchen and lighting circuit in-house.
              </p>
            </Reveal>
            <Reveal delay={0.2}>
              <ul className="mt-10 space-y-4 border-t border-border pt-8">
                {["Design", "Construction", "Interiors", "Turnkey Execution"].map((t, i) => (
                  <li key={t} className="flex items-baseline gap-5">
                    <span className="label-eyebrow text-bronze">{`0${i + 1}`}</span>
                    <span className="text-sm uppercase tracking-[0.18em]">{t}</span>
                  </li>
                ))}
              </ul>
            </Reveal>
          </div>
        </div>
      </div>
    </section>
  );
}
