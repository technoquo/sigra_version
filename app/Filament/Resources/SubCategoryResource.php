<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\SubCategory;
use Filament\Actions\ViewAction;
use Filament\Resources\Resource;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Checkbox;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SubCategoryResource\Pages;
use App\Filament\Resources\SubCategoryResource\RelationManagers;
use App\Filament\Resources\SubCategoryResource\Pages\EditSubCategory;
use App\Filament\Resources\SubCategoryResource\Pages\CreateSubCategory;
use App\Filament\Resources\SubCategoryResource\Pages\ListSubCategories;

class SubCategoryResource extends Resource
{
    protected static ?string $model = SubCategory::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Deuxième groupe';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([              
                    Group::make()
                        ->schema([
                            Section::make([
                                TextInput::make('name')
                                    ->label('nom')
                                    ->required(),
                                TextInput::make('slug'),
                                Select::make('categories')                      
                                ->label('Categorías')
                                ->searchable()
                                ->relationship('category', 'name')
                                ->required(),
                                Toggle::make('status')
                                    ->label('Visibilité')
                                    ->helperText('Activer ou désactiver la visibilité des catégories')
                                    ->default(true),
                            ])->columns(2)
                        ]),
                    // Group::make()
                    //     ->schema([
                    //         Section::make([
                    //             Checkbox::make('memberships')
                    //                 ->label('exclusivement membre')
                    //                 ->default(false),
                    //                 TextInput::make('external')
                    //                 ->label('External URL')
                    //         ])
                    //     ]),
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
            ImageColumn::make('image'),
            TextColumn::make('name')
                ->label('Nom')
                ->searchable()
                ->sortable(),
            TextColumn::make('slug'),               
            TextColumn::make('category.name')
                ->label('Catégorie')
                ->searchable()
                ->sortable(),
            IconColumn::make('status')
                ->toggleable()
                ->sortable()
                ->boolean()
                ->label('Visibilité'),
        ])

        ->defaultSort('name')
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
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
            'index' => Pages\ListSubCategories::route('/'),
            'create' => Pages\CreateSubCategory::route('/create'),
            'edit' => Pages\EditSubCategory::route('/{record}/edit'),
        ];
    }
}
