repo-starter
============

This is a demonstration MODX package repository compatible with Repoman intended for use as a starter kit for building
MODX packages.


Installation
============

To download this package as the basis for your Repoman project, use composer create-project:
    
    composer create-project craftsmancoding/repo-starter --prefer-dist
        
This should pull down the package to your local computer where you may begin altering it.

If you are not familiar with Composer, see the section below on Installing Composer.

Setup
=====

Once you have downloaded the package, you'll want to modify the `composer.json` to match your vendorname (usually your
Github or Bitbucket username), your packagename (this will usually correspond to the MODX namespace).  Delete any
directories or parts that you do not need (e.g. remove the `elements/plugins/` directory if your package doesn't need
 to install any plugins.  These folders are included in the repo-start solely to provide examples.

For version 1, you will need to download the Repoman utility separately: https://github.com/craftsmancoding/repoman
See https://github.com/craftsmancoding/repoman/wiki/Installation for instructions on installing Repoman.

Once you have modified the repo-starter by deleting elements you don't want/need and you're ready to get your package
contents synced up with MODX so you can start developing, you need to use Repoman to install your package:

    php repoman install /path/to/your/package

You can adjust the paths to the repoman utility or to your package directory according to your environment.

Editing composer.json
=====================

Update the composer.json file to reference your custom vendor and package name.

Configuring Git
===============

Once you're ready to start version-controlling your project, you need to tweak a couple things to decouple this starter repo
from its roots.

------------------

Installing Composer
===================

If it's your first attempt at using Composer, then we sympathize: it's not always the easiest thing to jump into.  
It's usually easiest to download the Composer PHAR file and use that to execute commands.  See 
https://getcomposer.org/download/ for examples of downloading the .phar bundle, e.g.

    curl -sS https://getcomposer.org/installer | php
   
or

    php -r "readfile('https://getcomposer.org/installer');" | php

Once you have the composer.phar file, modify the create-project command to reference it, e.g.:

    php composer.phar create-project craftsmancoding/repo-starter --stability=dev
