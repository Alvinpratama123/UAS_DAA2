<?php

namespace App\Filament\Admin\Resources\TasResource\Pages;

use App\Filament\Admin\Resources\TasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTas extends EditRecord
{
    protected static string $resource = TasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
