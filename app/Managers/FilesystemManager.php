<?php
/**
 * Created by PhpStorm.
 * User: Alexandr Odarych
 */
namespace App\Managers;

class FilesystemManager extends \Illuminate\Filesystem\FilesystemManager
{
    public function avatar()
    {
        return $this->disk(config('filesystems.avatar'));
    }
}