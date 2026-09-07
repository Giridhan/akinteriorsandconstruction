import { useState } from "react";
import { AnimatePresence, motion } from "motion/react";
import { ArrowUpRight } from "lucide-react";
import { Eyebrow, Reveal } from "@/components/Reveal";
import { projects, type ProjectFilter } from "@/lib/site";

const filters: ProjectFilter[] = ["All", "Residential", "Commercial", "Interiors", "Construction"];

export function Projects() {
  const [filter, setFilter] = useState<ProjectFilter>("All");
  const shown = projects.filter((p) => filter === "All" || p.groups.includes(filter));

  return (
    <section className="bg-ivory py-24 sm:py-32">
      <div className="mx-auto max-w-[1400px] px-5 sm:px-8">
        <Reveal>
          <Eyebrow>Portfolio</Eyebrow>
          <h2 className="mt-6 font-display text-[clamp(2.2rem,5.5vw,4.4rem)] leading-none">
            SELECTED PROJECTS
          </h2>
        </Reveal>

        <div className="mt-10 flex flex-wrap gap-x-7 gap-y-3">
          {filters.map((f) => (
            <button
              key={f}
              type="button"
              onClick={() => setFilter(f)}
              aria-pressed={filter === f}
              className={`label-eyebrow relative pb-2 transition-colors ${
                filter === f ? "text-charcoal" : "text-taupe hover:text-charcoal"
              }`}
            >
              {f}
              {filter === f && (
                <motion.span layoutId="filter-line" className="absolute inset-x-0 bottom-0 h-px bg-bronze" />
              )}
            </button>
          ))}
        </div>

        <motion.div layout className="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
          <AnimatePresence mode="popLayout">
            {shown.map((p) => (
              <motion.article
                layout
                key={p.name}
                initial={{ opacity: 0, y: 24 }}
                animate={{ opacity: 1, y: 0 }}
                exit={{ opacity: 0, y: -12 }}
                transition={{ duration: 0.55, ease: [0.22, 1, 0.36, 1] }}
                data-cursor="expand"
                className={`group relative overflow-hidden bg-charcoal ${
                  p.span === "tall" ? "sm:row-span-2" : ""
                }`}
              >
                <img
                  src={p.image}
                  alt={`${p.name} — ${p.type} project in ${p.location}`}
                  loading="lazy"
                  className={`w-full object-cover transition-transform duration-[1200ms] ease-[cubic-bezier(0.22,1,0.36,1)] group-hover:scale-105 ${
                    p.span === "tall" ? "h-[420px] sm:h-[680px]" : "h-[320px]"
                  }`}
                />
                <div className="absolute inset-0 bg-gradient-to-t from-charcoal via-charcoal/20 to-transparent opacity-70 transition-opacity duration-500 group-hover:opacity-95" />
                <div className="absolute inset-x-0 bottom-0 p-6 text-ivory">
                  <p className="label-eyebrow text-bronze">{p.type}</p>
                  <h3 className="mt-3 font-display text-2xl transition-transform duration-500 group-hover:-translate-y-1">
                    {p.name}
                  </h3>
                  <p className="mt-1 text-xs uppercase tracking-[0.18em] text-ivory/60">{p.location}</p>
                  <p className="mt-4 max-h-0 overflow-hidden text-sm leading-relaxed text-ivory/70 opacity-0 transition-all duration-500 group-hover:max-h-32 group-hover:opacity-100">
                    {p.text}
                  </p>
                  <span className="mt-5 inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.22em] text-ivory/0 transition-colors duration-500 group-hover:text-bronze">
                    View project <ArrowUpRight className="h-4 w-4" />
                  </span>
                </div>
              </motion.article>
            ))}
          </AnimatePresence>
        </motion.div>
      </div>
    </section>
  );
}
