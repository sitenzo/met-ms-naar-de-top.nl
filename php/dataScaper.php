<?php

include __DIR__ . '/vendor/autoload.php';

class dataScaper
{

    private $config;
    public function __construct()
    {
        setlocale(LC_TIME, 'nl');
        \Carbon\Carbon::setLocale('nl');

        $this->getConfig();
        $newConfig = [];
        foreach ($this->config as $data)
        {
            $Date = \Carbon\Carbon::createFromFormat('d-m-Y',$data->date);
            $data->data = $this->getData($data->parse_url,$data->scraper);
            $data->days = $Date->translatedFormat('j F Y').' (nog '.$Date->diffInDays(\Carbon\Carbon::now()).' dagen)';
            $newConfig[] = $data;
        }

        $this->setConfig($newConfig);
    }

    private function getConfig()
    {
        $config = file_get_contents(__DIR__. '/config.json');
        $this->config = json_decode($config);
    }

    private function getData($url,$scraper)
    {
        $contents = $this->getContents($url);
        if($scraper == 'walkforms'){
            $config = $this->getconfigWalkforms($contents);
        }
        return $this->formatConfig($config);
    }

    private function getContents($url): false|string
    {
        return file_get_contents($url);
    }

    private function getconfigWalkforms($contents)
    {
        $config = [];
        // Create a new DOMDocument
        $dom = new DOMDocument();

        // Load the HTML string into the DOMDocument
        libxml_use_internal_errors(true); // Suppress parsing errors
        $dom->loadHTML('<?xml encoding="UTF-8">' . $contents);
        libxml_clear_errors();

        // Create a new DOMXPath object
        $xpath = new DOMXPath($dom);

        // Use XPath queries to extract data
        $data = $xpath->query('/html/body/div[1]/div[3]/div/div[1]/div[2]/div[1]/div/div/span[1]');
        // Iterate over DOMNodeList
        foreach($data as $node) {
            $config[] = trim($node->textContent);
        }

        return $config;
    }

    private function formatConfig(array $config)
    {
        $return  = [];
        $search  = [' ', '€','%'];
        $replace = ['','','',];
        foreach ($config as $data)
        {
            $return[] = str_replace($search,$replace,$data);
        }
        return $return;
    }

    private function setConfig(array $newConfig)
    {
        file_put_contents(__DIR__. '/config.json',json_encode($newConfig));
    }
}

$Scape = new dataScaper();