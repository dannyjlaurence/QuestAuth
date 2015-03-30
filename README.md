# QuestAuth
The Authentication Mechanism  for QuestWeb

Steps to use this repo: 

0. Set up a LAMP server (https://www.apachefriends.org/index.html works, if not you need whatever verision of php is compatible with laravel 4.2)
1. Install phpCAS (if you want to use CAS authentication: https://wiki.jasig.org/display/CASC/phpCAS+installation+guide)
2. Get composer: https://getcomposer.org/doc/00-intro.md
3. Copy the questweb folder into the htdocs folder (or wherever you have a virtual host)
4. Run: php composer.phar install
5. Setup a database named "questweb", with a user "serviceAccount", and a random password (make note of the password)
6. Configure a .env.php file in the root of your laravel directory, with the following fields (replace things with the {{}} notation): 
```
<?php

return array(
	'db_name' => "questweb",
	'db_user' => "serviceAccount",
	'db_password' => "{{password from before}}",

	'encryption_key' => "{{some long string}}",
);
```
7. You should be able to go to localhost/questweb/public/