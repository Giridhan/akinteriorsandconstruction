import { useState } from "react";
import { AnimatePresence, motion } from "motion/react";
import { ArrowUpRight } from "lucide-react";
import { Eyebrow, Reveal } from "@/components/Reveal";
import { services } from "@/lib/site";

export function Services() {
  const [active, setActive] = useState<number | null>(null);

  return (
    <section className="relative overflow-hidden bg-charcoal py-24 text-ivory sm:py-32">
      <div aria-hidden className="pointer-events-none absolute inset-0 opacity-[0.07]">
        <div className="h-full w-full arch-grid" />
      </div>

      <div className="relative mx-auto max-w-[1400px] px-5 sm:px-8">
        <div className="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
          <Reveal>
            <Eyebrow>What we do</Eyebrow>
            <h2 className="mt-6 font-display text-[clamp(2.2rem,5.5vw,4.4rem)] leading-none">
              WHAT WE DO
            </h2>
          </Reveal>
          <Reveal delay={0.1}>
            <p className="max-w-sm text-sm leading-relaxed text-ivory/60">
              Complete solutions for spaces that are built to last.
            </p>
          </Reveal>
        </div>

        <ul className="mt-16 border-t border-white/10">
          {services.map((s, i) => (
            <li
              key={s.n}
              onMouseEnter={() => setActive(i)}
              onMouseLeave={() => setActive(null)}
              className="group relative border-b border-white/10"
            >
              <div className="relative z-10 grid grid-cols-[auto_1fr_auto] items-center gap-5 py-7 transition-[padding] duration-500 group-hover:pl-4 sm:gap-10 sm:py-9">
                <span className="label-eyebrow text-bronze transition-transform duration-500 group-hover:-translate-y-1">
                  {s.n}
                </span>
                <div>
                  <h3 className="font-display text-2xl transition-transform duration-500 group-hover:translate-x-2 sm:text-4xl">
                    {s.title}
                  </h3>
                  <p className="mt-3 max-w-xl text-sm leading-relaxed text-ivory/55 md:max-w-lg">
                    {s.text}
                  </p>
                </div>
                <ArrowUpRight className="h-6 w-6 text-ivory/40 transition-all duration-500 group-hover:-translate-y-1 group-hover:translate-x-1 group-hover:text-bronze" />
              </div>

              <span
                aria-hidden
                className="absolute bottom-0 left-0 h-px w-full origin-left scale-x-0 bg-bronze transition-transform duration-700 group-hover:scale-x-100"
              />
            </li>
          ))}
        </ul>
      </div>

      <AnimatePresence>
        {active !== null && (
          <motion.div
            key={active}
            initial={{ opacity: 0 }}
            animate={{ opacity: 0.28 }}
            exit={{ opacity: 0 }}
            transition={{ duration: 0.6 }}
            className="pointer-events-none absolute inset-0 hidden lg:block"
          >
            <img
              src={services[active]!.image}
              alt=""
              aria-hidden
              className="h-full w-full object-cover"
            />
            <div className="absolute inset-0 bg-charcoal/50" />
          </motion.div>
        )}
      </AnimatePresence>
    </section>
  );
}
