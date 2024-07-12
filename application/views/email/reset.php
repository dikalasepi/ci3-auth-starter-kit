<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Reset Password'; ?></title>
    <link rel="shortcut icon" href="#">
    <!-- Template CSS based on Bootstrap -->
    <style>
        [data-bs-theme=light] {
            --tblr-blue: #206bc4;
            --tblr-indigo: #4263eb;
            --tblr-purple: #ae3ec9;
            --tblr-pink: #d6336c;
            --tblr-red: #d63939;
            --tblr-orange: #f76707;
            --tblr-yellow: #f59f00;
            --tblr-green: #2fb344;
            --tblr-teal: #0ca678;
            --tblr-cyan: #17a2b8;
            --tblr-black: #000000;
            --tblr-white: #ffffff;
            --tblr-gray: #667382;
            --tblr-gray-dark: #182433;
            --tblr-gray-100: #f6f8fb;
            --tblr-gray-200: #eef1f4;
            --tblr-gray-300: #dadfe5;
            --tblr-gray-400: #bbc3cd;
            --tblr-gray-500: #929dab;
            --tblr-gray-600: #667382;
            --tblr-gray-700: #3a4859;
            --tblr-gray-800: #182433;
            --tblr-gray-900: #040a11;
            --tblr-primary: #206bc4;
            --tblr-secondary: #667382;
            --tblr-success: #2fb344;
            --tblr-info: #4299e1;
            --tblr-warning: #f76707;
            --tblr-danger: #d63939;
            --tblr-light: #fcfdfe;
            --tblr-dark: #182433;
            --tblr-muted: #667382;
            --tblr-blue: #206bc4;
            --tblr-azure: #4299e1;
            --tblr-indigo: #4263eb;
            --tblr-purple: #ae3ec9;
            --tblr-pink: #d6336c;
            --tblr-red: #d63939;
            --tblr-orange: #f76707;
            --tblr-yellow: #f59f00;
            --tblr-lime: #74b816;
            --tblr-green: #2fb344;
            --tblr-teal: #0ca678;
            --tblr-cyan: #17a2b8;
            --tblr-facebook: #1877f2;
            --tblr-twitter: #1da1f2;
            --tblr-linkedin: #0a66c2;
            --tblr-google: #dc4e41;
            --tblr-youtube: #ff0000;
            --tblr-vimeo: #1ab7ea;
            --tblr-dribbble: #ea4c89;
            --tblr-github: #181717;
            --tblr-instagram: #e4405f;
            --tblr-pinterest: #bd081c;
            --tblr-vk: #6383a8;
            --tblr-rss: #ffa500;
            --tblr-flickr: #0063dc;
            --tblr-bitbucket: #0052cc;
            --tblr-tabler: #206bc4;
            --tblr-primary-rgb: 32, 107, 196;
            --tblr-secondary-rgb: 102, 115, 130;
            --tblr-success-rgb: 47, 179, 68;
            --tblr-info-rgb: 66, 153, 225;
            --tblr-warning-rgb: 247, 103, 7;
            --tblr-danger-rgb: 214, 57, 57;
            --tblr-light-rgb: 252, 253, 254;
            --tblr-dark-rgb: 24, 36, 51;
            --tblr-muted-rgb: 102, 115, 130;
            --tblr-blue-rgb: 32, 107, 196;
            --tblr-azure-rgb: 66, 153, 225;
            --tblr-indigo-rgb: 66, 99, 235;
            --tblr-purple-rgb: 174, 62, 201;
            --tblr-pink-rgb: 214, 51, 108;
            --tblr-red-rgb: 214, 57, 57;
            --tblr-orange-rgb: 247, 103, 7;
            --tblr-yellow-rgb: 245, 159, 0;
            --tblr-lime-rgb: 116, 184, 22;
            --tblr-green-rgb: 47, 179, 68;
            --tblr-teal-rgb: 12, 166, 120;
            --tblr-cyan-rgb: 23, 162, 184;
            --tblr-facebook-rgb: 24, 119, 242;
            --tblr-twitter-rgb: 29, 161, 242;
            --tblr-linkedin-rgb: 10, 102, 194;
            --tblr-google-rgb: 220, 78, 65;
            --tblr-youtube-rgb: 255, 0, 0;
            --tblr-vimeo-rgb: 26, 183, 234;
            --tblr-dribbble-rgb: 234, 76, 137;
            --tblr-github-rgb: 24, 23, 23;
            --tblr-instagram-rgb: 228, 64, 95;
            --tblr-pinterest-rgb: 189, 8, 28;
            --tblr-vk-rgb: 99, 131, 168;
            --tblr-rss-rgb: 255, 165, 0;
            --tblr-flickr-rgb: 0, 99, 220;
            --tblr-bitbucket-rgb: 0, 82, 204;
            --tblr-tabler-rgb: 32, 107, 196;
            --tblr-primary-text-emphasis: #0d2b4e;
            --tblr-secondary-text-emphasis: #292e34;
            --tblr-success-text-emphasis: #13481b;
            --tblr-info-text-emphasis: #1a3d5a;
            --tblr-warning-text-emphasis: #632903;
            --tblr-danger-text-emphasis: #561717;
            --tblr-light-text-emphasis: #3a4859;
            --tblr-dark-text-emphasis: #3a4859;
            --tblr-primary-bg-subtle: #d2e1f3;
            --tblr-secondary-bg-subtle: #e0e3e6;
            --tblr-success-bg-subtle: #d5f0da;
            --tblr-info-bg-subtle: #d9ebf9;
            --tblr-warning-bg-subtle: #fde1cd;
            --tblr-danger-bg-subtle: #f7d7d7;
            --tblr-light-bg-subtle: #fbfcfd;
            --tblr-dark-bg-subtle: #bbc3cd;
            --tblr-primary-border-subtle: #a6c4e7;
            --tblr-secondary-border-subtle: #c2c7cd;
            --tblr-success-border-subtle: #ace1b4;
            --tblr-info-border-subtle: #b3d6f3;
            --tblr-warning-border-subtle: #fcc29c;
            --tblr-danger-border-subtle: #efb0b0;
            --tblr-light-border-subtle: #eef1f4;
            --tblr-dark-border-subtle: #929dab;
            --tblr-white-rgb: 255, 255, 255;
            --tblr-black-rgb: 0, 0, 0;
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
            --tblr-font-monospace: Menlo, Monaco, Consolas, Liberation Mono, Courier New, monospace;
            --tblr-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
            --tblr-body-font-family: var(--tblr-font-sans-serif);
            --tblr-body-font-size: 0.875rem;
            --tblr-body-font-weight: 400;
            --tblr-body-line-height: 1.4285714286;
            --tblr-body-color: #182433;
            --tblr-body-color-rgb: 24, 36, 51;
            --tblr-body-bg: #f6f8fb;
            --tblr-body-bg-rgb: 246, 248, 251;
            --tblr-emphasis-color: #182433;
            --tblr-emphasis-color-rgb: 24, 36, 51;
            --tblr-secondary-color: rgba(24, 36, 51, 0.75);
            --tblr-secondary-color-rgb: 24, 36, 51;
            --tblr-secondary-bg: #eef1f4;
            --tblr-secondary-bg-rgb: 238, 241, 244;
            --tblr-tertiary-color: rgba(24, 36, 51, 0.5);
            --tblr-tertiary-color-rgb: 24, 36, 51;
            --tblr-tertiary-bg: #f6f8fb;
            --tblr-tertiary-bg-rgb: 246, 248, 251;
            --tblr-link-color: #206bc4;
            --tblr-link-color-rgb: 32, 107, 196;
            --tblr-link-decoration: none;
            --tblr-link-hover-color: #1a569d;
            --tblr-link-hover-color-rgb: 26, 86, 157;
            --tblr-link-hover-decoration: underline;
            --tblr-code-color: var(--tblr-gray-600);
            --tblr-highlight-bg: #fdeccc;
            --tblr-border-width: 1px;
            --tblr-border-style: solid;
            --tblr-border-color: #dadfe5;
            --tblr-border-color-translucent: rgba(4, 32, 69, 0.14);
            --tblr-border-radius: 4px;
            --tblr-border-radius-sm: 2px;
            --tblr-border-radius-lg: 8px;
            --tblr-border-radius-xl: 1rem;
            --tblr-border-radius-xxl: 2rem;
            --tblr-border-radius-2xl: var(--tblr-border-radius-xxl);
            --tblr-border-radius-pill: 100rem;
            --tblr-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            --tblr-box-shadow-sm: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            --tblr-box-shadow-lg: 0 1rem 3rem rgba(0, 0, 0, 0.175);
            --tblr-box-shadow-inset: 0 0 transparent;
            --tblr-focus-ring-width: 0.25rem;
            --tblr-focus-ring-opacity: 0.25;
            --tblr-focus-ring-color: rgba(32, 107, 196, 0.25);
            --tblr-form-valid-color: #2fb344;
            --tblr-form-valid-border-color: #2fb344;
            --tblr-form-invalid-color: #d63939;
            --tblr-form-invalid-border-color: #d63939
        }

        [data-bs-theme=dark] {
            color-scheme: dark;
            --tblr-body-color: #fcfdfe;
            --tblr-body-color-rgb: 252, 253, 254;
            --tblr-body-bg: #040a11;
            --tblr-body-bg-rgb: 4, 10, 17;
            --tblr-emphasis-color: #ffffff;
            --tblr-emphasis-color-rgb: 255, 255, 255;
            --tblr-secondary-color: rgba(252, 253, 254, 0.75);
            --tblr-secondary-color-rgb: 252, 253, 254;
            --tblr-secondary-bg: #182433;
            --tblr-secondary-bg-rgb: 24, 36, 51;
            --tblr-tertiary-color: rgba(252, 253, 254, 0.5);
            --tblr-tertiary-color-rgb: 252, 253, 254;
            --tblr-tertiary-bg: #0e1722;
            --tblr-tertiary-bg-rgb: 14, 23, 34;
            --tblr-primary-text-emphasis: #79a6dc;
            --tblr-secondary-text-emphasis: #a3abb4;
            --tblr-success-text-emphasis: #82d18f;
            --tblr-info-text-emphasis: #8ec2ed;
            --tblr-warning-text-emphasis: #faa46a;
            --tblr-danger-text-emphasis: #e68888;
            --tblr-light-text-emphasis: #f6f8fb;
            --tblr-dark-text-emphasis: #dadfe5;
            --tblr-primary-bg-subtle: #061527;
            --tblr-secondary-bg-subtle: #14171a;
            --tblr-success-bg-subtle: #09240e;
            --tblr-info-bg-subtle: #0d1f2d;
            --tblr-warning-bg-subtle: #311501;
            --tblr-danger-bg-subtle: #2b0b0b;
            --tblr-light-bg-subtle: #182433;
            --tblr-dark-bg-subtle: #0c121a;
            --tblr-primary-border-subtle: #134076;
            --tblr-secondary-border-subtle: #3d454e;
            --tblr-success-border-subtle: #1c6b29;
            --tblr-info-border-subtle: #285c87;
            --tblr-warning-border-subtle: #943e04;
            --tblr-danger-border-subtle: #802222;
            --tblr-light-border-subtle: #3a4859;
            --tblr-dark-border-subtle: #182433;
            --tblr-link-color: #79a6dc;
            --tblr-link-hover-color: #94b8e3;
            --tblr-link-color-rgb: 121, 166, 220;
            --tblr-link-hover-color-rgb: 148, 184, 227;
            --tblr-code-color: var(--tblr-gray-300);
            --tblr-border-color: #1f2e41;
            --tblr-border-color-translucent: rgba(72, 110, 149, 0.14);
            --tblr-form-valid-color: #82d18f;
            --tblr-form-valid-border-color: #82d18f;
            --tblr-form-invalid-color: #e68888;
            --tblr-form-invalid-border-color: #e68888
        }

        *,
        ::after,
        ::before {
            box-sizing: border-box
        }

        @media (prefers-reduced-motion:no-preference) {
            :root {
                scroll-behavior: smooth
            }
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
            margin: 0;
            font-family: var(--tblr-body-font-family);
            font-size: var(--tblr-body-font-size);
            font-weight: var(--tblr-body-font-weight);
            line-height: var(--tblr-body-line-height);
            color: var(--tblr-body-color);
            text-align: var(--tblr-body-text-align);
            background-color: var(--tblr-body-bg);
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: transparent
        }

        .hr,
        hr {
            margin: 2rem 0;
            color: inherit;
            border: 0;
            border-top: var(--tblr-border-width) solid;
            opacity: .16
        }

        .h1,
        .h2,
        .h3,
        .h4,
        .h5,
        .h6,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin-top: 0;
            margin-bottom: var(--tblr-spacer);
            font-weight: var(--tblr-font-weight-bold);
            line-height: 1.2;
            color: var(--tblr-heading-color, inherit)
        }

        .h1,
        h1 {
            font-size: 1.5rem
        }

        .h2,
        h2 {
            font-size: 1.25rem
        }

        .h3,
        h3 {
            font-size: 1rem
        }

        .h4,
        h4 {
            font-size: .875rem
        }

        .h5,
        h5 {
            font-size: .75rem
        }

        .h6,
        h6 {
            font-size: .625rem
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem
        }

        address {
            margin-bottom: 1rem;
            font-style: normal;
            line-height: inherit
        }

        strong {
            font-weight: bolder
        }

        a {
            color: rgba(var(--tblr-link-color-rgb), var(--tblr-link-opacity, 1));
            text-decoration: none
        }

        a:hover {
            --tblr-link-color-rgb: var(--tblr-link-hover-color-rgb);
            text-decoration: underline
        }

        a:not([href]):not([class]),
        a:not([href]):not([class]):hover {
            color: inherit;
            text-decoration: none
        }

        button {
            border-radius: 0
        }

        button:focus:not(:focus-visible) {
            outline: 0
        }

        button {
            margin: 0;
            font-family: inherit;
            font-size: inherit;
            line-height: inherit
        }

        button {
            text-transform: none
        }

        [role=button] {
            cursor: pointer
        }

        [list]:not([type=date]):not([type=datetime-local]):not([type=month]):not([type=week]):not([type=time])::-webkit-calendar-picker-indicator {
            display: none !important
        }

        [type=button],
        [type=reset],
        [type=submit],
        button {
            --webkit-appearance: button
        }

        [type=button]:not(:disabled),
        [type=reset]:not(:disabled),
        [type=submit]:not(:disabled),
        button:not(:disabled) {
            cursor: pointer
        }

        ::-moz-focus-inner {
            padding: 0;
            border-style: none
        }

        ::-webkit-datetime-edit-day-field,
        ::-webkit-datetime-edit-fields-wrapper,
        ::-webkit-datetime-edit-hour-field,
        ::-webkit-datetime-edit-minute,
        ::-webkit-datetime-edit-month-field,
        ::-webkit-datetime-edit-text,
        ::-webkit-datetime-edit-year-field {
            padding: 0
        }

        ::-webkit-inner-spin-button {
            height: auto
        }

        [type=search] {
            outline-offset: -2px;
            --webkit-appearance: textfield
        }

        ::-webkit-search-decoration {
            -webkit-appearance: none
        }

        ::-webkit-color-swatch-wrapper {
            padding: 0
        }

        ::-webkit-file-upload-button {
            font: inherit;
            -webkit-appearance: button
        }

        ::file-selector-button {
            font: inherit;
            --webkit-appearance: button
        }

        [hidden] {
            display: none !important
        }

        .container {
            --tblr-gutter-x: calc(var(--tblr-page-padding) * 2);
            --tblr-gutter-y: 0;
            width: 100%;
            padding-right: calc(var(--tblr-gutter-x) * .5);
            padding-left: calc(var(--tblr-gutter-x) * .5);
            margin-right: auto;
            margin-left: auto
        }

        @media (min-width:576px) {
            .container {
                max-width: 540px
            }
        }

        @media (min-width:768px) {
            .container {
                max-width: 720px
            }
        }

        @media (min-width:992px) {
            .container {
                max-width: 960px
            }
        }

        @media (min-width:1200px) {
            .container {
                max-width: 1140px
            }
        }

        @media (min-width:1400px) {
            .container {
                max-width: 1320px
            }
        }

        :root {
            --tblr-breakpoint-xs: 0;
            --tblr-breakpoint-sm: 576px;
            --tblr-breakpoint-md: 768px;
            --tblr-breakpoint-lg: 992px;
            --tblr-breakpoint-xl: 1200px;
            --tblr-breakpoint-xxl: 1400px
        }

        .row {
            --tblr-gutter-x: var(--tblr-page-padding);
            --tblr-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(-1 * var(--tblr-gutter-y));
            margin-right: calc(-.5 * var(--tblr-gutter-x));
            margin-left: calc(-.5 * var(--tblr-gutter-x))
        }

        .row>* {
            flex-shrink: 0;
            width: 100%;
            max-width: 100%;
            padding-right: calc(var(--tblr-gutter-x) * .5);
            padding-left: calc(var(--tblr-gutter-x) * .5);
            margin-top: var(--tblr-gutter-y)
        }

        .col {
            flex: 1 0 0%
        }

        .col-1 {
            flex: 0 0 auto;
            width: 8.33333333%
        }

        .col-2 {
            flex: 0 0 auto;
            width: 16.66666667%
        }

        .col-3 {
            flex: 0 0 auto;
            width: 25%
        }

        .col-4 {
            flex: 0 0 auto;
            width: 33.33333333%
        }

        .col-5 {
            flex: 0 0 auto;
            width: 41.66666667%
        }

        .col-6 {
            flex: 0 0 auto;
            width: 50%
        }

        .col-7 {
            flex: 0 0 auto;
            width: 58.33333333%
        }

        .col-8 {
            flex: 0 0 auto;
            width: 66.66666667%
        }

        .col-9 {
            flex: 0 0 auto;
            width: 75%
        }

        .col-10 {
            flex: 0 0 auto;
            width: 83.33333333%
        }

        .col-11 {
            flex: 0 0 auto;
            width: 91.66666667%
        }

        .col-12 {
            flex: 0 0 auto;
            width: 100%
        }

        .btn {
            --tblr-btn-padding-x: 1rem;
            --tblr-btn-padding-y: 0.4375rem;
            --tblr-btn-font-family: var(--tblr-font-sans-serif);
            --tblr-btn-font-size: 0.875rem;
            --tblr-btn-font-weight: var(--tblr-font-weight-medium);
            --tblr-btn-line-height: 1.4285714286;
            --tblr-btn-color: var(--tblr-body-color);
            --tblr-btn-bg: transparent;
            --tblr-btn-border-width: var(--tblr-border-width);
            --tblr-btn-border-color: transparent;
            --tblr-btn-border-radius: var(--tblr-border-radius);
            --tblr-btn-hover-border-color: transparent;
            --tblr-btn-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.15), 0 1px 1px rgba(0, 0, 0, 0.075);
            --tblr-btn-disabled-opacity: 0.4;
            --tblr-btn-focus-box-shadow: 0 0 0 0.25rem rgba(var(--tblr-btn-focus-shadow-rgb), .5);
            display: inline-block;
            padding: var(--tblr-btn-padding-y) var(--tblr-btn-padding-x);
            font-family: var(--tblr-btn-font-family);
            font-size: var(--tblr-btn-font-size);
            font-weight: var(--tblr-btn-font-weight);
            line-height: var(--tblr-btn-line-height);
            color: var(--tblr-btn-color);
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: var(--tblr-btn-border-width) solid var(--tblr-btn-border-color);
            border-radius: var(--tblr-btn-border-radius);
            background-color: var(--tblr-btn-bg);
            box-shadow: var(--tblr-btn-box-shadow);
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out
        }

        @media (prefers-reduced-motion:reduce) {
            .btn {
                transition: none
            }
        }

        .btn:hover {
            color: var(--tblr-btn-hover-color);
            text-decoration: none;
            background-color: var(--tblr-btn-hover-bg);
            border-color: var(--tblr-btn-hover-border-color)
        }

        .btn:focus-visible {
            color: var(--tblr-btn-hover-color);
            background-color: var(--tblr-btn-hover-bg);
            border-color: var(--tblr-btn-hover-border-color);
            outline: 0;
            box-shadow: var(--tblr-btn-box-shadow), var(--tblr-btn-focus-box-shadow)
        }

        .btn:first-child:active,
        :not(.btn-check)+.btn:active {
            color: var(--tblr-btn-active-color);
            background-color: var(--tblr-btn-active-bg);
            border-color: var(--tblr-btn-active-border-color);
            box-shadow: var(--tblr-btn-active-shadow)
        }

        .btn:first-child:active:focus-visible,
        :not(.btn-check)+.btn:active:focus-visible {
            box-shadow: var(--tblr-btn-active-shadow), var(--tblr-btn-focus-box-shadow)
        }

        .btn:disabled {
            color: var(--tblr-btn-disabled-color);
            pointer-events: none;
            background-color: var(--tblr-btn-disabled-bg);
            border-color: var(--tblr-btn-disabled-border-color);
            opacity: var(--tblr-btn-disabled-opacity);
            box-shadow: none
        }

        .btn-link {
            --tblr-btn-font-weight: 400;
            --tblr-btn-color: var(--tblr-link-color);
            --tblr-btn-bg: transparent;
            --tblr-btn-border-color: transparent;
            --tblr-btn-hover-color: var(--tblr-link-hover-color);
            --tblr-btn-hover-border-color: transparent;
            --tblr-btn-active-color: var(--tblr-link-hover-color);
            --tblr-btn-active-border-color: transparent;
            --tblr-btn-disabled-color: #667382;
            --tblr-btn-disabled-border-color: transparent;
            --tblr-btn-box-shadow: 0 0 0 #000;
            --tblr-btn-focus-shadow-rgb: 65, 129, 205;
            text-decoration: none
        }

        .btn-link:focus-visible,
        .btn-link:hover {
            text-decoration: underline
        }

        .btn-link:focus-visible {
            color: var(--tblr-btn-color)
        }

        .btn-link:hover {
            color: var(--tblr-btn-hover-color)
        }

        @keyframes progress-bar-stripes {
            0% {
                background-position-x: .5rem
            }
        }

        @keyframes spinner-border {
            to {
                transform: rotate(360deg)
            }
        }

        @keyframes spinner-grow {
            0% {
                transform: scale(0)
            }

            50% {
                opacity: 1;
                transform: none
            }
        }

        @keyframes placeholder-glow {
            50% {
                opacity: .1
            }
        }

        @keyframes placeholder-wave {
            100% {
                -webkit-mask-position: -200% 0;
                mask-position: -200% 0
            }
        }

        .text-bg-primary {
            color: #fcfdfe !important;
            background-color: RGBA(32, 107, 196, var(--tblr-bg-opacity, 1)) !important
        }

        .text-bg-muted {
            color: #fcfdfe !important;
            background-color: RGBA(102, 115, 130, var(--tblr-bg-opacity, 1)) !important
        }

        .link-primary {
            color: RGBA(var(--tblr-primary-rgb, var(--tblr-link-opacity, 1)));
            -webkit-text-decoration-color: RGBA(var(--tblr-primary-rgb), var(--tblr-link-underline-opacity, 1));
            text-decoration-color: RGBA(var(--tblr-primary-rgb), var(--tblr-link-underline-opacity, 1))
        }

        .link-primary:focus,
        .link-primary:hover {
            color: RGBA(26, 86, 157, var(--tblr-link-opacity, 1));
            -webkit-text-decoration-color: RGBA(26, 86, 157, var(--tblr-link-underline-opacity, 1));
            text-decoration-color: RGBA(26, 86, 157, var(--tblr-link-underline-opacity, 1))
        }

        .link-muted {
            color: RGBA(var(--tblr-muted-rgb, var(--tblr-link-opacity, 1)));
            -webkit-text-decoration-color: RGBA(var(--tblr-muted-rgb), var(--tblr-link-underline-opacity, 1));
            text-decoration-color: RGBA(var(--tblr-muted-rgb), var(--tblr-link-underline-opacity, 1))
        }

        .link-muted:focus,
        .link-muted:hover {
            color: RGBA(82, 92, 104, var(--tblr-link-opacity, 1));
            -webkit-text-decoration-color: RGBA(82, 92, 104, var(--tblr-link-underline-opacity, 1));
            text-decoration-color: RGBA(82, 92, 104, var(--tblr-link-underline-opacity, 1))
        }

        .icon-link {
            display: inline-flex;
            gap: .375rem;
            align-items: center;
            -webkit-text-decoration-color: rgba(var(--tblr-link-color-rgb), var(--tblr-link-opacity, .5));
            text-decoration-color: rgba(var(--tblr-link-color-rgb), var(--tblr-link-opacity, .5));
            text-underline-offset: .25em;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden
        }

        .d-block {
            display: block !important
        }

        .shadow {
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important
        }

        .h-0 {
            height: 0 !important
        }

        .h-1 {
            height: .25rem !important
        }

        .h-2 {
            height: .5rem !important
        }

        .h-3 {
            height: 1rem !important
        }

        .h-4 {
            height: 1.5rem !important
        }

        .h-5 {
            height: 2rem !important
        }

        .h-6 {
            height: 3rem !important
        }

        .h-7 {
            height: 5rem !important
        }

        .h-8 {
            height: 8rem !important
        }

        .h-25 {
            height: 25% !important
        }

        .h-33 {
            height: 33.33333% !important
        }

        .h-50 {
            height: 50% !important
        }

        .h-66 {
            height: 66.66666% !important
        }

        .h-75 {
            height: 75% !important
        }

        .h-100 {
            height: 100% !important
        }

        .my-0 {
            margin-top: 0 !important;
            margin-bottom: 0 !important
        }

        .my-1 {
            margin-top: .25rem !important;
            margin-bottom: .25rem !important
        }

        .my-2 {
            margin-top: .5rem !important;
            margin-bottom: .5rem !important
        }

        .my-3 {
            margin-top: 1rem !important;
            margin-bottom: 1rem !important
        }

        .my-4 {
            margin-top: 1.5rem !important;
            margin-bottom: 1.5rem !important
        }

        .my-5 {
            margin-top: 2rem !important;
            margin-bottom: 2rem !important
        }

        .my-6 {
            margin-top: 3rem !important;
            margin-bottom: 3rem !important
        }

        .my-7 {
            margin-top: 5rem !important;
            margin-bottom: 5rem !important
        }

        .my-8 {
            margin-top: 8rem !important;
            margin-bottom: 8rem !important
        }

        .mt-0 {
            margin-top: 0 !important
        }

        .mt-1 {
            margin-top: .25rem !important
        }

        .mt-2 {
            margin-top: .5rem !important
        }

        .mt-3 {
            margin-top: 1rem !important
        }

        .mt-4 {
            margin-top: 1.5rem !important
        }

        .mt-5 {
            margin-top: 2rem !important
        }

        .mt-6 {
            margin-top: 3rem !important
        }

        .mt-7 {
            margin-top: 5rem !important
        }

        .mt-8 {
            margin-top: 8rem !important
        }

        .p-0 {
            padding: 0 !important
        }

        .p-1 {
            padding: .25rem !important
        }

        .p-2 {
            padding: .5rem !important
        }

        .p-3 {
            padding: 1rem !important
        }

        .p-4 {
            padding: 1.5rem !important
        }

        .p-5 {
            padding: 2rem !important
        }

        .p-6 {
            padding: 3rem !important
        }

        .p-7 {
            padding: 5rem !important
        }

        .p-8 {
            padding: 8rem !important
        }

        .text-center {
            text-align: center !important
        }

        .text-wrap {
            white-space: normal !important
        }

        .text-primary {
            --tblr-text-opacity: 1;
            color: rgba(var(--tblr-primary-rgb), var(--tblr-text-opacity)) !important
        }

        .text-muted {
            --tblr-text-opacity: 1;
            color: var(--tblr-secondary-color) !important
        }

        .text-white {
            --tblr-text-opacity: 1;
            color: rgba(var(--tblr-white-rgb), var(--tblr-text-opacity)) !important
        }

        .text-body {
            --tblr-text-opacity: 1;
            color: rgba(var(--tblr-body-color-rgb), var(--tblr-text-opacity)) !important
        }

        .text-white-50 {
            --tblr-text-opacity: 1;
            color: rgba(255, 255, 255, .5) !important
        }

        .bg-primary {
            --tblr-bg-opacity: 1;
            background-color: rgba(var(--tblr-primary-rgb), var(--tblr-bg-opacity)) !important
        }

        .bg-muted {
            --tblr-bg-opacity: 1;
            background-color: rgba(var(--tblr-muted-rgb), var(--tblr-bg-opacity)) !important
        }

        .bg-white {
            --tblr-bg-opacity: 1;
            background-color: rgba(var(--tblr-white-rgb), var(--tblr-bg-opacity)) !important
        }

        .bg-body {
            --tblr-bg-opacity: 1;
            background-color: rgba(var(--tblr-body-bg-rgb), var(--tblr-bg-opacity)) !important
        }

        :host,
        :root {
            font-size: 16px;
            height: 100%;
            --tblr-primary: #206bc4;
            --tblr-primary-rgb: 32, 107, 196;
            --tblr-primary-fg: var(--tblr-light);
            --tblr-primary-darken: #1d60b0;
            --tblr-primary-lt: #e9f0f9;
            --tblr-primary-lt-rgb: 233, 240, 249;
            --tblr-secondary: #667382;
            --tblr-secondary-rgb: 102, 115, 130;
            --tblr-secondary-fg: var(--tblr-light);
            --tblr-secondary-darken: #5c6875;
            --tblr-secondary-lt: #f0f1f3;
            --tblr-secondary-lt-rgb: 240, 241, 243;
            --tblr-success: #2fb344;
            --tblr-success-rgb: 47, 179, 68;
            --tblr-success-fg: var(--tblr-light);
            --tblr-success-darken: #2aa13d;
            --tblr-success-lt: #eaf7ec;
            --tblr-success-lt-rgb: 234, 247, 236;
            --tblr-info: #4299e1;
            --tblr-info-rgb: 66, 153, 225;
            --tblr-info-fg: var(--tblr-light);
            --tblr-info-darken: #3b8acb;
            --tblr-info-lt: #ecf5fc;
            --tblr-info-lt-rgb: 236, 245, 252;
            --tblr-warning: #f76707;
            --tblr-warning-rgb: 247, 103, 7;
            --tblr-warning-fg: var(--tblr-light);
            --tblr-warning-darken: #de5d06;
            --tblr-warning-lt: #fef0e6;
            --tblr-warning-lt-rgb: 254, 240, 230;
            --tblr-danger: #d63939;
            --tblr-danger-rgb: 214, 57, 57;
            --tblr-danger-fg: var(--tblr-light);
            --tblr-danger-darken: #c13333;
            --tblr-danger-lt: #fbebeb;
            --tblr-danger-lt-rgb: 251, 235, 235;
            --tblr-light: #fcfdfe;
            --tblr-light-rgb: 252, 253, 254;
            --tblr-light-fg: var(--tblr-dark);
            --tblr-light-darken: #e3e4e5;
            --tblr-light-lt: white;
            --tblr-light-lt-rgb: 255, 255, 255;
            --tblr-dark: #182433;
            --tblr-dark-rgb: 24, 36, 51;
            --tblr-dark-fg: var(--tblr-light);
            --tblr-dark-darken: #16202e;
            --tblr-dark-lt: #e8e9eb;
            --tblr-dark-lt-rgb: 232, 233, 235;
            --tblr-muted: #667382;
            --tblr-muted-rgb: 102, 115, 130;
            --tblr-muted-fg: var(--tblr-light);
            --tblr-muted-darken: #5c6875;
            --tblr-muted-lt: #f0f1f3;
            --tblr-muted-lt-rgb: 240, 241, 243;
            --tblr-blue: #206bc4;
            --tblr-blue-rgb: 32, 107, 196;
            --tblr-blue-fg: var(--tblr-light);
            --tblr-blue-darken: #1d60b0;
            --tblr-blue-lt: #e9f0f9;
            --tblr-blue-lt-rgb: 233, 240, 249;
            --tblr-azure: #4299e1;
            --tblr-azure-rgb: 66, 153, 225;
            --tblr-azure-fg: var(--tblr-light);
            --tblr-azure-darken: #3b8acb;
            --tblr-azure-lt: #ecf5fc;
            --tblr-azure-lt-rgb: 236, 245, 252;
            --tblr-indigo: #4263eb;
            --tblr-indigo-rgb: 66, 99, 235;
            --tblr-indigo-fg: var(--tblr-light);
            --tblr-indigo-darken: #3b59d4;
            --tblr-indigo-lt: #eceffd;
            --tblr-indigo-lt-rgb: 236, 239, 253;
            --tblr-purple: #ae3ec9;
            --tblr-purple-rgb: 174, 62, 201;
            --tblr-purple-fg: var(--tblr-light);
            --tblr-purple-darken: #9d38b5;
            --tblr-purple-lt: #f7ecfa;
            --tblr-purple-lt-rgb: 247, 236, 250;
            --tblr-pink: #d6336c;
            --tblr-pink-rgb: 214, 51, 108;
            --tblr-pink-fg: var(--tblr-light);
            --tblr-pink-darken: #c12e61;
            --tblr-pink-lt: #fbebf0;
            --tblr-pink-lt-rgb: 251, 235, 240;
            --tblr-red: #d63939;
            --tblr-red-rgb: 214, 57, 57;
            --tblr-red-fg: var(--tblr-light);
            --tblr-red-darken: #c13333;
            --tblr-red-lt: #fbebeb;
            --tblr-red-lt-rgb: 251, 235, 235;
            --tblr-orange: #f76707;
            --tblr-orange-rgb: 247, 103, 7;
            --tblr-orange-fg: var(--tblr-light);
            --tblr-orange-darken: #de5d06;
            --tblr-orange-lt: #fef0e6;
            --tblr-orange-lt-rgb: 254, 240, 230;
            --tblr-yellow: #f59f00;
            --tblr-yellow-rgb: 245, 159, 0;
            --tblr-yellow-fg: var(--tblr-light);
            --tblr-yellow-darken: #dd8f00;
            --tblr-yellow-lt: #fef5e6;
            --tblr-yellow-lt-rgb: 254, 245, 230;
            --tblr-lime: #74b816;
            --tblr-lime-rgb: 116, 184, 22;
            --tblr-lime-fg: var(--tblr-light);
            --tblr-lime-darken: #68a614;
            --tblr-lime-lt: #f1f8e8;
            --tblr-lime-lt-rgb: 241, 248, 232;
            --tblr-green: #2fb344;
            --tblr-green-rgb: 47, 179, 68;
            --tblr-green-fg: var(--tblr-light);
            --tblr-green-darken: #2aa13d;
            --tblr-green-lt: #eaf7ec;
            --tblr-green-lt-rgb: 234, 247, 236;
            --tblr-teal: #0ca678;
            --tblr-teal-rgb: 12, 166, 120;
            --tblr-teal-fg: var(--tblr-light);
            --tblr-teal-darken: #0b956c;
            --tblr-teal-lt: #e7f6f2;
            --tblr-teal-lt-rgb: 231, 246, 242;
            --tblr-cyan: #17a2b8;
            --tblr-cyan-rgb: 23, 162, 184;
            --tblr-cyan-fg: var(--tblr-light);
            --tblr-cyan-darken: #1592a6;
            --tblr-cyan-lt: #e8f6f8;
            --tblr-cyan-lt-rgb: 232, 246, 248;
            --tblr-facebook: #1877f2;
            --tblr-facebook-rgb: 24, 119, 242;
            --tblr-facebook-fg: var(--tblr-light);
            --tblr-facebook-darken: #166bda;
            --tblr-facebook-lt: #e8f1fe;
            --tblr-facebook-lt-rgb: 232, 241, 254;
            --tblr-twitter: #1da1f2;
            --tblr-twitter-rgb: 29, 161, 242;
            --tblr-twitter-fg: var(--tblr-light);
            --tblr-twitter-darken: #1a91da;
            --tblr-twitter-lt: #e8f6fe;
            --tblr-twitter-lt-rgb: 232, 246, 254;
            --tblr-linkedin: #0a66c2;
            --tblr-linkedin-rgb: 10, 102, 194;
            --tblr-linkedin-fg: var(--tblr-light);
            --tblr-linkedin-darken: #095caf;
            --tblr-linkedin-lt: #e7f0f9;
            --tblr-linkedin-lt-rgb: 231, 240, 249;
            --tblr-google: #dc4e41;
            --tblr-google-rgb: 220, 78, 65;
            --tblr-google-fg: var(--tblr-light);
            --tblr-google-darken: #c6463b;
            --tblr-google-lt: #fcedec;
            --tblr-google-lt-rgb: 252, 237, 236;
            --tblr-youtube: #ff0000;
            --tblr-youtube-rgb: 255, 0, 0;
            --tblr-youtube-fg: var(--tblr-light);
            --tblr-youtube-darken: #e60000;
            --tblr-youtube-lt: #ffe6e6;
            --tblr-youtube-lt-rgb: 255, 230, 230;
            --tblr-vimeo: #1ab7ea;
            --tblr-vimeo-rgb: 26, 183, 234;
            --tblr-vimeo-fg: var(--tblr-light);
            --tblr-vimeo-darken: #17a5d3;
            --tblr-vimeo-lt: #e8f8fd;
            --tblr-vimeo-lt-rgb: 232, 248, 253;
            --tblr-dribbble: #ea4c89;
            --tblr-dribbble-rgb: 234, 76, 137;
            --tblr-dribbble-fg: var(--tblr-light);
            --tblr-dribbble-darken: #d3447b;
            --tblr-dribbble-lt: #fdedf3;
            --tblr-dribbble-lt-rgb: 253, 237, 243;
            --tblr-github: #181717;
            --tblr-github-rgb: 24, 23, 23;
            --tblr-github-fg: var(--tblr-light);
            --tblr-github-darken: #161515;
            --tblr-github-lt: #e8e8e8;
            --tblr-github-lt-rgb: 232, 232, 232;
            --tblr-instagram: #e4405f;
            --tblr-instagram-rgb: 228, 64, 95;
            --tblr-instagram-fg: var(--tblr-light);
            --tblr-instagram-darken: #cd3a56;
            --tblr-instagram-lt: #fcecef;
            --tblr-instagram-lt-rgb: 252, 236, 239;
            --tblr-pinterest: #bd081c;
            --tblr-pinterest-rgb: 189, 8, 28;
            --tblr-pinterest-fg: var(--tblr-light);
            --tblr-pinterest-darken: #aa0719;
            --tblr-pinterest-lt: #f8e6e8;
            --tblr-pinterest-lt-rgb: 248, 230, 232;
            --tblr-vk: #6383a8;
            --tblr-vk-rgb: 99, 131, 168;
            --tblr-vk-fg: var(--tblr-light);
            --tblr-vk-darken: #597697;
            --tblr-vk-lt: #eff3f6;
            --tblr-vk-lt-rgb: 239, 243, 246;
            --tblr-rss: #ffa500;
            --tblr-rss-rgb: 255, 165, 0;
            --tblr-rss-fg: var(--tblr-light);
            --tblr-rss-darken: #e69500;
            --tblr-rss-lt: #fff6e6;
            --tblr-rss-lt-rgb: 255, 246, 230;
            --tblr-flickr: #0063dc;
            --tblr-flickr-rgb: 0, 99, 220;
            --tblr-flickr-fg: var(--tblr-light);
            --tblr-flickr-darken: #0059c6;
            --tblr-flickr-lt: #e6effc;
            --tblr-flickr-lt-rgb: 230, 239, 252;
            --tblr-bitbucket: #0052cc;
            --tblr-bitbucket-rgb: 0, 82, 204;
            --tblr-bitbucket-fg: var(--tblr-light);
            --tblr-bitbucket-darken: #004ab8;
            --tblr-bitbucket-lt: #e6eefa;
            --tblr-bitbucket-lt-rgb: 230, 238, 250;
            --tblr-tabler: #206bc4;
            --tblr-tabler-rgb: 32, 107, 196;
            --tblr-tabler-fg: var(--tblr-light);
            --tblr-tabler-darken: #1d60b0;
            --tblr-tabler-lt: #e9f0f9;
            --tblr-tabler-lt-rgb: 233, 240, 249;
            --tblr-gray-50: #fcfdfe;
            --tblr-gray-50-rgb: 252, 253, 254;
            --tblr-gray-50-fg: var(--tblr-dark);
            --tblr-gray-50-darken: #e3e4e5;
            --tblr-gray-50-lt: white;
            --tblr-gray-50-lt-rgb: 255, 255, 255;
            --tblr-gray-100: #f6f8fb;
            --tblr-gray-100-rgb: 246, 248, 251;
            --tblr-gray-100-fg: var(--tblr-dark);
            --tblr-gray-100-darken: #dddfe2;
            --tblr-gray-100-lt: #fefeff;
            --tblr-gray-100-lt-rgb: 254, 254, 255;
            --tblr-gray-200: #eef1f4;
            --tblr-gray-200-rgb: 238, 241, 244;
            --tblr-gray-200-fg: var(--tblr-dark);
            --tblr-gray-200-darken: #d6d9dc;
            --tblr-gray-200-lt: #fdfefe;
            --tblr-gray-200-lt-rgb: 253, 254, 254;
            --tblr-gray-300: #dadfe5;
            --tblr-gray-300-rgb: 218, 223, 229;
            --tblr-gray-300-fg: var(--tblr-dark);
            --tblr-gray-300-darken: #c4c9ce;
            --tblr-gray-300-lt: #fbfcfc;
            --tblr-gray-300-lt-rgb: 251, 252, 252;
            --tblr-gray-400: #bbc3cd;
            --tblr-gray-400-rgb: 187, 195, 205;
            --tblr-gray-400-fg: var(--tblr-light);
            --tblr-gray-400-darken: #a8b0b9;
            --tblr-gray-400-lt: #f8f9fa;
            --tblr-gray-400-lt-rgb: 248, 249, 250;
            --tblr-gray-500: #929dab;
            --tblr-gray-500-rgb: 146, 157, 171;
            --tblr-gray-500-fg: var(--tblr-light);
            --tblr-gray-500-darken: #838d9a;
            --tblr-gray-500-lt: #f4f5f7;
            --tblr-gray-500-lt-rgb: 244, 245, 247;
            --tblr-gray-600: #667382;
            --tblr-gray-600-rgb: 102, 115, 130;
            --tblr-gray-600-fg: var(--tblr-light);
            --tblr-gray-600-darken: #5c6875;
            --tblr-gray-600-lt: #f0f1f3;
            --tblr-gray-600-lt-rgb: 240, 241, 243;
            --tblr-gray-700: #3a4859;
            --tblr-gray-700-rgb: 58, 72, 89;
            --tblr-gray-700-fg: var(--tblr-light);
            --tblr-gray-700-darken: #344150;
            --tblr-gray-700-lt: #ebedee;
            --tblr-gray-700-lt-rgb: 235, 237, 238;
            --tblr-gray-800: #182433;
            --tblr-gray-800-rgb: 24, 36, 51;
            --tblr-gray-800-fg: var(--tblr-light);
            --tblr-gray-800-darken: #16202e;
            --tblr-gray-800-lt: #e8e9eb;
            --tblr-gray-800-lt-rgb: 232, 233, 235;
            --tblr-gray-900: #040a11;
            --tblr-gray-900-rgb: 4, 10, 17;
            --tblr-gray-900-fg: var(--tblr-light);
            --tblr-gray-900-darken: #04090f;
            --tblr-gray-900-lt: #e6e7e7;
            --tblr-gray-900-lt-rgb: 230, 231, 231;
            --tblr-spacer-0: 0;
            --tblr-spacer-1: 0.25rem;
            --tblr-spacer-2: 0.5rem;
            --tblr-spacer-3: 1rem;
            --tblr-spacer-4: 1.5rem;
            --tblr-spacer-5: 2rem;
            --tblr-spacer-6: 3rem;
            --tblr-spacer-7: 5rem;
            --tblr-spacer-8: 8rem;
            --tblr-spacer: 1rem;
            --tblr-bg-surface: var(--tblr-white);
            --tblr-bg-surface-secondary: var(--tblr-gray-100);
            --tblr-bg-surface-tertiary: var(--tblr-gray-50);
            --tblr-bg-surface-dark: var(--tblr-dark);
            --tblr-bg-forms: var(--tblr-bg-surface);
            --tblr-border-color: #dadfe5;
            --tblr-border-color-translucent: rgba(4, 32, 69, 0.14);
            --tblr-border-dark-color: #bbc3cd;
            --tblr-border-dark-color-translucent: rgba(4, 32, 69, 0.27);
            --tblr-border-active-color: #b6bcc3;
            --tblr-icon-color: var(--tblr-gray-500);
            --tblr-active-bg: rgba(var(--tblr-primary-rgb), 0.04);
            --tblr-disabled-bg: var(--tblr-bg-surface-secondary);
            --tblr-disabled-color: var(--tblr-gray-300);
            --tblr-code-color: var(--tblr-gray-600);
            --tblr-code-bg: var(--tblr-bg-surface-secondary);
            --tblr-dark-mode-border-color: #1f2e41;
            --tblr-dark-mode-border-color-translucent: rgba(72, 110, 149, 0.14);
            --tblr-dark-mode-border-color-active: #2c415d;
            --tblr-dark-mode-border-dark-color: #1f2e41;
            --tblr-page-padding: var(--tblr-spacer-3);
            --tblr-page-padding-y: var(--tblr-spacer-4);
            --tblr-font-weight-light: 300;
            --tblr-font-weight-normal: 400;
            --tblr-font-weight-medium: 500;
            --tblr-font-weight-bold: 600;
            --tblr-font-weight-headings: var(--tblr-font-weight-bold);
            --tblr-font-size-h1: 1.5rem;
            --tblr-font-size-h2: 1.25rem;
            --tblr-font-size-h3: 1rem;
            --tblr-font-size-h4: 0.875rem;
            --tblr-font-size-h5: 0.75rem;
            --tblr-font-size-h6: 0.625rem;
            --tblr-line-height-h1: 2rem;
            --tblr-line-height-h2: 1.75rem;
            --tblr-line-height-h3: 1.5rem;
            --tblr-line-height-h4: 1.25rem;
            --tblr-line-height-h5: 1rem;
            --tblr-line-height-h6: 1rem;
            --tblr-shadow: rgba(var(--tblr-body-color-rgb), 0.04) 0 2px 4px 0;
            --tblr-shadow-transparent: 0 0 0 0 transparent;
            --tblr-shadow-button: 0 1px 0 rgba(var(--tblr-body-color-rgb), 0.04);
            --tblr-shadow-button-inset: inset 0 -1px 0 rgba(var(--tblr-body-color-rgb), 0.2);
            --tblr-shadow-card: 0 0 4px rgba(var(--tblr-body-color-rgb), 0.04);
            --tblr-shadow-card-hover: rgba(var(--tblr-body-color-rgb), 0.16) 0 2px 16px 0;
            --tblr-shadow-dropdown: 0px 16px 24px 2px rgba(0, 0, 0, 0.07), 0px 6px 30px 5px rgba(0, 0, 0, 0.06), 0px 8px 10px -5px rgba(0, 0, 0, 0.1)
        }

        @media (max-width:991.98px) {

            :host,
            :root {
                --tblr-page-padding: var(--tblr-spacer-2)
            }
        }

        @keyframes pulse {
            from {
                opacity: 1;
                transform: scale3d(.8, .8, .8)
            }

            50% {
                transform: scale3d(1, 1, 1);
                opacity: 1
            }

            to {
                opacity: 1;
                transform: scale3d(.8, .8, .8)
            }
        }

        @keyframes tada {
            0% {
                transform: scale3d(1, 1, 1)
            }

            10%,
            5% {
                transform: scale3d(.9, .9, .9) rotate3d(0, 0, 1, -5deg)
            }

            15%,
            25%,
            35%,
            45% {
                transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 5deg)
            }

            20%,
            30%,
            40% {
                transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -5deg)
            }

            50% {
                transform: scale3d(1, 1, 1)
            }
        }

        @keyframes rotate-360 {
            from {
                transform: rotate(0)
            }

            to {
                transform: rotate(360deg)
            }
        }

        @keyframes blink {
            from {
                opacity: 0
            }

            50% {
                opacity: 1
            }

            to {
                opacity: 0
            }
        }

        body {
            letter-spacing: 0;
            touch-action: manipulation;
            text-rendering: optimizeLegibility;
            font-feature-settings: "liga" 0;
            position: relative;
            min-height: 100%;
            height: 100%;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        @media print {
            body {
                background: 0 0
            }
        }

        * {
            scrollbar-color: rgba(var(--tblr-scrollbar-color, var(--tblr-body-color-rgb)), .16) transparent
        }

        ::-webkit-scrollbar {
            width: 1rem;
            height: 1rem;
            -webkit-transition: background .3s;
            transition: background .3s
        }

        @media (prefers-reduced-motion:reduce) {
            ::-webkit-scrollbar {
                -webkit-transition: none;
                transition: none
            }
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 1rem;
            border: 5px solid transparent;
            box-shadow: inset 0 0 0 1rem rgba(var(--tblr-scrollbar-color, var(--tblr-body-color-rgb)), .16)
        }

        ::-webkit-scrollbar-track {
            background: 0 0
        }

        :hover::-webkit-scrollbar-thumb {
            box-shadow: inset 0 0 0 1rem rgba(var(--tblr-scrollbar-color, var(--tblr-body-color-rgb)), .32)
        }

        ::-webkit-scrollbar-corner {
            background: 0 0
        }

        [data-bs-theme=dark] {
            --tblr-body-color: #fcfdfe;
            --tblr-body-color-rgb: 252, 253, 254;
            --tblr-muted: #3a4859;
            --tblr-body-bg: #151f2c;
            --tblr-body-bg-rgb: 21, 31, 44;
            --tblr-emphasis-color: #ffffff;
            --tblr-emphasis-color-rgb: 255, 255, 255;
            --tblr-bg-forms: #151f2c;
            --tblr-bg-surface: #182433;
            --tblr-bg-surface-dark: #151f2c;
            --tblr-bg-surface-secondary: #1b293a;
            --tblr-bg-surface-tertiary: #151f2c;
            --tblr-link-color: #307fdd;
            --tblr-link-hover-color: #206bc4;
            --tblr-active-bg: #1b293a;
            --tblr-disabled-color: var(--tblr-gray-700);
            --tblr-border-color: var(--tblr-dark-mode-border-color);
            --tblr-border-color-translucent: var(--tblr-dark-mode-border-color-translucent);
            --tblr-border-dark-color: var(--tblr-dark-mode-border-dark-color);
            --tblr-border-color-active: var(--tblr-dark-mode-border-color-active);
            --tblr-btn-color: #151f2c;
            --tblr-code-color: var(--tblr-body-color);
            --tblr-code-bg: #1f2e41;
            --tblr-primary-lt: #192b42;
            --tblr-primary-lt-rgb: 25, 43, 66;
            --tblr-secondary-lt: #202c3b;
            --tblr-secondary-lt-rgb: 32, 44, 59;
            --tblr-success-lt: #1a3235;
            --tblr-success-lt-rgb: 26, 50, 53;
            --tblr-info-lt: #1c3044;
            --tblr-info-lt-rgb: 28, 48, 68;
            --tblr-warning-lt: #2e2b2f;
            --tblr-warning-lt-rgb: 46, 43, 47;
            --tblr-danger-lt: #2b2634;
            --tblr-danger-lt-rgb: 43, 38, 52;
            --tblr-light-lt: #2f3a47;
            --tblr-light-lt-rgb: 47, 58, 71;
            --tblr-dark-lt: #182433;
            --tblr-dark-lt-rgb: 24, 36, 51;
            --tblr-muted-lt: #202c3b;
            --tblr-muted-lt-rgb: 32, 44, 59;
            --tblr-blue-lt: #192b42;
            --tblr-blue-lt-rgb: 25, 43, 66;
            --tblr-azure-lt: #1c3044;
            --tblr-azure-lt-rgb: 28, 48, 68;
            --tblr-indigo-lt: #1c2a45;
            --tblr-indigo-lt-rgb: 28, 42, 69;
            --tblr-purple-lt: #272742;
            --tblr-purple-lt-rgb: 39, 39, 66;
            --tblr-pink-lt: #2b2639;
            --tblr-pink-lt-rgb: 43, 38, 57;
            --tblr-red-lt: #2b2634;
            --tblr-red-lt-rgb: 43, 38, 52;
            --tblr-orange-lt: #2e2b2f;
            --tblr-orange-lt-rgb: 46, 43, 47;
            --tblr-yellow-lt: #2e302e;
            --tblr-yellow-lt-rgb: 46, 48, 46;
            --tblr-lime-lt: #213330;
            --tblr-lime-lt-rgb: 33, 51, 48;
            --tblr-green-lt: #1a3235;
            --tblr-green-lt-rgb: 26, 50, 53;
            --tblr-teal-lt: #17313a;
            --tblr-teal-lt-rgb: 23, 49, 58;
            --tblr-cyan-lt: #183140;
            --tblr-cyan-lt-rgb: 24, 49, 64;
            --tblr-facebook-lt: #182c46;
            --tblr-facebook-lt-rgb: 24, 44, 70;
            --tblr-twitter-lt: #193146;
            --tblr-twitter-lt-rgb: 25, 49, 70;
            --tblr-linkedin-lt: #172b41;
            --tblr-linkedin-lt-rgb: 23, 43, 65;
            --tblr-google-lt: #2c2834;
            --tblr-google-lt-rgb: 44, 40, 52;
            --tblr-youtube-lt: #2f202e;
            --tblr-youtube-lt-rgb: 47, 32, 46;
            --tblr-vimeo-lt: #183345;
            --tblr-vimeo-lt-rgb: 24, 51, 69;
            --tblr-dribbble-lt: #2d283c;
            --tblr-dribbble-lt-rgb: 45, 40, 60;
            --tblr-github-lt: #182330;
            --tblr-github-lt-rgb: 24, 35, 48;
            --tblr-instagram-lt: #2c2737;
            --tblr-instagram-lt-rgb: 44, 39, 55;
            --tblr-pinterest-lt: #292131;
            --tblr-pinterest-lt-rgb: 41, 33, 49;
            --tblr-vk-lt: #202e3f;
            --tblr-vk-lt-rgb: 32, 46, 63;
            --tblr-rss-lt: #2f312e;
            --tblr-rss-lt-rgb: 47, 49, 46;
            --tblr-flickr-lt: #162a44;
            --tblr-flickr-lt-rgb: 22, 42, 68;
            --tblr-bitbucket-lt: #162942;
            --tblr-bitbucket-lt-rgb: 22, 41, 66;
            --tblr-tabler-lt: #192b42;
            --tblr-tabler-lt-rgb: 25, 43, 66
        }

        .btn {
            --tblr-btn-bg: var(--tblr-bg-surface);
            --tblr-btn-hover-bg: var(--tblr-bg-surface);
            --tblr-btn-icon-size: 1.25rem;
            --tblr-btn-bg: var(--tblr-bg-surface);
            --tblr-btn-color: var(--tblr-body-color);
            --tblr-btn-border-color: var(--tblr-border-color);
            --tblr-btn-hover-bg: var(--tblr-btn-bg);
            --tblr-btn-hover-border-color: var(--tblr-border-color-active);
            --tblr-btn-box-shadow: var(--tblr-shadow-button);
            --tblr-btn-active-color: var(--tblr-primary);
            --tblr-btn-active-bg: rgba(var(--tblr-primary-rgb), 0.04);
            --tblr-btn-active-border-color: var(--tblr-primary);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            white-space: nowrap;
            box-shadow: var(--tblr-btn-box-shadow)
        }

        .btn .icon {
            width: var(--tblr-btn-icon-size);
            height: var(--tblr-btn-icon-size);
            min-width: var(--tblr-btn-icon-size);
            margin: 0 calc(var(--tblr-btn-padding-x)/ 2) 0 calc(var(--tblr-btn-padding-x)/ -4);
            vertical-align: bottom;
            color: inherit
        }

        .btn .icon-right {
            margin: 0 calc(var(--tblr-btn-padding-x)/ -4) 0 calc(var(--tblr-btn-padding-x)/ 2)
        }

        .btn-link {
            color: #206bc4;
            background-color: transparent;
            border-color: transparent;
            box-shadow: none
        }

        .btn-link .icon {
            color: inherit
        }

        .btn-link:hover {
            color: #1a569d;
            border-color: transparent
        }

        .btn-primary {
            --tblr-btn-border-color: transparent;
            --tblr-btn-hover-border-color: transparent;
            --tblr-btn-active-border-color: transparent;
            --tblr-btn-color: var(--tblr-primary-fg);
            --tblr-btn-bg: var(--tblr-primary);
            --tblr-btn-hover-color: var(--tblr-primary-fg);
            --tblr-btn-hover-bg: rgba(var(--tblr-primary-rgb), .8);
            --tblr-btn-active-color: var(--tblr-primary-fg);
            --tblr-btn-active-bg: rgba(var(--tblr-primary-rgb), .8);
            --tblr-btn-disabled-bg: var(--tblr-primary);
            --tblr-btn-disabled-color: var(--tblr-primary-fg);
            --tblr-btn-box-shadow: var(--tblr-shadow-button), var(--tblr-shadow-button-inset)
        }

        .btn-muted {
            --tblr-btn-border-color: transparent;
            --tblr-btn-hover-border-color: transparent;
            --tblr-btn-active-border-color: transparent;
            --tblr-btn-color: var(--tblr-muted-fg);
            --tblr-btn-bg: var(--tblr-muted);
            --tblr-btn-hover-color: var(--tblr-muted-fg);
            --tblr-btn-hover-bg: rgba(var(--tblr-muted-rgb), .8);
            --tblr-btn-active-color: var(--tblr-muted-fg);
            --tblr-btn-active-bg: rgba(var(--tblr-muted-rgb), .8);
            --tblr-btn-disabled-bg: var(--tblr-muted);
            --tblr-btn-disabled-color: var(--tblr-muted-fg);
            --tblr-btn-box-shadow: var(--tblr-shadow-button), var(--tblr-shadow-button-inset)
        }

        .btn-icon {
            min-width: calc(var(--tblr-btn-line-height) * var(--tblr-btn-font-size) + var(--tblr-btn-padding-y) * 2 + var(--tblr-btn-border-width) * 2);
            min-height: calc(var(--tblr-btn-line-height) * var(--tblr-btn-font-size) + var(--tblr-btn-padding-y) * 2 + var(--tblr-btn-border-width) * 2);
            padding-left: 0;
            padding-right: 0
        }

        .btn-icon .icon {
            margin: calc(-1 * var(--tblr-btn-padding-x))
        }

        .btn-action {
            padding: 0;
            border: 0;
            color: var(--tblr-muted);
            display: inline-flex;
            width: 2rem;
            height: 2rem;
            align-items: center;
            justify-content: center;
            border-radius: var(--tblr-border-radius);
            background: 0 0
        }

        .btn-action:after {
            content: none
        }

        .btn-action:focus {
            outline: 0;
            box-shadow: none
        }

        .btn-action:hover {
            color: var(--tblr-body-color);
            background: var(--tblr-active-bg)
        }

        .btn-action .icon {
            margin: 0;
            width: 1.25rem;
            height: 1.25rem;
            font-size: 1.25rem;
            stroke-width: 1
        }

        .row>* {
            min-width: 0
        }

        .row-0 {
            margin-right: 0;
            margin-left: 0
        }

        .row-0>.col,
        .row-0>[class*=col-] {
            padding-right: 0;
            padding-left: 0
        }

        .icon {
            --tblr-icon-size: 1.25rem;
            width: var(--tblr-icon-size);
            height: var(--tblr-icon-size);
            font-size: var(--tblr-icon-size);
            vertical-align: bottom;
            stroke-width: 1.5
        }

        .icon:hover {
            text-decoration: none
        }

        [type=search]::-webkit-search-cancel-button {
            -webkit-appearance: none
        }

        @keyframes animated-dots {
            0% {
                transform: translateX(-100%)
            }
        }

        @keyframes progress-indeterminate {
            0% {
                right: 100%;
                left: -35%
            }

            100%,
            60% {
                right: -90%;
                left: 100%
            }
        }

        @keyframes status-pulsate-main {
            40% {
                transform: scale(1.25, 1.25)
            }

            60% {
                transform: scale(1.25, 1.25)
            }
        }

        @keyframes status-pulsate-secondary {
            10% {
                transform: scale(1, 1)
            }

            30% {
                transform: scale(3, 3)
            }

            80% {
                transform: scale(3, 3)
            }

            100% {
                transform: scale(1, 1)
            }
        }

        @keyframes status-pulsate-tertiary {
            25% {
                transform: scale(1, 1)
            }

            80% {
                transform: scale(3, 3);
                opacity: 0
            }

            100% {
                transform: scale(3, 3);
                opacity: 0
            }
        }

        .hr-text {
            display: flex;
            align-items: center;
            margin: 2rem 0;
            font-size: .625rem;
            font-weight: var(--tblr-font-weight-bold);
            text-transform: uppercase;
            letter-spacing: .04em;
            line-height: 1rem;
            color: var(--tblr-muted);
            height: 1px
        }

        .hr-text:after,
        .hr-text:before {
            flex: 1 1 auto;
            height: 1px;
            background-color: var(--tblr-border-color)
        }

        .hr-text:before {
            content: "";
            margin-right: .5rem
        }

        .hr-text:after {
            content: "";
            margin-left: .5rem
        }

        .hr-text>:first-child {
            padding-right: .5rem;
            padding-left: 0;
            color: var(--tblr-muted)
        }

        .hr-text.hr-text-right:before {
            content: ""
        }

        .hr-text.hr-text-right:after {
            content: none
        }

        .hr-text.hr-text-right>:first-child {
            padding-right: 0;
            padding-left: .5rem
        }

        a {
            -webkit-text-decoration-skip: ink;
            text-decoration-skip-ink: auto
        }

        .h1 a,
        .h2 a,
        .h3 a,
        .h4 a,
        .h5 a,
        .h6 a,
        h1 a,
        h2 a,
        h3 a,
        h4 a,
        h5 a,
        h6 a {
            color: inherit
        }

        .h1 a:hover,
        .h2 a:hover,
        .h3 a:hover,
        .h4 a:hover,
        .h5 a:hover,
        .h6 a:hover,
        h1 a:hover,
        h2 a:hover,
        h3 a:hover,
        h4 a:hover,
        h5 a:hover,
        h6 a:hover {
            color: inherit
        }

        .h1,
        h1 {
            font-size: var(--tblr-font-size-h1);
            line-height: var(--tblr-line-height-h1)
        }

        .h2,
        h2 {
            font-size: var(--tblr-font-size-h2);
            line-height: var(--tblr-line-height-h2)
        }

        .h3,
        h3 {
            font-size: var(--tblr-font-size-h3);
            line-height: var(--tblr-line-height-h3)
        }

        .h4,
        h4 {
            font-size: var(--tblr-font-size-h4);
            line-height: var(--tblr-line-height-h4)
        }

        .h5,
        h5 {
            font-size: var(--tblr-font-size-h5);
            line-height: var(--tblr-line-height-h5)
        }

        .h6,
        h6 {
            font-size: var(--tblr-font-size-h6);
            line-height: var(--tblr-line-height-h6)
        }

        .strong,
        strong {
            font-weight: var(--tblr-font-weight-bold)
        }

        .hr,
        hr {
            margin: 2rem 0
        }

        ::-moz-selection {
            background-color: rgba(var(--tblr-primary-rgb), .16)
        }

        ::selection {
            background-color: rgba(var(--tblr-primary-rgb), .16)
        }

        .bg-primary {
            --tblr-bg-opacity: 1;
            background-color: rgba(var(--tblr-primary-rgb), var(--tblr-bg-opacity)) !important
        }

        .bg-muted {
            --tblr-bg-opacity: 1;
            background-color: rgba(var(--tblr-muted-rgb), var(--tblr-bg-opacity)) !important
        }

        .bg-white {
            --tblr-bg-opacity: 1;
            background-color: rgba(var(--tblr-white-rgb), var(--tblr-bg-opacity)) !important
        }

        .text-primary {
            --tblr-text-opacity: 1;
            color: rgba(var(--tblr-primary-rgb), var(--tblr-text-opacity)) !important
        }

        .text-muted {
            --tblr-text-opacity: 1;
            color: rgba(var(--tblr-muted-rgb), var(--tblr-text-opacity)) !important
        }

        .h-0 {
            height: 0 !important
        }

        .h-1 {
            height: .25rem !important
        }

        .h-2 {
            height: .5rem !important
        }

        .h-3 {
            height: 1rem !important
        }

        .h-4 {
            height: 1.5rem !important
        }

        .h-5 {
            height: 2rem !important
        }

        .h-6 {
            height: 3rem !important
        }

        .h-7 {
            height: 5rem !important
        }

        .h-8 {
            height: 8rem !important
        }
    </style>

    <!-- CSS based on Tailwindcss -->
    <style>
        .text-xs {
            font-size: .75rem;
            line-height: 1rem
        }
    </style>
</head>

<body>
    <main>
        <div class="container">
            <div class="row mt-5">
                <div class="col">
                    <h1 class="text-muted text-center"><?= $app_name ?? 'Codeigniter 3 Auth'; ?></h1>
                </div>
            </div>

            <div class="row mt-1 shadow">
                <div class="col bg-white p-5">
                    <p>Hello <strong><?= $full_name ?? 'User'; ?>.</strong></p>
                    <p>You have requested to reset your password. To reset your password, please click button bellow. You have <?= $duration ?? '0'; ?> minutes before this action is expired.</p>
                    <div class="my-3">
                        <a target="_blank" href="<?= $url; ?>" class="btn btn-primary"><?= $button_text ?? 'Reset Password'; ?></a>
                    </div>
                    <p>If you did not request reset password, no further action is required.</p>
                    <p>Regards,</p>
                    <p><?= $app_name ?? 'Codeigniter 3 Auth'; ?></p>
                    <hr>
                    <div>
                        <span class="d-block text-xs text-wrap text-muted">
                            If you’re having trouble clicking the "<?= $button_text ?? 'Reset Password'; ?>" button, copy and paste the URL below into your web browser:<a href="<?= $url; ?>"><?= $url ?? 'http://ci3-auth.test/auth/verify?email=&token='; ?></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row mt-5 text-center">
                <span class="d-block text-muted text-xs">&copy; <?= date('Y'); ?> <?= $app_name ?? 'Codeigniter 3 Auth'; ?>. All right reserved.</span>
            </div>
        </div>
    </main>
</body>

</html>