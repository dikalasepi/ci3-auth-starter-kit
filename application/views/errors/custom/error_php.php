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
    <title>Error PHP</title>
    <!-- CSS files -->
    <link href="<?= config_item('base_url') . '/assets/css/tabler.min.css' ?>" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body class=" border-top-wide border-primary d-flex flex-column">
    <div class="container py-4">
        <div class="card">
            <div class="card-header bg-danger">
                <div class="card-title text-white">A PHP Error was encountered</div>
            </div>
            <div class="card-body">
                <h4>Severity: Warning</h4>
                <p>Message:</p>
                <div>
                    <pre><code>mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it. </code></pre>
                </div>
                <p>Filename:</p>
                <div>
                    <pre><code>mysqli/mysqli_driver.php</code></pre>
                </div>
                <p>Line Number:</p>
                <div>
                    <pre><code>mysqli/mysqli_driver.php</code></pre>
                </div>



                <p>Backtrace:</p>

                <div>


                    <pre><code>
File: D:\Dev\laragon\www\ci3-auth\application\controllers\Auth.php <br />
Line: 8<br />
Function: __construct</code></pre>


                </div>

                <div>
                    <pre><code>
File: D:\Dev\laragon\www\ci3-auth\index.php <br>
Line: 290 <br>
Function: require_once 
                    </code></pre>
                </div>


            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?= config_item('base_url') . '/assets/js/tabler.min.js' ?>" defer></script>
</body>

</html>