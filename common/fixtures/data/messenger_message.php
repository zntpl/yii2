<?php

return [
	'deps' => [
		'user_identity',
		'messenger_chat',
	],
	'collection' => [
		[
			'id' => 1,
			'author_id' => 5,
			'chat_id' => 1,
			'text' => 'Hi, my friend!',
		],
		[
			'id' => 2,
			'author_id' => 1,
			'chat_id' => 1,
			'text' => 'Hello! How are you?',
		],
	],
];