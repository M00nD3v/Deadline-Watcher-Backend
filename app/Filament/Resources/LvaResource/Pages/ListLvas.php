<?php

namespace App\Filament\Resources\LvaResource\Pages;

use App\Filament\Resources\LvaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLvas extends ListRecords
{
    protected static string $resource = LvaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
