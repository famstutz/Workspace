<?php
require_once "CommandResolver.php";

class FileSystemCommandResolver implements CommandResolver {
    private $commandsFolder;
    private $commandName;
    
    public function __construct($commandsFolder, $commandName) {
        $this->commandsFolder = $commandsFolder;
        $this->commandName = $commandName;
    }
    
    public function getCommand(Request $request) {
        $name = $this->commandName . "Command";
        include_once $this->commandsFolder . "/" . $name . ".php";
        return new $name();
    }
}
?>
