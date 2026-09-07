import { motion } from "motion/react";
import { business, images } from "@/lib/site";

export function CTA() {
  return (
    <section className="relative overflow-hidden bg-charcoal py-28 text-ivory sm:py-36">
      <img
        src={images.showcase}
        alt=""
        aria-hidden
        loading="lazy"
        className="absolute inset-0 h-full w-full object-cover opacity-25"
      />
      <div className="absolute inset-0 bg-charcoal/70" />

      <div className="relative mx-auto max-w-[1400px] px-5 text-center sm:px-8">
        <motion.h2
          initial={{ opacity: 0, y: 28 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true, margin: "-80px" }}
          transition={{ duration: 0.9, ease: [0.22, 1, 0.36, 1] }}
          className="mx-auto max-w-4xl font-display text-[clamp(2.2rem,6vw,5rem)] leading-[1.02]"
        >
          READY TO BUILD
          <br />
          YOUR DREAM SPACE?
        </motion.h2>
        <p className="mx-auto mt-8 max-w-xl text-base leading-relaxed text-ivory/65">
          Tell us about your project and let&apos;s turn your ideas into a space you&apos;ll love.
        </p>
        <div className="mt-12 flex flex-wrap justify-center gap-4">
          <a
            href="#enquiry"
            className="bg-bronze px-9 py-4 text-[11px] uppercase tracking-[0.22em] text-charcoal transition-colors hover:bg-ivory"
          >
            Get a Free Consultation
          </a>
          <a
            href={business.whatsappHref}
            target="_blank"
            rel="noopener noreferrer"
            className="border border-ivory/40 px-9 py-4 text-[11px] uppercase tracking-[0.22em] transition-colors hover:border-bronze hover:text-bronze"
          >
            WhatsApp Us
          </a>
        </div>
      </div>
    </section>
  );
}
