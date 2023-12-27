<?php

namespace App\Filament\Resources\HazardCategoryResource\Pages;

use App\Filament\Resources\HazardCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageHazardCategories extends ManageRecords
{
    protected static string $resource = HazardCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
