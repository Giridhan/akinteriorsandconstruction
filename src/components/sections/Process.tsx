import { useState } from "react";
import { motion } from "motion/react";
import { Eyebrow, Reveal } from "@/components/Reveal";
import { processSteps } from "@/lib/site";

export function Process() {
  const [active, setActive] = useState(0);

  return (
    <section className="bg-charcoal py-24 text-ivory sm:py-32">
      <div className="mx-auto max-w-[1400px] px-5 sm:px-8">
        <Reveal>
          <Eyebrow>Our process</Eyebrow>
          <h2 className="mt-6 font-display text-[clamp(2.2rem,5.5vw,4.4rem)] leading-none">
            FROM IDEA TO REALITY
          </h2>
        </Reveal>

        <div className="mt-16 grid gap-12 lg:grid-cols-[0.95fr_1.05fr] lg:gap-20">
          <div className="relative">
            <motion.span
              aria-hidden
              initial={{ scaleY: 0 }}
              whileInView={{ scaleY: 1 }}
              viewport={{ once: true, margin: "-100px" }}
              transition={{ duration: 1.8, ease: [0.22, 1, 0.36, 1] }}
              className="absolute left-0 top-0 h-full w-px origin-top bg-white/15"
            />
            <ul>
              {processSteps.map((s, i) => (
                <li key={s.n}>
                  <button
                    type="button"
                    onMouseEnter={() => setActive(i)}
                    onFocus={() => setActive(i)}
                    onClick={() => setActive(i)}
                    aria-current={active === i}
                    className="group block w-full py-7 pl-8 text-left"
                  >
                    <span
                      aria-hidden
                      className={`absolute left-0 h-2 w-2 -translate-x-1/2 rounded-full transition-colors ${
                        active === i ? "bg-bronze" : "bg-white/25"
                      }`}
                      style={{ marginTop: "0.6rem" }}
                    />
                    <span className="label-eyebrow text-bronze">{s.n}</span>
                    <h3
                      className={`mt-3 font-display text-2xl transition-colors sm:text-3xl ${
                        active === i ? "text-ivory" : "text-ivory/45"
                      }`}
                    >
                      {s.title.toUpperCase()}
                    </h3>
                    <p className="mt-2 max-w-md text-sm leading-relaxed text-ivory/50">{s.text}</p>
                  </button>
                </li>
              ))}
            </ul>
          </div>

          <div className="relative lg:sticky lg:top-28 lg:h-[560px]">
            <motion.img
              key={active}
              src={processSteps[active]!.image}
              alt={`${processSteps[active]!.title} stage of an AK Interiors & Civil project`}
              loading="lazy"
              initial={{ opacity: 0, scale: 1.04 }}
              animate={{ opacity: 1, scale: 1 }}
              transition={{ duration: 0.8, ease: [0.22, 1, 0.36, 1] }}
              className="h-[320px] w-full object-cover sm:h-[560px]"
            />
            <span className="absolute -bottom-6 -left-3 font-display text-7xl text-ivory/15 sm:text-8xl">
              {processSteps[active]!.n}
            </span>
          </div>
        </div>
      </div>
    </section>
  );
}
