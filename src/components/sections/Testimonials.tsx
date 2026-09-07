import { useState } from "react";
import { AnimatePresence, motion } from "motion/react";
import { ArrowLeft, ArrowRight } from "lucide-react";
import { Eyebrow, Reveal } from "@/components/Reveal";
import { testimonials } from "@/lib/site";

export function Testimonials() {
  const [i, setI] = useState(0);
  const go = (d: number) => setI((prev) => (prev + d + testimonials.length) % testimonials.length);
  const t = testimonials[i]!;

  return (
    <section className="bg-ivory py-24 sm:py-32">
      <div className="mx-auto max-w-[1400px] px-5 sm:px-8">
        <Reveal>
          <Eyebrow>Testimonials</Eyebrow>
          <h2 className="mt-6 font-display text-[clamp(2rem,4.8vw,3.6rem)] leading-none">
            WHAT OUR CLIENTS SAY
          </h2>
        </Reveal>

        <div className="relative mt-14 border-t border-border pt-14">
          <span aria-hidden className="absolute -top-6 left-0 font-display text-[8rem] leading-none text-bronze/25">
            &ldquo;
          </span>

          <AnimatePresence mode="wait">
            <motion.blockquote
              key={i}
              initial={{ opacity: 0, x: 40 }}
              animate={{ opacity: 1, x: 0 }}
              exit={{ opacity: 0, x: -40 }}
              transition={{ duration: 0.6, ease: [0.22, 1, 0.36, 1] }}
              className="max-w-4xl"
            >
              <p className="font-display text-[clamp(1.4rem,3.2vw,2.6rem)] leading-[1.3]">{t.quote}</p>
              <footer className="mt-8 text-xs uppercase tracking-[0.2em] text-taupe">
                {t.name} — {t.place}
              </footer>
            </motion.blockquote>
          </AnimatePresence>

          <div className="mt-12 flex items-center gap-4">
            <button
              type="button"
              onClick={() => go(-1)}
              aria-label="Previous testimonial"
              className="flex h-12 w-12 items-center justify-center border border-border transition-colors hover:border-bronze hover:text-bronze"
            >
              <ArrowLeft className="h-4 w-4" />
            </button>
            <button
              type="button"
              onClick={() => go(1)}
              aria-label="Next testimonial"
              className="flex h-12 w-12 items-center justify-center border border-border transition-colors hover:border-bronze hover:text-bronze"
            >
              <ArrowRight className="h-4 w-4" />
            </button>
            <span className="label-eyebrow ml-3 text-taupe">
              {String(i + 1).padStart(2, "0")} / {String(testimonials.length).padStart(2, "0")}
            </span>
          </div>
        </div>
      </div>
    </section>
  );
}
