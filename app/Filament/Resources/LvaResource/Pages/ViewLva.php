<?php

namespace App\Filament\Resources\LvaResource\Pages;

use App\Filament\Resources\LvaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewLva extends ViewRecord
{
    protected static string $resource = LvaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
