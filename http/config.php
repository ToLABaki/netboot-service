<?php

$distros = array(
    "Debian" => array(
        new Debian('testing', 'Testing', 'amd64', 'http://ftp.cc.uoc.gr/mirrors/linux/debian/'),
        new Debian('testing', 'Testing', 'i386', 'http://ftp.cc.uoc.gr/mirrors/linux/debian/'),
        new Debian('stable', 'Stable', 'amd64', 'http://ftp.cc.uoc.gr/mirrors/linux/debian/'),
        new Debian('stable', 'Stable', 'i386', 'http://ftp.cc.uoc.gr/mirrors/linux/debian/'),
    ),
    "Ubuntu" => array(
        new Ubuntu('trusty', 'Trusty Tahr (14.04)', 'amd64', 'http://ftp.cc.uoc.gr/mirrors/linux/ubuntu/packages/'),
        new Ubuntu('trusty', 'Trusty Tahr (14.04)', 'i386', 'http://ftp.cc.uoc.gr/mirrors/linux/ubuntu/packages/'),
        new Ubuntu('precise', 'Precise Pangolin (12.04)', 'amd64', 'http://ftp.cc.uoc.gr/mirrors/linux/ubuntu/packages/'),
        new Ubuntu('precise', 'Precise Pangolin (12.04)', 'i386', 'http://ftp.cc.uoc.gr/mirrors/linux/ubuntu/packages/'),
    ),
    "Fedora" => array(
        new Fedora('20', 'Fedora 20', 'x86_64', 'http://ftp.cc.uoc.gr/mirrors/linux/fedora/linux/'),
        new Fedora('20', 'Fedora 20', 'i386', 'http://ftp.cc.uoc.gr/mirrors/linux/fedora/linux/'),
        new Fedora('19', 'Fedora 19', 'x86_64', 'http://ftp.cc.uoc.gr/mirrors/linux/fedora/linux/'),
        new Fedora('19', 'Fedora 19', 'i386', 'http://ftp.cc.uoc.gr/mirrors/linux/fedora/linux/'),
    ),
    "OpenSuse" => array(
        new OpenSuse('openSUSE-stable', 'OpenSuSE Latest Stable', 'x86_64', 'http://ftp.cc.uoc.gr/mirrors/linux/opensuse/opensuse/'),
        new OpenSuse('openSUSE-stable', 'Latest stable', 'i386', 'http://ftp.cc.uoc.gr/mirrors/linux/opensuse/opensuse/'),
        new OpenSuse('13.1', 'OpenSuSE 13.1', 'x86_64', 'http://ftp.cc.uoc.gr/mirrors/linux/opensuse/opensuse/'),
        new OpenSuse('13.1', 'OpenSuSE 13.1', 'i386', 'http://ftp.cc.uoc.gr/mirrors/linux/opensuse/opensuse/'),
        new OpenSuse('12.3', 'OpenSuSE 12.3', 'x86_64', 'http://ftp.cc.uoc.gr/mirrors/linux/opensuse/opensuse/'),
        new OpenSuse('12.3', 'OpenSuSE 12.3', 'i386', 'http://ftp.cc.uoc.gr/mirrors/linux/opensuse/opensuse/'),
    ),
);
