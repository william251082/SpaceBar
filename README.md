

Article Site App
========================

Welcome to the Article Site App- a Web
application to try out PHP/Symfony 4 that you can use to post comments, on space articles.

For details on how to download and get started with Symfony, see the
[Installation][1] chapter of the Symfony Documentation.

What's inside?
--------------

The Symfony Standard Edition is configured with the following defaults:

  * An AppBundle you can use to start coding;

  * Twig as the only configured template engine;

  * Doctrine ORM/DBAL;

  * Swiftmailer;

  * Annotations enabled for everything.

## Installation

You need to have Apache 2.4 HTTP server, PHP v.5.6 or later plus `gd` and `mbstring` PHP extensions.

Install composer globally on your local machine.

Download the sample to some directory (it can be your home dir or `/var/www/html`) and run Composer as follows:

```
composer install
```

To update the needed dependencies, run:

```
composer update

```

Then create an Apache virtual host. It should look like below:

```
<VirtualHost *:80>
    DocumentRoot /path/to/formdemo/web
    
	<Directory /path/to/formdemo/web/>
        DirectoryIndex index.php
        AllowOverride All
        Require all granted
    </Directory>

</VirtualHost>
```





Enjoy!

[1]:  https://symfony.com/doc/3.2/setup.html
[6]:  https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/index.html
[7]:  https://symfony.com/doc/3.2/doctrine.html
[8]:  https://symfony.com/doc/3.2/templating.html
[9]:  https://symfony.com/doc/3.2/security.html
[10]: https://symfony.com/doc/3.2/email.html
[11]: https://symfony.com/doc/3.2/logging.html
[12]: https://symfony.com/doc/3.2/assetic/asset_management.html
[13]: https://symfony.com/doc/current/bundles/SensioGeneratorBundle/index.html
[14]: https://github.com/william251082/BreweryApp.git