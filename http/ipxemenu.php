<?php

abstract class Distribution
{
    public $release;
    public $pretty_release;
    public $architecture;
    protected $mirror_root;

    function __construct($release, $pretty_release, $arch, $mirror_root) {
        $this->release = $release;
        $this->pretty_release = $pretty_release;
        $this->architecture = $arch;
        $this->mirror_root = $mirror_root;
    }

    public function getName() { $c = get_class($this); return $c::$name; }
    public function getPrettyName() { $c = get_class($this); return $c::$pretty_name; }

    public function getIPXELabel() {
        return "install-{$this->getName()}-{$this->release}-{$this->architecture}";
    }

    abstract public function outputIPXEBootCommands();
}

class Debian extends Distribution
{
    public static $name = 'debian';
    public static $pretty_name = 'Debian';

    public function outputIPXEBootCommands() {
        $url = "{$this->mirror_root}dists/{$this->release}/main/installer-{$this->architecture}/current/images/netboot/";
        echo "set 210:string {$url}\n";
        echo "kernel ${url}pxelinux.0\n";
    }
}

class Ubuntu extends Debian
{
    public static $name = 'ubuntu';
    public static $pretty_name = 'Ubuntu';
}

class Fedora extends Distribution
{
    public static $name = 'fedora';
    public static $pretty_name = 'Fedora';

    public function outputIPXEBootCommands() {
        $url = "{$this->mirror_root}releases/{$this->release}/Fedora/{$this->architecture}/os/";
        echo "kernel {$url}images/pxeboot/vmlinuz repo={$url}\n";
        echo "initrd {$url}images/pxeboot/initrd.img\n";
    }
}

class OpenSuse extends Distribution
{
    public static $name = 'opensuse';
    public static $pretty_name = 'OpenSuSE';

    public function outputIPXEBootCommands() {
        $url = "{$this->mirror_root}distribution/{$this->release}/repo/oss/";
        echo "kernel {$url}boot/{$this->architecture}/loader/linux splash=silent showopts install={$url}\n";
        echo "initrd {$url}boot/{$this->architecture}/loader/initrd\n";
    }
}

include 'config.php';

?>
#!ipxe

# menu-timeout is used to emulate grub behavior with timeouts
set menu-timeout 30

:start
menu LABaki Boot Menu
item --gap              -- Boot an operating system:
item labdebian          Debian for LABaki clients
item --gap
item --gap              -- Install OS on your local computer:
<?php
foreach($distros as $class_name => $releases) {
    echo "item {$class_name::$name}-install-menu  {$class_name::$pretty_name}  >\n";
}
?>
item --gap
item --gap              -- Advanced options:
item config             Configure settings
item shell              iPXE shell
item cpuinfo            CPU Information
item reboot             Reboot computer
item --gap
item --key x exit       Exit iPXE / Continue BIOS boot
choose --timeout ${menu-timeout} --default labdebian selected || goto exit
set menu-timeout 0
goto ${selected}

:shell
echo Type exit to go back to the main menu
shell
goto start

:failed
echo Booting failed, dropping to shell
goto shell

:reboot
reboot

:exit
exit

:config
config
goto start

:cpuinfo
cpuid --ext 29 && set arch:string x86_64 || set arch:string i386
cpuid --ecx 5 && set vmx yes ||
cpuid --ext --ecx 2 && set svm yes ||
isset ${vmx} || isset ${svm} && set hw_virt:string yes || set hw_virt:string no
menu CPU Information
item --gap              CPU Architecture: ${arch:string}
item --gap              HW Virtualization: ${hw_virt:string}
item --gap
item start              Return to main menu
choose selected || goto start
goto ${selected}


## OPERATING SYSTEMS

:labdebian
goto start

## INSTALL-MENU

<?php
foreach($distros as $class_name => $releases) {
    echo ":{$class_name::$name}-install-menu\n";
    echo "menu Install {$class_name::$pretty_name}\n";
    foreach($releases as $release) {
        echo "item {$release->getIPXELabel()}  {$release->pretty_release} {$release->architecture}\n";
    }
    echo <<<'EOD'
item --gap
item start  Return to main menu
choose selected || goto start
goto ${selected}


EOD;

    foreach($releases as $release) {
        echo ':' . $release->getIPXELabel() . "\n";
        $release->outputIPXEBootCommands();
        echo <<<'EOD'
boot || goto failed
goto start


EOD;
    }
}
?>
