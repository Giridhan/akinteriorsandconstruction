import { useState } from "react";
import { motion } from "motion/react";
import { Eyebrow, Reveal } from "@/components/Reveal";
import { images, materials } from "@/lib/site";

export function Materials() {
  const [active, setActive] = useState(0);

  return (
    <section className="bg-ivory py-24 sm:py-32">
      <div className="mx-auto max-w-[1400px] px-5 sm:px-8">
        <Reveal>
          <Eyebrow>Material palette</Eyebrow>
          <h2 className="mt-6 max-w-2xl font-display text-[clamp(2rem,4.4vw,3.4rem)] leading-[1.05]">
            THE THINGS A SPACE IS ACTUALLY MADE OF.
          </h2>
        </Reveal>

        <div className="mt-14 grid gap-10 lg:grid-cols-[1fr_0.9fr] lg:items-center">
          <ul className="border-t border-border">
            {materials.map((m, i) => (
              <li key={m.name}>
                <button
                  type="button"
                  onMouseEnter={() => setActive(i)}
                  onFocus={() => setActive(i)}
                  className="group flex w-full items-baseline justify-between border-b border-border py-6 text-left"
                >
                  <span
                    className={`font-display text-3xl transition-colors sm:text-4xl ${
                      active === i ? "text-bronze" : "text-charcoal"
                    }`}
                  >
                    {m.name}
                  </span>
                  <span className="text-xs uppercase tracking-[0.18em] text-taupe">{m.text}</span>
                </button>
              </li>
            ))}
          </ul>

          <motion.div
            key={active}
            initial={{ opacity: 0, scale: 1.03 }}
            animate={{ opacity: 1, scale: 1 }}
            transition={{ duration: 0.7, ease: [0.22, 1, 0.36, 1] }}
            className="relative overflow-hidden"
          >
            <img
              src={images.materials}
              alt="Close-up of marble, bronze, oak and linen samples in raking light"
              width={1400}
              height={1000}
              loading="lazy"
              className="h-[300px] w-full object-cover sm:h-[460px]"
            />
            <span className="label-eyebrow absolute bottom-5 left-5 text-ivory">
              {materials[active]!.name}
            </span>
          </motion.div>
        </div>
      </div>
    </section>
  );
}
