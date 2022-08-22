<?php

namespace App\Filament\Resources\LvaResource\Pages;

use App\Filament\Resources\LvaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLva extends EditRecord
{
    protected static string $resource = LvaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
