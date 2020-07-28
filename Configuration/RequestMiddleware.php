<?php
return [
	'frontend' => [
		'my-ext-resolver' => [
			'target' => \My\Middleware\Resolver::class,
			'before' => [
				'typo3/cms-frontend/content-length-headers',
			],
			'after' => [
				'yet-another-middleware-identifier',
			],
		]
	]
];
