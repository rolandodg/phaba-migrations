<?php

namespace Phaba\Migrations\Help;

class HelpPrinter
{
    public function printFullHelp()
    {
        $this->printTitle();
    }

    private function printTitle()
    {
        echo "______ _           _                 ___  ____                 _   _
| ___ \ |         | |                |  \/  (_)               | | (_)
| |_/ / |__   __ _| |__   __ _ ______| .  . |_  __ _ _ __ __ _| |_ _  ___  _ __  ___
|  __/| '_ \ / _` | '_ \ / _` |______| |\/| | |/ _` | '__/ _` | __| |/ _ \| '_ \/ __|
| |   | | | | (_| | |_) | (_| |      | |  | | | (_| | | | (_| | |_| | (_) | | | \__ \
\_|   |_| |_|\__,_|_.__/ \__,_|      \_|  |_/_|\__, |_|  \__,_|\__|_|\___/|_| |_|___/
                                                __/ |
                                               |___/    \n\n";
        echo "The Database Migrations tool of Softnando.\n";
    }
}
