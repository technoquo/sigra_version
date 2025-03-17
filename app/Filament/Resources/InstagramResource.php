<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Instagram;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\InstagramResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\InstagramResource\RelationManagers;
use App\Filament\Resources\InstagramResource\Pages\EditInstagram;
use App\Filament\Resources\InstagramResource\Pages\ListInstagrams;
use App\Filament\Resources\InstagramResource\Pages\CreateInstagram;

class InstagramResource extends Resource
{
    protected static ?string $model = Instagram::class;

    protected static ?string $navigationGroup = 'Accueil';
    protected static ?string $navigationLabel = 'Instagram';
    protected static ?string $label = 'Instagram';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                ->schema([
                    Section::make([
                        TextInput::make('title')
                            ->label('Titre')
                            ->required(),
                        TextInput::make('code'),
                        Toggle::make('status')
                            ->label('Visibilité')
                            ->helperText('Activer ou désactiver la visibilité des catégories')
                            ->default(true),
                    ])
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('title')
                ->label('Titre')
                ->searchable()
                ->sortable(),
            TextColumn::make('code')
                ->searchable()
                ->sortable(),         
            IconColumn::make('status')
                ->toggleable()
                ->sortable()
                ->boolean()
                ->label('Visibilité'),
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
            'index' => Pages\ListInstagrams::route('/'),
            'create' => Pages\CreateInstagram::route('/create'),
            'edit' => Pages\EditInstagram::route('/{record}/edit'),
        ];
    }
}
