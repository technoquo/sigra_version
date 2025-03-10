<?php

namespace App\Filament\Resources\InstagramResource\Pages;

use App\Filament\Resources\InstagramResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInstagrams extends ListRecords
{
    protected static string $resource = InstagramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
