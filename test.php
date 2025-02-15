<!DOCTYPE html>
<html lang="en">
<style>
	@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap");

	a,
	abbr,
	acronym,
	address,
	applet,
	article,
	aside,
	audio,
	b,
	big,
	blockquote,
	body,
	canvas,
	caption,
	center,
	cite,
	code,
	dd,
	del,
	details,
	dfn,
	div,
	dl,
	dt,
	em,
	embed,
	fieldset,
	figcaption,
	figure,
	footer,
	form,
	h1,
	h2,
	h3,
	h4,
	h5,
	h6,
	header,
	hgroup,
	html,
	i,
	iframe,
	img,
	ins,
	kbd,
	label,
	legend,
	li,
	mark,
	menu,
	nav,
	object,
	ol,
	output,
	p,
	pre,
	q,
	ruby,
	s,
	samp,
	section,
	small,
	span,
	strike,
	strong,
	sub,
	summary,
	sup,
	table,
	tbody,
	td,
	tfoot,
	th,
	thead,
	time,
	tr,
	tt,
	u,
	ul,
	var,
	video {
		margin: 0;
		padding: 0;
		border: 0;
		font-size: 100%;
		font: inherit;
		vertical-align: initial
	}

	article,
	aside,
	details,
	figcaption,
	figure,
	footer,
	header,
	hgroup,
	menu,
	nav,
	section {
		display: block
	}

	body {
		line-height: 1
	}

	ol,
	ul {
		list-style: none
	}

	blockquote,
	q {
		quotes: none
	}

	blockquote:after,
	blockquote:before,
	q:after,
	q:before {
		content: "";
		content: none
	}

	table {
		border-collapse: collapse;
		border-spacing: 0
	}

	.nice-form-group {
		--nf-input-size: 1rem;
		--nf-input-font-size: calc(var(--nf-input-size)*0.875);
		--nf-small-font-size: calc(var(--nf-input-size)*0.875);
		--nf-input-font-family: inherit;
		--nf-label-font-family: inherit;
		--nf-input-color: #20242f;
		--nf-input-border-radius: 0.25rem;
		--nf-input-placeholder-color: #929292;
		--nf-input-border-color: #c0c4c9;
		--nf-input-border-width: 1px;
		--nf-input-border-style: solid;
		--nf-input-border-bottom-width: 2px;
		--nf-input-focus-border-color: #3b4ce2;
		--nf-input-background-color: #f9fafb;
		--nf-invalid-input-border-color: var(--nf-input-border-color);
		--nf-invalid-input-background-color: var(--nf-input-background-color);
		--nf-invalid-input-color: var(--nf-input-color);
		--nf-valid-input-border-color: var(--nf-input-border-color);
		--nf-valid-input-background-color: var(--nf-input-background-color);
		--nf-valid-input-color: inherit;
		--nf-invalid-input-border-bottom-color: red;
		--nf-valid-input-border-bottom-color: green;
		--nf-label-font-size: var(--nf-small-font-size);
		--nf-label-color: #374151;
		--nf-label-font-weight: 500;
		--nf-slider-track-background: #dfdfdf;
		--nf-slider-track-height: 0.25rem;
		--nf-slider-thumb-size: calc(var(--nf-slider-track-height)*4);
		--nf-slider-track-border-radius: var(--nf-slider-track-height);
		--nf-slider-thumb-border-width: 2px;
		--nf-slider-thumb-border-focus-width: 1px;
		--nf-slider-thumb-border-color: #fff;
		--nf-slider-thumb-background: var(--nf-input-focus-border-color);
		display: block;
		margin-top: calc(var(--nf-input-size)*1.5);
		line-height: 1;
		white-space: nowrap;
		--switch-orb-size: var(--nf-input-size);
		--switch-orb-offset: calc(var(--nf-input-border-width)*2);
		--switch-width: calc(var(--nf-input-size)*2.5);
		--switch-height: calc(var(--nf-input-size)*1.25 + var(--switch-orb-offset))
	}

	.nice-form-group>label {
		font-weight: var(--nf-label-font-weight);
		display: block;
		color: var(--nf-label-color);
		font-size: var(--nf-label-font-size);
		font-family: var(--nf-label-font-family);
		margin-bottom: calc(var(--nf-input-size)/2);
		white-space: normal
	}

	.nice-form-group>label+small {
		font-style: normal
	}

	.nice-form-group small {
		font-family: var(--nf-input-font-family);
		display: block;
		font-weight: 400;
		opacity: .75;
		font-size: var(--nf-small-font-size);
		margin-bottom: calc(var(--nf-input-size)*0.75)
	}

	.nice-form-group small:last-child {
		margin-bottom: 0
	}

	.nice-form-group>legend {
		font-weight: var(--nf-label-font-weight);
		display: block;
		color: var(--nf-label-color);
		font-size: var(--nf-label-font-size);
		font-family: var(--nf-label-font-family);
		margin-bottom: calc(var(--nf-input-size)/5)
	}

	.nice-form-group>.nice-form-group {
		margin-top: calc(var(--nf-input-size)/2)
	}

	.nice-form-group>input[type=checkbox],
	.nice-form-group>input[type=date],
	.nice-form-group>input[type=email],
	.nice-form-group>input[type=month],
	.nice-form-group>input[type=number],
	.nice-form-group>input[type=password],
	.nice-form-group>input[type=radio],
	.nice-form-group>input[type=search],
	.nice-form-group>input[type=tel],
	.nice-form-group>input[type=text],
	.nice-form-group>input[type=time],
	.nice-form-group>input[type=url],
	.nice-form-group>input[type=week],
	.nice-form-group>select,
	.nice-form-group>textarea {
		background: var(--nf-input-background-color);
		font-family: inherit;
		font-size: var(--nf-input-font-size);
		border-bottom-width: var(--nf-input-border-width);
		font-family: var(--nf-input-font-family);
		box-shadow: none;
		border-radius: var(--nf-input-border-radius);
		border: var(--nf-input-border-width) var(--nf-input-border-style) var(--nf-input-border-color);
		border-bottom: var(--nf-input-border-bottom-width) var(--nf-input-border-style) var(--nf-input-border-color);
		color: var(--nf-input-color);
		width: 100%;
		padding: calc(var(--nf-input-size)*0.75);
		height: calc(var(--nf-input-size)*2.75);
		line-height: normal;
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		transition: all .15s ease-out;
		--icon-padding: calc(var(--nf-input-size)*2.25);
		--icon-background-offset: calc(var(--nf-input-size)*0.75)
	}

	.nice-form-group>input[type=checkbox]:required:not(:placeholder-shown):invalid,
	.nice-form-group>input[type=date]:required:not(:placeholder-shown):invalid,
	.nice-form-group>input[type=email]:required:not(:placeholder-shown):invalid,
	.nice-form-group>input[type=month]:required:not(:placeholder-shown):invalid,
	.nice-form-group>input[type=number]:required:not(:placeholder-shown):invalid,
	.nice-form-group>input[type=password]:required:not(:placeholder-shown):invalid,
	.nice-form-group>input[type=radio]:required:not(:placeholder-shown):invalid,
	.nice-form-group>input[type=search]:required:not(:placeholder-shown):invalid,
	.nice-form-group>input[type=tel]:required:not(:placeholder-shown):invalid,
	.nice-form-group>input[type=text]:required:not(:placeholder-shown):invalid,
	.nice-form-group>input[type=time]:required:not(:placeholder-shown):invalid,
	.nice-form-group>input[type=url]:required:not(:placeholder-shown):invalid,
	.nice-form-group>input[type=week]:required:not(:placeholder-shown):invalid,
	.nice-form-group>select:required:not(:placeholder-shown):invalid,
	.nice-form-group>textarea:required:not(:placeholder-shown):invalid {
		background-color: var(--nf-invalid-input-background-color);
		border-bottom-color: var(--nf-valid-input-border-color);
		border-color: var(--nf-valid-input-border-color) var(--nf-valid-input-border-color) var(--nf-invalid-input-border-bottom-color);
		color: var(--nf-invalid-input-color)
	}

	.nice-form-group>input[type=checkbox]:required:not(:placeholder-shown):invalid:focus,
	.nice-form-group>input[type=date]:required:not(:placeholder-shown):invalid:focus,
	.nice-form-group>input[type=email]:required:not(:placeholder-shown):invalid:focus,
	.nice-form-group>input[type=month]:required:not(:placeholder-shown):invalid:focus,
	.nice-form-group>input[type=number]:required:not(:placeholder-shown):invalid:focus,
	.nice-form-group>input[type=password]:required:not(:placeholder-shown):invalid:focus,
	.nice-form-group>input[type=radio]:required:not(:placeholder-shown):invalid:focus,
	.nice-form-group>input[type=search]:required:not(:placeholder-shown):invalid:focus,
	.nice-form-group>input[type=tel]:required:not(:placeholder-shown):invalid:focus,
	.nice-form-group>input[type=text]:required:not(:placeholder-shown):invalid:focus,
	.nice-form-group>input[type=time]:required:not(:placeholder-shown):invalid:focus,
	.nice-form-group>input[type=url]:required:not(:placeholder-shown):invalid:focus,
	.nice-form-group>input[type=week]:required:not(:placeholder-shown):invalid:focus,
	.nice-form-group>select:required:not(:placeholder-shown):invalid:focus,
	.nice-form-group>textarea:required:not(:placeholder-shown):invalid:focus {
		background-color: var(--nf-input-background-color);
		border-color: var(--nf-input-border-color);
		color: var(--nf-input-color)
	}

	.nice-form-group>input[type=checkbox]:required:not(:placeholder-shown):valid,
	.nice-form-group>input[type=date]:required:not(:placeholder-shown):valid,
	.nice-form-group>input[type=email]:required:not(:placeholder-shown):valid,
	.nice-form-group>input[type=month]:required:not(:placeholder-shown):valid,
	.nice-form-group>input[type=number]:required:not(:placeholder-shown):valid,
	.nice-form-group>input[type=password]:required:not(:placeholder-shown):valid,
	.nice-form-group>input[type=radio]:required:not(:placeholder-shown):valid,
	.nice-form-group>input[type=search]:required:not(:placeholder-shown):valid,
	.nice-form-group>input[type=tel]:required:not(:placeholder-shown):valid,
	.nice-form-group>input[type=text]:required:not(:placeholder-shown):valid,
	.nice-form-group>input[type=time]:required:not(:placeholder-shown):valid,
	.nice-form-group>input[type=url]:required:not(:placeholder-shown):valid,
	.nice-form-group>input[type=week]:required:not(:placeholder-shown):valid,
	.nice-form-group>select:required:not(:placeholder-shown):valid,
	.nice-form-group>textarea:required:not(:placeholder-shown):valid {
		background-color: var(--nf-valid-input-background-color);
		border-bottom-color: var(--nf-valid-input-border-color);
		border-color: var(--nf-valid-input-border-color) var(--nf-valid-input-border-color) var(--nf-valid-input-border-bottom-color);
		color: var(--nf-valid-input-color)
	}

	.nice-form-group>input[type=checkbox]:disabled,
	.nice-form-group>input[type=date]:disabled,
	.nice-form-group>input[type=email]:disabled,
	.nice-form-group>input[type=month]:disabled,
	.nice-form-group>input[type=number]:disabled,
	.nice-form-group>input[type=password]:disabled,
	.nice-form-group>input[type=radio]:disabled,
	.nice-form-group>input[type=search]:disabled,
	.nice-form-group>input[type=tel]:disabled,
	.nice-form-group>input[type=text]:disabled,
	.nice-form-group>input[type=time]:disabled,
	.nice-form-group>input[type=url]:disabled,
	.nice-form-group>input[type=week]:disabled,
	.nice-form-group>select:disabled,
	.nice-form-group>textarea:disabled {
		cursor: not-allowed;
		opacity: .75
	}

	.nice-form-group>input[type=checkbox]::-webkit-input-placeholder,
	.nice-form-group>input[type=date]::-webkit-input-placeholder,
	.nice-form-group>input[type=email]::-webkit-input-placeholder,
	.nice-form-group>input[type=month]::-webkit-input-placeholder,
	.nice-form-group>input[type=number]::-webkit-input-placeholder,
	.nice-form-group>input[type=password]::-webkit-input-placeholder,
	.nice-form-group>input[type=radio]::-webkit-input-placeholder,
	.nice-form-group>input[type=search]::-webkit-input-placeholder,
	.nice-form-group>input[type=tel]::-webkit-input-placeholder,
	.nice-form-group>input[type=text]::-webkit-input-placeholder,
	.nice-form-group>input[type=time]::-webkit-input-placeholder,
	.nice-form-group>input[type=url]::-webkit-input-placeholder,
	.nice-form-group>input[type=week]::-webkit-input-placeholder,
	.nice-form-group>select::-webkit-input-placeholder,
	.nice-form-group>textarea::-webkit-input-placeholder {
		color: var(--nf-input-placeholder-color);
		letter-spacing: 0
	}

	.nice-form-group>input[type=checkbox]:-ms-input-placeholder,
	.nice-form-group>input[type=date]:-ms-input-placeholder,
	.nice-form-group>input[type=email]:-ms-input-placeholder,
	.nice-form-group>input[type=month]:-ms-input-placeholder,
	.nice-form-group>input[type=number]:-ms-input-placeholder,
	.nice-form-group>input[type=password]:-ms-input-placeholder,
	.nice-form-group>input[type=radio]:-ms-input-placeholder,
	.nice-form-group>input[type=search]:-ms-input-placeholder,
	.nice-form-group>input[type=tel]:-ms-input-placeholder,
	.nice-form-group>input[type=text]:-ms-input-placeholder,
	.nice-form-group>input[type=time]:-ms-input-placeholder,
	.nice-form-group>input[type=url]:-ms-input-placeholder,
	.nice-form-group>input[type=week]:-ms-input-placeholder,
	.nice-form-group>select:-ms-input-placeholder,
	.nice-form-group>textarea:-ms-input-placeholder {
		color: var(--nf-input-placeholder-color);
		letter-spacing: 0
	}

	.nice-form-group>input[type=checkbox]:-moz-placeholder,
	.nice-form-group>input[type=checkbox]::-moz-placeholder,
	.nice-form-group>input[type=date]:-moz-placeholder,
	.nice-form-group>input[type=date]::-moz-placeholder,
	.nice-form-group>input[type=email]:-moz-placeholder,
	.nice-form-group>input[type=email]::-moz-placeholder,
	.nice-form-group>input[type=month]:-moz-placeholder,
	.nice-form-group>input[type=month]::-moz-placeholder,
	.nice-form-group>input[type=number]:-moz-placeholder,
	.nice-form-group>input[type=number]::-moz-placeholder,
	.nice-form-group>input[type=password]:-moz-placeholder,
	.nice-form-group>input[type=password]::-moz-placeholder,
	.nice-form-group>input[type=radio]:-moz-placeholder,
	.nice-form-group>input[type=radio]::-moz-placeholder,
	.nice-form-group>input[type=search]:-moz-placeholder,
	.nice-form-group>input[type=search]::-moz-placeholder,
	.nice-form-group>input[type=tel]:-moz-placeholder,
	.nice-form-group>input[type=tel]::-moz-placeholder,
	.nice-form-group>input[type=text]:-moz-placeholder,
	.nice-form-group>input[type=text]::-moz-placeholder,
	.nice-form-group>input[type=time]:-moz-placeholder,
	.nice-form-group>input[type=time]::-moz-placeholder,
	.nice-form-group>input[type=url]:-moz-placeholder,
	.nice-form-group>input[type=url]::-moz-placeholder,
	.nice-form-group>input[type=week]:-moz-placeholder,
	.nice-form-group>input[type=week]::-moz-placeholder,
	.nice-form-group>select:-moz-placeholder,
	.nice-form-group>select::-moz-placeholder,
	.nice-form-group>textarea:-moz-placeholder,
	.nice-form-group>textarea::-moz-placeholder {
		color: var(--nf-input-placeholder-color);
		letter-spacing: 0
	}

	.nice-form-group>input[type=checkbox]:focus,
	.nice-form-group>input[type=date]:focus,
	.nice-form-group>input[type=email]:focus,
	.nice-form-group>input[type=month]:focus,
	.nice-form-group>input[type=number]:focus,
	.nice-form-group>input[type=password]:focus,
	.nice-form-group>input[type=radio]:focus,
	.nice-form-group>input[type=search]:focus,
	.nice-form-group>input[type=tel]:focus,
	.nice-form-group>input[type=text]:focus,
	.nice-form-group>input[type=time]:focus,
	.nice-form-group>input[type=url]:focus,
	.nice-form-group>input[type=week]:focus,
	.nice-form-group>select:focus,
	.nice-form-group>textarea:focus {
		outline: none;
		border-color: var(--nf-input-focus-border-color)
	}

	.nice-form-group>input[type=checkbox]+small,
	.nice-form-group>input[type=date]+small,
	.nice-form-group>input[type=email]+small,
	.nice-form-group>input[type=month]+small,
	.nice-form-group>input[type=number]+small,
	.nice-form-group>input[type=password]+small,
	.nice-form-group>input[type=radio]+small,
	.nice-form-group>input[type=search]+small,
	.nice-form-group>input[type=tel]+small,
	.nice-form-group>input[type=text]+small,
	.nice-form-group>input[type=time]+small,
	.nice-form-group>input[type=url]+small,
	.nice-form-group>input[type=week]+small,
	.nice-form-group>select+small,
	.nice-form-group>textarea+small {
		margin-top: .5rem
	}

	.nice-form-group>input[type=checkbox].icon-left,
	.nice-form-group>input[type=date].icon-left,
	.nice-form-group>input[type=email].icon-left,
	.nice-form-group>input[type=month].icon-left,
	.nice-form-group>input[type=number].icon-left,
	.nice-form-group>input[type=password].icon-left,
	.nice-form-group>input[type=radio].icon-left,
	.nice-form-group>input[type=search].icon-left,
	.nice-form-group>input[type=tel].icon-left,
	.nice-form-group>input[type=text].icon-left,
	.nice-form-group>input[type=time].icon-left,
	.nice-form-group>input[type=url].icon-left,
	.nice-form-group>input[type=week].icon-left,
	.nice-form-group>select.icon-left,
	.nice-form-group>textarea.icon-left {
		background-position: left var(--icon-background-offset) bottom 50%;
		padding-left: var(--icon-padding);
		background-size: var(--nf-input-size)
	}

	.nice-form-group>input[type=checkbox].icon-right,
	.nice-form-group>input[type=date].icon-right,
	.nice-form-group>input[type=email].icon-right,
	.nice-form-group>input[type=month].icon-right,
	.nice-form-group>input[type=number].icon-right,
	.nice-form-group>input[type=password].icon-right,
	.nice-form-group>input[type=radio].icon-right,
	.nice-form-group>input[type=search].icon-right,
	.nice-form-group>input[type=tel].icon-right,
	.nice-form-group>input[type=text].icon-right,
	.nice-form-group>input[type=time].icon-right,
	.nice-form-group>input[type=url].icon-right,
	.nice-form-group>input[type=week].icon-right,
	.nice-form-group>select.icon-right,
	.nice-form-group>textarea.icon-right {
		background-position: right var(--icon-background-offset) bottom 50%;
		padding-right: var(--icon-padding);
		background-size: var(--nf-input-size)
	}

	.nice-form-group>input[type=checkbox]:-webkit-autofill,
	.nice-form-group>input[type=date]:-webkit-autofill,
	.nice-form-group>input[type=email]:-webkit-autofill,
	.nice-form-group>input[type=month]:-webkit-autofill,
	.nice-form-group>input[type=number]:-webkit-autofill,
	.nice-form-group>input[type=password]:-webkit-autofill,
	.nice-form-group>input[type=radio]:-webkit-autofill,
	.nice-form-group>input[type=search]:-webkit-autofill,
	.nice-form-group>input[type=tel]:-webkit-autofill,
	.nice-form-group>input[type=text]:-webkit-autofill,
	.nice-form-group>input[type=time]:-webkit-autofill,
	.nice-form-group>input[type=url]:-webkit-autofill,
	.nice-form-group>input[type=week]:-webkit-autofill,
	.nice-form-group>select:-webkit-autofill,
	.nice-form-group>textarea:-webkit-autofill {
		padding: calc(var(--nf-input-size)*0.75) !important
	}

	.nice-form-group>input[type=search]:placeholder-shown {
		background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%236B7280' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-search'%3E%3Ccircle cx='11' cy='11' r='8'/%3E%3Cpath d='M21 21l-4.35-4.35'/%3E%3C/svg%3E");
		background-position: left calc(var(--nf-input-size)*0.75) bottom 50%;
		padding-left: calc(var(--nf-input-size)*2.25);
		background-size: var(--nf-input-size);
		background-repeat: no-repeat
	}

	.nice-form-group>input[type=search]::-webkit-search-cancel-button {
		-webkit-appearance: none;
		width: var(--nf-input-size);
		height: var(--nf-input-size);
		background: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%236B7280' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-x'%3E%3Cpath d='M18 6L6 18M6 6l12 12'/%3E%3C/svg%3E")
	}

	.nice-form-group>input[type=search]:focus {
		padding-left: calc(var(--nf-input-size)*0.75);
		background-position: left calc(var(--nf-input-size)*-1) bottom 50%
	}

	.nice-form-group>input[type=email][class^=icon] {
		background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%236B7280' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-at-sign'%3E%3Ccircle cx='12' cy='12' r='4'/%3E%3Cpath d='M16 8v5a3 3 0 006 0v-1a10 10 0 10-3.92 7.94'/%3E%3C/svg%3E");
		background-repeat: no-repeat
	}

	.nice-form-group>input[type=tel][class^=icon] {
		background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%236B7280' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-phone'%3E%3Cpath d='M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z'/%3E%3C/svg%3E");
		background-repeat: no-repeat
	}

	.nice-form-group>input[type=url][class^=icon] {
		background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%236B7280' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-link'%3E%3Cpath d='M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71'/%3E%3Cpath d='M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71'/%3E%3C/svg%3E");
		background-repeat: no-repeat
	}

	.nice-form-group>input[type=password] {
		letter-spacing: 2px
	}

	.nice-form-group>input[type=password][class^=icon] {
		background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%236B7280' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-lock'%3E%3Crect x='3' y='11' width='18' height='11' rx='2' ry='2'/%3E%3Cpath d='M7 11V7a5 5 0 0110 0v4'/%3E%3C/svg%3E");
		background-repeat: no-repeat
	}

	.nice-form-group>input[type=range] {
		-webkit-appearance: none;
		width: 100%;
		cursor: pointer
	}

	.nice-form-group>input[type=range]:focus {
		outline: none
	}

	.nice-form-group>input[type=range]::-webkit-slider-runnable-track {
		width: 100%;
		height: var(--nf-slider-track-height);
		background: var(--nf-slider-track-background);
		border-radius: var(--nf-slider-track-border-radius)
	}

	.nice-form-group>input[type=range]::-moz-range-track {
		width: 100%;
		height: var(--nf-slider-track-height);
		background: var(--nf-slider-track-background);
		border-radius: var(--nf-slider-track-border-radius)
	}

	.nice-form-group>input[type=range]::-webkit-slider-thumb {
		height: var(--nf-slider-thumb-size);
		width: var(--nf-slider-thumb-size);
		border-radius: var(--nf-slider-thumb-size);
		background: var(--nf-slider-thumb-background);
		border: 0;
		border: var(--nf-slider-thumb-border-width) solid var(--nf-slider-thumb-border-color);
		-webkit-appearance: none;
		appearance: none;
		margin-top: calc(var(--nf-slider-track-height)*0.5 - var(--nf-slider-thumb-size)*0.5)
	}

	.nice-form-group>input[type=range]::-moz-range-thumb {
		height: var(--nf-slider-thumb-size);
		width: var(--nf-slider-thumb-size);
		border-radius: var(--nf-slider-thumb-size);
		background: var(--nf-slider-thumb-background);
		border: 0;
		border: var(--nf-slider-thumb-border-width) solid var(--nf-slider-thumb-border-color);
		-moz-appearance: none;
		appearance: none;
		box-sizing: border-box
	}

	.nice-form-group>input[type=range]:focus::-webkit-slider-thumb {
		box-shadow: 0 0 0 var(--nf-slider-thumb-border-focus-width) var(--nf-slider-thumb-background)
	}

	.nice-form-group>input[type=range]:focus::-moz-range-thumb {
		box-shadow: 0 0 0 var(--nf-slider-thumb-border-focus-width) var(--nf-slider-thumb-background)
	}

	.nice-form-group>input[type=color] {
		border: var(--nf-input-border-width) solid var(--nf-input-border-color);
		border-bottom-width: var(--nf-input-border-bottom-width);
		height: calc(var(--nf-input-size)*2);
		border-radius: var(--nf-input-border-radius);
		padding: calc(var(--nf-input-border-width)*2)
	}

	.nice-form-group>input[type=color]:focus {
		outline: none;
		border-color: var(--nf-input-focus-border-color)
	}

	.nice-form-group>input[type=color]::-webkit-color-swatch-wrapper {
		padding: 5%
	}

	.nice-form-group>input[type=color]::-moz-color-swatch {
		border-radius: calc(var(--nf-input-border-radius)/2);
		border: none
	}

	.nice-form-group>input[type=color]::-webkit-color-swatch {
		border-radius: calc(var(--nf-input-border-radius)/2);
		border: none
	}

	.nice-form-group>input[type=number] {
		width: auto
	}

	.nice-form-group>input[type=date],
	.nice-form-group>input[type=month],
	.nice-form-group>input[type=week] {
		min-width: 14em;
		background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%236B7280' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-calendar'%3E%3Crect x='3' y='4' width='18' height='18' rx='2' ry='2'/%3E%3Cpath d='M16 2v4M8 2v4M3 10h18'/%3E%3C/svg%3E")
	}

	.nice-form-group>input[type=time] {
		min-width: 6em;
		background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%236B7280' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-clock'%3E%3Ccircle cx='12' cy='12' r='10'/%3E%3Cpath d='M12 6v6l4 2'/%3E%3C/svg%3E")
	}

	.nice-form-group>input[type=date],
	.nice-form-group>input[type=month],
	.nice-form-group>input[type=time],
	.nice-form-group>input[type=week] {
		background-position: right calc(var(--nf-input-size)*0.75) bottom 50%;
		background-repeat: no-repeat;
		background-size: var(--nf-input-size);
		width: auto
	}

	.nice-form-group>input[type=date]::-webkit-calendar-picker-indicator,
	.nice-form-group>input[type=date]::-webkit-inner-spin-button,
	.nice-form-group>input[type=month]::-webkit-calendar-picker-indicator,
	.nice-form-group>input[type=month]::-webkit-inner-spin-button,
	.nice-form-group>input[type=time]::-webkit-calendar-picker-indicator,
	.nice-form-group>input[type=time]::-webkit-inner-spin-button,
	.nice-form-group>input[type=week]::-webkit-calendar-picker-indicator,
	.nice-form-group>input[type=week]::-webkit-inner-spin-button {
		-webkit-appearance: none;
		cursor: pointer;
		opacity: 0
	}

	@-moz-document url-prefix() {

		.nice-form-group>input[type=date],
		.nice-form-group>input[type=month],
		.nice-form-group>input[type=time],
		.nice-form-group>input[type=week] {
			min-width: auto;
			width: auto;
			background-image: none
		}
	}

	.nice-form-group>textarea {
		height: auto
	}

	.nice-form-group>input[type=checkbox],
	.nice-form-group>input[type=radio] {
		width: var(--nf-input-size);
		height: var(--nf-input-size);
		padding: inherit;
		margin: 0;
		display: inline-block;
		vertical-align: top;
		border-radius: calc(var(--nf-input-border-radius)/2);
		border-width: var(--nf-input-border-width);
		cursor: pointer;
		background-position: 50%
	}

	.nice-form-group>input[type=checkbox]:focus:not(:checked),
	.nice-form-group>input[type=radio]:focus:not(:checked) {
		border: var(--nf-input-border-width) solid var(--nf-input-focus-border-color);
		outline: none
	}

	.nice-form-group>input[type=checkbox]:hover,
	.nice-form-group>input[type=radio]:hover {
		border: var(--nf-input-border-width) solid var(--nf-input-focus-border-color)
	}

	.nice-form-group>input[type=checkbox]+label,
	.nice-form-group>input[type=radio]+label {
		display: inline-block;
		margin-bottom: 0;
		padding-left: calc(var(--nf-input-size)/2.5);
		font-weight: 400;
		-webkit-user-select: none;
		user-select: none;
		cursor: pointer;
		max-width: calc(100% - var(--nf-input-size)*2);
		line-height: normal
	}

	.nice-form-group>input[type=checkbox]+label>small,
	.nice-form-group>input[type=radio]+label>small {
		margin-top: calc(var(--nf-input-size)/4)
	}

	.nice-form-group>input[type=checkbox]:checked {
		background: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%23FFF' stroke-width='3' stroke-linecap='round' stroke-linejoin='round' class='feather feather-check'%3E%3Cpath d='M20 6L9 17l-5-5'/%3E%3C/svg%3E") no-repeat 50%/85%;
		background-color: var(--nf-input-focus-border-color);
		border-color: var(--nf-input-focus-border-color)
	}

	.nice-form-group>input[type=radio] {
		border-radius: 100%
	}

	.nice-form-group>input[type=radio]:checked {
		background-color: var(--nf-input-focus-border-color);
		border-color: var(--nf-input-focus-border-color);
		box-shadow: inset 0 0 0 3px #fff
	}

	.nice-form-group>input[type=checkbox].switch {
		width: var(--switch-width);
		height: var(--switch-height);
		border-radius: var(--switch-height);
		position: relative
	}

	.nice-form-group>input[type=checkbox].switch:after {
		background: var(--nf-input-border-color);
		border-radius: var(--switch-orb-size);
		height: var(--switch-orb-size);
		left: var(--switch-orb-offset);
		position: absolute;
		top: 50%;
		-webkit-transform: translateY(-50%);
		transform: translateY(-50%);
		width: var(--switch-orb-size);
		content: "";
		transition: all .2s ease-out
	}

	.nice-form-group>input[type=checkbox].switch+label {
		margin-top: calc(var(--switch-height)/8)
	}

	.nice-form-group>input[type=checkbox].switch:checked {
		background: none;
		background-position: 0 0;
		background-color: var(--nf-input-focus-border-color)
	}

	.nice-form-group>input[type=checkbox].switch:checked:after {
		-webkit-transform: translateY(-50%) translateX(calc(var(--switch-width)/2 - var(--switch-orb-offset)));
		transform: translateY(-50%) translateX(calc(var(--switch-width)/2 - var(--switch-orb-offset)));
		background: #fff
	}

	.nice-form-group>input[type=file] {
		background: rgba(0, 0, 0, .025);
		padding: var(--nf-input-size);
		display: block;
		width: 100%;
		border-radius: var(--nf-input-border-radius);
		border: 1px dashed var(--nf-input-border-color);
		outline: none;
		cursor: pointer
	}

	.nice-form-group>input[type=file]:focus,
	.nice-form-group>input[type=file]:hover {
		border-color: var(--nf-input-focus-border-color)
	}

	.nice-form-group>input[type=file]::file-selector-button {
		background: var(--nf-input-focus-border-color);
		border: 0;
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		padding: .5rem;
		border-radius: var(--nf-input-border-radius);
		color: #fff;
		margin-right: 1rem;
		outline: none;
		font-family: var(--nf-input-font-family);
		cursor: pointer
	}

	.nice-form-group>input[type=file]::-webkit-file-upload-button {
		background: var(--nf-input-focus-border-color);
		border: 0;
		-webkit-appearance: none;
		appearance: none;
		padding: .5rem;
		border-radius: var(--nf-input-border-radius);
		color: #fff;
		margin-right: 1rem;
		outline: none;
		font-family: var(--nf-input-font-family);
		cursor: pointer
	}

	.nice-form-group>select {
		background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%236B7280' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-down'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
		background-position: right calc(var(--nf-input-size)*0.75) bottom 50%;
		background-repeat: no-repeat;
		background-size: var(--nf-input-size)
	}

	*,
	:after,
	:before {
		box-sizing: inherit
	}

	html {
		font-size: 16px;
		box-sizing: border-box
	}

	body {
		background: #f3f0e7;
		font-family: Roboto, sans-serif;
		color: #4b5563;
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale
	}

	.demo-page {
		margin: 0 auto;
		display: -webkit-flex;
		display: flex;
		max-width: 55em
	}

	.demo-page .demo-page-navigation {
		width: 18em;
		padding: 2em 1em
	}

	@media only screen and (max-width:750px) {
		.demo-page .demo-page-navigation {
			display: none
		}
	}

	.demo-page .demo-page-navigation nav {
		position: -webkit-sticky;
		position: sticky;
		top: 2em;
		background: #fff;
		padding: .5em;
		border-radius: .75rem;
		box-shadow: 0 10px 15px -3px rgba(0, 0, 0, .1), 0 4px 6px -2px rgba(0, 0, 0, .05)
	}

	.demo-page .demo-page-navigation a {
		display: -webkit-flex;
		display: flex;
		padding: .75em 1em;
		text-decoration: none;
		border-radius: .25em;
		color: #374151;
		-webkit-align-items: center;
		align-items: center
	}

	.demo-page .demo-page-navigation a:hover {
		background: #f3f4f6
	}

	.demo-page .demo-page-navigation a svg {
		width: 1.25em;
		height: 1.25em;
		margin-right: 1em;
		color: #1f2937
	}

	.demo-page .demo-page-content {
		padding: 2em 1em;
		max-width: 100%
	}

	@media only screen and (min-width:750px) {
		.demo-page .demo-page-content {
			width: calc(100% - 18em)
		}
	}

	footer {
		text-align: center;
		margin: 2.5em 0
	}

	.href-target {
		position: absolute;
		top: -2em
	}

	.to-repo,
	.to-reset {
		display: -webkit-inline-flex;
		display: inline-flex;
		background: #24292e;
		color: #fff;
		border-radius: 5px;
		padding: .5em 1em;
		text-decoration: none;
		-webkit-align-items: center;
		align-items: center;
		transition: background .2s ease-out
	}

	.to-repo:hover,
	.to-reset:hover {
		background: #000
	}

	.to-repo svg,
	.to-reset svg {
		width: 1.125rem;
		height: 1.125rem;
		margin-right: .75em
	}

	.to-reset {
		background: #3b4ce2
	}

	.to-reset:hover {
		background: #2538df
	}

	section {
		background: #fff;
		padding: 2em;
		border-radius: .75rem;
		line-height: 1.6;
		overflow: hidden;
		margin-bottom: 2rem;
		position: relative;
		font-size: .875rem;
		box-shadow: 0 10px 15px -3px rgba(0, 0, 0, .1), 0 4px 6px -2px rgba(0, 0, 0, .05)
	}

	section h1 {
		font-weight: 500;
		font-size: 1.25rem;
		color: #000;
		margin-bottom: .75rem
	}

	section h1 svg {
		width: 1em;
		height: 1em;
		display: inline-block;
		vertical-align: -10%;
		margin-right: .25em
	}

	section h1.package-name {
		font-size: 2rem;
		margin-bottom: .75rem;
		margin-top: -.5rem
	}

	section strong {
		font-weight: 500;
		color: #000
	}

	section p {
		margin: .5rem 0 1.5rem
	}

	section p a {
		text-decoration: none;
		font-weight: 500;
		color: #3b4ce2
	}

	section p:last-child {
		margin-bottom: 0
	}

	section code {
		font-weight: 500;
		font-family: Consolas, monaco, monospace;
		position: relative;
		z-index: 1;
		margin: 0 2px;
		background: #f3f4f4;
		content: "";
		border-radius: 3px;
		padding: 2px 5px;
		white-space: nowrap
	}

	section ul {
		margin-top: .5em;
		padding-left: 1em;
		list-style-type: disc
	}

	details {
		background: #f1f1f1;
		margin: 2em -2em -2em;
		padding: 1.5em 2em
	}

	details .gist {
		margin-top: 1.5em
	}

	details .toggle-code {
		display: inline-block;
		padding: .5em 1em;
		border-radius: 5px;
		font-size: .875rem;
		background: #10b981;
		top: 1em;
		right: 1em;
		color: #fff;
		font-weight: 500;
		-webkit-user-select: none;
		user-select: none;
		cursor: pointer
	}

	details .toggle-code:hover {
		background: #0ea271
	}

	details .toggle-code svg {
		display: inline-block;
		vertical-align: -15%;
		margin-right: .25em
	}

	details summary {
		outline: none;
		list-style-type: none
	}

	details summary::marker {
		display: none
	}

	details summary::-webkit-details-marker {
		display: none
	}
