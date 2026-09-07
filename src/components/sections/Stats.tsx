import { useEffect, useRef, useState } from "react";
import { useInView, useReducedMotion } from "motion/react";
import { stats } from "@/lib/site";

function Counter({ value, suffix }: { value: number; suffix: string }) {
  const ref = useRef<HTMLSpanElement>(null);
  const inView = useInView(ref, { once: true, margin: "-80px" });
  const reduce = useReducedMotion();
  const [n, setN] = useState(0);

  useEffect(() => {
    if (!inView) return;
    if (reduce) {
      setN(value);
      return;
    }
    let raf = 0;
    const start = performance.now();
    const dur = 1600;
    const tick = (now: number) => {
      const p = Math.min(1, (now - start) / dur);
      setN(Math.round(value * (1 - Math.pow(1 - p, 3))));
      if (p < 1) raf = requestAnimationFrame(tick);
    };
    raf = requestAnimationFrame(tick);
    return () => cancelAnimationFrame(raf);
  }, [inView, value, reduce]);

  return (
    <span ref={ref} className="font-display text-[clamp(3rem,7vw,6rem)] leading-none">
      {n}
      {suffix}
    </span>
  );
}

export function Stats() {
  return (
    <section className="border-y border-white/10 bg-charcoal py-20 text-ivory sm:py-24">
      <div className="mx-auto grid max-w-[1400px] grid-cols-2 gap-y-12 px-5 sm:px-8 lg:grid-cols-4">
        {stats.map((s) => (
          <div key={s.label} className="border-l border-white/10 pl-6">
            <Counter value={s.value} suffix={s.suffix} />
            <p className="label-eyebrow mt-5 text-ivory/50">{s.label}</p>
          </div>
        ))}
      </div>
    </section>
  );
}
