import { useEffect, useState } from "react";
import { Link, useRouterState } from "@tanstack/react-router";
import { AnimatePresence, motion } from "motion/react";
import { business, navLinks } from "@/lib/site";

export function SiteHeader({ overHero = false }: { overHero?: boolean }) {
  const [scrolled, setScrolled] = useState(false);
  const [open, setOpen] = useState(false);
  const pathname = useRouterState({ select: (s) => s.location.pathname });

  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 40);
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
    return () => window.removeEventListener("scroll", onScroll);
  }, []);

  useEffect(() => {
    setOpen(false);
  }, [pathname]);

  const solid = scrolled || !overHero;

  return (
    <header
      className={`fixed inset-x-0 top-0 z-[1000] transition-[background-color,backdrop-filter,border-color] duration-500 ${
        solid
          ? "border-b border-white/10 bg-charcoal/85 backdrop-blur-xl"
          : "border-b border-transparent bg-transparent"
      }`}
    >
      <div className="mx-auto flex h-20 max-w-[1400px] items-center justify-between px-5 sm:px-8">
        <Link
          to="/"
          className="font-display text-lg tracking-[0.18em] text-ivory sm:text-xl"
          aria-label={`${business.name} — home`}
        >
          AK <span className="text-bronze">INTERIORS</span> &amp; CIVIL
        </Link>

        <nav aria-label="Main" className="hidden items-center gap-9 xl:flex">
          {navLinks.map((l) => (
            <Link
              key={l.to}
              to={l.to}
              data-active={pathname === l.to}
              className="link-underline text-[12px] uppercase tracking-[0.22em] text-ivory/80 transition-colors hover:text-ivory"
            >
              {l.label}
            </Link>
          ))}
          <Link
            to="/contact"
            className="border border-bronze px-6 py-3 text-[11px] uppercase tracking-[0.22em] text-bronze transition-colors hover:bg-bronze hover:text-charcoal"
          >
            Start Your Project
          </Link>
        </nav>

        <button
          type="button"
          onClick={() => setOpen((v) => !v)}
          aria-expanded={open}
          aria-label={open ? "Close menu" : "Open menu"}
          className="flex h-10 w-10 shrink-0 flex-col items-center justify-center gap-[7px] xl:hidden"
        >
          <motion.span
            animate={open ? { rotate: 45, y: 8 } : { rotate: 0, y: 0 }}
            className="block h-px w-7 bg-ivory"
          />
          <motion.span animate={open ? { opacity: 0 } : { opacity: 1 }} className="block h-px w-7 bg-ivory" />
          <motion.span
            animate={open ? { rotate: -45, y: -8 } : { rotate: 0, y: 0 }}
            className="block h-px w-7 bg-ivory"
          />
        </button>
      </div>

      <AnimatePresence>
        {open && (
          <motion.div
            initial={{ x: "100%" }}
            animate={{ x: 0 }}
            exit={{ x: "100%" }}
            transition={{ duration: 0.55, ease: [0.22, 1, 0.36, 1] }}
            className="fixed inset-y-0 right-0 z-[1001] flex w-[86%] max-w-sm flex-col justify-between bg-charcoal px-7 pb-10 pt-28 xl:hidden"
          >
            <nav aria-label="Mobile" className="flex flex-col gap-6">
              {navLinks.map((l, i) => (
                <motion.div
                  key={l.to}
                  initial={{ opacity: 0, x: 24 }}
                  animate={{ opacity: 1, x: 0 }}
                  transition={{ delay: 0.08 + i * 0.06, duration: 0.5 }}
                >
                  <Link to={l.to} className="font-display text-3xl text-ivory">
                    {l.label}
                  </Link>
                </motion.div>
              ))}
            </nav>
            <div className="space-y-4 text-ivory/70">
              <Link
                to="/contact"
                className="block border border-bronze px-6 py-4 text-center text-[11px] uppercase tracking-[0.22em] text-bronze"
              >
                Start Your Project
              </Link>
              <a href={business.phoneHref} className="block text-sm">
                {business.phone}
              </a>
              <a href={business.emailHref} className="block break-all text-sm">
                {business.email}
              </a>
            </div>
          </motion.div>
        )}
      </AnimatePresence>
    </header>
  );
}
