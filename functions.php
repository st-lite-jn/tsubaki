<?php
$tsbk_funcs_globs = array_merge(
	glob(__DIR__ . '/functions/snippets/*.php'),
	glob(__DIR__ . '/functions/settings/*.php'),
	glob(__DIR__ . '/functions/admin-screens/*.php'),
	glob(__DIR__ . '/functions/global-variables/*.php'),
	glob(__DIR__ . '/functions/outputs/*.php'),
	glob(__DIR__ . '/functions/theme-customizers/*.php'),
	glob(__DIR__ . '/functions/custom-blocks/*.php'),
	glob(__DIR__ . '/functions/block-patterns/*.php'),
	glob(__DIR__ . '/functions/block-styles/*.php'),
);
foreach($tsbk_funcs_globs as $tsbk_funcs_glob) {
	include $tsbk_funcs_glob;
}
