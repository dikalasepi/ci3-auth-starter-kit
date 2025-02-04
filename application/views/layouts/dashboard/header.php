<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?= $title ?? 'Codeigniter 3' ?></title>
    <!-- Change with your shortcut icon -->
    <link rel="shortcut icon" href="<?= base_url('assets/img/logo-small.svg') ?>" type="image/x-icon">
    <!-- CSS files -->
    <link href="<?= base_url('assets/css/tabler.min.css') ?>" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }

        /* Hide scrollbar for Chrome, Safari and Opera */
        aside::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        aside {
            /* IE and Edge */
            -ms-overflow-style: none;
            /* Firefox */
            scrollbar-width: none;
        }
    </style>
</head>

<body>
    <div class="page" style="min-height: 100vh;">