<?php

namespace App\Filament\Resources\CLSRuleResource\Pages;

use App\Filament\Resources\CLSRuleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCLSRules extends ListRecords
{
    protected static string $resource = CLSRuleResource::class;

    public function getTitle(): string
    {
      return _('Corporate Life Saving Rules');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
