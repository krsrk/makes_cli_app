<?php
namespace App\Utils\Files;

use Aws\S3\S3Client;


class FileManager
{
    private $client;

    public function __construct()
    {
        $this->client = new S3Client($this->_setClienteConfig());
    }

    private function _setClienteConfig() : array
    {
        return [
            'region'  => env_var('AWS_REGION'),
            'version' => 'latest',
            'credentials' => [
                'key'    => env_var('AWS_KEY'),
                'secret' => env_var('AWS_SECRET'),
            ]
        ];
    }

    public function putFile(string $filePath, string $fileName)
    {
        try {
            return $this->client->putObject([
                'Bucket' => env_var('AWS_BUCKET'),
                'Key'    => $fileName,
                'SourceFile' => $filePath
            ]);
        } catch (\Aws\S3\Exception\S3Exception $e) {
            echo "There was an error uploading the file.\n";
            return [];
        }
    }
}