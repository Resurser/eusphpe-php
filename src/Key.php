<?php

namespace UIS\EUSPE;

use Exception;

class Key
{

  private $dir;

  public function getKeyDataPath(): string
  {
    return $this->dir . '/key.bin';
  }

  public function getPasswordPath(): string
  {
    return $this->dir . '/password.bin';
  }

  public function exists(): bool
  {
    return file_exists($this->getKeyDataPath()) && file_exists($this->getPasswordPath());
  }

  /**
   * Prepare dir for downloading certificates.
   * @throws Exception
   */
  public function configure()
  {
    if (!file_exists($this->dir) && !(mkdir($this->dir, 0777, true))) {
      throw new Exception('Can not prepare keys dir.');
    }
  }

  public function setKey(string $keyData): void
  {
    file_put_contents($this->getKeyDataPath(), $keyData);
  }

  public function getKey(): string
  {
    return file_get_contents($this->getKeyDataPath());
  }

  public function setPassword(string $password): void
  {
    file_put_contents($this->getPasswordPath(), $password);
  }

  public function getPassword(): string
  {
    return file_get_contents($this->getPasswordPath());
  }

  public function getDir(): string
  {
    return $this->dir;
  }

  public function setDir(string $dir): void
  {
    $this->dir = $dir;
  }
}