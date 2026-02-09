<?php

// Šita biblioteka yra ne mūsų sukurta, todėl nekišam prie jos nagų

class Library
{
    protected array $books = []; // ne viešas, bet extendintoj klasėj yra matoma

    public function kas()
    {
        echo '<h1>Library</h1>';
    }
    
    public function addBook(string $title, string $author, string $isbn): void
    {
        $this->books[] = [
            'title' => $title,
            'author' => $author,
            'isbn' => $isbn,
            'available' => true
        ];
    }

    public function removeBook(string $isbn): bool
    {
        foreach ($this->books as $key => $book) {
            if ($book['isbn'] === $isbn) {
                unset($this->books[$key]);
                return true;
            }
        }
        return false;
    }

    public function findBook(string $isbn): ?array
    {
        foreach ($this->books as $book) {
            if ($book['isbn'] === $isbn) {
                return $book;
            }
        }
        return null;
    }

    public function listBooks(): array
    {
        return array_values($this->books);
    }

    public function borrowBook(string $isbn): bool
    {
        foreach ($this->books as &$book) {
            if ($book['isbn'] === $isbn && $book['available']) {
                $book['available'] = false;
                return true;
            }
        }
        return false;
    }

    public function returnBook(string $isbn): bool
    {
        foreach ($this->books as &$book) {
            if ($book['isbn'] === $isbn && !$book['available']) {
                $book['available'] = true;
                return true;
            }
        }
        return false;
    }
}