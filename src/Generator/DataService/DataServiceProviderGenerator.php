<?php

namespace Encodeurs\Cruder\Generator\DataService;

use Encodeurs\Cruder\Generator\Abstract\Generator;
use Encodeurs\Cruder\Utils\FileUtil;


class DataServiceProviderGenerator extends Generator
{
    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->targetFolder = config('cruder.path.provider');
        $this->targetFile = "DataServiceProvider.php";
        $this->fileChangeType = "put";
        $this->templatePath = __DIR__ . '/../../templates/providers/dataservice_singleton.stub';

        parent::__construct();
    }

    protected function store()
    {
        // get service provider file
        $content = FileUtil::getContent($this->targetFolder . $this->targetFile);
        if (!$content) {
            $emptyTemplate = file_get_contents(__DIR__ . '/../../templates/providers/data_service_provider.stub');

            $emptyTemplate = str_replace('%PROVIDER_NAMESPACE%', config('cruder.namespace.provider'), $emptyTemplate);

            // if not exist create with template
            FileUtil::newFile($this->targetFolder, $this->targetFile, $emptyTemplate);
            // register app.php providers
        }

        // bu template in aynısı bu dosyada var ise, dosyaya ekleme yapma
        if (FileUtil::inExist($this->targetFolder . $this->targetFile, $this->template)) {
            return;
        }

        $content = FileUtil::getContent($this->targetFolder . $this->targetFile);

        $search = "#repository-injection-part";
        $this->template = $search . "\n" . $this->template;

        $content = str_replace($search, $this->template, $content);

        FileUtil::newFile($this->targetFolder, $this->targetFile, $content);
    }
}
