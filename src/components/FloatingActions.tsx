import { Phone } from "lucide-react";
import { business } from "@/lib/site";

function WhatsAppIcon() {
  return (
    <svg viewBox="0 0 24 24" aria-hidden className="h-6 w-6 fill-current">
      <path d="M17.47 14.38c-.3-.15-1.75-.86-2.02-.96-.27-.1-.47-.15-.67.15-.2.29-.77.95-.94 1.15-.17.2-.35.22-.64.07-.3-.15-1.25-.46-2.38-1.47-.88-.78-1.47-1.75-1.64-2.04-.17-.3-.02-.46.13-.6.13-.14.3-.35.44-.53.15-.18.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.67-1.6-.92-2.19-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.01-1.04 2.46s1.07 2.86 1.22 3.06c.15.2 2.1 3.2 5.08 4.49.71.3 1.26.49 1.7.63.71.23 1.36.2 1.87.12.57-.09 1.75-.72 2-1.41.25-.69.25-1.28.17-1.4-.07-.13-.27-.2-.57-.35zM12.05 2C6.5 2 2 6.5 2 12.05c0 1.77.46 3.5 1.35 5.02L2 22l5.06-1.32a10 10 0 0 0 4.99 1.33h.01c5.54 0 10.04-4.5 10.04-10.05C22.1 6.5 17.6 2 12.05 2zm0 18.2h-.01a8.3 8.3 0 0 1-4.23-1.16l-.3-.18-3 .79.8-2.93-.2-.3a8.28 8.28 0 0 1-1.27-4.42c0-4.6 3.74-8.34 8.35-8.34 2.23 0 4.32.87 5.9 2.45a8.28 8.28 0 0 1 2.44 5.9c0 4.6-3.74 8.34-8.34 8.34z" />
    </svg>
  );
}

export function FloatingActions() {
  return (
    <div className="fixed bottom-5 right-4 z-50 flex flex-col items-end gap-3 sm:bottom-8 sm:right-6">
      <a
        href={business.phoneHref}
        aria-label={`Call ${business.name} on ${business.phone}`}
        className="group flex h-12 w-12 items-center justify-center border border-charcoal/15 bg-softwhite text-charcoal shadow-[0_10px_30px_-14px_rgba(0,0,0,0.5)] transition-colors hover:bg-charcoal hover:text-softwhite"
      >
        <Phone className="h-5 w-5" />
      </a>

      <a
        href={business.whatsappHref}
        target="_blank"
        rel="noopener noreferrer"
        aria-label="Chat with us on WhatsApp"
        className="group relative flex h-14 w-14 items-center justify-center bg-[#1f8f5f] text-white shadow-[0_14px_36px_-16px_rgba(0,0,0,0.7)] transition-transform hover:scale-105"
      >
        <span
          aria-hidden
          className="absolute inset-0 animate-[pulse_2.6s_cubic-bezier(0.4,0,0.6,1)_infinite] bg-[#1f8f5f]/50"
        />
        <span className="relative">
          <WhatsAppIcon />
        </span>
        <span className="pointer-events-none absolute right-[calc(100%+0.75rem)] hidden whitespace-nowrap border border-charcoal/10 bg-softwhite px-3 py-2 text-[11px] uppercase tracking-[0.2em] text-charcoal opacity-0 transition-opacity group-hover:opacity-100 md:block">
          Chat with us on WhatsApp
        </span>
      </a>
    </div>
  );
}
