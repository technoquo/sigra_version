<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Multimedia;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MultimediaResource\Pages;
use App\Filament\Resources\MultimediaResource\RelationManagers;

class MultimediaResource extends Resource
{
    protected static ?string $model = Multimedia::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Datos Multimedia')
                ->schema([
                    Select::make('video_id')
                        ->label('Video')
                        ->relationship('video', 'name')
                        ->required(),
                    Select::make('categories')                      
                        ->label('Categorías')
                        ->relationship('categories', 'name')
                        ->multiple(),
                    Select::make('sub_category_id')
                        ->label('Subcategoría')
                        ->relationship('subCategory', 'name')
                        ->nullable(),
                    Select::make('age_id')
                        ->label('Edad')
                        ->relationship('age', 'name')
                        ->nullable(),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMultimedia::route('/'),
            'create' => Pages\CreateMultimedia::route('/create'),
            'edit' => Pages\EditMultimedia::route('/{record}/edit'),
        ];
    }
}
