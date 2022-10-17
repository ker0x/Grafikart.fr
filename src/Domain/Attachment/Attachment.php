<?php

namespace App\Domain\Attachment;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @Vich\Uploadable
 */
#[ORM\Entity]
class Attachment implements \Stringable
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(type: Types::INTEGER)]
    protected ?int $id = null;

    /**
     * @Vich\UploadableField(mapping="attachments", fileNameProperty="fileName", size="fileSize")
     */
    private ?File $file = null;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private string $fileName = '';

    #[ORM\Column(type: Types::INTEGER, options: ['unsigned' => true, 'default' => 0])]
    private int $fileSize = 0;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private \DateTimeInterface $createdAt;

    public function getId(): int
    {
        return $this->id ?: 0;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function setFileName(?string $fileName): self
    {
        $this->fileName = $fileName ?: '';

        return $this;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getFile(): ?File
    {
        return $this->file;
    }

    public function setFile(?File $file): Attachment
    {
        $this->file = $file;

        return $this;
    }

    public function getFileSize(): int
    {
        return $this->fileSize;
    }

    public function setFileSize(?int $fileSize): Attachment
    {
        $this->fileSize = $fileSize ?: 0;

        return $this;
    }

    public function __toString(): string
    {
        return $this->fileName;
    }
}
