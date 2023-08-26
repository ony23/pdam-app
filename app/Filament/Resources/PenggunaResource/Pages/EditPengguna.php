<?php

namespace App\Filament\Resources\PenggunaResource\Pages;

use App\Filament\Resources\PenggunaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPengguna extends EditRecord
{
    protected static string $resource = PenggunaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
