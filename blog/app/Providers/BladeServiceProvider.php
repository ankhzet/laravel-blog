<?php

namespace Blog\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot() {
		$this->matcher('labeled');
		$this->matcher('group');
		$this->matcher('errorable');
	}

	protected function matcher($directive) {
		Blade::extend(function($view, $compiler) use ($directive) {
			return preg_replace_callback(
				"/\s*\@{$directive}(?:\s*\((.*?)\))?(.*?)\@end{$directive}\s*/s",
				function ($match) use ($directive) {

					$parameters = array_map(function ($param) {
						return trim($param);
					}, explode(',', $match[1]));

					preg_match('/^(\s*)(.*?)(\s*)$/s', $match[2], $whitespace);

					return $this->{"blade{$directive}"}($parameters, $whitespace[2], $whitespace[1], $whitespace[3]);
				}, $view);
		});
	}

	protected function bladeerrorable($parameters, $content, $s1, $s2) {
		@list($errors, $field) = $parameters;

		return "" .
			$this->bladegroup(["((\$error = {$errors}->first({$field})) ? 'has-error' : '')"], $content . "<div class=\"col-sm-10 col-sm-offset-2 help-block\"><?php echo \$error; ?></div>", $s1, $s2);
	}

	protected function bladegroup($parameters, $content, $s1, $s2) {
		@list($classes) = $parameters;

		$selector = '<?php { $classes = ' . ($classes ? 'array_filter(array_merge(["form-group"], explode(" ", ' . $classes . ')))' : '["form-group"]') . ';
			$class = $classes ? " class=\"" . join(" ", $classes) . "\"" : null;?>';

		return "{$selector}{$s1}<div<?php echo \$class;?>>{$s1}\t{$content}\n{$s1}</div>{$s2}<?php } ?>";
	}

	protected function bladelabeled($parameters, $content, $s1, $s2) {
		@list($field, $title) = $parameters;
		$label = $title
							? "<label for=\"<?php echo {$field}; ?>\" class=\"col-sm-2 control-label\"><?php echo {$title};?></label>"
							: "<div class=\"col-sm-2\"></div>";
		return "{$s1}{$label}{$s1}<div class=\"col-sm-10\">{$s1}\t{$content}\n{$s1}</div>{$s2}";
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register() {
	}

}
