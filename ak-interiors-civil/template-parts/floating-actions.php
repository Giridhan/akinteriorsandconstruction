<?php
/**
 * Floating Actions (WhatsApp & Click-to-Call) Template Part
 *
 * @package ak-interiors-civil
 */

$biz = ak_get_business_info();
?>
<div id="ak-floating-actions" class="ak-floating-actions">
    <!-- Click to Call Floating Button -->
    <a
        href="<?php echo esc_attr( $biz['phone_href'] ); ?>"
        data-conversion="phone_click"
        aria-label="Call <?php echo esc_attr( $biz['name'] ); ?> at <?php echo esc_attr( $biz['phone'] ); ?>"
        class="ak-float-btn ak-float-phone group"
    >
        <svg
            width="22"
            height="22"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2.2"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true"
            class="ak-float-icon"
        >
            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
        </svg>
        <!-- Tooltip -->
        <span class="ak-float-tooltip">
            Call <?php echo esc_html( $biz['phone'] ); ?>
        </span>
    </a>

    <!-- WhatsApp Floating Button with Pulse -->
    <a
        href="<?php echo esc_url( $biz['whatsapp_url'] ); ?>"
        target="_blank"
        rel="noopener noreferrer"
        data-conversion="whatsapp_click"
        aria-label="Chat with AK Interiors &amp; Civil on WhatsApp"
        class="ak-float-btn ak-float-whatsapp group"
    >
        <!-- Pulsing aura ring -->
        <span aria-hidden="true" class="ak-whatsapp-pulse"></span>
        
        <!-- WhatsApp Icon -->
        <svg
            width="28"
            height="28"
            viewBox="0 0 24 24"
            fill="#ffffff"
            aria-hidden="true"
            class="ak-float-icon ak-whatsapp-icon"
        >
            <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01C17.18 3.03 14.69 2 12.04 2zm0 18.16c-1.38 0-2.74-.36-3.94-1.08l-.29-.17-3.12.82.83-3.04-.17-.28c-.8-1.27-1.22-2.87-1.22-4.51 0-4.54 3.7-8.24 8.24-8.24 2.2 0 4.27.86 5.82 2.42 1.56 1.56 2.41 3.63 2.41 5.82 0 4.55-3.7 8.25-8.24 8.25zm4.52-6.19c-.25-.12-1.47-.72-1.7-.81-.23-.08-.39-.12-.56.12-.17.25-.64.81-.79.98-.14.16-.29.18-.54.06-.25-.12-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.38-1.72-.15-.25-.02-.38.11-.5.11-.11.25-.29.38-.44.12-.15.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.12-.56-1.34-.76-1.84-.2-.49-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.07s.89 2.4 1.02 2.57c.12.17 1.76 2.68 4.26 3.76.6.26 1.06.41 1.42.53.6.19 1.14.16 1.57.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.1-.23-.17-.48-.29z"/>
        </svg>

        <!-- Tooltip -->
        <span class="ak-float-tooltip">
            Chat on WhatsApp
        </span>
    </a>
</div>
