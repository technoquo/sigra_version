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

      // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

      protected static ?string $navigationGroup = 'Vidéothèque';
      protected static ?string $navigationLabel = 'Multimédia';
      protected static ?string $label = 'Multimédia';

      protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Datos Multimedia')
                ->schema([
                    Select::make('video_id')
                        ->label('Vidéo')
                        ->relationship('video', 'name')
                        ->required(),
                    Select::make('categories')
                        ->label('Catégories')
                        ->relationship('categories', 'name')
                        ->multiple(),
                    Select::make('sub_category_id')
                        ->label('Sous-catégories')
                        ->relationship('subCategory', 'name')
                        ->nullable(),
                    Select::make('age_id')
                        ->label('Age')
                        ->relationship('age', 'name')
                        ->nullable(),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('age.name')
                ->label('Age'),
                Tables\Columns\TextColumn::make('video.name')
                ->label('Vidéos')
                ->searchable(),
                Tables\Columns\TextColumn::make('categories.name')
                ->label('Catégories')
                ->formatStateUsing(function ($record) {
                    if ($record->categories->isEmpty()) {
                        return 'N/A'; // Fallback value when no categories are associated
                    }
                    $categories = $record->categories->pluck('name')->take(3); // Take only 3 categories
                    $categoriesString = $categories->implode(', ');
                    if ($record->categories->count() > 3) {
                        $categoriesString .= '...'; // Indicate there are more categories
                    }
                    return $categoriesString;
                })
                ->default('N/A'),
                Tables\Columns\TextColumn::make('subCategory.name')
                ->label('Sous-catégories')
                ->default('N/A'),
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