</style>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<div class="demo-page">
		<!-- <div class="demo-page-navigation">
			<nav>
				<ul>
					<li>
						<a href="#installation">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tool">
								<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" />
							</svg>
							Installation</a>
					</li>
					<li>
						<a href="#structure">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
								<polygon points="12 2 2 7 12 12 22 7 12 2" />
								<polyline points="2 17 12 22 22 17" />
								<polyline points="2 12 12 17 22 12" />
							</svg>
							Structure</a>
					</li>
					<li>
						<a href="#input-types">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify">
								<line x1="21" y1="10" x2="3" y2="10" />
								<line x1="21" y1="6" x2="3" y2="6" />
								<line x1="21" y1="14" x2="3" y2="14" />
								<line x1="21" y1="18" x2="3" y2="18" />
							</svg>
							Input types</a>
					</li>
					<li>
						<a href="#checkbox-and-radio">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square">
								<polyline points="9 11 12 14 22 4" />
								<path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11" />
							</svg>
							Checkbox and Radio</a>
					</li>
					<li>
						<a href="#fieldset">
							<svg xmlns="http://www.w3.org/2000/svg" style="transform: rotate(90deg)" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns">
								<path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18" />
							</svg>
							Fieldset</a>
					</li>

					<li>
						<a href="#icons">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-feather">
								<path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z" />
								<line x1="16" y1="8" x2="2" y2="22" />
								<line x1="17.5" y1="15" x2="9" y2="15" />
							</svg>
							Icons</a>
					</li>
					<li>
						<a href="#validation">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle">
								<path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z" />
								<line x1="12" y1="9" x2="12" y2="13" />
								<line x1="12" y1="17" x2="12.01" y2="17" />
							</svg>
							Validation</a>
					</li>
					<li>
						<a href="#date">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
								<rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
								<line x1="16" y1="2" x2="16" y2="6" />
								<line x1="8" y1="2" x2="8" y2="6" />
								<line x1="3" y1="10" x2="21" y2="10" />
							</svg>
							Date input</a>
					</li>
					<li>
						<a href="#other">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server">
								<rect x="2" y="2" width="20" height="8" rx="2" ry="2" />
								<rect x="2" y="14" width="20" height="8" rx="2" ry="2" />
								<line x1="6" y1="6" x2="6.01" y2="6" />
								<line x1="6" y1="18" x2="6.01" y2="18" />
							</svg>
							Other input types</a>
					</li>
					<li>
						<a href="#reset">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-power">
								<path d="M18.36 6.64a9 9 0 1 1-12.73 0" />
								<line x1="12" y1="2" x2="12" y2="12" />
							</svg>
							Reset only</a>
					</li>
					<li>
						<a href="#customization">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sliders">
								<line x1="4" y1="21" x2="4" y2="14" />
								<line x1="4" y1="10" x2="4" y2="3" />
								<line x1="12" y1="21" x2="12" y2="12" />
								<line x1="12" y1="8" x2="12" y2="3" />
								<line x1="20" y1="21" x2="20" y2="16" />
								<line x1="20" y1="12" x2="20" y2="3" />
								<line x1="1" y1="14" x2="7" y2="14" />
								<line x1="9" y1="8" x2="15" y2="8" />
								<line x1="17" y1="16" x2="23" y2="16" />
							</svg>
							Customization</a>
					</li>
					<li>
						<a href="#contribute">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github">
								<path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22" />
							</svg>
							Contribute</a>
					</li>
				</ul>
			</nav>
		</div> -->
		<main class="demo-page-content">
			<section>
				<div class="href-target" id="intro"></div>
				<h1 class="package-name">nice-forms.css</h1>
				<p>
					I like pretty forms and clean HTML 😄 That's why I created
					<strong>nice-forms.css</strong> to help devs who want to hit the
					ground running, but don't want to stare at default input fields when
					doing so 💩
				</p>
				<strong>In a nutshell:</strong>
				<ul>
					<li>It provides a sensible input styling 'reset'</li>
					<li>Get nice looking forms with zero effort</li>
					<li>Easily customizable with css-variables</li>
					<li>
						Perfect for rapid prototyping or tweak it and make it your own.
					</li>
					<li>No hacks or unnecessary elements, pure semantics</li>
				</ul>
			</section>

			<section>
				<div class="href-target" id="installation"></div>
				<h1>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tool">
						<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" />
					</svg>
					Installation
				</h1>
				<p>
					Import nice-forms.css from <strong>unpkg</strong>
					<br />
					<code>https://unpkg.com/nice-forms.css/nice-forms.css</code>
				</p>
				<p>
					Install via <strong>NPM</strong>
					<br />
					<code> npm install nice-forms.css </code>
				</p>
			</section>

			<section>
				<div class="href-target" id="structure"></div>
				<h1>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
						<polygon points="12 2 2 7 12 12 22 7 12 2" />
						<polyline points="2 17 12 22 22 17" />
						<polyline points="2 12 12 17 22 12" />
					</svg>
					Structure
				</h1>
				<p>
					All you need to do is add the class <code>.nice-form-group</code> to
					get a nice base style for all your input fields. Add a
					<code>small</code> element for additional information, this can be
					below the label or below the field.
				</p>

				<div class="nice-form-group">
					<label>Basic form group</label>
					<input type="text" placeholder="Your name" />
				</div>

				<div class="nice-form-group">
					<label>Basic form group</label>
					<small>With additional information below the label</small>
					<input type="text" placeholder="Your name" />
				</div>

				<div class="nice-form-group">
					<label>My form group label</label>
					<input type="text" placeholder="Your name" />
					<small>Or additional text below</small>
				</div>

				<details>
					<summary>
						<div class="toggle-code">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code">
								<polyline points="16 18 22 12 16 6" />
								<polyline points="8 6 2 12 8 18" />
							</svg>
							Toggle code
						</div>
					</summary>
					<script src="https://gist.github.com/nielsVoogt/a00c2c8b6b7acfacce6d50926379e722.js"></script>
				</details>
			</section>

			<section>
				<div class="href-target" id="input-types"></div>
				<h1>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify">
						<line x1="21" y1="10" x2="3" y2="10" />
						<line x1="21" y1="6" x2="3" y2="6" />
						<line x1="21" y1="14" x2="3" y2="14" />
						<line x1="21" y1="18" x2="3" y2="18" />
					</svg>
					Input types
				</h1>
				<p>All available input types are included</p>

				<div class="nice-form-group">
					<label>Text</label>
					<input type="text" placeholder="Your name" value="" />
				</div>

				<div class="nice-form-group">
					<label>Email</label>
					<input type="email" placeholder="Your email" value="" />
				</div>

				<div class="nice-form-group">
					<label>Phonenumber</label>
					<input type="tel" placeholder="Your phonenumber" value="" />
				</div>

				<div class="nice-form-group">
					<label>Url</label>
					<input type="url" placeholder="www.google.com" value="" />
				</div>

				<div class="nice-form-group">
					<label>Password</label>
					<input type="password" placeholder="Your password" />
				</div>

				<div class="nice-form-group">
					<label>Search</label>
					<input type="search" placeholder="Search all the things" value="" />
				</div>

				<div class="nice-form-group">
					<label>Disabled field</label>
					<input type="text" disabled placeholder="Your name" value="" />
				</div>
				<details>
					<summary>
						<div class="toggle-code">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code">
								<polyline points="16 18 22 12 16 6" />
								<polyline points="8 6 2 12 8 18" />
							</svg>
							Toggle code
						</div>
					</summary>
					<script src="https://gist.github.com/nielsVoogt/e25c9c8f2b8456bbd1239b775d21333f.js"></script>
				</details>
			</section>

			<section>
				<div class="href-target" id="checkbox-and-radio"></div>
				<h1>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square">
						<polyline points="9 11 12 14 22 4" />
						<path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11" />
					</svg>
					Checkbox and Radio
				</h1>
				<p>
					These are your basic <code>input[type="radio"]</code> and
					<code>input[type="checkbox"]</code> elements. They have a label and
					can contain secondary information by adding a
					<code>small</code> element inside the <code>label</code>.
				</p>

				<fieldset class="nice-form-group">
					<div class="nice-form-group">
						<input type="radio" name="radio" id="r-1" />
						<label for="r-1">Radio button with label</label>
					</div>

					<div class="nice-form-group">
						<input type="radio" name="radio" id="r-2" />
						<label for="r-2">
							Radio button with label
							<small>Radio can have additional information</small>
						</label>
					</div>
				</fieldset>

				<fieldset class="nice-form-group">
					<div class="nice-form-group">
						<input type="checkbox" id="check-1" />
						<label for="check-1">Checkbox with label</label>
					</div>

					<div class="nice-form-group">
						<input type="checkbox" id="check-2" />
						<label for="check-2">
							Checkbox with label
							<small>I am additional information regarding this field</small>
						</label>
					</div>
				</fieldset>
				<br />
				<p>
					<strong style="display: block">Switch</strong>
					If you want a checkbox to look like a switch, just add a
					<code>.switch</code> class to the checkbox input element
				</p>

				<fieldset class="nice-form-group">
					<div class="nice-form-group">
						<input type="checkbox" id="check-3" class="switch" />
						<label for="check-3">Switch with label</label>
					</div>

					<div class="nice-form-group">
						<input type="checkbox" id="check-4" class="switch" />
						<label for="check-4">
							Switch with label
							<small>I am additional information regarding this field</small>
						</label>
					</div>
				</fieldset>

				<details>
					<summary>
						<div class="toggle-code">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code">
								<polyline points="16 18 22 12 16 6" />
								<polyline points="8 6 2 12 8 18" />
							</svg>
							Toggle code
						</div>
					</summary>
					<script src="https://gist.github.com/nielsVoogt/5c490e16bc1b63bba29d4ee76477f94d.js"></script>
				</details>
			</section>

			<section>
				<div class="href-target" id="fieldset"></div>
				<h1>
					<svg xmlns="http://www.w3.org/2000/svg" style="transform: rotate(90deg)" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns">
						<path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18" />
					</svg>
					Fieldset
				</h1>
				<p>
					The <code>fieldset</code> is used to group multiple related input
					fields. All nested <code>.nice-form-group</code> elements within
					will automaticly have a smaller margin.
				</p>

				<fieldset class="nice-form-group">
					<legend>Select your favorite framework</legend>
					<div class="nice-form-group">
						<input type="radio" name="radio" id="react" />
						<label for="react">React</label>
					</div>

					<div class="nice-form-group">
						<input type="radio" name="radio" id="vue" />
						<label for="vue">Vue</label>
					</div>

					<div class="nice-form-group">
						<input type="radio" name="radio" id="angular" />
						<label for="angular">Angular</label>
					</div>
				</fieldset>

				<fieldset class="nice-form-group">
					<legend>Select your favorite languages</legend>
					<div class="nice-form-group">
						<input type="checkbox" id="css" />
						<label for="css">CSS</label>
					</div>

					<div class="nice-form-group">
						<input type="checkbox" id="html" />
						<label for="html">HTML</label>
					</div>

					<div class="nice-form-group">
						<input type="checkbox" id="js" />
						<label for="js">Javascript</label>
					</div>
				</fieldset>
				<details>
					<summary>
						<div class="toggle-code">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code">
								<polyline points="16 18 22 12 16 6" />
								<polyline points="8 6 2 12 8 18" />
							</svg>
							Toggle code
						</div>
					</summary>
					<script src="https://gist.github.com/nielsVoogt/e513d0df728dfc3fb1f5f9ecae042bf8.js"></script>
				</details>
			</section>

			<section>
				<div class="href-target" id="icons"></div>
				<h1>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-feather">
						<path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z" />
						<line x1="16" y1="8" x2="2" y2="22" />
						<line x1="17.5" y1="15" x2="9" y2="15" />
					</svg>
					Icons
				</h1>
				<p>
					For some input types it could make sense to show a icon. These icons
					are hidden by default but can be added by adding either
					<code>.icon-left</code> or <code>.icon-right</code> to the input
					element. The icons used are from
					<a href="https://feathericons.com/" target="_blank">feathericons</a>.
				</p>

				<div class="nice-form-group">
					<label>Phonenumber</label>
					<input type="tel" placeholder="Your phonenumber" value="" class="icon-left" />
				</div>

				<div class="nice-form-group">
					<label>Url</label>
					<input type="url" placeholder="www.google.com" value="" class="icon-left" />
				</div>

				<div class="nice-form-group">
					<label>Email</label>
					<input type="email" placeholder="Your email" value="" class="icon-left" />
				</div>

				<div class="nice-form-group">
					<label>Password</label>
					<input type="password" placeholder="Your password" class="icon-left" />
				</div>

				<div class="nice-form-group">
					<label>Phonenumber</label>
					<input type="tel" placeholder="Your phonenumber" value="" class="icon-right" />
				</div>

				<div class="nice-form-group">
					<label>Url</label>
					<input type="url" placeholder="www.google.com" value="" class="icon-right" />
				</div>

				<div class="nice-form-group">
					<label>Email</label>
					<input type="email" placeholder="Your email" value="" class="icon-right" />
				</div>

				<div class="nice-form-group">
					<label>Password</label>
					<input type="password" placeholder="Your password" class="icon-right" />
				</div>

				<details>
					<summary>
						<div class="toggle-code">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code">
								<polyline points="16 18 22 12 16 6" />
								<polyline points="8 6 2 12 8 18" />
							</svg>
							Toggle code
						</div>
					</summary>
					<script src="https://gist.github.com/nielsVoogt/8cc4cd8ebc6e81c3f889f1b40037b0cc.js"></script>
				</details>
			</section>

			<section>
				<div class="href-target" id="validation"></div>
				<h1>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle">
						<path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z" />
						<line x1="12" y1="9" x2="12" y2="13" />
						<line x1="12" y1="17" x2="12.01" y2="17" />
					</svg>
					Field Validation
				</h1>
				<p>
					Fields that have a <code>required</code> attribute can be valid or
					invalid based on their value. When a user focuses on a invalid field
					the styling is set back to default.
				</p>

				<div class="nice-form-group">
					<label>Email</label>
					<input type="email" placeholder="Your email" value="this is not a email adress" required />
				</div>

				<div class="nice-form-group">
					<label>Email</label>
					<input type="email" placeholder="Your email" value="nice@forms.com" required />
				</div>
				<details>
					<summary>
						<div class="toggle-code">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code">
								<polyline points="16 18 22 12 16 6" />
								<polyline points="8 6 2 12 8 18" />
							</svg>
							Toggle code
						</div>
					</summary>
					<script src="https://gist.github.com/nielsVoogt/75ebf8c12ca420eb2089312a931ab4cf.js"></script>
				</details>
			</section>

			<section>
				<div class="href-target" id="date"></div>
				<h1>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
						<rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
						<line x1="16" y1="2" x2="16" y2="6" />
						<line x1="8" y1="2" x2="8" y2="6" />
						<line x1="3" y1="10" x2="21" y2="10" />
					</svg>
					Date input
				</h1>
				<p>
					Date fields show icons by default. The <code>month</code>,
					<code>week</code> and <code>date</code> fields have a fixed min
					width set at 14em. <code>time</code> is set at 7em.
				</p>

				<div class="nice-form-group">
					<label>Month</label>
					<input type="month" value="2018-05" />
				</div>

				<div class="nice-form-group">
					<label>Week</label>
					<input type="week" value="2017-W01" />
				</div>

				<div class="nice-form-group">
					<label>Date</label>
					<input type="date" value="2018-07-22" />
				</div>

				<div class="nice-form-group">
					<label>Time</label>
					<input type="time" value="13:30" />
				</div>

				<details>
					<summary>
						<div class="toggle-code">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code">
								<polyline points="16 18 22 12 16 6" />
								<polyline points="8 6 2 12 8 18" />
							</svg>
							Toggle code
						</div>
					</summary>
					<script src="https://gist.github.com/nielsVoogt/2ae279af287e520f545285b0d7c45828.js"></script>
				</details>
			</section>

			<section>
				<div class="href-target" id="other"></div>
				<h1>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server">
						<rect x="2" y="2" width="20" height="8" rx="2" ry="2" />
						<rect x="2" y="14" width="20" height="8" rx="2" ry="2" />
						<line x1="6" y1="6" x2="6.01" y2="6" />
						<line x1="6" y1="18" x2="6.01" y2="18" />
					</svg>
					Other input types
				</h1>

				<div class="nice-form-group">
					<label>Textarea</label>
					<textarea rows="5" placeholder="Your message"></textarea>
				</div>

				<div class="nice-form-group">
					<label>Select</label>
					<select>
						<option>Please select a value</option>
						<option>Option 1</option>
						<option>Option 2</option>
					</select>
				</div>

				<div class="nice-form-group">
					<label>File upload</label>
					<input type="file" />
				</div>

				<div class="nice-form-group">
					<label>Range slider</label>
					<input type="range" min="0" max="15" />
				</div>

				<div class="nice-form-group">
					<label>Number</label>
					<input type="number" placeholder="1234" />
				</div>

				<div class="nice-form-group">
					<label>Color</label>
					<input type="color" />
				</div>

				<details>
					<summary>
						<div class="toggle-code">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code">
								<polyline points="16 18 22 12 16 6" />
								<polyline points="8 6 2 12 8 18" />
							</svg>
							Toggle code
						</div>
					</summary>
					<script src="https://gist.github.com/nielsVoogt/f0480b1a2d0deda02138d61ec5c9f4d0.js"></script>
				</details>
			</section>

			<section>
				<div class="href-target" id="reset"></div>
				<h1>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-power">
						<path d="M18.36 6.64a9 9 0 1 1-12.73 0" />
						<line x1="12" y1="2" x2="12" y2="12" />
					</svg>
					Reset only
				</h1>
				<p>There is also a reset only version available, this version provides styled form fields out of the box without any wrapping class. This does however mean that <code>.icon-left</code>, <code>.icon-right</code> or <code>.switch</code> are not included.</p>
				<p>
					Grab the raw CSS <a href="https://raw.githubusercontent.com/nielsVoogt/nice-forms.css/main/dist/nice-forms-reset.css">here</a>, or import the reset from <strong>unpkg</strong> via
					<code>https://unpkg.com/nice-forms.css@0.1.7/dist/nice-forms-reset.css</code>
				</p>

				<a href="https://nielsvoogt.github.io/nice-forms.css/reset.html" class="to-reset" target="_blank">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link">
						<path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
						<polyline points="15 3 21 3 21 9" />
						<line x1="10" y1="14" x2="21" y2="3" />
					</svg>
					Check out the example page
				</a>
			</section>

			<section>
				<div class="href-target" id="customization"></div>
				<h1>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sliders">
						<line x1="4" y1="21" x2="4" y2="14" />
						<line x1="4" y1="10" x2="4" y2="3" />
						<line x1="12" y1="21" x2="12" y2="12" />
						<line x1="12" y1="8" x2="12" y2="3" />
						<line x1="20" y1="21" x2="20" y2="16" />
						<line x1="20" y1="12" x2="20" y2="3" />
						<line x1="1" y1="14" x2="7" y2="14" />
						<line x1="9" y1="8" x2="15" y2="8" />
						<line x1="17" y1="16" x2="23" y2="16" />
					</svg>
					Customization
				</h1>
				<p>The styling is highly customizable using css variables.</p>
				<script src="https://gist.github.com/nielsVoogt/63daf967a17776d00f5923048cf28daf.js"></script>
			</section>

			<section>
				<div class="href-target" id="contribute"></div>
				<h1>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github">
						<path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22" />
					</svg>
					Contribute
				</h1>
				<p>
					If you encounter a bug on any device or have suggestions for
					improvement, don't hesitate to open a bug report or pull request.
				</p>

				<a href="https://github.com/nielsVoogt/nice-forms.css" class="to-repo" target="_blank">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link">
						<path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
						<polyline points="15 3 21 3 21 9" />
						<line x1="10" y1="14" x2="21" y2="3" />
					</svg>
					Check out the repo
				</a>
			</section>

			<footer>Made with ♥ for CSS</footer>
		</main>
	</div>
</body>

</html>