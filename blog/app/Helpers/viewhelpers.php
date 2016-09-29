<?php

if (!function_exists('gradient_bootstrap_hidden')) {
	function gradient_bootstrap_hidden($distance, $step = 2) {
		static $hops = ['hidden-xs', 'hidden-sm', 'hidden-md'];
		return join(' ', array_filter($hops, function ($index) use ($distance, $step) {
			return $distance > ($step * $index + 1);
		}, ARRAY_FILTER_USE_KEY));
	}
}

if (!function_exists('trim_text')) {
	function trim_text($text, $max_length, $finisher = '...') {
		$length = strlen($text);

		if ($length <= $max_length)
			return $text;

		$payload = strlen($finisher);
		while (true) {
			if ($max_length - $payload < 0)
				return $text;
			$trimmed = substr($text, 0, $max_length - $payload);
			$trimmed = preg_replace('/[^\.?!]*$/', '', $trimmed);
			if (!strlen($trimmed)) {
				$new_length = intval($max_length * 1.3);
				if ($new_length == $max_length)
					return $text;
				$max_length = $new_length;

				if ($length <= $max_length)
					return $text;

				continue;
			}

			break;
		}

		return $trimmed . $finisher;
	}
}

if (!function_exists('preprocess_text')) {
	function preprocess_text($text) {
		return join(array_map(function ($line) {
			return "<p>" . e(rtrim($line)) . "</p>";
		}, explode("\n", trim($text, "\r\n"))));
	}
}
