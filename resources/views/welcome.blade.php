<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Indu Components | Premium Electrical Co-Boxes &amp; Cobox Manufacturer in Kerala</title>
    <meta name="description" content="Discover INCO Co-Boxes — premium electrical junction boxes precision-moulded from 100% virgin HIPS in Kerala. Heat resistant to 70°C with 16×16 stainless steel screws.">
    <meta name="keywords" content="Co-Box, Cobox, electrical junction box, HIPS junction box, camera box, 3x3 junction box, 4x4 junction box, 6x3 co-box, 7x3 co-box, electrical components Kerala, Indu Components, INCO">
    <meta name="author" content="Indu Components (INCO)">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="theme-color" content="#d80c0c">
    <meta name="color-scheme" content="light">
    <meta name="geo.region" content="IN-KL">
    <meta name="geo.placename" content="Koyilandy, Kerala">
    <meta name="geo.position" content="11.49255;75.66160">
    <meta name="ICBM" content="11.49255, 75.66160">

    <link rel="canonical" href="{{ url('/') }}">

    <!-- Open Graph / social sharing -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Indu Components (INCO)">
    <meta property="og:title" content="Indu Components | Premium Electrical Co-Boxes &amp; Cobox Manufacturer in Kerala">
    <meta property="og:description" content="Precision-moulded from 100% virgin HIPS. Heat resistant to 70°C. 16×16 stainless steel screws. Discover the original Co-Box range from INCO.">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:image" content="{{ asset('assets/img/INCO_hero_img.jpg') }}">
    <meta property="og:image:width" content="720">
    <meta property="og:image:height" content="585">
    <meta property="og:image:alt" content="The INCO Co-Box range including camera boxes, junction boxes and LED boxes">
    <meta property="og:locale" content="en_IN">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Indu Components | Premium Electrical Co-Boxes in Kerala">
    <meta name="twitter:description" content="The original Co-Box. Engineered from 100% virgin HIPS to endure heat, handling and time.">
    <meta name="twitter:image" content="{{ asset('assets/img/INCO_hero_img.jpg') }}">
    <meta name="twitter:image:alt" content="The INCO Co-Box range">

    <!-- Favicons -->
    <link href={{ asset("ic_launcher.png")}} rel="icon">
    <link rel="icon" type="image/png" href="{{ asset('uploads/ic_launcher.png') }}">
    <link rel="apple-touch-icon" href="{{ url('assets/img/Inco Logo_page-0001.jpg') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@1,9..144,400&amp;family=Inter:wght@400;500;600&amp;family=Plus+Jakarta+Sans:wght@600;700;800&amp;display=swap" rel="stylesheet">

    <!-- Existing vendor styles -->
    <link href="{{ url('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

    <style>
        /* ============================================================
           1. DESIGN TOKENS — edit colors, type and spacing here
           ============================================================ */
        :root {
            /* Brand */
            --red: #d80c0c;
            --red-rgb: 216, 12, 12;
            --red-deep: #b00707;
            --red-dark: #7d0505;
            --red-soft: #fdf0ef;
            --red-tint: #f9e3e1;

            /* Neutrals */
            --ink: #111215;
            --ink-2: #1c1d21;
            --charcoal: #16171a;
            --body: #4e5158;
            --muted: #6b6f77;
            --paper: #fdfcfa;
            --off-white: #f7f5f1;
            --white: #ffffff;
            --line: rgba(17, 18, 21, 0.10);
            --line-strong: rgba(17, 18, 21, 0.17);

            /* Premium detail */
            --gold: #bf9b5f;
            --gold-soft: #f3e9d8;
            --success: #177a4b;

            /* Type */
            --font-display: "Plus Jakarta Sans", "Segoe UI", system-ui, -apple-system, sans-serif;
            --font-body: "Inter", "Segoe UI", system-ui, -apple-system, sans-serif;
            --font-serif: "Fraunces", Georgia, "Times New Roman", serif;

            /* Spacing scale (8px base) */
            --space-1: 8px;
            --space-2: 16px;
            --space-3: 24px;
            --space-4: 32px;
            --space-5: 40px;
            --space-6: 48px;
            --space-8: 64px;
            --space-10: 80px;
            --space-12: 96px;

            /* Layout */
            --container: 1180px;
            --gutter: clamp(20px, 4vw, 32px);
            --header-h: 84px;

            /* Radii */
            --radius-xs: 8px;
            --radius-sm: 12px;
            --radius-md: 16px;
            --radius-lg: 20px;
            --radius-xl: 28px;
            --radius-pill: 999px;

            /* Shadows */
            --shadow-sm: 0 1px 2px rgba(17, 18, 21, 0.04), 0 8px 24px -18px rgba(17, 18, 21, 0.30);
            --shadow-md: 0 20px 44px -30px rgba(17, 18, 21, 0.35);
            --shadow-lg: 0 34px 70px -46px rgba(17, 18, 21, 0.42);
            --shadow-red: 0 18px 36px -18px rgba(var(--red-rgb), 0.55);

            /* Motion */
            --ease: cubic-bezier(0.22, 1, 0.36, 1);
            --dur: 0.35s;
        }

        /* ============================================================
           2. RESET & BASE
           ============================================================ */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: calc(var(--header-h) + 12px);
            -webkit-text-size-adjust: 100%;
        }

        body {
            margin: 0;
            background-color: #f8f1ec;
            background-image:
                radial-gradient(1500px 1080px at 88% -4%, rgba(var(--red-rgb), 0.135), transparent 78%),
                radial-gradient(1350px 1000px at 2% 14%, rgba(var(--red-rgb), 0.08), transparent 78%),
                radial-gradient(1450px 1080px at 98% 38%, rgba(var(--red-rgb), 0.1), transparent 78%),
                radial-gradient(1350px 1000px at 0% 62%, rgba(var(--red-rgb), 0.085), transparent 80%),
                radial-gradient(1500px 1100px at 84% 86%, rgba(var(--red-rgb), 0.115), transparent 80%),
                linear-gradient(180deg, #fdf9f5 0%, #fbf4ef 26%, #f9f1eb 52%, #f8efe9 76%, #f7ece6 100%);
            background-repeat: no-repeat;
            color: var(--body);
            font-family: var(--font-body);
            font-size: 16px;
            font-weight: 400;
            line-height: 1.7;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
            overflow-x: hidden;
        }

        body.nav-open {
            overflow: hidden;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        figure,
        address,
        blockquote {
            margin: 0;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: var(--font-display);
            color: var(--ink);
            line-height: 1.12;
            letter-spacing: -0.035em;
        }

        img,
        svg {
            display: block;
            max-width: 100%;
        }

        img {
            height: auto;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input,
        select,
        textarea {
            font: inherit;
        }

        button {
            color: inherit;
        }

        ul,
        ol {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        address {
            font-style: normal;
        }

        [hidden] {
            display: none !important;
        }

        ::selection {
            background: var(--red);
            color: #ffffff;
        }

        :focus-visible {
            outline: 3px solid rgba(var(--red-rgb), 0.45);
            outline-offset: 3px;
        }

        .btn-primary:focus-visible,
        .to-top:focus-visible {
            outline-color: var(--ink);
        }

        .site-footer a:focus-visible {
            outline-color: #ffffff;
        }

        /* ============================================================
           3. UTILITIES
           ============================================================ */
        .container {
            width: min(var(--container), calc(100% - (var(--gutter) * 2)));
            margin-inline: auto;
        }

        .section {
            position: relative;
            padding: clamp(48px, 5.6vw, 84px) 0 clamp(56px, 6.5vw, 96px);
        }

        .section--tint {
            background: var(--off-white);
        }

        .sr-only {
            position: absolute !important;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            margin: 0 0 18px;
            color: var(--red);
            font-family: var(--font-body);
            font-size: 0.7rem;
            font-weight: 700;
            line-height: 1;
            letter-spacing: 0.2em;
            text-transform: uppercase;
        }

        .eyebrow::before {
            content: "";
            width: 28px;
            height: 1px;
            flex: none;
            background: linear-gradient(90deg, var(--gold), var(--red));
        }

        .eyebrow--light {
            color: rgba(255, 255, 255, 0.74);
        }

        .eyebrow--light::before {
            background: linear-gradient(90deg, var(--gold), rgba(255, 255, 255, 0.5));
        }

        .section-title {
            font-size: clamp(2rem, 3.8vw, 3.25rem);
            font-weight: 800;
            line-height: 1.08;
            letter-spacing: -0.045em;
            text-wrap: balance;
        }

        .section-title em {
            color: var(--red);
            font-family: var(--font-serif);
            font-style: italic;
            font-weight: 400;
            letter-spacing: -0.015em;
        }

        .lead {
            font-size: clamp(1.02rem, 1.3vw, 1.12rem);
            line-height: 1.75;
            color: var(--body);
        }

        .section-head {
            max-width: 760px;
            margin-bottom: clamp(40px, 5vw, 64px);
        }

        .section-head--center {
            margin-inline: auto;
            text-align: center;
        }

        .section-head--center .eyebrow {
            justify-content: center;
        }

        .section-head--split {
            display: grid;
            grid-template-columns: minmax(0, 1.05fr) minmax(0, 0.95fr);
            gap: clamp(20px, 4vw, 56px);
            align-items: end;
            max-width: none;
        }

        .section-head__copy {
            max-width: 430px;
            justify-self: end;
            margin-bottom: 6px;
            font-size: 0.94rem;
            line-height: 1.75;
            color: var(--body);
        }

        /* ============================================================
           4. BUTTONS & LINKS
           ============================================================ */
        .btn {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            min-height: 50px;
            padding: 14px 26px;
            border: 1px solid transparent;
            border-radius: var(--radius-pill);
            font-family: var(--font-body);
            font-size: 0.92rem;
            font-weight: 600;
            line-height: 1.2;
            text-align: center;
            cursor: pointer;
            transition: background-color var(--dur) var(--ease),
                border-color var(--dur) var(--ease),
                color var(--dur) var(--ease),
                box-shadow var(--dur) var(--ease),
                transform var(--dur) var(--ease);
        }

        .btn i {
            font-size: 1rem;
            transition: transform var(--dur) var(--ease);
        }

        .btn:hover i {
            transform: translate(2px, -2px);
        }

        .btn-primary {
            background: var(--red);
            color: #ffffff;
            box-shadow: 0 14px 30px -14px rgba(var(--red-rgb), 0.75);
        }

        .btn-primary:hover {
            background: var(--red-deep);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 20px 40px -16px rgba(var(--red-rgb), 0.8);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.58);
            border-color: var(--line-strong);
            color: var(--ink);
            -webkit-backdrop-filter: blur(6px);
            backdrop-filter: blur(6px);
        }

        .btn-secondary:hover {
            background: var(--ink);
            border-color: var(--ink);
            color: #ffffff;
            transform: translateY(-2px);
        }

        .btn-light {
            background: #ffffff;
            color: var(--ink);
        }

        .btn-light:hover {
            background: var(--ink);
            color: #ffffff;
            transform: translateY(-2px);
        }

        .btn-sm {
            min-height: 44px;
            padding: 11px 18px;
            font-size: 0.85rem;
        }

        .btn-block {
            width: 100%;
        }

        .link-arrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding-bottom: 3px;
            border-bottom: 1px solid transparent;
            color: var(--ink);
            font-size: 0.92rem;
            font-weight: 600;
            transition: color var(--dur), border-color var(--dur);
        }

        .link-arrow i {
            color: var(--red);
            transition: transform var(--dur) var(--ease);
        }

        .link-arrow:hover {
            border-color: rgba(var(--red-rgb), 0.35);
            color: var(--red);
        }

        .link-arrow:hover i {
            transform: translateX(4px);
        }

        /* ============================================================
           5. BRAND / PRELOADER
           ============================================================ */
        .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            flex: none;
            min-width: 0;
            color: inherit;
        }

        .brand img {
            width: auto;
            height: clamp(38px, 3.4vw, 46px);
            flex: none;
            object-fit: contain;
            transition: opacity var(--dur) var(--ease);
        }

        .brand:hover img {
            opacity: 0.82;
        }

        #inco-preloader {
            position: fixed;
            inset: 0;
            z-index: 3000;
            display: grid;
            place-items: center;
            background: var(--off-white);
            opacity: 1;
            visibility: visible;
            transition: opacity 0.55s ease, visibility 0.55s ease;
        }

        #inco-preloader.is-done {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        .preloader__inner {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 14px;
        }

        .preloader__logo {
            width: auto;
            height: 52px;
            object-fit: contain;
            animation: preloader-pulse 2s ease-in-out infinite;
        }

        .preloader__name {
            color: var(--ink);
            font-family: var(--font-display);
            font-size: 0.7rem;
            font-weight: 800;
            letter-spacing: 0.24em;
            text-transform: uppercase;
        }

        .preloader__line {
            width: 150px;
            height: 2px;
            overflow: hidden;
            border-radius: 2px;
            background: rgba(17, 18, 21, 0.1);
        }

        .preloader__line span {
            display: block;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, var(--red), var(--gold));
            transform: translateX(-100%);
            animation: preloader-line 1.4s var(--ease) infinite;
        }

        /* ============================================================
           6. HEADER & DESKTOP NAVIGATION
           ============================================================ */
        .skip-link {
            position: fixed;
            top: -100px;
            left: 16px;
            z-index: 4000;
            padding: 12px 18px;
            border-radius: var(--radius-xs);
            background: var(--ink);
            color: #ffffff;
            font-size: 0.85rem;
            font-weight: 600;
            transition: top 0.25s var(--ease);
        }

        .skip-link:focus {
            top: 12px;
        }

        .site-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 16px 0;
            border-bottom: 1px solid transparent;
            background: transparent;
            transition: padding 0.4s var(--ease), background-color 0.4s var(--ease),
                box-shadow 0.4s var(--ease);
        }

        .site-header.is-scrolled {
            padding: 8px 0;
            border-bottom-color: rgba(17, 18, 21, 0.05);
            background: rgba(253, 252, 250, 0.84);
            box-shadow: 0 18px 44px -34px rgba(17, 18, 21, 0.5);
            -webkit-backdrop-filter: blur(18px) saturate(150%);
            backdrop-filter: blur(18px) saturate(150%);
        }

        .header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .primary-nav {
            display: flex;
            align-items: center;
        }

        .nav-list {
            display: flex;
            align-items: center;
            gap: 2px;
        }

        .nav-link {
            position: relative;
            display: block;
            padding: 10px 13px;
            color: #3d4046;
            font-size: 0.88rem;
            font-weight: 500;
            transition: color 0.25s ease;
        }

        .nav-link::after {
            content: "";
            position: absolute;
            left: 13px;
            right: 13px;
            bottom: 4px;
            height: 1.5px;
            border-radius: 2px;
            background: var(--red);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform var(--dur) var(--ease);
        }

        .nav-link:hover,
        .nav-link.is-active {
            color: var(--ink);
        }

        .nav-link:hover::after,
        .nav-link.is-active::after {
            transform: scaleX(1);
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 14px;
            flex: none;
        }

        .header-phone {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 0;
            color: var(--ink);
            font-size: 0.82rem;
            font-weight: 600;
            transition: color 0.25s ease;
        }

        .header-phone i {
            color: var(--red);
            font-size: 0.95rem;
        }

        .header-phone:hover {
            color: var(--red);
        }

        .nav-toggle {
            display: none;
            width: 46px;
            height: 46px;
            padding: 0;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 5px;
            border: 1px solid var(--line-strong);
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.62);
            cursor: pointer;
            transition: background-color 0.25s ease, border-color 0.25s ease;
        }

        .nav-toggle span {
            display: block;
            width: 18px;
            height: 1.5px;
            border-radius: 2px;
            background: var(--ink);
            transition: transform 0.3s var(--ease), opacity 0.3s ease;
        }

        .nav-toggle:hover {
            border-color: var(--red);
            background: #ffffff;
        }

        /* ============================================================
           7. MOBILE DRAWER
           ============================================================ */
        .nav-backdrop {
            position: fixed;
            inset: 0;
            z-index: 1050;
            background: rgba(17, 18, 21, 0.52);
            opacity: 0;
            visibility: hidden;
            -webkit-backdrop-filter: blur(4px);
            backdrop-filter: blur(4px);
            transition: opacity 0.35s ease, visibility 0.35s ease;
        }

        .nav-backdrop.is-open {
            opacity: 1;
            visibility: visible;
        }

        .mobile-nav {
            position: fixed;
            inset: 0 0 0 auto;
            z-index: 1100;
            width: min(420px, 92vw);
            overflow-y: auto;
            overscroll-behavior: contain;
            background: var(--paper);
            box-shadow: -30px 0 60px -30px rgba(17, 18, 21, 0.5);
            transform: translateX(102%);
            visibility: hidden;
            transition: transform 0.45s var(--ease), visibility 0.45s ease;
        }

        .mobile-nav.is-open {
            transform: none;
            visibility: visible;
        }

        .mobile-nav__panel {
            display: flex;
            flex-direction: column;
            min-height: 100%;
            padding: 22px 24px 32px;
        }

        .mobile-nav__top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding-bottom: 22px;
            border-bottom: 1px solid var(--line);
        }

        .drawer-close {
            display: grid;
            place-items: center;
            width: 44px;
            height: 44px;
            padding: 0;
            flex: none;
            border: 1px solid var(--line-strong);
            border-radius: 50%;
            background: #ffffff;
            color: var(--ink);
            font-size: 1.05rem;
            cursor: pointer;
            transition: background-color 0.25s ease, border-color 0.25s ease, color 0.25s ease;
        }

        .drawer-close:hover {
            border-color: var(--red);
            background: var(--red);
            color: #ffffff;
        }

        .mobile-nav__list {
            display: flex;
            flex-direction: column;
            margin: 24px 0;
        }

        .mobile-nav__list a {
            display: flex;
            align-items: baseline;
            gap: 14px;
            padding: 13px 0;
            border-bottom: 1px solid var(--line);
            color: var(--ink);
            font-family: var(--font-display);
            font-size: 1.35rem;
            font-weight: 700;
            letter-spacing: -0.03em;
            transition: color 0.25s ease, padding-left 0.25s var(--ease);
        }

        .mobile-nav__list a span {
            color: var(--red);
            font-family: var(--font-body);
            font-size: 0.6rem;
            font-weight: 700;
            letter-spacing: 0.12em;
        }

        .mobile-nav__list a:hover {
            padding-left: 4px;
            color: var(--red);
        }

        .mobile-nav__contact {
            margin-top: auto;
            padding: 20px;
            border: 1px solid var(--line);
            border-radius: var(--radius-md);
            background: #ffffff;
        }

        .mobile-nav__contact .eyebrow {
            margin-bottom: 12px;
            font-size: 0.6rem;
        }

        .mobile-nav__contact a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 4px 0;
            color: var(--ink);
            font-size: 0.86rem;
            font-weight: 600;
            transition: color 0.25s ease;
        }

        .mobile-nav__contact a:hover {
            color: var(--red);
        }

        .mobile-nav__contact i {
            color: var(--red);
            font-size: 0.9rem;
        }

        .mobile-nav__contact address {
            margin-top: 10px;
            color: var(--muted);
            font-size: 0.8rem;
            line-height: 1.6;
        }

        .mobile-nav__cta {
            width: 100%;
            margin-top: 16px;
        }

        /* ============================================================
           8. HERO
           ============================================================ */
        .hero {
            position: relative;
            overflow: clip;
            padding: calc(var(--header-h) + clamp(46px, 6.5vw, 46px)) 0 clamp(48px, 6vw, 72px);
            background:
                radial-gradient(ellipse 55% 60% at 78% 32%, rgba(var(--red-rgb), 0.07), transparent 62%),
                radial-gradient(ellipse 45% 55% at 10% 18%, rgba(191, 155, 95, 0.12), transparent 62%),
                transparent;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            z-index: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .hero-glow {
            position: absolute;
            border-radius: 50%;
            filter: blur(18px);
        }

        .hero-glow--red {
            top: 2%;
            right: -12%;
            width: min(52vw, 680px);
            aspect-ratio: 1;
            background: radial-gradient(circle, rgba(var(--red-rgb), 0.15), rgba(var(--red-rgb), 0) 68%);
            animation: drift 16s ease-in-out infinite alternate;
        }

        .hero-glow--gold {
            bottom: -22%;
            left: -10%;
            width: min(40vw, 520px);
            aspect-ratio: 1;
            background: radial-gradient(circle, rgba(191, 155, 95, 0.18), rgba(191, 155, 95, 0) 70%);
            animation: drift 22s ease-in-out infinite alternate-reverse;
        }

        .hero-dots {
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(17, 18, 21, 0.13) 1px, transparent 1px);
            background-size: 24px 24px;
            opacity: 0.35;
            -webkit-mask-image: radial-gradient(ellipse 62% 62% at 72% 40%, #000 8%, transparent 74%);
            mask-image: radial-gradient(ellipse 62% 62% at 72% 40%, #000 8%, transparent 74%);
        }

        .hero-grid {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: minmax(0, 1.02fr) minmax(0, 0.98fr);
            gap: clamp(36px, 5.5vw, 84px);
            align-items: center;
        }

        .hero-copy {
            position: relative;
            z-index: 2;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 9px;
            margin: 0 0 26px;
            padding: 8px 14px;
            border: 1px solid rgba(var(--red-rgb), 0.16);
            border-radius: var(--radius-pill);
            background: rgba(255, 255, 255, 0.6);
            color: #4a4d54;
            font-size: 0.68rem;
            font-weight: 600;
            letter-spacing: 0.09em;
            line-height: 1.4;
            text-transform: uppercase;
            -webkit-backdrop-filter: blur(8px);
            backdrop-filter: blur(8px);
        }

        .hero-badge .pulse {
            width: 7px;
            height: 7px;
            flex: none;
            border-radius: 50%;
            background: var(--red);
            animation: pulse-dot 2.4s ease-out infinite;
        }

        .hero-badge__divider {
            width: 1px;
            height: 12px;
            background: var(--line-strong);
        }

        .hero-title {
            max-width: 12ch;
            margin-bottom: 26px;
            color: var(--ink);
            font-size: clamp(2.75rem, 5.6vw, 5.1rem);
            font-weight: 800;
            line-height: 0.99;
            letter-spacing: -0.06em;
            text-wrap: balance;
        }

        .hero-title__line {
            display: block;
        }

        .hero-title em {
            color: var(--red);
            font-family: var(--font-serif);
            font-style: italic;
            font-weight: 400;
            letter-spacing: -0.02em;
        }

        .hero-sub {
            max-width: 56ch;
            margin-bottom: 32px;
            color: var(--body);
            font-size: clamp(0.98rem, 1.15vw, 1.08rem);
            line-height: 1.75;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .hero-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 12px 22px;
            max-width: 580px;
            margin-top: 30px;
            padding-top: 22px;
            border-top: 1px solid var(--line);
        }

        .hero-meta li {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--muted);
            font-size: 0.78rem;
            font-weight: 500;
        }

        .hero-meta i {
            color: var(--red);
            font-size: 0.9rem;
        }

        .hero-visual {
            position: relative;
            z-index: 1;
            isolation: isolate;
        }

        .hero-visual::before {
            content: "";
            position: absolute;
            top: 8%;
            right: -10%;
            z-index: -1;
            width: 70%;
            aspect-ratio: 1;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(var(--red-rgb), 0.22), transparent 66%);
            filter: blur(30px);
        }

        .hero-frame {
            position: relative;
            padding: clamp(10px, 1.4vw, 16px);
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.62);
            box-shadow: 0 40px 80px -44px rgba(17, 18, 21, 0.5),
                inset 0 1px 0 #ffffff;
            -webkit-backdrop-filter: blur(12px);
            backdrop-filter: blur(12px);
        }

        .hero-media {
            position: relative;
            overflow: hidden;
            aspect-ratio: 7 / 5;
            border-radius: 20px;
            background: radial-gradient(circle at 50% 42%, #ffffff 0%, #f8f1e7 58%, #f1e6d8 100%);
        }

        .hero-media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            mix-blend-mode: multiply;
            filter: saturate(0.92) contrast(1.02);
        }

        .hero-media::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0) 70%, rgba(17, 18, 21, 0.05));
            pointer-events: none;
        }

        .hero-orbit {
            position: absolute;
            right: -6%;
            bottom: -8%;
            left: 12%;
            height: 40%;
            z-index: -1;
            border: 1px solid rgba(var(--red-rgb), 0.14);
            border-radius: 50%;
            transform: rotate(-9deg);
            pointer-events: none;
        }

        .hero-float {
            position: absolute;
            z-index: 4;
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 13px 16px;
            border: 1px solid rgba(255, 255, 255, 0.96);
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 22px 44px -24px rgba(17, 18, 21, 0.5);
            -webkit-backdrop-filter: blur(14px);
            backdrop-filter: blur(14px);
            animation: float 7s ease-in-out infinite;
        }

        .hero-float__icon {
            display: grid;
            place-items: center;
            width: 38px;
            height: 38px;
            flex: none;
            border-radius: 50%;
            background: var(--red-soft);
            color: var(--red);
            font-size: 1rem;
        }

        .hero-float strong {
            display: block;
            color: var(--ink);
            font-family: var(--font-display);
            font-size: 0.82rem;
            font-weight: 700;
            line-height: 1.2;
        }

        .hero-float div > span {
            display: block;
            margin-top: 3px;
            color: var(--muted);
            font-size: 0.66rem;
            line-height: 1.3;
            white-space: nowrap;
        }

        .hero-float--hips {
            top: 10%;
            right: -26px;
        }

        .hero-float--heat {
            right: -22px;
            bottom: 11%;
            animation-delay: -3.5s;
        }

        .hero-float__value {
            color: var(--ink);
            font-family: var(--font-display);
            font-size: 1.65rem;
            font-weight: 800;
            letter-spacing: -0.05em;
            line-height: 1;
        }

        .hero-float__value small {
            color: var(--red);
            font-size: 0.6em;
            font-weight: 700;
        }

        .hero-float__label {
            margin-top: 0;
            color: var(--muted);
            font-size: 0.66rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .hero-stats {
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            margin-top: clamp(48px, 6vw, 76px);
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.94);
            border-radius: var(--radius-lg);
            background: rgba(255, 255, 255, 0.74);
            box-shadow: 0 30px 60px -40px rgba(17, 18, 21, 0.45);
            -webkit-backdrop-filter: blur(12px);
            backdrop-filter: blur(12px);
        }

        .stat {
            position: relative;
            padding: clamp(18px, 2.4vw, 26px) clamp(18px, 2.6vw, 30px);
        }

        .stat + .stat::before {
            content: "";
            position: absolute;
            top: 20%;
            bottom: 20%;
            left: 0;
            width: 1px;
            background: var(--line);
        }

        .stat-value {
            display: block;
            color: var(--ink);
            font-family: var(--font-display);
            font-size: clamp(1.55rem, 2.4vw, 2.15rem);
            font-weight: 800;
            line-height: 1;
            letter-spacing: -0.05em;
            font-variant-numeric: tabular-nums;
        }

        .stat-unit {
            margin-left: 2px;
            color: var(--red);
            font-size: 0.55em;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .stat-label {
            display: block;
            margin-top: 8px;
            color: var(--muted);
            font-size: 0.68rem;
            font-weight: 600;
            letter-spacing: 0.11em;
            line-height: 1.4;
            text-transform: uppercase;
        }

        /* ============================================================
           9. ABOUT
           ============================================================ */
        .about {
            background: transparent;
        }

        .about-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.02fr) minmax(0, 0.98fr);
            gap: clamp(44px, 7vw, 100px);
            align-items: center;
        }

        .about-visual {
            position: relative;
            width: 100%;
            max-width: 560px;
        }

        .about-frame {
            position: relative;
            padding: 10px;
            border: 1px solid var(--line);
            border-radius: var(--radius-xl);
            background: #ffffff;
            box-shadow: 0 40px 80px -48px rgba(17, 18, 21, 0.4);
        }

        .about-frame img {
            width: 100%;
            aspect-ratio: 1199 / 1120;
            border-radius: 20px;
            object-fit: cover;
        }

        .about-rule {
            position: absolute;
            top: 12%;
            bottom: 22%;
            left: -14px;
            width: 3px;
            border-radius: 3px;
            background: linear-gradient(180deg, var(--red), rgba(var(--red-rgb), 0));
        }

        .about-float {
            position: absolute;
            bottom: 26px;
            left: -26px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 18px;
            border: 1px solid var(--line);
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.94);
            box-shadow: 0 24px 50px -30px rgba(17, 18, 21, 0.45);
            -webkit-backdrop-filter: blur(10px);
            backdrop-filter: blur(10px);
        }

        .about-float__icon {
            display: grid;
            place-items: center;
            width: 40px;
            height: 40px;
            flex: none;
            border-radius: 50%;
            background: var(--red-soft);
            color: var(--red);
            font-size: 1.05rem;
        }

        .about-float strong {
            display: block;
            color: var(--ink);
            font-family: var(--font-display);
            font-size: 0.82rem;
            font-weight: 700;
            line-height: 1.25;
        }

        .about-float div > span {
            display: block;
            margin-top: 3px;
            color: var(--muted);
            font-size: 0.68rem;
            line-height: 1.35;
        }

        .about-content .lead {
            margin-bottom: 16px;
        }

        .about-content p + p {
            margin-top: 16px;
        }

        .check-list {
            display: grid;
            gap: 6px;
            margin-top: 26px;
        }

        .check-list li {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            color: var(--ink-2);
            font-size: 0.9rem;
            font-weight: 500;
            line-height: 1.55;
        }

        .check-list .check {
            display: grid;
            place-items: center;
            width: 22px;
            height: 22px;
            flex: none;
            margin-top: 2px;
            border-radius: 50%;
            background: var(--red-soft);
            color: var(--red);
            font-size: 0.72rem;
        }

        .signature {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-top: 28px;
            padding-top: 24px;
            border-top: 1px solid var(--line);
        }

        .signature__seal {
            display: grid;
            place-items: center;
            width: 48px;
            height: 48px;
            flex: none;
            border: 1px solid rgba(var(--red-rgb), 0.35);
            border-radius: 50%;
            color: var(--red);
            font-family: var(--font-display);
            font-size: 0.7rem;
            font-weight: 800;
            letter-spacing: 0.06em;
        }

        .signature strong {
            display: block;
            color: var(--ink);
            font-size: 0.86rem;
            font-weight: 700;
        }

        .signature div > span {
            display: block;
            margin-top: 2px;
            color: var(--muted);
            font-size: 0.76rem;
            line-height: 1.5;
        }

        .about-content .link-arrow {
            margin-top: 24px;
        }

        /* ============================================================
           10. WHY INCO
           ============================================================ */
        .why-us {
            background: transparent;
        }

        .why-grid {
            display: grid;
            grid-template-columns: minmax(0, 0.85fr) minmax(0, 1.65fr);
            gap: clamp(20px, 3vw, 32px);
            align-items: stretch;
        }

        .why-panel {
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 30px;
            overflow: hidden;
            padding: clamp(30px, 4vw, 48px);
            border-radius: var(--radius-lg);
            background: linear-gradient(150deg, #b60a0a 0%, #8b0707 48%, #2a0808 100%);
            color: #ffffff;
            box-shadow: 0 30px 70px -40px rgba(125, 6, 6, 0.7);
        }

        .why-panel::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255, 255, 255, 0.16) 1px, transparent 1px);
            background-size: 20px 20px;
            opacity: 0.5;
            -webkit-mask-image: linear-gradient(180deg, #000, transparent 82%);
            mask-image: linear-gradient(180deg, #000, transparent 82%);
            pointer-events: none;
        }

        .why-panel::after {
            content: "";
            position: absolute;
            right: -140px;
            bottom: -140px;
            width: 340px;
            height: 340px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(191, 155, 95, 0.45), transparent 68%);
            pointer-events: none;
        }

        .why-panel > * {
            position: relative;
            z-index: 1;
        }

        .why-title {
            margin-bottom: 18px;
            color: #ffffff;
            font-size: clamp(1.9rem, 3vw, 2.65rem);
            font-weight: 800;
            line-height: 1.06;
            letter-spacing: -0.05em;
        }

        .why-panel > div > p:not(.eyebrow) {
            max-width: 36ch;
            color: rgba(255, 255, 255, 0.78);
            font-size: 0.93rem;
            line-height: 1.75;
        }

        .why-panel__list {
            display: grid;
            gap: 12px;
            margin-top: 4px;
        }

        .why-panel__list li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.84rem;
            font-weight: 500;
            line-height: 1.55;
        }

        .why-panel__list i {
            color: var(--gold);
            font-size: 1rem;
            line-height: 1.4;
            flex: none;
        }

        .why-panel__bottom {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 18px;
            margin-top: auto;
        }

        .why-panel__seal {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            border: 1px solid rgba(255, 255, 255, 0.22);
            border-radius: var(--radius-pill);
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.6rem;
            letter-spacing: 0.16em;
            text-transform: uppercase;
        }

        .why-panel__seal::before {
            content: "";
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--gold);
        }

        .why-cards {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: clamp(14px, 1.8vw, 20px);
        }

        .feature-card {
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 10px;
            overflow: hidden;
            padding: clamp(22px, 2.6vw, 30px);
            border: 1px solid var(--line);
            border-radius: var(--radius-lg);
            background: #ffffff;
            transition: transform var(--dur) var(--ease), box-shadow var(--dur) var(--ease),
                border-color var(--dur) var(--ease);
        }

        .feature-card::after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--red), var(--gold));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s var(--ease);
        }

        .feature-card:hover {
            border-color: rgba(var(--red-rgb), 0.24);
            box-shadow: 0 28px 50px -30px rgba(17, 18, 21, 0.35);
            transform: translateY(-6px);
        }

        .feature-card:hover::after {
            transform: scaleX(1);
        }

        .feature-card__no {
            position: absolute;
            top: 20px;
            right: 22px;
            color: #b3b0aa;
            font-size: 0.62rem;
            font-weight: 600;
            letter-spacing: 0.12em;
        }

        .feature-card__icon {
            display: grid;
            place-items: center;
            width: 50px;
            height: 50px;
            margin-bottom: 6px;
            border-radius: 14px;
            background: var(--red-soft);
            color: var(--red);
            font-size: 1.25rem;
            transition: background-color var(--dur), color var(--dur), transform var(--dur) var(--ease);
        }

        .feature-card:hover .feature-card__icon {
            background: var(--red);
            color: #ffffff;
            transform: rotate(-3deg) scale(1.03);
        }

        .feature-card h3 {
            padding-right: 28px;
            color: var(--ink);
            font-size: 1rem;
            font-weight: 700;
            line-height: 1.3;
            letter-spacing: -0.02em;
        }

        .feature-card p {
            color: var(--body);
            font-size: 0.84rem;
            line-height: 1.65;
        }

        /* ============================================================
           11. PRODUCTS
           ============================================================ */
        .products {
            position: relative;
            overflow: clip;
            background:
                radial-gradient(ellipse 60% 50% at 90% 0%, rgba(var(--red-rgb), 0.05), transparent 65%),
                transparent;
        }

        .products::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(17, 18, 21, 0.09) 1px, transparent 1px);
            background-size: 22px 22px;
            opacity: 0.35;
            -webkit-mask-image: linear-gradient(180deg, #000, transparent 55%);
            mask-image: linear-gradient(180deg, #000, transparent 55%);
            pointer-events: none;
        }

        .products .container {
            position: relative;
            z-index: 1;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: clamp(18px, 2.4vw, 28px);
        }

        .product-card {
            display: flex;
            flex-direction: column;
            overflow: hidden;
            border: 1px solid var(--line);
            border-radius: var(--radius-lg);
            background: #ffffff;
            transition: transform 0.4s var(--ease), box-shadow 0.4s var(--ease),
                border-color 0.4s var(--ease);
        }

        .product-card:hover {
            border-color: rgba(var(--red-rgb), 0.18);
            box-shadow: 0 34px 60px -34px rgba(17, 18, 21, 0.4);
            transform: translateY(-7px);
        }

        .product-media {
            position: relative;
            overflow: hidden;
            aspect-ratio: 4 / 5;
            background: #f4f0ea;
        }

        .product-media__link {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
        }

        .product-media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center 58%;
            transition: transform 0.8s var(--ease);
        }

        .product-card:hover .product-media img {
            transform: scale(1.055);
        }

        .product-media::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(17, 18, 21, 0.10), transparent 28%, rgba(17, 18, 21, 0) 70%, rgba(17, 18, 21, 0.16));
            opacity: 0.7;
            pointer-events: none;
        }

        .product-badge {
            position: absolute;
            top: 14px;
            left: 14px;
            z-index: 3;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 11px;
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: var(--radius-pill);
            background: rgba(255, 255, 255, 0.92);
            color: var(--ink);
            font-size: 0.6rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            line-height: 1.2;
            text-transform: uppercase;
            box-shadow: 0 6px 16px -8px rgba(17, 18, 21, 0.4);
            -webkit-backdrop-filter: blur(8px);
            backdrop-filter: blur(8px);
        }

        .product-badge::before {
            content: "";
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: var(--red);
        }

        .product-badge--red {
            border-color: var(--red);
            background: var(--red);
            color: #ffffff;
        }

        .product-badge--red::before {
            background: #ffffff;
        }

        .product-media__zoom {
            position: absolute;
            right: 14px;
            bottom: 14px;
            z-index: 3;
            display: grid;
            place-items: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.92);
            color: var(--ink);
            font-size: 0.85rem;
            opacity: 0;
            transform: translateY(8px);
            transition: opacity var(--dur), transform var(--dur), background-color var(--dur), color var(--dur);
            -webkit-backdrop-filter: blur(8px);
            backdrop-filter: blur(8px);
        }

        .product-card:hover .product-media__zoom {
            opacity: 1;
            transform: none;
        }

        .product-media__link:hover .product-media__zoom {
            background: var(--red);
            color: #ffffff;
        }

        .product-body {
            display: flex;
            flex: 1;
            flex-direction: column;
            gap: 8px;
            padding: 22px 24px 24px;
        }

        .product-kicker {
            color: var(--red);
            font-size: 0.64rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            line-height: 1.5;
            text-transform: uppercase;
        }

        .product-body h3 {
            color: var(--ink);
            font-size: 1.18rem;
            font-weight: 700;
            line-height: 1.25;
            letter-spacing: -0.035em;
        }

        .product-desc {
            color: var(--body);
            font-size: 0.86rem;
            line-height: 1.65;
        }

        .product-foot {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-top: auto;
            padding-top: 16px;
            border-top: 1px solid var(--line);
        }

        .product-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: var(--ink);
            font-size: 0.8rem;
            font-weight: 700;
            transition: color 0.25s ease;
        }

        .product-link i {
            color: var(--red);
            font-size: 0.9rem;
            transition: transform 0.3s var(--ease);
        }

        .product-link:hover {
            color: var(--red);
        }

        .product-link:hover i {
            transform: translate(2px, -2px);
        }

        .product-spec {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            color: var(--muted);
            font-size: 0.64rem;
            font-weight: 600;
            white-space: nowrap;
        }

        .product-spec i {
            color: var(--gold);
            font-size: 0.8rem;
        }

        /* ============================================================
           12. CONTACT
           ============================================================ */
        .contact {
            position: relative;
            overflow: clip;
            background:
                radial-gradient(ellipse 50% 55% at 0% 100%, rgba(191, 155, 95, 0.09), transparent 62%),
                transparent;
        }

        .contact-layout {
            display: grid;
            grid-template-columns: minmax(0, 0.92fr) minmax(0, 1.08fr);
            gap: clamp(24px, 3.2vw, 40px);
            align-items: start;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .contact-cards {
            display: grid;
            gap: 12px;
        }

        .contact-card {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 18px 20px;
            border: 1px solid var(--line);
            border-radius: var(--radius-md);
            background: #ffffff;
            transition: transform 0.3s var(--ease), border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .contact-card:hover {
            border-color: rgba(var(--red-rgb), 0.22);
            box-shadow: 0 16px 34px -28px rgba(17, 18, 21, 0.4);
            transform: translateY(-2px);
        }

        .contact-card__icon {
            display: grid;
            place-items: center;
            width: 44px;
            height: 44px;
            flex: none;
            border-radius: 50%;
            background: var(--red-soft);
            color: var(--red);
            font-size: 1.05rem;
        }

        .contact-card h3 {
            margin-bottom: 5px;
            color: var(--ink);
            font-size: 0.82rem;
            font-weight: 700;
            letter-spacing: -0.01em;
        }

        .contact-card address,
        .contact-card p {
            color: var(--body);
            font-size: 0.84rem;
            line-height: 1.6;
        }

        .contact-card a {
            color: var(--ink);
            font-weight: 500;
            transition: color 0.25s ease;
        }

        .contact-card a:hover {
            color: var(--red);
        }

        .contact-card .text-link {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-top: 7px;
            color: var(--red);
            font-size: 0.74rem;
            font-weight: 700;
        }

        .contact-card .text-link i {
            font-size: 0.8rem;
        }

        .phone-list {
            display: grid;
            gap: 4px;
        }

        .phone-list a {
            display: inline-block;
            padding-block: 5px;
        }

        .map-card {
            overflow: hidden;
            margin-top: 2px;
            border: 1px solid var(--line);
            border-top: 3px solid var(--red);
            border-radius: var(--radius-md);
            background: #ffffff;
            box-shadow: 0 24px 50px -34px rgba(17, 18, 21, 0.35);
        }

        .map-card__bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 12px 16px;
            border-bottom: 1px solid var(--line);
            color: var(--ink);
            font-size: 0.72rem;
            font-weight: 600;
        }

        .map-card__place {
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .map-card__place::before {
            content: "";
            width: 6px;
            height: 6px;
            flex: none;
            border-radius: 50%;
            background: var(--red);
            box-shadow: 0 0 0 3px rgba(var(--red-rgb), 0.14);
        }

        .map-card__bar a {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            color: var(--red);
            font-size: 0.7rem;
            font-weight: 700;
            white-space: nowrap;
        }

        .map-card iframe {
            display: block;
            width: 100%;
            height: 300px;
            border: 0;
            filter: saturate(0.9) contrast(1.02);
        }

        .contact-form-card {
            position: relative;
            overflow: hidden;
            padding: clamp(24px, 3vw, 40px);
            border: 1px solid var(--line);
            border-radius: var(--radius-xl);
            background: #ffffff;
            box-shadow: var(--shadow-lg);
        }

        .contact-form-card::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--red), #8b0707 45%, var(--gold));
        }

        .contact-form__head {
            margin-bottom: 24px;
        }

        .contact-form__head .eyebrow {
            margin-bottom: 12px;
        }

        .contact-form__head h3 {
            margin-bottom: 8px;
            color: var(--ink);
            font-size: clamp(1.4rem, 2.2vw, 1.8rem);
            font-weight: 800;
            letter-spacing: -0.04em;
        }

        .contact-form__head > p:not(.eyebrow) {
            color: var(--body);
            font-size: 0.88rem;
            line-height: 1.65;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px 14px;
        }

        .field {
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .field--full {
            grid-column: 1 / -1;
        }

        .field label {
            margin-bottom: 7px;
            color: var(--ink);
            font-size: 0.64rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        .field label span {
            color: var(--red);
        }

        .field input,
        .field select,
        .field textarea {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid var(--line-strong);
            border-radius: 10px;
            background: #fbfaf8;
            color: var(--ink);
            font-family: var(--font-body);
            font-size: 0.87rem;
            line-height: 1.5;
            transition: border-color 0.25s ease, box-shadow 0.25s ease, background-color 0.25s ease;
            -webkit-appearance: none;
            appearance: none;
        }

        .field input::placeholder,
        .field textarea::placeholder {
            color: #777b83;
        }

        .field input:hover,
        .field select:hover,
        .field textarea:hover {
            border-color: rgba(17, 18, 21, 0.26);
        }

        .field input:focus,
        .field select:focus,
        .field textarea:focus {
            outline: none;
            border-color: var(--red);
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(var(--red-rgb), 0.09);
        }

        .field select {
            padding-right: 36px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' fill='none' stroke='%235f636b' stroke-width='1.6' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 13px center;
            background-size: 12px;
            cursor: pointer;
        }

        .field textarea {
            min-height: 112px;
            resize: vertical;
        }

        .field-error {
            display: none;
            margin-top: 5px;
            color: #b00000;
            font-size: 0.7rem;
            font-weight: 500;
            line-height: 1.4;
        }

        .field.is-invalid input,
        .field.is-invalid select,
        .field.is-invalid textarea {
            border-color: #b00000;
            background: #fff7f7;
        }

        .field.is-invalid .field-error {
            display: block;
        }

        /* Human-check widget */
        .captcha {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            margin-top: 18px;
        }

        .captcha__control {
            display: flex;
            align-items: center;
            gap: 11px;
            width: 100%;
            max-width: 304px;
            min-height: 78px;
            padding: 0 12px;
            border: 1px solid #d3d3d3;
            border-radius: 3px;
            background: #f9f9f9;
            box-shadow: 0 0 4px 1px rgba(0, 0, 0, 0.08);
            color: #212121;
            font-family: Roboto, "Helvetica Neue", Arial, sans-serif;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.2;
            cursor: pointer;
            -webkit-user-select: none;
            user-select: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .captcha__control:hover {
            border-color: #bcbcbc;
        }

        .captcha__control input {
            position: absolute;
            width: 1px;
            height: 1px;
            margin: -1px;
            padding: 0;
            border: 0;
            overflow: hidden;
            white-space: nowrap;
            clip: rect(0 0 0 0);
            clip-path: inset(50%);
        }

        .captcha__box {
            display: grid;
            place-items: center;
            width: 28px;
            height: 28px;
            flex: none;
            margin-right: 2px;
            border: 2px solid #c1c1c1;
            border-radius: 2px;
            background: #ffffff;
            color: transparent;
            font-size: 1.15rem;
            line-height: 1;
            transition: border-color 0.2s ease, color 0.2s ease;
        }

        .captcha__control:hover .captcha__box {
            border-color: #b2b2b2;
        }

        .captcha__control input:checked + .captcha__box {
            border-color: #c1c1c1;
            color: #0f9d58;
        }

        .captcha__control input:checked + .captcha__box svg {
            animation: captcha-tick 0.26s cubic-bezier(0.2, 0.9, 0.3, 1.2) both;
        }

        .captcha__box svg {
            width: 22px;
            height: 22px;
        }

        @keyframes captcha-tick {
            from {
                opacity: 0;
                transform: scale(0.4);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .captcha__control input:focus-visible + .captcha__box {
            outline: 2px solid #4285f4;
            outline-offset: 2px;
        }

        .captcha__text {
            font-size: 14px;
            letter-spacing: 0.1px;
        }

        .captcha__brand {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 3px;
            margin-left: auto;
            color: #555555;
            font-size: 8px;
            font-weight: 400;
            letter-spacing: 0.02em;
            line-height: 1;
        }

        .captcha__brand svg {
            display: block;
            width: 34px;
            height: 34px;
        }

        .captcha .field-error {
            flex-basis: 100%;
            margin-top: 8px;
        }

        .captcha.is-invalid .captcha__control {
            border-color: #b00000;
            box-shadow: 0 0 0 1px rgba(176, 0, 0, 0.18);
        }

        .captcha.is-invalid .field-error {
            display: block;
        }

        .contact-form__submit {
            width: 100%;
            margin-top: 18px;
        }

        .contact-form__submit:disabled {
            opacity: 0.72;
            cursor: progress;
        }

        .hp-field {
            position: absolute;
            left: -9999px;
            width: 1px;
            height: 1px;
            overflow: hidden;
        }

        .form-alert {
            margin-top: 12px;
            padding: 10px 13px;
            border: 1px solid rgba(176, 0, 0, 0.22);
            border-radius: 9px;
            background: #fff7f7;
            color: #9c0000;
            font-size: 0.78rem;
            line-height: 1.55;
        }

        .form-alert[hidden] {
            display: none;
        }

        .form-note {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 12px;
            color: var(--muted);
            font-size: 0.68rem;
            line-height: 1.5;
            text-align: center;
        }

        .form-note i {
            color: var(--gold);
        }

        .form-success {
            padding: 30px 12px 18px;
            text-align: center;
        }

        .form-success__icon {
            display: grid;
            place-items: center;
            width: 64px;
            height: 64px;
            margin: 0 auto 18px;
            border-radius: 50%;
            background: var(--red-soft);
            color: var(--red);
            font-size: 1.7rem;
            box-shadow: 0 0 0 8px rgba(var(--red-rgb), 0.05);
        }

        .form-success h3 {
            color: var(--ink);
            font-size: 1.5rem;
            font-weight: 800;
            letter-spacing: -0.04em;
        }

        .form-success p {
            max-width: 40ch;
            margin: 8px auto 20px;
            color: var(--body);
            font-size: 0.88rem;
            line-height: 1.7;
        }

        .form-success a {
            color: var(--red);
            font-weight: 600;
            text-decoration: underline;
            text-underline-offset: 2px;
        }

        .form-success .btn {
            min-width: 200px;
        }

        /* ============================================================
           13. FOOTER
           ============================================================ */
        .site-footer {
            position: relative;
            overflow: clip;
            background: #111215;
            color: rgba(255, 255, 255, 0.62);
        }

        .footer-accent {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--red) 0%, #8b0707 45%, var(--gold) 100%);
        }

        .site-footer::before {
            content: "";
            position: absolute;
            top: -260px;
            right: -120px;
            width: 520px;
            height: 520px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(var(--red-rgb), 0.16), transparent 68%);
            pointer-events: none;
        }

        .site-footer .container {
            position: relative;
            z-index: 1;
        }

        .footer-main {
            display: grid;
            grid-template-columns: 1.5fr 0.85fr 0.85fr 1.15fr;
            gap: clamp(28px, 4vw, 56px);
            padding: clamp(56px, 7vw, 84px) 0 clamp(40px, 5vw, 56px);
        }

        .footer-brand .brand img {
            height: 48px;
        }

        .footer-brand p {
            max-width: 34ch;
            margin-top: 18px;
            color: rgba(255, 255, 255, 0.58);
            font-size: 0.86rem;
            line-height: 1.75;
        }

        .footer-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-top: 18px;
            padding: 7px 12px;
            border: 1px solid rgba(255, 255, 255, 0.14);
            border-radius: var(--radius-pill);
            color: rgba(255, 255, 255, 0.68);
            font-size: 0.62rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .footer-badge i {
            color: var(--gold);
        }

        .footer-col h3 {
            margin-bottom: 18px;
            color: #ffffff;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.16em;
            text-transform: uppercase;
        }

        .footer-links {
            display: grid;
            gap: 9px;
        }

        .footer-links a {
            display: inline-flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.58);
            font-size: 0.84rem;
            transition: color 0.25s ease, transform 0.25s var(--ease);
        }

        .footer-links a:hover {
            color: #ffffff;
            transform: translateX(3px);
        }

        .footer-contact {
            display: grid;
            gap: 12px;
            font-size: 0.84rem;
            line-height: 1.6;
        }

        .footer-contact__item {
            display: flex;
            align-items: flex-start;
            gap: 9px;
        }

        .footer-contact__item i {
            margin-top: 3px;
            flex: none;
            color: var(--red);
            font-size: 0.9rem;
        }

        .footer-contact address,
        .footer-contact p {
            color: rgba(255, 255, 255, 0.58);
        }

        .footer-contact a {
            display: inline-block;
            padding-block: 5px;
            color: rgba(255, 255, 255, 0.66);
            transition: color 0.25s ease;
        }

        .footer-contact a:hover {
            color: #ffffff;
        }

        .footer-bottom {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 14px 24px;
            padding: 20px 72px 26px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.42);
            font-size: 0.72rem;
        }

        .footer-bottom strong {
            color: rgba(255, 255, 255, 0.7);
            font-weight: 600;
        }

        .footer-credit {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .footer-credit span {
            color: var(--red);
        }

        .footer-copy {
            display: grid;
            gap: 5px;
        }

        .footer-developer {
            color: rgba(255, 255, 255, 0.46);
            font-size: 0.66rem;
            letter-spacing: 0.02em;
            line-height: 1.4;
        }

        .footer-developer span {
            color: rgba(255, 255, 255, 0.72);
            font-weight: 600;
        }

        .footer-legal {
            display: flex;
            gap: 16px;
        }

        .footer-legal a {
            color: rgba(255, 255, 255, 0.42);
            transition: color 0.25s ease;
        }

        .footer-legal a:hover {
            color: #ffffff;
        }

        /* ============================================================
           14. BACK TO TOP + ANIMATIONS
           ============================================================ */
        .to-top {
            position: fixed;
            right: clamp(14px, 2.2vw, 24px);
            bottom: clamp(14px, 2.2vw, 24px);
            z-index: 900;
            display: grid;
            place-items: center;
            width: 52px;
            height: 52px;
            padding: 0;
            border: 1px solid var(--line);
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.9);
            color: var(--ink);
            box-shadow: 0 16px 36px -18px rgba(17, 18, 21, 0.45);
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transform: translateY(12px);
            transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s var(--ease),
                background-color 0.3s ease, border-color 0.3s ease, color 0.3s ease;
            -webkit-backdrop-filter: blur(10px);
            backdrop-filter: blur(10px);
        }

        .to-top.is-visible {
            opacity: 1;
            visibility: visible;
            transform: none;
        }

        .to-top svg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            transform: rotate(-90deg);
            pointer-events: none;
        }

        .to-top__track {
            fill: none;
            stroke: rgba(17, 18, 21, 0.09);
            stroke-width: 2;
        }

        .to-top__progress {
            fill: none;
            stroke: var(--red);
            stroke-width: 2;
            stroke-linecap: round;
            stroke-dasharray: 144.5;
            stroke-dashoffset: 144.5;
        }

        .to-top i {
            font-size: 1.05rem;
            line-height: 1;
        }

        .to-top:hover {
            border-color: var(--red);
            background: var(--red);
            color: #ffffff;
            transform: translateY(-2px);
        }

        .to-top:hover .to-top__track {
            stroke: rgba(255, 255, 255, 0.3);
        }

        .to-top:hover .to-top__progress {
            stroke: #ffffff;
        }

        /* ============================================================
           15. WHATSAPP FLOAT
           ============================================================ */
        .whatsapp-float {
            position: fixed;
            right: clamp(14px, 2.2vw, 24px);
            bottom: clamp(14px, 2.2vw, 24px);
            z-index: 900;
            display: grid;
            place-items: center;
            width: 54px;
            height: 54px;
            border-radius: 50%;
            background: #25d366;
            color: #ffffff;
            font-size: 1.6rem;
            line-height: 1;
            text-decoration: none;
            box-shadow: 0 16px 32px -14px rgba(37, 211, 102, 0.85),
                0 8px 20px -12px rgba(17, 18, 21, 0.45);
            transition: transform 0.3s var(--ease), bottom 0.3s var(--ease),
                background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .to-top.is-visible + .whatsapp-float {
            bottom: calc(clamp(14px, 2.2vw, 24px) + 64px);
        }

        .whatsapp-float > i {
            position: relative;
            z-index: 1;
        }

        .whatsapp-float::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 50%;
            animation: whatsapp-pulse 2.8s ease-out infinite;
        }

        .whatsapp-float:hover {
            background: #1eb85a;
            transform: translateY(-2px);
            box-shadow: 0 18px 34px -14px rgba(37, 211, 102, 0.9),
                0 10px 22px -12px rgba(17, 18, 21, 0.5);
        }

        .whatsapp-float:focus-visible {
            outline: 3px solid rgba(37, 211, 102, 0.45);
            outline-offset: 3px;
        }

        .whatsapp-float__label {
            position: absolute;
            right: calc(100% + 12px);
            top: 50%;
            padding: 7px 12px;
            border-radius: 8px;
            background: #111215;
            color: #ffffff;
            font-family: var(--font-body);
            font-size: 0.72rem;
            font-weight: 600;
            line-height: 1;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transform: translate(6px, -50%);
            transition: opacity 0.25s ease, visibility 0.25s ease, transform 0.25s var(--ease);
        }

        .whatsapp-float:hover .whatsapp-float__label,
        .whatsapp-float:focus-visible .whatsapp-float__label {
            opacity: 1;
            visibility: visible;
            transform: translate(0, -50%);
        }

        @keyframes whatsapp-pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.45);
            }

            70% {
                box-shadow: 0 0 0 16px rgba(37, 211, 102, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }

        @keyframes drift {
            from {
                transform: translate3d(0, 0, 0) scale(1);
            }

            to {
                transform: translate3d(-3%, 4%, 0) scale(1.08);
            }
        }

        @keyframes float {
            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        @keyframes pulse-dot {
            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(var(--red-rgb), 0.35);
            }

            50% {
                box-shadow: 0 0 0 5px rgba(var(--red-rgb), 0);
            }
        }

        @keyframes preloader-line {
            0% {
                transform: translateX(-100%);
            }

            60%,
            100% {
                transform: translateX(0);
            }
        }

        @keyframes preloader-pulse {
            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.04);
            }
        }

        /* ============================================================
           15. RESPONSIVE REFINEMENTS
           ============================================================ */
        @media (max-width: 1160px) {
            .header-phone {
                display: none;
            }
        }

        @media (max-width: 1020px) {
            .primary-nav {
                display: none;
            }

            .nav-toggle {
                display: flex;
            }

            .header-actions {
                gap: 10px;
            }
        }

        @media (max-width: 980px) {
            :root {
                --header-h: 74px;
            }

            .hero {
                padding-top: calc(var(--header-h) + 46px);
            }

            .hero-grid {
                grid-template-columns: 1fr;
                gap: 44px;
            }

            .hero-title {
                max-width: 14ch;
            }

            .hero-visual {
                width: 100%;
                max-width: 620px;
                margin-inline: auto;
            }

            .hero-float--hips {
                right: 8px;
            }

            .hero-float--heat {
                right: 8px;
            }

            .about-grid {
                grid-template-columns: 1fr;
                gap: 44px;
            }

            .about-visual {
                width: 100%;
                max-width: 620px;
                margin-inline: auto;
            }

            .about-content {
                max-width: 680px;
            }

            .why-grid {
                grid-template-columns: 1fr;
            }

            .why-panel {
                min-height: auto;
            }

            .product-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .contact-layout {
                grid-template-columns: 1fr;
            }

            .footer-main {
                grid-template-columns: 1fr 1fr;
                gap: 36px 32px;
            }

            .footer-brand {
                grid-column: 1 / -1;
            }

            .footer-brand p {
                max-width: 48ch;
            }
        }

        @media (max-width: 820px) {
            .section-head--split {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .section-head__copy {
                justify-self: start;
                max-width: 56ch;
            }
        }

        @media (max-width: 720px) {
            .section {
                padding: clamp(40px, 7vw, 60px) 0 clamp(48px, 8vw, 68px);
            }

            .hero-stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .stat:nth-child(3)::before {
                display: none;
            }

            .stat:nth-child(n + 3) {
                border-top: 1px solid var(--line);
            }

            .stat {
                padding: 18px 20px;
            }

            .why-cards {
                grid-template-columns: 1fr;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .field--full {
                grid-column: auto;
            }

            .field input,
            .field select,
            .field textarea {
                font-size: 16px;
            }

            .map-card iframe {
                height: 270px;
            }

            .footer-bottom {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 620px) {
            .header-cta {
                display: none;
            }

            .brand img {
                height: 32px;
            }

            .hero-float--hips {
                display: none;
            }

            .hero-float--heat {
                right: 8px;
                bottom: 8%;
            }

            .hero-title {
                font-size: clamp(2.45rem, 10vw, 3.4rem);
                letter-spacing: -0.055em;
            }

            .hero-actions .btn {
                flex: 1 1 100%;
            }

            .about-float {
                right: 12px;
                bottom: 14px;
                left: 12px;
            }

            .about-rule {
                left: -6px;
            }

            .product-grid {
                grid-template-columns: 1fr;
            }

            .footer-main {
                grid-template-columns: 1fr;
            }

            .footer-brand {
                grid-column: auto;
            }

            .footer-legal {
                flex-wrap: wrap;
            }
        }

        @media (max-width: 420px) {
            :root {
                --gutter: 18px;
            }

            .hero-badge {
                gap: 7px;
                padding: 7px 11px;
                font-size: 0.62rem;
            }

            .hero-badge__divider {
                display: none;
            }

            .hero-stats {
                grid-template-columns: 1fr;
            }

            .stat + .stat::before {
                display: none;
            }

            .stat + .stat {
                border-top: 1px solid var(--line);
            }

            .hero-float--heat {
                padding: 10px 14px;
            }

            .contact-form-card {
                padding: 20px;
            }

            .map-card__bar {
                align-items: flex-start;
                flex-direction: column;
                gap: 6px;
            }
        }

        /* ============================================================
           16. MOTION & FALLBACKS
           ============================================================ */
        .no-aos [data-aos] {
            opacity: 1 !important;
            transform: none !important;
            transition: none !important;
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }

            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }

            [data-aos] {
                opacity: 1 !important;
                transform: none !important;
            }

            .hero-float,
            .hero-glow {
                animation: none;
            }
        }
    </style>

    <noscript>
        <style>
            [data-aos] {
                opacity: 1 !important;
                transform: none !important;
            }

            #inco-preloader {
                display: none;
            }
        </style>
    </noscript>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "Indu Components (INCO)",
            "alternateName": "INCO",
            "url": "{{ url('/') }}",
            "logo": "{{ asset('assets/img/inco-logo.png') }}",
            "description": "Manufacturer of premium electrical Co-Boxes (Cobox) precision-moulded from 100% virgin HIPS in Kerala, India.",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Plot No. 20, SIDCO Industrial Park, Muchukunnu",
                "addressLocality": "Koyilandy",
                "addressRegion": "Kerala",
                "postalCode": "673307",
                "addressCountry": "IN"
            },
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+91-496-2690033",
                "contactType": "sales",
                "email": "inducomponentsinco@gmail.com",
                "areaServed": "IN",
                "availableLanguage": ["English", "Malayalam"]
            },
            "brand": {
                "@type": "Brand",
                "name": "INCO"
            }
        }
    </script>
