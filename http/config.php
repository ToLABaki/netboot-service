<?php

$distros = array(
    "Debian" => array(
        new Debian('testing', 'Testing', 'amd64', 'http://ftp.cc.uoc.gr/mirrors/linux/debian/'),
        new Debian('testing', 'Testing', 'i386', 'http://ftp.cc.uoc.gr/mirrors/linux/debian/'),
        new Debian('stable', 'Stable', 'amd64', 'http://ftp.cc.uoc.gr/mirrors/linux/debian/'),
        new Debian('stable', 'Stable', 'i386', 'http://ftp.cc.uoc.gr/mirrors/linux/debian/'),
        new Debian('wheezy', 'Wheezy', 'amd64', 'http://ftp.cc.uoc.gr/mirrors/linux/debian/'),
        new Debian('wheezy', 'Wheezy', 'i386', 'http://ftp.cc.uoc.gr/mirrors/linux/debian/'),
    ),
    "Ubuntu" => array(
        new Ubuntu('quantal', 'Quantal Quetzal (12.10)', 'amd64', 'http://ftp.cc.uoc.gr/mirrors/linux/ubuntu/packages/'),
        new Ubuntu('quantal', 'Quantal Quetzal (12.10)', 'i386', 'http://ftp.cc.uoc.gr/mirrors/linux/ubuntu/packages/'),
        new Ubuntu('precise', 'Precise Pangolin (12.04)', 'amd64', 'http://ftp.cc.uoc.gr/mirrors/linux/ubuntu/packages/'),
        new Ubuntu('precise', 'Precise Pangolin (12.04)', 'i386', 'http://ftp.cc.uoc.gr/mirrors/linux/ubuntu/packages/'),
        new Ubuntu('oneiric', 'Oneiric Ocelot (11.10)', 'amd64', 'http://ftp.cc.uoc.gr/mirrors/linux/ubuntu/packages/'),
        new Ubuntu('oneiric', 'Oneiric Ocelot (11.10)', 'i386', 'http://ftp.cc.uoc.gr/mirrors/linux/ubuntu/packages/'),
    ),
    "Fedora" => array(
        new Fedora('17', 'Fedora 17', 'x86_64', 'http://ftp.cc.uoc.gr/mirrors/linux/fedora/linux/'),
        new Fedora('17', 'Fedora 17', 'i386', 'http://ftp.cc.uoc.gr/mirrors/linux/fedora/linux/'),
        new Fedora('16', 'Fedora 16', 'x86_64', 'http://ftp.cc.uoc.gr/mirrors/linux/fedora/linux/'),
        new Fedora('16', 'Fedora 16', 'i386', 'http://ftp.cc.uoc.gr/mirrors/linux/fedora/linux/'),
    ),
    "OpenSuse" => array(
        new OpenSuse('openSUSE-stable', 'OpenSuSE Latest Stable', 'x86_64', 'http://ftp.cc.uoc.gr/mirrors/linux/opensuse/opensuse/'),
        new OpenSuse('openSUSE-stable', 'Latest stable', 'i386', 'http://ftp.cc.uoc.gr/mirrors/linux/opensuse/opensuse/'),
        new OpenSuse('12.2', 'OpenSuSE 12.2', 'x86_64', 'http://ftp.cc.uoc.gr/mirrors/linux/opensuse/opensuse/'),
        new OpenSuse('12.2', 'OpenSuSE 12.2', 'i386', 'http://ftp.cc.uoc.gr/mirrors/linux/opensuse/opensuse/'),
        new OpenSuse('12.1', 'OpenSuSE 12.1', 'x86_64', 'http://ftp.cc.uoc.gr/mirrors/linux/opensuse/opensuse/'),
        new OpenSuse('12.1', 'OpenSuSE 12.1', 'i386', 'http://ftp.cc.uoc.gr/mirrors/linux/opensuse/opensuse/'),
    ),
);
