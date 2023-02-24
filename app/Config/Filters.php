<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
	// Makes reading things below nicer,
	// and simpler to change out script that's used.
	public $aliases = [
		'csrf'     => \CodeIgniter\Filters\CSRF::class,
		'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
		'honeypot' => \CodeIgniter\Filters\Honeypot::class,
		'Filter_auth' => \App\Filters\Filter_auth::class,
		'Filterkaprodi' => \App\Filters\Filter_kaprodi::class,
		'Filterstaff' => \App\Filters\Filter_staff::class,
		'Filterdosen' => \App\Filters\Filter_dosen::class,
	];

	// Always applied before every request
	public $globals = [
		'before' => [
			'Filter_auth' => ['except' => ['auth', 'auth/*','/']],
			'Filterkaprodi' => ['except' => ['auth', 'auth/*', '/']],
			'Filterstaff' => ['except' => ['auth', 'auth/*', '/']],
			'Filterdosen' => ['except' => ['auth', 'auth/*', '/']],
		],
		'after'  => [
			'Filterkaprodi' => ['except' => [
				'home','home/*',
				'kategori', 'kategori/*',
				'dep', 'dep/*',
				'user', 'user/*',
				'file', 'file/*',
				'cari', 'cari/*',
				]],
			'Filterstaff' => ['except' => [
				'home', 'home/*',
				'kategori', 'kategori/*',
				'dep', 'dep/*',
				'file', 'file/*',
				'cari', 'cari/*',
			]],
			'Filterdosen' => ['except' => [
				'home', 'home/*',
				'file', 'file/*',
				'cari', 'cari/*',
			]],
			'toolbar',
		],
	];

	// Works on all of a particular HTTP method
	// (GET, POST, etc) as BEFORE filters only
	//     like: 'post' => ['CSRF', 'throttle'],
	public $methods = [];

	// List filter aliases and any before/after uri patterns
	// that they should run on, like:
	//    'isLoggedIn' => ['before' => ['account/*', 'profiles/*']],
	public $filters = [];
}
