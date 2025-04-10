<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgeResource\Pages;
use App\Filament\Resources\AgeResource\RelationManagers;
use App\Models\Age;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AgeResource extends Resource
{
    protected static ?string $model = Age::class;

    protected static ?string $navigationGroup = 'Vidéothèque';
    protected static ?string $navigationLabel = 'Ages';
    protected static ?string $label = 'Ages';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nom')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->required(),
                Forms\Components\Toggle::make('status')
                    ->label('Activer')
                    ->default(true)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nom')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                ->label('Image'),
                Tables\Columns\IconColumn::make('status')
                    ->label('Activer')
                    ->boolean(),

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
            'index' => Pages\ListAges::route('/'),
            'create' => Pages\CreateAge::route('/create'),
            'edit' => Pages\EditAge::route('/{record}/edit'),
        ];
    }
}
