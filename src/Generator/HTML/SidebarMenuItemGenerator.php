<?php

namespace Encodeurs\Cruder\Generator\HTML;

use Encodeurs\Cruder\Generator\Abstract\Generator;
use Encodeurs\Cruder\Utils\FileUtil;

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

    protected function store()
    {
        // $this->targetFolder, 
        // $this->targetFile, 
        // $this->template

        // bu template in aynısı bu dosyada var ise, dosyaya ekleme yapma
        if (!FileUtil::inExist($this->targetFolder . $this->targetFile, $this->template)) {
            parent::store();
        }
    }

    public function rollback()
    {
        if (FileUtil::inExist($this->targetFolder . $this->targetFile, $this->template)) {
            // delete template
            $content = FileUtil::getContent($this->targetFolder . $this->targetFile);
            $content = str_replace($this->template, "", $content);
            FileUtil::newFile($this->targetFolder, $this->targetFile, $content);
        }
    }
}