</head>

<body>
    <a class="skip-link" href="#main-content">Skip to content</a>

    <!-- Minimal preloader -->
    <div id="inco-preloader" aria-hidden="true">
        <div class="preloader__inner">
            <img src="{{ url('assets/img/inco-logo.svg') }}"
                alt="" width="309" height="75" class="preloader__logo" decoding="async">
            <span class="preloader__name">Indu Components</span>
            <span class="preloader__line"><span></span></span>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header class="site-header" id="siteHeader">
        <div class="container header-inner">
            <a href="#home" class="brand" aria-label="INCO Electric — Indu Components, home">
                <img src="{{ url('assets/img/inco-logo.svg') }}"
                    alt="" width="309" height="75" fetchpriority="high">
            </a>

            <nav class="primary-nav" aria-label="Primary navigation">
                <ul class="nav-list">
                    <li><a href="#home" class="nav-link is-active" aria-current="true">Home</a></li>
                    <li><a href="#about" class="nav-link">About</a></li>
                    <li><a href="#why-us" class="nav-link">Why Inco</a></li>
                    <li><a href="#products" class="nav-link">Products</a></li>
                    <li><a href="#contact" class="nav-link">Contact</a></li>
                </ul>
            </nav>

            <div class="header-actions">
                <a href="tel:+914962690033" class="header-phone">
                    <i class="bi bi-telephone" aria-hidden="true"></i>
                    <span>0496 269 0033</span>
                </a>
                <a href="#contact" class="btn btn-primary btn-sm header-cta">
                    Get a Quote
                    <i class="bi bi-arrow-up-right" aria-hidden="true"></i>
                </a>
                <button class="nav-toggle" id="navToggle" type="button" aria-label="Open menu"
                    aria-controls="mobileNav" aria-expanded="false">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </header>

    <div class="nav-backdrop" id="navBackdrop" aria-hidden="true"></div>

    <!-- Mobile off-canvas menu -->
    <aside class="mobile-nav" id="mobileNav" aria-hidden="true">
        <div class="mobile-nav__panel" role="dialog" aria-modal="true" aria-label="Site menu">
            <div class="mobile-nav__top">
                <a href="#home" class="brand" aria-label="INCO Electric — Indu Components, home">
                    <img src="{{ url('assets/img/inco-logo.svg') }}"
                        alt="" width="309" height="75" loading="lazy">
                </a>
                <button class="drawer-close" id="navClose" type="button" aria-label="Close menu">
                    <i class="bi bi-x-lg" aria-hidden="true"></i>
                </button>
            </div>

            <nav aria-label="Mobile navigation">
                <ul class="mobile-nav__list">
                    <li><a href="#home"><span>01</span>Home</a></li>
                    <li><a href="#about"><span>02</span>About</a></li>
                    <li><a href="#why-us"><span>03</span>Why Inco</a></li>
                    <li><a href="#products"><span>04</span>Products</a></li>
                    <li><a href="#contact"><span>05</span>Contact</a></li>
                </ul>
            </nav>

            <div class="mobile-nav__contact">
                <p class="eyebrow">Talk to us</p>
                <a href="tel:+914962690033"><i class="bi bi-telephone" aria-hidden="true"></i> 0496 269 0033</a><br>
                <a href="tel:+919207193005"><i class="bi bi-phone" aria-hidden="true"></i> 92071 93005</a><br>
                <a href="mailto:inducomponentsinco@gmail.com"><i class="bi bi-envelope" aria-hidden="true"></i> inducomponentsinco@gmail.com</a>
                <address>Plot No. 20, SIDCO Industrial Park, Muchukunnu, Koyilandy, Kerala – 673307</address>
            </div>

            <a href="#contact" class="btn btn-primary mobile-nav__cta">
                Request a quote
                <i class="bi bi-arrow-up-right" aria-hidden="true"></i>
            </a>
        </div>
    </aside>

    <main id="main-content">

        <!-- ======= Hero ======= -->
        <section id="home" class="hero" aria-labelledby="hero-title">
            <div class="hero-bg" aria-hidden="true">
                <span class="hero-glow hero-glow--red"></span>
                <span class="hero-glow hero-glow--gold"></span>
                <span class="hero-dots"></span>
            </div>

            <div class="container">
                <div class="hero-grid">
                    <div class="hero-copy">
                        <p class="hero-badge">
                            <span class="pulse" aria-hidden="true"></span>
                            First to market with Cobox
                            <span class="hero-badge__divider" aria-hidden="true"></span>
                            Made in Kerala
                        </p>

                        <h1 class="hero-title" id="hero-title">
                            <span class="hero-title__line">The original Co-Box.</span>
                            <span class="hero-title__line">Built to <em>endure.</em></span>
                        </h1>

                        <p class="hero-sub">
                            Precision-moulded from 100% virgin high-impact polystyrene, INCO Co-Boxes give
                            electricians a cleaner fit, greater strength and reliable heat resistance up to
                            70°C — project after project.
                        </p>

                        <div class="hero-actions">
                            <a href="#products" class="btn btn-primary">
                                Explore the range
                                <i class="bi bi-arrow-down-right" aria-hidden="true"></i>
                            </a>
                            <a href="#contact" class="btn btn-secondary">
                                Talk to sales
                                <i class="bi bi-arrow-up-right" aria-hidden="true"></i>
                            </a>
                        </div>

                        <ul class="hero-meta" aria-label="Product highlights">
                            <li><i class="bi bi-patch-check" aria-hidden="true"></i> 16×16 stainless steel screws</li>
                            <li><i class="bi bi-recycle" aria-hidden="true"></i> 100% virgin HIPS</li>
                            <li><i class="bi bi-geo-alt" aria-hidden="true"></i> Manufactured in Kerala</li>
                        </ul>
                    </div>

                    <div class="hero-visual" data-aos="fade-up" data-aos-delay="120">
                        <div class="hero-frame">
                            <div class="hero-media">
                                <img src="{{ url('assets/img/INCO_hero_img.jpg') }}"
                                    onerror="this.onerror=null;this.src='{{ url('assets/img/inco_about_img.png') }}';"
                                    alt="INCO electrician with the Co-Box range — camera boxes, junction boxes and LED boxes"
                                    width="1536" height="1024" fetchpriority="high" decoding="async">
                            </div>
                        </div>

                        <div class="hero-float hero-float--hips">
                            <span class="hero-float__icon"><i class="bi bi-shield-check" aria-hidden="true"></i></span>
                            <div>
                                <strong>Virgin HIPS</strong>
                                <span>100% high-impact grade</span>
                            </div>
                        </div>

                        <div class="hero-float hero-float--heat">
                            <span class="hero-float__value">70<small>°C</small></span>
                            <span class="hero-float__label">Heat resistant</span>
                        </div>

                        <span class="hero-orbit" aria-hidden="true"></span>
                    </div>
                </div>

                <div class="hero-stats" data-aos="fade-up" data-aos-delay="180" aria-label="INCO at a glance">
                    <div class="stat">
                        <span class="stat-value"><span data-counter="70">70</span><span class="stat-unit">°C</span></span>
                        <span class="stat-label">Heat resistance</span>
                    </div>
                    <div class="stat">
                        <span class="stat-value"><span data-counter="100">100</span><span class="stat-unit">%</span></span>
                        <span class="stat-label">Virgin HIPS</span>
                    </div>
                    <div class="stat">
                        <span class="stat-value"><span data-counter="16">16</span><span class="stat-unit">×16</span></span>
                        <span class="stat-label">Stainless steel screws</span>
                    </div>
                    <div class="stat">
                        <span class="stat-value"><span data-counter="6">6</span></span>
                        <span class="stat-label">Co-Box formats</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ======= About ======= -->
        <section id="about" class="section about" aria-labelledby="about-title">
            <div class="container">
                <div class="about-grid">
                    <div class="about-visual" data-aos="fade-right">
                        <div class="about-frame">
                            <img src="{{ asset('assets/img/inco_about_img.png') }}"
                                alt="INCO Co-Box range with an electrician — camera boxes, junction boxes and LED boxes"
                                width="1199" height="1120" loading="lazy" decoding="async">
                        </div>
                        <span class="about-rule" aria-hidden="true"></span>
                        <div class="about-float">
                            <span class="about-float__icon"><i class="bi bi-shield-check" aria-hidden="true"></i></span>
                            <div>
                                <strong>100% Virgin HIPS</strong>
                                <span>No regrind. No compromise.</span>
                            </div>
                        </div>
                    </div>

                    <div class="about-content" data-aos="fade-up">
                        <p class="eyebrow">About INCO</p>
                        <h2 id="about-title" class="section-title">
                            Quality is never an accident.<br>
                            <em>It is engineered.</em>
                        </h2>
                        <p class="lead">
                            We were the first to bring Cobox to the market — and we have treated that head
                            start as a responsibility ever since. Every INCO Co-Box begins with virgin HIPS,
                            precise tooling and a quality process that inspects the details most people never see.
                        </p>
                        <p>
                            From the thickness of the wall to the bite of every 16×16 stainless steel screw,
                            our boxes are built to survive real job sites: heat, handling, tightening and time.
                            The result is a cleaner install for contractors and a more dependable product for
                            the people who live with it.
                        </p>

                        <ul class="check-list">
                            <li>
                                <span class="check"><i class="bi bi-check-lg" aria-hidden="true"></i></span>
                                First to market with the original Cobox design
                            </li>
                            <li>
                                <span class="check"><i class="bi bi-check-lg" aria-hidden="true"></i></span>
                                Virgin HIPS — never regrind, never compromised
                            </li>
                            <li>
                                <span class="check"><i class="bi bi-check-lg" aria-hidden="true"></i></span>
                                Quality control from raw material to final pack
                            </li>
                        </ul>

                        <div class="signature">
                            <span class="signature__seal" aria-hidden="true">INCO</span>
                            <div>
                                <strong>Indu Components</strong>
                                <span>Precision Co-Boxes · SIDCO Industrial Park, Kerala</span>
                            </div>
                        </div>

                        <a href="#products" class="link-arrow">
                            Explore the full range
                            <i class="bi bi-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- ======= Why Inco ======= -->
        <section id="why-us" class="section why-us" aria-labelledby="why-title">
            <div class="container">
                <div class="why-grid">
                    <aside class="why-panel" data-aos="fade-right">
                        <div>
                            <p class="eyebrow eyebrow--light">Why Inco</p>
                            <h2 id="why-title" class="why-title">The details make the difference.</h2>
                            <p>
                                Being first to market only matters if you keep raising the standard. Ours is
                                simple: virgin material, precise moulding and a box that feels as solid on
                                site as it looks on the shelf.
                            </p>
                        </div>

                        <ul class="why-panel__list">
                            <li>
                                <i class="bi bi-check2" aria-hidden="true"></i>
                                First to market. Still setting the benchmark.
                            </li>
                            <li>
                                <i class="bi bi-check2" aria-hidden="true"></i>
                                100% virgin HIPS for strength that holds.
                            </li>
                            <li>
                                <i class="bi bi-check2" aria-hidden="true"></i>
                                16×16 stainless steel screws as standard.
                            </li>
                        </ul>

                        <div class="why-panel__bottom">
                            <a href="#contact" class="btn btn-light">
                                Talk to our team
                                <i class="bi bi-arrow-up-right" aria-hidden="true"></i>
                            </a>
                            <span class="why-panel__seal">Made in Kerala</span>
                        </div>
                    </aside>

                    <div class="why-cards">
                        <article class="feature-card" data-aos="fade-up" data-aos-delay="40">
                            <span class="feature-card__no" aria-hidden="true">01</span>
                            <span class="feature-card__icon"><i class="bi bi-layers" aria-hidden="true"></i></span>
                            <h3>High-quality material</h3>
                            <p>100% virgin HIPS delivers higher impact strength, cleaner edges and none of the brittleness of regrind plastics.</p>
                        </article>

                        <article class="feature-card" data-aos="fade-up" data-aos-delay="90">
                            <span class="feature-card__no" aria-hidden="true">02</span>
                            <span class="feature-card__icon"><i class="bi bi-thermometer-half" aria-hidden="true"></i></span>
                            <h3>Heat resistant</h3>
                            <p>Stable up to 70°C, so the box holds its shape in hot ceilings, lofts and demanding enclosures.</p>
                        </article>

                        <article class="feature-card" data-aos="fade-up" data-aos-delay="140">
                            <span class="feature-card__no" aria-hidden="true">03</span>
                            <span class="feature-card__icon"><i class="bi bi-hand-index-thumb" aria-hidden="true"></i></span>
                            <h3>Enhanced grip</h3>
                            <p>Sculpted grip zones give electricians better control during positioning, drilling and tightening.</p>
                        </article>

                        <article class="feature-card" data-aos="fade-up" data-aos-delay="190">
                            <span class="feature-card__no" aria-hidden="true">04</span>
                            <span class="feature-card__icon"><i class="bi bi-bricks" aria-hidden="true"></i></span>
                            <h3>Increased solidity</h3>
                            <p>Reinforced walls and a rigid body resist distortion when screws are torqued and cables are pulled.</p>
                        </article>

                        <article class="feature-card" data-aos="fade-up" data-aos-delay="240">
                            <span class="feature-card__no" aria-hidden="true">05</span>
                            <span class="feature-card__icon"><i class="bi bi-screwdriver" aria-hidden="true"></i></span>
                            <h3>Stainless steel screws</h3>
                            <p>16×16 stainless steel screws resist corrosion and strip-resistant cross-threading, even in humid coastal conditions.</p>
                        </article>

                        <article class="feature-card" data-aos="fade-up" data-aos-delay="290">
                            <span class="feature-card__no" aria-hidden="true">06</span>
                            <span class="feature-card__icon"><i class="bi bi-diagram-3" aria-hidden="true"></i></span>
                            <h3>Efficient &amp; effective design</h3>
                            <p>Thoughtful knockouts, clean cable routing and a fit that saves time on every point.</p>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <!-- ======= Products ======= -->
        <section id="products" class="section products" aria-labelledby="products-title">
            <div class="container">
                <div class="section-head section-head--split">
                    <div data-aos="fade-up">
                        <p class="eyebrow">The Co-Box range</p>
                        <h2 id="products-title" class="section-title">
                            Six formats. <em>One standard.</em>
                        </h2>
                    </div>
                    <p class="section-head__copy" data-aos="fade-up" data-aos-delay="80">
                        From the flagship 3×3 to large-format 7×3 enclosures, every format shares the same
                        virgin HIPS core, heat resistance and stainless steel hardware. Choose the size —
                        the standard never changes.
                    </p>
                </div>

                <div class="product-grid">
                    <article class="product-card" data-aos="fade-up">
                        <div class="product-media">
                            <span class="product-badge product-badge--red">Best seller</span>
                            <a class="glightbox product-media__link" href="{{ url('assets/img/menu/box1.jpg')}}"
                                data-glightbox="title: 3×3 Inco Ultra; description: Virgin HIPS · 70°C heat resistant · 16×16 stainless steel screws"
                                aria-label="View a larger image of the 3×3 Inco Ultra Co-Box">
                                <img src="{{ url('assets/img/menu/box1.jpg')}}"
                                    alt="3×3 Inco Ultra Co-Box made from virgin HIPS with stainless steel screws"
                                    width="1200" height="1600" loading="lazy" decoding="async">
                                <span class="product-media__zoom" aria-hidden="true"><i class="bi bi-arrows-fullscreen"></i></span>
                            </a>
                        </div>
                        <div class="product-body">
                            <p class="product-kicker">3×3 · Virgin HIPS · Heat resistant</p>
                            <h3>3×3 Inco Ultra</h3>
                            <p class="product-desc">The flagship 3×3. Reinforced body, crisp knockouts and a signature finish for premium residential and commercial points.</p>
                            <div class="product-foot">
                                <a class="product-link glightbox" href="{{ url('assets/img/menu/box1.jpg')}}"
                                    data-glightbox="title: 3×3 Inco Ultra; description: Virgin HIPS · 70°C heat resistant · 16×16 stainless steel screws">
                                    View details <i class="bi bi-arrow-up-right" aria-hidden="true"></i>
                                </a>
                                <span class="product-spec"><i class="bi bi-screwdriver" aria-hidden="true"></i> 16×16 SS</span>
                            </div>
                        </div>
                    </article>

                    <article class="product-card" data-aos="fade-up" data-aos-delay="60">
                        <div class="product-media">
                            <a class="glightbox product-media__link" href="{{ url('assets/img/menu/box1.jpg')}}"
                                data-glightbox="title: 3×3 Inco Deluxe; description: Virgin HIPS · 70°C heat resistant · 16×16 stainless steel screws"
                                aria-label="View a larger image of the 3×3 Inco Deluxe Co-Box">
                                <img src="{{ url('assets/img/menu/box1.jpg')}}"
                                    alt="3×3 Inco Deluxe Co-Box made from virgin HIPS with stainless steel screws"
                                    width="1200" height="1600" loading="lazy" decoding="async">
                                <span class="product-media__zoom" aria-hidden="true"><i class="bi bi-arrows-fullscreen"></i></span>
                            </a>
                        </div>
                        <div class="product-body">
                            <p class="product-kicker">3×3 · Virgin HIPS · Value</p>
                            <h3>3×3 Inco Deluxe</h3>
                            <p class="product-desc">Proven everyday performance with the same virgin HIPS core, at a value that suits high-volume installations.</p>
                            <div class="product-foot">
                                <a class="product-link glightbox" href="{{ url('assets/img/menu/box1.jpg')}}"
                                    data-glightbox="title: 3×3 Inco Deluxe; description: Virgin HIPS · 70°C heat resistant · 16×16 stainless steel screws">
                                    View details <i class="bi bi-arrow-up-right" aria-hidden="true"></i>
                                </a>
                                <span class="product-spec"><i class="bi bi-screwdriver" aria-hidden="true"></i> 16×16 SS</span>
                            </div>
                        </div>
                    </article>

                    <article class="product-card" data-aos="fade-up" data-aos-delay="120">
                        <div class="product-media">
                            <span class="product-badge">CCTV ready</span>
                            <a class="glightbox product-media__link" href="{{ url('assets/img/menu/box1.jpg')}}"
                                data-glightbox="title: 4×4 Camera Box; description: Virgin HIPS · clean cable routing · heat resistant"
                                aria-label="View a larger image of the 4×4 Camera Box">
                                <img src="{{ url('assets/img/menu/box1.jpg')}}"
                                    alt="4×4 INCO Camera Box for CCTV and security junctions"
                                    width="1200" height="1600" loading="lazy" decoding="async">
                                <span class="product-media__zoom" aria-hidden="true"><i class="bi bi-arrows-fullscreen"></i></span>
                            </a>
                        </div>
                        <div class="product-body">
                            <p class="product-kicker">4×4 · Virgin HIPS · CCTV</p>
                            <h3>4×4 Camera Boxes</h3>
                            <p class="product-desc">A clean, secure housing for camera junctions, with room for tidy cable management and a professional finish.</p>
                            <div class="product-foot">
                                <a class="product-link glightbox" href="{{ url('assets/img/menu/box1.jpg')}}"
                                    data-glightbox="title: 4×4 Camera Box; description: Virgin HIPS · clean cable routing · heat resistant">
                                    View details <i class="bi bi-arrow-up-right" aria-hidden="true"></i>
                                </a>
                                <span class="product-spec"><i class="bi bi-camera-video" aria-hidden="true"></i> CCTV</span>
                            </div>
                        </div>
                    </article>

                    <article class="product-card" data-aos="fade-up">
                        <div class="product-media">
                            <a class="glightbox product-media__link" href="{{ url('assets/img/menu/box1.jpg')}}"
                                data-glightbox="title: 4×4 Multi-purpose Co-Box; description: Virgin HIPS · 70°C heat resistant · 16×16 stainless steel screws"
                                aria-label="View a larger image of the 4×4 Multi-purpose Co-Box">
                                <img src="{{ url('assets/img/menu/box1.jpg')}}"
                                    alt="4×4 INCO Multi-purpose Co-Box for switches, sockets and junctions"
                                    width="1200" height="1600" loading="lazy" decoding="async">
                                <span class="product-media__zoom" aria-hidden="true"><i class="bi bi-arrows-fullscreen"></i></span>
                            </a>
                        </div>
                        <div class="product-body">
                            <p class="product-kicker">4×4 · Multi-purpose · Virgin HIPS</p>
                            <h3>4×4 Multi-purpose Co-Box</h3>
                            <p class="product-desc">One box, many jobs. A versatile 4×4 format for junctions, switches, sockets and mixed-services enclosures.</p>
                            <div class="product-foot">
                                <a class="product-link glightbox" href="{{ url('assets/img/menu/box1.jpg')}}"
                                    data-glightbox="title: 4×4 Multi-purpose Co-Box; description: Virgin HIPS · 70°C heat resistant · 16×16 stainless steel screws">
                                    View details <i class="bi bi-arrow-up-right" aria-hidden="true"></i>
                                </a>
                                <span class="product-spec"><i class="bi bi-grid-3x3-gap" aria-hidden="true"></i> Multi</span>
                            </div>
                        </div>
                    </article>

                    <article class="product-card" data-aos="fade-up" data-aos-delay="60">
                        <div class="product-media">
                            <a class="glightbox product-media__link" href="{{ url('assets/img/menu/box1.jpg')}}"
                                data-glightbox="title: 6×3 Co-Box; description: Virgin HIPS · generous internal space · heat resistant"
                                aria-label="View a larger image of the 6×3 Co-Box">
                                <img src="{{ url('assets/img/menu/box1.jpg')}}"
                                    alt="6×3 INCO Co-Box with generous internal wiring space"
                                    width="1200" height="1600" loading="lazy" decoding="async">
                                <span class="product-media__zoom" aria-hidden="true"><i class="bi bi-arrows-fullscreen"></i></span>
                            </a>
                        </div>
                        <div class="product-body">
                            <p class="product-kicker">6×3 · Virgin HIPS · Long format</p>
                            <h3>6×3 Co-Boxes</h3>
                            <p class="product-desc">Long-format routing for multi-gang points, with generous internal space and a rigid, twist-resistant body.</p>
                            <div class="product-foot">
                                <a class="product-link glightbox" href="{{ url('assets/img/menu/box1.jpg')}}"
                                    data-glightbox="title: 6×3 Co-Box; description: Virgin HIPS · generous internal space · heat resistant">
                                    View details <i class="bi bi-arrow-up-right" aria-hidden="true"></i>
                                </a>
                                <span class="product-spec"><i class="bi bi-aspect-ratio" aria-hidden="true"></i> 6×3</span>
                            </div>
                        </div>
                    </article>

                    <article class="product-card" data-aos="fade-up" data-aos-delay="120">
                        <div class="product-media">
                            <span class="product-badge">Large format</span>
                            <a class="glightbox product-media__link" href="{{ url('assets/img/menu/box1.jpg')}}"
                                data-glightbox="title: 7×3 Co-Box; description: Virgin HIPS · maximum wiring room · heat resistant"
                                aria-label="View a larger image of the 7×3 Co-Box">
                                <img src="{{ url('assets/img/menu/box1.jpg')}}"
                                    alt="7×3 INCO Co-Box for complex wiring runs and large enclosures"
                                    width="1200" height="1600" loading="lazy" decoding="async">
                                <span class="product-media__zoom" aria-hidden="true"><i class="bi bi-arrows-fullscreen"></i></span>
                            </a>
                        </div>
                        <div class="product-body">
                            <p class="product-kicker">7×3 · Virgin HIPS · Large format</p>
                            <h3>7×3 Co-Boxes</h3>
                            <p class="product-desc">Maximum room for complex wiring runs, built with the same heat resistance and structural strength as the rest of the range.</p>
                            <div class="product-foot">
                                <a class="product-link glightbox" href="{{ url('assets/img/menu/box1.jpg')}}"
                                    data-glightbox="title: 7×3 Co-Box; description: Virgin HIPS · maximum wiring room · heat resistant">
                                    View details <i class="bi bi-arrow-up-right" aria-hidden="true"></i>
                                </a>
                                <span class="product-spec"><i class="bi bi-aspect-ratio" aria-hidden="true"></i> 7×3</span>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- ======= Contact ======= -->
        <section id="contact" class="section contact" aria-labelledby="contact-title">
            <div class="container">
                <div class="section-head section-head--center" data-aos="fade-up">
                    <p class="eyebrow">Contact</p>
                    <h2 id="contact-title" class="section-title">
                        Let's talk about <em>your next build.</em>
                    </h2>
                    <p class="lead" style="max-width: 620px; margin: 18px auto 0;">
                        Whether you are a distributor, contractor or project consultant, our team can help
                        with specifications, samples and pricing.
                    </p>
                </div>

                <div class="contact-layout">
                    <div class="contact-info" data-aos="fade-right">
                        <div class="contact-cards">
                            <article class="contact-card">
                                <span class="contact-card__icon"><i class="bi bi-geo-alt" aria-hidden="true"></i></span>
                                <div>
                                    <h3>Visit the manufacturing unit</h3>
                                    <address>Plot No. 20, SIDCO Industrial Park,<br>Muchukunnu, Koyilandy,<br>Kerala – 673307</address>
                                    <a class="text-link"
                                        href="https://www.google.com/maps/search/?api=1&amp;query=Indu+Components+INCO+Koyilandy+Kerala"
                                        target="_blank" rel="noopener">
                                        Get directions
                                        <i class="bi bi-arrow-up-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </article>

                            <article class="contact-card">
                                <span class="contact-card__icon"><i class="bi bi-telephone" aria-hidden="true"></i></span>
                                <div>
                                    <h3>Call our team</h3>
                                    <div class="phone-list">
                                        <a href="tel:+914962690033">0496 269 0033</a>
                                        <a href="tel:+919207193005">92071 93005</a>
                                        <a href="tel:+919656193005">96561 93005</a>
                                    </div>
                                </div>
                            </article>

                            <article class="contact-card">
                                <span class="contact-card__icon"><i class="bi bi-envelope" aria-hidden="true"></i></span>
                                <div>
                                    <h3>Email our team</h3>
                                    <a href="mailto:inducomponentsinco@gmail.com">inducomponentsinco@gmail.com</a>
                                    <p style="margin-top: 4px; color: var(--muted); font-size: 0.76rem;">
                                        For dealer, project and product enquiries.
                                    </p>
                                </div>
                            </article>
                        </div>

                        <div class="map-card">
                            <div class="map-card__bar">
                                <span class="map-card__place">SIDCO Industrial Park, Koyilandy</span>
                                <a href="https://www.google.com/maps/search/?api=1&amp;query=Indu+Components+INCO+Koyilandy+Kerala"
                                    target="_blank" rel="noopener">
                                    Open in Maps
                                    <i class="bi bi-arrow-up-right" aria-hidden="true"></i>
                                </a>
                            </div>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3334.551212861374!2d75.66159699678953!3d11.492550100000027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba6890068724bd9%3A0x49eeb0927a20df25!2sIndu%20Components%20(INCO)!5e1!3m2!1sen!2sin!4v1742554305441!5m2!1sen!2sin"
                                title="Indu Components (INCO) manufacturing unit on Google Maps"
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
                        </div>
                    </div>

                    <div class="contact-form-card" data-aos="fade-left">
                        <div class="contact-form__head">
                            <p class="eyebrow">Request a quote</p>
                            <h3>Tell us what you need.</h3>
                            <p>Share your format, quantity and location. Our team will respond with availability and pricing.</p>
                        </div>

                        <form id="contactForm" class="contact-form"
                            action="{{ route('contact.send') }}" method="post" novalidate>
                            @csrf
                            <div class="hp-field" aria-hidden="true">
                                <label for="website">Website</label>
                                <input id="website" name="website" type="text" tabindex="-1" autocomplete="off">
                            </div>
                            <div class="form-grid">
                                <div class="field">
                                    <label for="name">Name <span aria-hidden="true">*</span></label>
                                    <input id="name" name="name" type="text" autocomplete="name"
                                        placeholder="Your full name" required aria-describedby="nameError">
                                    <p class="field-error" id="nameError" aria-live="polite"></p>
                                </div>

                                <div class="field">
                                    <label for="phone">Phone <span aria-hidden="true">*</span></label>
                                    <input id="phone" name="phone" type="tel" inputmode="tel" autocomplete="tel"
                                        placeholder="+91 90000 00000" required aria-describedby="phoneError">
                                    <p class="field-error" id="phoneError" aria-live="polite"></p>
                                </div>

                                <div class="field field--full">
                                    <label for="email">Email <span aria-hidden="true">*</span></label>
                                    <input id="email" name="email" type="email" autocomplete="email"
                                        placeholder="you@company.com" required aria-describedby="emailError">
                                    <p class="field-error" id="emailError" aria-live="polite"></p>
                                </div>

                                <div class="field field--full">
                                    <label for="product">Product interest</label>
                                    <select id="product" name="product">
                                        <option value="">Select a Co-Box format</option>
                                        <option>3×3 Inco Ultra</option>
                                        <option>3×3 Inco Deluxe</option>
                                        <option>4×4 Camera Boxes</option>
                                        <option>4×4 Multi-purpose Co-Box</option>
                                        <option>6×3 Co-Boxes</option>
                                        <option>7×3 Co-Boxes</option>
                                        <option>Other / custom requirement</option>
                                    </select>
                                </div>

                                <div class="field field--full">
                                    <label for="message">Your requirement <span aria-hidden="true">*</span></label>
                                    <textarea id="message" name="message" rows="4" required
                                        placeholder="Format, quantity, project location — anything that helps us quote accurately."
                                        aria-describedby="messageError"></textarea>
                                    <p class="field-error" id="messageError" aria-live="polite"></p>
                                </div>
                            </div>

                            <div class="captcha" id="captchaWrap">
                                <label class="captcha__control" for="captcha">
                                    <input id="captcha" name="captcha" type="checkbox" required
                                        aria-describedby="captchaError">
                                    <span class="captcha__box" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" focusable="false">
                                            <path d="M4.6 12.6l4.7 4.8L19.4 6.5" fill="none" stroke="currentColor"
                                                stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="captcha__text">I'm not a robot</span>
                                    <span class="captcha__brand" aria-hidden="true">
                                        <svg viewBox="0 0 48 48" focusable="false">
                                            <path d="M8.96 18.53 A16 16 0 0 1 39.04 18.53" fill="none"
                                                stroke="#1c6ef2" stroke-width="5" />
                                            <path d="M34.34 20.24 L41.43 25.11 L43.74 16.82 Z" fill="#1c6ef2" />
                                            <path d="M39.04 29.47 A16 16 0 0 1 8.96 29.47" fill="none"
                                                stroke="#9aa0a6" stroke-width="5" />
                                            <path d="M13.66 27.76 L6.57 22.89 L4.26 31.18 Z" fill="#9aa0a6" />
                                        </svg>
                                        <span>reCAPTCHA</span>
                                    </span>
                                </label>
                                <p class="field-error" id="captchaError" aria-live="polite"></p>
                            </div>

                            <button type="submit" class="btn btn-primary contact-form__submit">
                                Send enquiry
                                <i class="bi bi-send" aria-hidden="true"></i>
                            </button>

                            <p class="form-alert" id="formAlert" role="alert" hidden></p>

                            <p class="form-note">
                                <i class="bi bi-shield-lock" aria-hidden="true"></i>
                                Your details are used only to respond to this enquiry.
                            </p>
                        </form>

                        <div class="form-success" id="formSuccess" role="status" aria-live="polite" hidden>
                            <span class="form-success__icon"><i class="bi bi-check2" aria-hidden="true"></i></span>
                            <h3>Thank you — your enquiry is on its way.</h3>
                            <p>
                                We've received your details and will get back to you within one business day.
                                For anything urgent, email us at
                                <a href="mailto:inducomponentsinco@gmail.com">inducomponentsinco@gmail.com</a>
                                or call <a href="tel:+919207193005">92071 93005</a>.
                            </p>
                            <button type="button" class="btn btn-secondary" id="formReset">
                                Send another enquiry
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- ======= Footer ======= -->
    <footer class="site-footer" aria-labelledby="footer-title">
        <span class="footer-accent" aria-hidden="true"></span>
        <div class="container">
            <h2 id="footer-title" class="sr-only">Indu Components footer</h2>

            <div class="footer-main">
                <div class="footer-brand">
                    <a href="#home" class="brand" aria-label="INCO Electric — Indu Components, home">
                        <img src="{{ url('assets/img/inco-logo-light.svg') }}"
                            alt="" width="309" height="75" loading="lazy" decoding="async">
                    </a>
                    <p>
                        Precision-moulded Co-Boxes from 100% virgin HIPS. First to market, engineered in
                        Kerala and built for the realities of the job site.
                    </p>
                    <span class="footer-badge">
                        <i class="bi bi-geo-alt" aria-hidden="true"></i>
                        Made in Kerala, India
                    </span>
                </div>

                <nav class="footer-col" aria-label="Footer quick links">
                    <h3>Explore</h3>
                    <div class="footer-links">
                        <a href="#home">Home</a>
                        <a href="#about">About INCO</a>
                        <a href="#why-us">Why Inco</a>
                        <a href="#products">Products</a>
                        <a href="#contact">Contact</a>
                    </div>
                </nav>

                <nav class="footer-col" aria-label="Footer product links">
                    <h3>Products</h3>
                    <div class="footer-links">
                        <a href="#products">3×3 Inco Ultra</a>
                        <a href="#products">3×3 Inco Deluxe</a>
                        <a href="#products">4×4 Camera Boxes</a>
                        <a href="#products">4×4 Multi-purpose</a>
                        <a href="#products">6×3 Co-Boxes</a>
                        <a href="#products">7×3 Co-Boxes</a>
                    </div>
                </nav>

                <div class="footer-col">
                    <h3>Contact</h3>
                    <div class="footer-contact">
                        <div class="footer-contact__item">
                            <i class="bi bi-geo-alt" aria-hidden="true"></i>
                            <address>Plot No. 20, SIDCO Industrial Park,<br>Muchukunnu, Koyilandy,<br>Kerala – 673307</address>
                        </div>
                        <div class="footer-contact__item">
                            <i class="bi bi-telephone" aria-hidden="true"></i>
                            <p>
                                <a href="tel:+914962690033">0496 269 0033</a><br>
                                <a href="tel:+919207193005">92071 93005</a><br>
                                <a href="tel:+919656193005">96561 93005</a>
                            </p>
                        </div>
                        <div class="footer-contact__item">
                            <i class="bi bi-envelope" aria-hidden="true"></i>
                            <p><a href="mailto:inducomponentsinco@gmail.com">inducomponentsinco@gmail.com</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="footer-copy">
                    <p>
                        &copy; {{ date('Y') }} <strong>Indu Components (INCO)</strong>. All rights reserved.
                    </p>
                    <p class="footer-developer">Developed by <span>Osmium Infotech</span></p>
                </div>
                <p class="footer-credit">
                    Designed with care in Kerala <span aria-hidden="true">·</span> Built to endure.
                </p>
                <ul class="footer-legal">
                    <li><a href="{{ url('privacy-policy') }}">Privacy</a></li>
                    <li><a href="{{ url('terms&conditions') }}">Terms</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <button type="button" class="to-top" id="toTop" aria-label="Back to top">
        <svg viewBox="0 0 52 52" aria-hidden="true" focusable="false">
            <circle class="to-top__track" cx="26" cy="26" r="23"></circle>
            <circle class="to-top__progress" id="scrollProgress" cx="26" cy="26" r="23"></circle>
        </svg>
        <i class="bi bi-arrow-up" aria-hidden="true"></i>
    </button>

    <a class="whatsapp-float" href="https://wa.me/919207193005?text=Hello%20INCO%2C%20I%27d%20like%20to%20enquire%20about%20Co-Boxes."
        target="_blank" rel="noopener noreferrer" aria-label="Chat with INCO on WhatsApp">
        <i class="bi bi-whatsapp" aria-hidden="true"></i>
        <span class="whatsapp-float__label" aria-hidden="true">Chat on WhatsApp</span>
    </a>

    <!-- Existing vendor scripts -->
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>

    <script>
        (function () {
            "use strict";

            var reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

            /* ---------------------------------------------------------
               Scroll reveals
               --------------------------------------------------------- */
            if (window.AOS) {
                window.AOS.init({
                    duration: 700,
                    easing: "ease-out-cubic",
                    once: true,
                    offset: 70,
                    delay: 0,
                    disable: reduceMotion
                });
            } else {
                document.documentElement.classList.add("no-aos");
            }

            /* ---------------------------------------------------------
               Product lightbox
               --------------------------------------------------------- */
            if (window.GLightbox) {
                window.GLightbox({
                    selector: ".glightbox",
                    touchNavigation: true,
                    loop: false,
                    zoomable: true,
                    draggable: true,
                    openEffect: "fade",
                    closeEffect: "fade",
                    slideEffect: "slide"
                });
            }

            /* ---------------------------------------------------------
               Preloader
               --------------------------------------------------------- */
            var preloader = document.getElementById("inco-preloader");
            var preloaderStart = performance.now();
            var preloaderHidden = false;

            function hidePreloader(force) {
                if (!preloader || preloaderHidden) return;
                preloaderHidden = true;
                var wait = force ? 0 : Math.max(0, 420 - (performance.now() - preloaderStart));
                window.setTimeout(function () {
                    preloader.classList.add("is-done");
                    window.setTimeout(function () {
                        if (preloader.parentNode) preloader.parentNode.removeChild(preloader);
                    }, 650);
                }, wait);
            }

            window.addEventListener("load", function () { hidePreloader(false); });
            window.setTimeout(function () { hidePreloader(true); }, 2600);
            if (document.readyState === "complete") hidePreloader(false);

            /* ---------------------------------------------------------
               Header state, reading progress and back-to-top
               --------------------------------------------------------- */
            var header = document.getElementById("siteHeader");
            var toTop = document.getElementById("toTop");
            var progressRing = document.getElementById("scrollProgress");
            var ringLength = 2 * Math.PI * 23;
            var scrollQueued = false;

            if (progressRing) {
                progressRing.style.strokeDasharray = String(ringLength);
                progressRing.style.strokeDashoffset = String(ringLength);
            }

            function updateScrollUI() {
                var y = window.scrollY || window.pageYOffset || 0;

                if (header) {
                    header.classList.toggle("is-scrolled", y > 16);
                }

                if (toTop) {
                    toTop.classList.toggle("is-visible", y > 480);
                }

                if (progressRing) {
                    var docHeight = document.documentElement.scrollHeight - window.innerHeight;
                    var ratio = docHeight > 0 ? Math.min(Math.max(y / docHeight, 0), 1) : 0;
                    progressRing.style.strokeDashoffset = String(ringLength * (1 - ratio));
                }

                scrollQueued = false;
            }

            function queueScrollUpdate() {
                if (scrollQueued) return;
                scrollQueued = true;
                window.requestAnimationFrame(updateScrollUI);
            }

            window.addEventListener("scroll", queueScrollUpdate, { passive: true });
            window.addEventListener("resize", queueScrollUpdate);
            updateScrollUI();

            if (toTop) {
                toTop.addEventListener("click", function () {
                    window.scrollTo({
                        top: 0,
                        behavior: reduceMotion ? "auto" : "smooth"
                    });
                });
            }

            /* ---------------------------------------------------------
               Mobile drawer
               --------------------------------------------------------- */
            var navToggle = document.getElementById("navToggle");
            var mobileNav = document.getElementById("mobileNav");
            var navClose = document.getElementById("navClose");
            var navBackdrop = document.getElementById("navBackdrop");
            var lastFocused = null;

            function isNavOpen() {
                return !!(mobileNav && mobileNav.classList.contains("is-open"));
            }

            function openNav() {
                if (!mobileNav || !navToggle || !navBackdrop) return;
                lastFocused = document.activeElement;

                navToggle.setAttribute("aria-expanded", "true");
                navToggle.setAttribute("aria-label", "Close menu");
                mobileNav.classList.add("is-open");
                mobileNav.setAttribute("aria-hidden", "false");
                mobileNav.inert = false;
                navBackdrop.classList.add("is-open");
                navBackdrop.removeAttribute("aria-hidden");
                document.body.classList.add("nav-open");

                window.setTimeout(function () {
                    if (navClose) navClose.focus();
                }, 90);
            }

            function closeNav() {
                if (!mobileNav || !navToggle || !navBackdrop || !isNavOpen()) return;

                mobileNav.classList.remove("is-open");
                mobileNav.setAttribute("aria-hidden", "true");
                mobileNav.inert = true;
                navBackdrop.classList.remove("is-open");
                navBackdrop.setAttribute("aria-hidden", "true");
                navToggle.setAttribute("aria-expanded", "false");
                navToggle.setAttribute("aria-label", "Open menu");
                document.body.classList.remove("nav-open");

                if (lastFocused && typeof lastFocused.focus === "function") {
                    lastFocused.focus({ preventScroll: true });
                }
            }

            if (mobileNav) mobileNav.inert = true;

            if (navToggle) {
                navToggle.addEventListener("click", openNav);
            }
            if (navClose) {
                navClose.addEventListener("click", closeNav);
            }
            if (navBackdrop) {
                navBackdrop.addEventListener("click", closeNav);
            }
            if (mobileNav) {
                mobileNav.querySelectorAll('a[href^="#"]').forEach(function (link) {
                    link.addEventListener("click", closeNav);
                });
            }

            document.addEventListener("keydown", function (event) {
                if (!isNavOpen()) return;

                if (event.key === "Escape") {
                    event.preventDefault();
                    closeNav();
                    return;
                }

                if (event.key !== "Tab" || !mobileNav) return;

                var focusable = mobileNav.querySelectorAll(
                    'a[href], button:not([disabled]), input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])'
                );

                if (!focusable.length) return;

                var first = focusable[0];
                var last = focusable[focusable.length - 1];

                if (event.shiftKey && document.activeElement === first) {
                    event.preventDefault();
                    last.focus();
                } else if (!event.shiftKey && document.activeElement === last) {
                    event.preventDefault();
                    first.focus();
                }
            });

            var desktopQuery = window.matchMedia("(min-width: 1021px)");
            function handleDesktopChange(event) {
                if (event.matches) closeNav();
            }
            if (desktopQuery.addEventListener) {
                desktopQuery.addEventListener("change", handleDesktopChange);
            } else if (desktopQuery.addListener) {
                desktopQuery.addListener(handleDesktopChange);
            }

            /* ---------------------------------------------------------
               Anchor navigation — align section content under header
               --------------------------------------------------------- */
            var anchorSections = ["home", "about", "why-us", "products", "contact"];

            document.addEventListener("click", function (event) {
                if (event.defaultPrevented || event.button !== 0 || event.metaKey ||
                    event.ctrlKey || event.shiftKey || event.altKey) {
                    return;
                }

                var link = event.target.closest ? event.target.closest('a[href^="#"]') : null;
                if (!link) return;

                var hash = link.getAttribute("href");
                if (!hash || hash.length < 2) return;

                var id = hash.slice(1);
                if (anchorSections.indexOf(id) === -1) return;

                var section = document.getElementById(id);
                if (!section) return;

                var target = section.querySelector(".about-content, .why-panel, .section-head") || section;
                var header = document.getElementById("siteHeader");
                var headerH = header ? header.offsetHeight : 0;

                if (header && !header.classList.contains("is-scrolled")) {
                    var padTop = parseFloat(window.getComputedStyle(header).paddingTop) || 8;
                    headerH -= Math.max(0, (padTop - 8) * 2);
                }

                var top = Math.max(0, target.getBoundingClientRect().top + window.pageYOffset - (headerH + 10));

                event.preventDefault();

                window.scrollTo({
                    top: top,
                    behavior: reduceMotion ? "auto" : "smooth"
                });

                if (history.pushState) {
                    if (window.location.hash !== hash) {
                        history.pushState(null, "", hash);
                    }
                } else {
                    window.location.hash = hash;
                }
            });

            /* ---------------------------------------------------------
               Active navigation state
               --------------------------------------------------------- */
            var navLinks = Array.prototype.slice.call(document.querySelectorAll(".nav-link"));
            var pageSections = ["home", "about", "why-us", "products", "contact"]
                .map(function (id) { return document.getElementById(id); })
                .filter(Boolean);

            function setActiveNav(id) {
                navLinks.forEach(function (link) {
                    var isActive = link.getAttribute("href") === "#" + id;
                    link.classList.toggle("is-active", isActive);
                    if (isActive) {
                        link.setAttribute("aria-current", "true");
                    } else {
                        link.removeAttribute("aria-current");
                    }
                });
            }

            if ("IntersectionObserver" in window && pageSections.length) {
                var navObserver = new IntersectionObserver(function (entries) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) setActiveNav(entry.target.id);
                    });
                }, {
                    rootMargin: "-35% 0px -55% 0px",
                    threshold: 0
                });

                pageSections.forEach(function (section) {
                    navObserver.observe(section);
                });
            }

            /* ---------------------------------------------------------
               Animated statistics
               --------------------------------------------------------- */
            var counters = Array.prototype.slice.call(document.querySelectorAll("[data-counter]"));

            function animateCounter(element) {
                var target = parseInt(element.getAttribute("data-counter"), 10) || 0;
                var duration = 1300;
                var startTime = null;

                function tick(now) {
                    if (startTime === null) startTime = now;
                    var progress = Math.min((now - startTime) / duration, 1);
                    var eased = 1 - Math.pow(1 - progress, 3);
                    element.textContent = String(Math.round(target * eased));

                    if (progress < 1) {
                        window.requestAnimationFrame(tick);
                    } else {
                        element.textContent = String(target);
                    }
                }

                window.requestAnimationFrame(tick);
            }

            if (counters.length) {
                if (reduceMotion || !("IntersectionObserver" in window)) {
                    counters.forEach(function (element) {
                        element.textContent = element.getAttribute("data-counter");
                    });
                } else {
                    counters.forEach(function (element) { element.textContent = "0"; });

                    var counterObserver = new IntersectionObserver(function (entries) {
                        entries.forEach(function (entry) {
                            if (entry.isIntersecting) {
                                animateCounter(entry.target);
                                counterObserver.unobserve(entry.target);
                            }
                        });
                    }, { threshold: 0.6 });

                    counters.forEach(function (element) {
                        counterObserver.observe(element);
                    });
                }
            }

            /* ---------------------------------------------------------
               Contact form: inline validation + send to server
               --------------------------------------------------------- */
            var contactForm = document.getElementById("contactForm");
            var formSuccess = document.getElementById("formSuccess");
            var formReset = document.getElementById("formReset");
            var formAlert = document.getElementById("formAlert");
            var submitButton = contactForm ? contactForm.querySelector('button[type="submit"]') : null;
            var submitButtonHtml = submitButton ? submitButton.innerHTML : "";

            if (contactForm && formSuccess) {
                var requiredFields = Array.prototype.slice.call(contactForm.querySelectorAll(".field [required]"));
                var messages = {
                    name: "Please enter your name.",
                    phone: "Enter a valid phone number with at least 8 digits.",
                    email: "Enter a valid email address.",
                    message: "Tell us a little more — at least 10 characters."
                };

                var validators = {
                    name: function (value) { return value.trim().length >= 2; },
                    phone: function (value) { return /^[+()0-9][0-9\s().+-]{7,}$/.test(value.trim()); },
                    email: function (value) { return /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(value.trim()); },
                    message: function (value) { return value.trim().length >= 10; }
                };

                var captcha = document.getElementById("captcha");
                var captchaWrap = document.getElementById("captchaWrap");
                var captchaError = document.getElementById("captchaError");

                function validateCaptcha() {
                    if (!captcha) return true;
                    var valid = captcha.checked;
                    captcha.setAttribute("aria-invalid", valid ? "false" : "true");
                    if (captchaWrap) captchaWrap.classList.toggle("is-invalid", !valid);
                    if (captchaError) {
                        captchaError.textContent = valid ? "" : "Please confirm you're not a robot.";
                    }
                    return valid;
                }

                if (captcha) {
                    captcha.addEventListener("change", function () {
                        if (captcha.getAttribute("aria-invalid") === "true") validateCaptcha();
                    });
                }

                function showFormAlert(message) {
                    if (!formAlert) return;
                    formAlert.textContent = message || "";
                    formAlert.hidden = !message;
                }

                function setSending(sending) {
                    if (submitButton) {
                        submitButton.disabled = sending;
                        submitButton.innerHTML = sending ? "Sending…" : submitButtonHtml;
                    }
                    contactForm.setAttribute("aria-busy", sending ? "true" : "false");
                }

                function setFieldState(field, valid) {
                    var wrap = field.closest(".field");
                    var error = wrap ? wrap.querySelector(".field-error") : null;
                    field.setAttribute("aria-invalid", valid ? "false" : "true");
                    if (wrap) wrap.classList.toggle("is-invalid", !valid);
                    if (error) {
                        error.textContent = valid ? "" : (messages[field.name] || "Please check this field.");
                    }
                }

                function validateField(field) {
                    var validator = validators[field.name];
                    var valid = validator ? validator(field.value) : field.checkValidity();
                    setFieldState(field, valid);
                    return valid;
                }

                requiredFields.forEach(function (field) {
                    field.addEventListener("blur", function () { validateField(field); });
                    field.addEventListener("input", function () {
                        if (field.getAttribute("aria-invalid") === "true") validateField(field);
                    });
                });

                contactForm.addEventListener("submit", function (event) {
                    event.preventDefault();

                    var firstInvalid = null;
                    requiredFields.forEach(function (field) {
                        if (!validateField(field) && !firstInvalid) firstInvalid = field;
                    });

                    var captchaValid = validateCaptcha();

                    showFormAlert("");

                    if (firstInvalid) {
                        firstInvalid.focus();
                        return;
                    }

                    if (!captchaValid) {
                        if (captcha) captcha.focus();
                        return;
                    }

                    setSending(true);

                    fetch(contactForm.action, {
                        method: "POST",
                        body: new FormData(contactForm),
                        credentials: "same-origin",
                        headers: {
                            "Accept": "application/json",
                            "X-Requested-With": "XMLHttpRequest"
                        }
                    })
                        .then(function (response) {
                            return response.json()
                                .catch(function () { return {}; })
                                .then(function (payload) {
                                    return { ok: response.ok, status: response.status, payload: payload };
                                });
                        })
                        .then(function (result) {
                            if (!result.ok) {
                                var message = result.payload && result.payload.message;

                                if (result.status === 422 && result.payload && result.payload.errors) {
                                    message = result.payload.errors.captcha
                                        ? result.payload.errors.captcha[0]
                                        : "Please check the highlighted fields and try again.";
                                } else if (result.status === 419) {
                                    message = "Your session has expired. Please refresh the page and try again.";
                                }

                                throw new Error(message || "We could not send your enquiry. Please try again.");
                            }

                            contactForm.hidden = true;
                            formSuccess.hidden = false;
                            var successTitle = formSuccess.querySelector("h3");
                            if (successTitle) {
                                successTitle.setAttribute("tabindex", "-1");
                                successTitle.focus({ preventScroll: true });
                            }
                        })
                        .catch(function (error) {
                            showFormAlert(error && error.message
                                ? error.message
                                : "We could not send your enquiry. Please check your connection and try again.");
                        })
                        .finally(function () {
                            setSending(false);
                        });
                });

                if (formReset) {
                    formReset.addEventListener("click", function () {
                        contactForm.reset();
                        showFormAlert("");
                        requiredFields.forEach(function (field) {
                            field.setAttribute("aria-invalid", "false");
                            var wrap = field.closest(".field");
                            if (wrap) wrap.classList.remove("is-invalid");
                            var error = wrap ? wrap.querySelector(".field-error") : null;
                            if (error) error.textContent = "";
                        });
                        formSuccess.hidden = true;
                        contactForm.hidden = false;
                        if (captcha) {
                            captcha.checked = false;
                            captcha.setAttribute("aria-invalid", "false");
                        }
                        if (captchaWrap) captchaWrap.classList.remove("is-invalid");
                        if (captchaError) captchaError.textContent = "";
                        var firstInput = contactForm.querySelector("input");
                        if (firstInput) firstInput.focus();
                    });
                }
            }
        })();
    </script>
</body>

</html>
