import { useEffect, useState } from "react";
import { AnimatePresence, motion } from "motion/react";
import { X } from "lucide-react";
import { getCookieConsent, saveCookiePreferences, type CookiePreferences } from "@/lib/leadTracking";

type OptionalPreferences = Pick<CookiePreferences, "analytics" | "leadAttribution">;

const defaultPreferences: OptionalPreferences = { analytics: false, leadAttribution: false };

export function CookieConsent() {
  const [ready, setReady] = useState(false);
  const [showBanner, setShowBanner] = useState(false);
  const [showSettings, setShowSettings] = useState(false);
  const [preferences, setPreferences] = useState<OptionalPreferences>(defaultPreferences);

  useEffect(() => {
    const saved = getCookieConsent();
    if (saved) setPreferences({ analytics: saved.analytics, leadAttribution: saved.leadAttribution });
    else setShowBanner(true);
    setReady(true);

    const open = () => {
      const current = getCookieConsent();
      setPreferences(current ? { analytics: current.analytics, leadAttribution: current.leadAttribution } : defaultPreferences);
      setShowBanner(false);
      setShowSettings(true);
    };
    window.addEventListener("ak-open-cookie-preferences", open);
    return () => window.removeEventListener("ak-open-cookie-preferences", open);
  }, []);

  function save(next: OptionalPreferences) {
    saveCookiePreferences(next);
    setPreferences(next);
    setShowBanner(false);
    setShowSettings(false);
  }

  function closeSettings() {
    setShowSettings(false);
    if (!getCookieConsent()) setShowBanner(true);
  }

  if (!ready) return null;

  return (
    <>
      <AnimatePresence>
        {showBanner && (
          <motion.aside
            initial={{ y: "100%" }} animate={{ y: 0 }} exit={{ y: "100%" }}
            transition={{ duration: 0.55, ease: [0.22, 1, 0.36, 1] }}
            className="fixed inset-x-0 bottom-0 z-[1200] border-t border-bronze/40 bg-charcoal text-ivory shadow-2xl"
            aria-label="Cookie consent"
          >
            <div className="mx-auto flex max-w-[1400px] flex-col gap-6 px-5 py-6 sm:px-8 lg:flex-row lg:items-center lg:justify-between">
              <p className="max-w-2xl text-sm leading-relaxed text-ivory/70">
                We use cookies to improve your experience, understand website usage and help us improve our services.
              </p>
              <div className="flex flex-wrap gap-3">
                <button type="button" onClick={() => save({ analytics: true, leadAttribution: true })} className="bg-bronze px-5 py-3 text-[10px] uppercase tracking-[0.2em] text-charcoal">Accept All</button>
                <button type="button" onClick={() => save(defaultPreferences)} className="border border-ivory/30 px-5 py-3 text-[10px] uppercase tracking-[0.2em] text-ivory">Essential Only</button>
                <button type="button" onClick={() => { setShowBanner(false); setShowSettings(true); }} className="px-2 py-3 text-[10px] uppercase tracking-[0.2em] text-bronze">Cookie Settings</button>
              </div>
            </div>
          </motion.aside>
        )}
      </AnimatePresence>

      <AnimatePresence>
        {showSettings && (
          <motion.div className="fixed inset-0 z-[1300] flex items-end justify-center bg-charcoal/70 p-4 sm:items-center" initial={{ opacity: 0 }} animate={{ opacity: 1 }} exit={{ opacity: 0 }} role="presentation">
            <motion.div initial={{ opacity: 0, y: 24 }} animate={{ opacity: 1, y: 0 }} exit={{ opacity: 0, y: 24 }} className="w-full max-w-xl border border-bronze/30 bg-softwhite p-6 text-charcoal sm:p-9" role="dialog" aria-modal="true" aria-labelledby="cookie-settings-title">
              <div className="flex items-start justify-between gap-5">
                <div>
                  <p className="label-eyebrow text-bronze">Privacy</p>
                  <h2 id="cookie-settings-title" className="mt-3 font-display text-4xl">Cookie Preferences</h2>
                </div>
                <button type="button" onClick={closeSettings} className="flex h-10 w-10 items-center justify-center border border-charcoal/15" aria-label="Close cookie settings"><X className="h-4 w-4" /></button>
              </div>
              <div className="mt-8 divide-y divide-border border-y border-border">
                <PreferenceRow title="Essential" text="Required for website functionality. Cannot be disabled." checked disabled onChange={() => undefined} />
                <PreferenceRow title="Analytics" text="Used to understand visitor behaviour." checked={preferences.analytics} onChange={(checked) => setPreferences((current) => ({ ...current, analytics: checked }))} />
                <PreferenceRow title="Lead Attribution" text="Associates enquiry submissions and contact clicks with a visit or campaign." checked={preferences.leadAttribution} onChange={(checked) => setPreferences((current) => ({ ...current, leadAttribution: checked }))} />
              </div>
              <div className="mt-7 flex flex-wrap gap-3">
                <button type="button" onClick={() => save(preferences)} className="bg-charcoal px-5 py-3 text-[10px] uppercase tracking-[0.2em] text-softwhite">Save Preferences</button>
                <button type="button" onClick={() => save({ analytics: true, leadAttribution: true })} className="bg-bronze px-5 py-3 text-[10px] uppercase tracking-[0.2em] text-charcoal">Accept All</button>
                <button type="button" onClick={() => save(defaultPreferences)} className="border border-charcoal/20 px-5 py-3 text-[10px] uppercase tracking-[0.2em] text-charcoal">Reject Optional</button>
              </div>
            </motion.div>
          </motion.div>
        )}
      </AnimatePresence>
    </>
  );
}

function PreferenceRow({ title, text, checked, disabled = false, onChange }: { title: string; text: string; checked: boolean; disabled?: boolean; onChange: (checked: boolean) => void }) {
  return (
    <label className="flex items-center justify-between gap-6 py-5">
      <span><span className="block text-sm font-medium uppercase tracking-[0.12em]">{title}</span><span className="mt-1 block text-sm text-muted-foreground">{text}</span></span>
      <input type="checkbox" checked={checked} disabled={disabled} onChange={(event) => onChange(event.currentTarget.checked)} className="h-5 w-5 shrink-0 accent-[var(--color-bronze)]" />
    </label>
  );
}