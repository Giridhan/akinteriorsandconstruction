import { Link } from "@tanstack/react-router";
import { Facebook, Instagram, Linkedin, Youtube } from "lucide-react";
import { business, navLinks } from "@/lib/site";
import { openCookiePreferences } from "@/lib/leadTracking";

export function SiteFooter() {
  return (
    <footer className="bg-charcoal text-ivory">
      <div className="mx-auto max-w-[1400px] px-5 py-20 sm:px-8">
        <div className="grid gap-14 border-b border-white/10 pb-14 md:grid-cols-[1.4fr_1fr_1fr]">
          <div>
            <p className="font-display text-2xl tracking-[0.14em]">
              AK <span className="text-bronze">INTERIORS</span> &amp; CIVIL
            </p>
            <p className="label-eyebrow mt-5 text-bronze">{business.tagline}</p>
            <p className="mt-6 max-w-sm text-sm leading-relaxed text-ivory/60">
              Interior design and civil construction studio in Chennai, led by {business.owner}.
            </p>
            <div className="mt-7 flex gap-3">
              {[
                { Icon: Instagram, label: "Instagram" },
                { Icon: Facebook, label: "Facebook" },
                { Icon: Linkedin, label: "LinkedIn" },
                { Icon: Youtube, label: "YouTube" },
              ].map(({ Icon, label }) => (
                <a
                  key={label}
                  href={business.whatsappHref}
                  target="_blank"
                  rel="noopener noreferrer"
                  aria-label={`${label} — link to be added`}
                  className="flex h-10 w-10 items-center justify-center border border-white/15 text-ivory/70 transition-colors hover:border-bronze hover:text-bronze"
                >
                  <Icon className="h-4 w-4" />
                </a>
              ))}
            </div>
          </div>

          <nav aria-label="Footer">
            <p className="label-eyebrow text-ivory/40">Navigate</p>
            <ul className="mt-6 space-y-3">
              {navLinks.map((l) => (
                <li key={l.to}>
                  <Link to={l.to} className="text-sm text-ivory/70 transition-colors hover:text-bronze">
                    {l.label}
                  </Link>
                </li>
              ))}
            </ul>
          </nav>

          <div>
            <p className="label-eyebrow text-ivory/40">Contact</p>
            <ul className="mt-6 space-y-3 text-sm text-ivory/70">
              <li>
                <a href={business.phoneHref} className="transition-colors hover:text-bronze">
                  {business.phone}
                </a>
              </li>
              <li>
                <a href={business.emailHref} className="break-all transition-colors hover:text-bronze">
                  {business.email}
                </a>
              </li>
              <li>{business.address}</li>
              <li>Owner — {business.owner}</li>
            </ul>
          </div>
        </div>

        <div className="flex flex-wrap items-center justify-between gap-4 pt-8 text-xs tracking-[0.14em] text-ivory/40">
          <p>© 2026 {business.name}. All Rights Reserved.</p>
          <button type="button" onClick={openCookiePreferences} className="transition-colors hover:text-bronze">
            Cookie Preferences
          </button>
        </div>
      </div>
    </footer>
  );
}
