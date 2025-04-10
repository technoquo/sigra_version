<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Boutique;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BoutiqueResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BoutiqueResource\RelationManagers;

class BoutiqueResource extends Resource
{
    protected static ?string $model = Boutique::class;

    protected static ?string $navigationGroup = 'Accueil';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = 'Boutique';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')->label('Titre')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('price')->label('Prix')
                            ->required()
                            ->numeric()
                            ->prefix('€'),
                        Forms\Components\TextInput::make('url')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Toggle::make('status')
                            ->label('Statut')
                    ])->columns(2),
                Group::make()
                    ->schema([
                        Section::make([
                            FileUpload::make('image')
                                ->directory('form-attachments')
                                ->preserveFilenames()
                                ->image()
                                ->imageEditor()
                                ->required()
                        ])->collapsible()
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money('EUR')
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->label('Statut')
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
            'index' => Pages\ListBoutiques::route('/'),
            'create' => Pages\CreateBoutique::route('/create'),
            'edit' => Pages\EditBoutique::route('/{record}/edit'),
        ];
    }
}
