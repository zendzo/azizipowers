<?php

namespace App\Filament\Resources\CermatResource\Pages;

use App\Filament\Resources\CermatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCermat extends EditRecord
{
    protected static string $resource = CermatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
