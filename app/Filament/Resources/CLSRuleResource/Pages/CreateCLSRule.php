<?php

namespace App\Filament\Resources\CLSRuleResource\Pages;

use App\Filament\Resources\CLSRuleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateCLSRule extends CreateRecord
{
    protected static string $resource = CLSRuleResource::class;

    public function getTitle(): string|Htmlable
    {
      return _('Corporate Life Saving Rules');
    }
}
