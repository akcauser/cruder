<?php

namespace Encodeurs\Cruder\Generator\HTML;

use Encodeurs\Cruder\Generator\Abstract\Generator;
use Encodeurs\Cruder\Utils\FileUtil;
use Illuminate\Support\Str;

class SidebarMenuItemGenerator extends Generator
{

    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->fileChangeType = "put";
        $this->targetFolder = config('cruder.path.view') . "cms/layouts/";
        $this->targetFile = "menu.blade.php";
        $this->templatePath = __DIR__ . '/../../templates/views/layouts/menu_item.stub';

        parent::__construct();
    }
}
