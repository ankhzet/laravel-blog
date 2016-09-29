<?php

if (!function_exists('gradient_bootstrap_hidden')) {
	function gradient_bootstrap_hidden($distance, $step = 2) {
		static $hops = ['hidden-xs', 'hidden-sm', 'hidden-md'];
		return join(' ', array_filter($hops, function ($index) use ($distance, $step) {
			return $distance > ($step * $index + 1);
		}, ARRAY_FILTER_USE_KEY));
	}
}
