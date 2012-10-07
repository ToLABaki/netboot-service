<?php

abstract class Distribution
{
    public $release;
    public $pretty_release;
    public $architecture;

    function __construct($release, $pretty_release, $arch) {
        $this->release = $release;
        $this->pretty_release = $pretty_release;
        $this->architecture = $arch;
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
        echo "set 210:string {$GLOBALS['installers_root']}/{$this->getName()}/{$this->release}/{$this->architecture}/\n";
        if (!strstr($this->architecture, 'kfreebsd')) {
            echo 'kernel ${210:string}pxelinux.0' . "\n";
        } else {
            echo 'kernel ${210:string}grub2pxe' . "\n";
        }
    }
}

class Ubuntu extends Debian
{
    public static $name = 'ubuntu';
    public static $pretty_name = 'Ubuntu';
}

include 'config.php';

?>
#!ipxe

# menu-timeout is used to emulate grub behavior with timeouts
set menu-timeout 30

:start
menu LABaki Boot Menu
item --gap 		-- Boot an operating system:
item labdebian		Debian for LABaki clients
item --gap
item --gap		-- Install OS on your local computer:
<?php
foreach($distros as $class_name => $releases) {
    echo "item {$class_name::$name}-install-menu  {$class_name::$pretty_name}  >\n";
}
?>
item --gap
item --gap 		-- Advanced options:
item config		Configure settings
item shell		iPXE shell
item reboot		Reboot computer
item --gap
item --key x exit	Exit iPXE / Continue BIOS boot
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