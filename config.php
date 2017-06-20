<?php
/* Админка => login: admin pass: admin */
/* Пути по-умолчанию для поиска файлов */
set_include_path(get_include_path()
					.PATH_SEPARATOR.'application/controllers'
					.PATH_SEPARATOR.'application/models'
					.PATH_SEPARATOR.'application/models/trait'
					.PATH_SEPARATOR.'application/views'
					.PATH_SEPARATOR.'admin');

/* Соединение с БД */
const TYPE = 'mysql';
const HOST_NAME = 'localhost';
const DB_NAME = 'books';
const USER_NAME = 'root';
const PASS = '';

/* Email админа */
const ADMIN_EMAIL = 'admin@site.com';