<?php

class eclEndpoint_multileiturasAdminLivros_generosTodos extends eclEndpoint
{

    public function dispatch(array $input): array
    {
        global $store;
        $name = $this->page->application->name;

        if ($name === '-autores')
            $mode = eclStore_multileituras_book::MODE_AUTHOR;
        else if ($name === '-generos')
            $mode = eclStore_multileituras_book::MODE_GENRE;
        else if ($name === '-narradores')
            $mode = eclStore_multileituras_book::MODE_NARRATOR;

        $books = $store->multileituras_book->search(['mode' => $mode]);
        return $this->response(['children' => $books]);
    }

}
