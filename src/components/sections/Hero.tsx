import { Link } from "@tanstack/react-router";
import { motion, useReducedMotion, useScroll, useTransform } from "motion/react";
import { useRef } from "react";
import { images } from "@/lib/site";

const headingLines = [
  ["WE", "CREATE"],
  ["SPACES", "THAT"],
  ["INSPIRE."],
];
const marks = ["01 — DESIGN", "02 — BUILD", "03 — TRANSFORM"];

export function Hero() {
  const ref = useRef<HTMLElement>(null);
  const reduce = useReducedMotion();
  const { scrollYProgress } = useScroll({ target: ref, offset: ["start start", "end start"] });
  const scale = useTransform(scrollYProgress, [0, 1], [1, 1.18]);
  const y = useTransform(scrollYProgress, [0, 1], ["0%", "14%"]);

  return (
    <section ref={ref} className="relative min-h-[100svh] overflow-hidden bg-charcoal">
      <motion.img
        src={images.hero}
        alt="Double-height living room of a modern Chennai villa at dusk"
        width={1920}
        height={1088}
        style={reduce ? {} : { scale, y }}
        className="absolute inset-0 h-full w-full object-cover"
      />
      <div className="absolute inset-0 bg-gradient-to-b from-charcoal/85 via-charcoal/45 to-charcoal/90" />

      <div aria-hidden className="absolute inset-0">
        {[18, 50, 82].map((left, i) => (
          <motion.span
            key={left}
            initial={{ scaleY: 0 }}
            animate={{ scaleY: 1 }}
            transition={{ duration: 1.6, delay: 0.3 + i * 0.15, ease: [0.22, 1, 0.36, 1] }}
            style={{ left: `${left}%` }}
            className="absolute inset-y-0 w-px origin-top bg-ivory/10"
          />
        ))}
        <motion.span
          initial={{ scaleX: 0 }}
          animate={{ scaleX: 1 }}
          transition={{ duration: 1.8, delay: 0.5, ease: [0.22, 1, 0.36, 1] }}
          className="absolute left-0 top-[62%] h-px w-full origin-left bg-ivory/10"
        />
      </div>

      <div className="relative z-10 mx-auto grid min-h-[100svh] w-full max-w-[1400px] grid-rows-[1fr_auto] px-5 pb-8 pt-28 sm:px-8 sm:pb-10 sm:pt-32 lg:pb-12 lg:pt-36">
        <div className="flex min-w-0 flex-col justify-center py-8 sm:py-10 lg:py-12">
          <motion.p
            initial={{ opacity: 0, x: -24 }}
            animate={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.9, delay: 0.2 }}
            className="label-eyebrow text-bronze"
          >
            Chennai • Interiors • Civil Construction
          </motion.p>

          <h1 className="mt-5 max-w-[900px] font-display text-[clamp(3rem,12vw,5rem)] leading-[0.9] text-ivory sm:mt-6 sm:text-[clamp(4rem,8vw,6.5rem)] lg:text-[clamp(4.5rem,7vw,7.5rem)]">
            {headingLines.map((line, lineIndex) => (
              <span key={line.join("-")} className="block whitespace-nowrap">
                {line.map((word, wordIndex) => {
                  const animationIndex = headingLines
                    .slice(0, lineIndex)
                    .reduce((total, previousLine) => total + previousLine.length, 0) + wordIndex;

                  return (
                    <motion.span
                      key={word}
                      initial={{ opacity: 0, y: 30 }}
                      animate={{ opacity: 1, y: 0 }}
                      transition={{
                        duration: 0.8,
                        delay: 0.35 + animationIndex * 0.1,
                        ease: [0.22, 1, 0.36, 1],
                      }}
                      className="mr-[0.25em] inline-block last:mr-0"
                    >
                      {word}
                    </motion.span>
                  );
                })}
              </span>
            ))}
          </h1>

          <motion.p
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.9, delay: 1 }}
            className="mt-6 max-w-xl text-sm leading-relaxed text-ivory/70 sm:mt-7 sm:text-base"
          >
            From architectural foundations to refined interiors, we transform ideas into beautifully
            crafted spaces.
          </motion.p>

          <motion.div
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.9, delay: 1.15 }}
            className="mt-7 flex flex-col items-stretch gap-3 min-[430px]:flex-row min-[430px]:items-center sm:mt-8 sm:gap-4"
          >
            <Link
              to="/projects"
              className="bg-bronze px-6 py-4 text-center text-[11px] uppercase tracking-[0.22em] text-charcoal transition-colors hover:bg-ivory sm:px-8"
            >
              Explore Our Work
            </Link>
            <Link
              to="/contact"
              className="border border-ivory/40 px-6 py-4 text-center text-[11px] uppercase tracking-[0.22em] text-ivory transition-colors hover:border-bronze hover:text-bronze sm:px-8"
            >
              Start Your Project
            </Link>
          </motion.div>
        </div>

        <div className="flex items-end justify-between gap-6 pt-4">
          <span className="label-eyebrow flex items-center gap-3 text-ivory/50">
            Scroll to explore
            <motion.span
              animate={reduce ? {} : { y: [0, 8, 0] }}
              transition={{ repeat: Infinity, duration: 2.2, ease: "easeInOut" }}
            >
              ↓
            </motion.span>
          </span>

          <ul aria-hidden className="hidden gap-10 md:flex">
            {marks.map((m, i) => (
              <motion.li
                key={m}
                initial={{ opacity: 0, y: 14 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.8, delay: 1.3 + i * 0.15 }}
                className="label-eyebrow text-ivory/45"
              >
                {m}
              </motion.li>
            ))}
          </ul>
        </div>
      </div>
    </section>
  );
}
