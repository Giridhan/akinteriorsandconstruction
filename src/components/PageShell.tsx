import { useEffect, type ReactNode } from "react";
import { useRouterState } from "@tanstack/react-router";
import { SiteHeader } from "@/components/SiteHeader";
import { SiteFooter } from "@/components/SiteFooter";
import { FloatingActions } from "@/components/FloatingActions";
import { ScrollProgress } from "@/components/ScrollProgress";
import { CustomCursor } from "@/components/CustomCursor";
import { Eyebrow } from "@/components/Reveal";
import { CookieConsent } from "@/components/CookieConsent";
import { getCookieConsent, initializeVisitor, trackConversion, trackPageView } from "@/lib/leadTracking";

export function PageShell({
  children,
  overHero = false,
}: {
  children: ReactNode;
  overHero?: boolean;
}) {
  const locationKey = useRouterState({ select: (state) => state.location.href });

  useEffect(() => {
    initializeVisitor();
    trackPageView();
  }, [locationKey]);

  useEffect(() => {
    const onConsent = () => trackPageView();
    const onContactClick = (event: MouseEvent) => {
      const target = event.target;
      if (!(target instanceof Element)) return;
      const link = target.closest("a[href]");
      if (!(link instanceof HTMLAnchorElement)) return;
      const href = link.href;
      if (href.startsWith("tel:")) trackConversion("phone_click");
      else if (href.includes("wa.me/")) trackConversion("whatsapp_click");
    };
    window.addEventListener("ak-consent-change", onConsent);
    document.addEventListener("click", onContactClick);
    return () => {
      window.removeEventListener("ak-consent-change", onConsent);
      document.removeEventListener("click", onContactClick);
    };
  }, []);

  return (
    <>
      <ScrollProgress />
      <CustomCursor />
      <SiteHeader overHero={overHero} />
      <main>{children}</main>
      <SiteFooter />
      <FloatingActions />
      <CookieConsent />
    </>
  );
}

export function PageHeader({
  eyebrow,
  title,
  intro,
}: {
  eyebrow: string;
  title: string;
  intro: string;
}) {
  return (
    <section className="bg-charcoal pb-20 pt-40 text-ivory sm:pb-28 sm:pt-48">
      <div className="mx-auto max-w-[1400px] px-5 sm:px-8">
        <Eyebrow>{eyebrow}</Eyebrow>
        <h1 className="mt-7 max-w-4xl font-display text-[clamp(2.4rem,6.5vw,5rem)] leading-[1.01]">
          {title}
        </h1>
        <p className="mt-8 max-w-xl text-base leading-relaxed text-ivory/60">{intro}</p>
      </div>
    </section>
  );
}
