<?php

namespace App\Filament\Resources\TagihanResource\Pages;

use App\Filament\Resources\TagihanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTagihans extends ManageRecords
{
    protected static string $resource = TagihanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
