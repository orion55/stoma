UPDATE lady_posts SET post_content = REPLACE (post_content, 'http://black-lady.ru', 'http://black-lady.dev');
UPDATE lady_options SET option_value='http://black-lady.dev' WHERE option_name='siteurl';
UPDATE lady_posts SET guid = REPLACE (guid, 'http://black-lady.ru', 'http://black-lady.dev');