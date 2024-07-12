<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<link rel="shortcut icon" href="<?= config_item('base_url') . '/assets/img/logo-small.svg' ?>" type="image/x-icon">
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

<div class="container py-3">
	<div class="card">
		<div class="card-header bg-danger">
			<div class="card-title text-white">
				<h2 class="mb-0">An uncaught Exception was encountered</h2>
			</div>
		</div>
		<div class="card-body">
			<h4>Type: <?php echo get_class($exception); ?></h4>
			<p>Message:</p>
			<div>
				<pre><?php echo $message; ?></pre>
			</div>
			<p>Filename:</p>
			<div>
				<pre><?php echo $exception->getFile(); ?></pre>
			</div>
			<p>Line Number:</p>
			<div>
				<pre><?php echo $exception->getLine(); ?></pre>
			</div>

			<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE) : ?>

				<p>Backtrace:</p>
				<?php foreach ($exception->getTrace() as $error) : ?>
					<div>
						<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0) : ?>
							<pre>
File: <?php echo $error['file']; ?><br />
Line: <?php echo $error['line']; ?><br />
Function: <?php echo $error['function']; ?>
</pre>
						<?php endif ?>
					</div>
				<?php endforeach ?>

			<?php endif ?>
		</div>
	</div>
</div>