<?php

$installers_root = 'http://idea.lab/boot/installers';

$distros = array(
    "Debian" => array(
        new Debian('wheezy', 'Wheezy', 'i386'),
        new Debian('wheezy', 'Wheezy', 'amd64'),
        new Debian('wheezy', 'Wheezy', 'kfreebsd-i386'),
        new Debian('wheezy', 'Wheezy', 'kfreebsd-amd64'),
    ),
    "Ubuntu" => array(
        new Ubuntu('oneiric', 'Oneiric Ocelot', 'i386'),
        new Ubuntu('oneiric', 'Oneiric Ocelot', 'amd64'),
    ),
);
