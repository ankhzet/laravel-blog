<?php

	function group($classes, \Closure $wrap) {
		$classes = array_merge(['form-group'], $classes);
		$class = $classes ? ' class="' . join(' ', $classes) . '"' : null;
		return "
						<div{$class}>
							{$wrap()}
						</div>";
	}


	function errorable($errors, $field, \Closure $wrap) {
		$error = $errors->first($field);
		return group($error ? ['has-error'] : [], function () use ($field, $wrap, $error) {
			return $wrap($field) . "<div class=\"col-sm-10 col-sm-offset-2 help-block\">{$error}</div>";
		});
	}

	function labeled($field, $title, \Closure $wrap) {
		return "
							" . ($title
							     ? "<label for=\"{$field}\" class=\"col-sm-2 control-label\">{$title}</label>"
							     : "<div class=\"col-sm-2\"></div>") . "
							<div class=\"col-sm-10\">
								{$wrap($field)}
							</div>";
	}

	$email = $email ?? '';
	$password = $password ?? '';
	$remember = $remember ?? false;

?>

@extends('layout')

@section('content')
	{!! Form::open(['class' => 'form-horizontal']) !!}

		{!! errorable($errors, 'email', function ($field) use ($email) {
			return labeled($field, 'Login', function ($field) use ($email) {
				return Form::email($field, $email ?? '', ['placeholder' =>  'example@domain.com', 'class' => 'form-control']);
			});
		}) !!}

		{!! errorable($errors, 'password', function ($field) use ($password) {
			return labeled($field, 'Password', function ($field) use ($password) {
				return Form::password($field, ['class' => 'form-control']);
			});
		}) !!}

		{!! errorable($errors, 'remember', function ($field) use ($remember) {
			return labeled($field, '', function ($field) use ($remember) {
				return Form::checkbox($field, 1, $remember) . "
							<label for=\"{$field}\">Remember me</label>";
			});
		}) !!}

		{!! group([], function () {
			return labeled('', '', function () {
				return "<a href=\"" . URL::to('/reset') . "\">Reset password</a>";
			});
		}) !!}

		{!! group([], function () {
			return labeled('', '', function () {
				return Form::submit('Login', array('class' => 'btn btn-primary'));
			});
		}) !!}

	{!! Form::close() !!}

@stop
