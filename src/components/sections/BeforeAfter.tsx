import { useCallback, useRef, useState } from "react";
import { Eyebrow, Reveal } from "@/components/Reveal";
import { images } from "@/lib/site";

export function BeforeAfter() {
  const [pos, setPos] = useState(50);
  const ref = useRef<HTMLDivElement>(null);
  const dragging = useRef(false);

  const setFromClientX = useCallback((clientX: number) => {
    const el = ref.current;
    if (!el) return;
    const rect = el.getBoundingClientRect();
    const next = ((clientX - rect.left) / rect.width) * 100;
    setPos(Math.min(100, Math.max(0, next)));
  }, []);

  return (
    <section className="bg-charcoal py-24 text-ivory sm:py-32">
      <div className="mx-auto max-w-[1400px] px-5 sm:px-8">
        <div className="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
          <Reveal>
            <Eyebrow>Before → After</Eyebrow>
            <h2 className="mt-6 font-display text-[clamp(2rem,4.8vw,3.8rem)] leading-[1.05]">
              FROM EMPTY SPACES
              <br />
              TO BEAUTIFUL EXPERIENCES.
            </h2>
          </Reveal>
          <Reveal delay={0.1}>
            <p className="label-eyebrow text-ivory/45">Drag the handle</p>
          </Reveal>
        </div>

        <Reveal delay={0.12}>
          <div
            ref={ref}
            className="relative mt-12 h-[320px] w-full select-none overflow-hidden sm:h-[560px]"
            onPointerDown={(e) => {
              dragging.current = true;
              (e.target as HTMLElement).setPointerCapture?.(e.pointerId);
              setFromClientX(e.clientX);
            }}
            onPointerMove={(e) => dragging.current && setFromClientX(e.clientX)}
            onPointerUp={() => (dragging.current = false)}
            onPointerLeave={() => (dragging.current = false)}
          >
            <img
              src={images.after}
              alt="Renovated living room with linen sofa, oak flooring and bronze floor lamp"
              loading="lazy"
              className="absolute inset-0 h-full w-full object-cover"
            />
            <div className="absolute inset-0" style={{ clipPath: `inset(0 ${100 - pos}% 0 0)` }}>
              <img
                src={images.before}
                alt="The same room before renovation, bare plaster walls and dusty tile floor"
                loading="lazy"
                className="h-full w-full object-cover"
              />
            </div>

            <span className="label-eyebrow absolute left-5 top-5 bg-charcoal/70 px-3 py-2 text-ivory">
              Before
            </span>
            <span className="label-eyebrow absolute right-5 top-5 bg-charcoal/70 px-3 py-2 text-bronze">
              After
            </span>

            <div
              className="absolute inset-y-0 w-px bg-bronze"
              style={{ left: `${pos}%` }}
              aria-hidden
            />
            <input
              type="range"
              min={0}
              max={100}
              value={Math.round(pos)}
              onChange={(e) => setPos(Number(e.target.value))}
              aria-label="Reveal the space before and after renovation"
              className="absolute inset-x-0 bottom-6 mx-auto h-1 w-[70%] cursor-ew-resize appearance-none bg-ivory/25 accent-bronze"
            />
          </div>
        </Reveal>
      </div>
    </section>
  );
}
