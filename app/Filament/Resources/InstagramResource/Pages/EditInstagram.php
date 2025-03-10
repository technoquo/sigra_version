<?php

namespace App\Filament\Resources\InstagramResource\Pages;

use App\Filament\Resources\InstagramResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInstagram extends EditRecord
{
    protected static string $resource = InstagramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
