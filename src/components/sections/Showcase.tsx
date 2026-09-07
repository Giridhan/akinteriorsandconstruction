import { useRef } from "react";
import { motion, useReducedMotion, useScroll, useTransform } from "motion/react";
import { images } from "@/lib/site";

export function Showcase() {
  const ref = useRef<HTMLElement>(null);
  const reduce = useReducedMotion();
  const { scrollYProgress } = useScroll({ target: ref, offset: ["start end", "end start"] });
  const y = useTransform(scrollYProgress, [0, 1], ["-12%", "12%"]);

  return (
    <section ref={ref} className="relative h-[70vh] min-h-[420px] overflow-hidden">
      <motion.img
        src={images.showcase}
        alt="Sunlit concrete and teak corridor with rhythmic shadows"
        width={1920}
        height={1000}
        loading="lazy"
        style={reduce ? {} : { y }}
        className="absolute inset-0 h-[125%] w-full object-cover"
      />
      <div className="absolute inset-0 bg-charcoal/65" />
      <div className="relative mx-auto flex h-full max-w-[1400px] items-center px-5 sm:px-8">
        <motion.h2
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true, margin: "-100px" }}
          transition={{ duration: 1, ease: [0.22, 1, 0.36, 1] }}
          className="max-w-4xl font-display text-[clamp(1.8rem,4.6vw,4rem)] leading-[1.08] text-ivory"
        >
          GOOD DESIGN ISN&apos;T JUST ABOUT HOW A SPACE LOOKS.{" "}
          <span className="text-bronze">IT&apos;S ABOUT HOW IT FEELS.</span>
        </motion.h2>
      </div>
    </section>
  );
}
