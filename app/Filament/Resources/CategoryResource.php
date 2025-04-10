<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Category;
use App\Enums\CategoryTypeEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Resource;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Checkbox;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\CategoryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Filament\Resources\CategoryResource\Pages\EditCategory;
use App\Filament\Resources\CategoryResource\Pages\CreateCategory;
use App\Filament\Resources\CategoryResource\Pages\ListCategories;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;
   // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

   protected static ?string $navigationGroup = 'Vidéothèque';
   protected static ?string $navigationLabel = 'Catégories';
   protected static ?string $label = 'Catégories';

   protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Group::make()
                ->schema([
                    Section::make([
                        TextInput::make('name')
                        ->required()
                        ->live(onBlur: true) // Updates the slug as you type or on blur
                        ->afterStateUpdated(function (callable $set, $state) {
                            $set('slug', \Illuminate\Support\Str::slug($state));
                        }),

                      TextInput::make('slug')
                        ->required()
                        ->disabled() // Optional: prevents manual editing of the slug
                        ->dehydrated(true), // Ensures the slug is included in the form submission
                        Toggle::make('menu')
                          ->label('Menu')
                            ->helperText('Afficher ou masquer la catégorie dans le menu')
                            ->default(false),
                        Toggle::make('status')
                            ->label('Visibilité')
                            ->helperText('Activer ou désactiver la visibilité des catégories')
                            ->default(true),
                    ])->columns(2)
                ]),
            Group::make()
                ->schema([
                    Section::make([
                        Select::make('type')
                            ->options([
                                'publique' => CategoryTypeEnum::PUBLIQUE->value,
                                'tous' => CategoryTypeEnum::TOUS->value,
                                'affiliations' => CategoryTypeEnum::AFFILIATIONS->value,
                                'external' => CategoryTypeEnum::EXTERNAL->value,
                            ])
                            ->required()
                            ->reactive(),
                        TextInput::make('url')
                            ->label('External URL')
                            ->visible(fn (callable $get) => $get('type') === 'external'),
                       ])

                ]),
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
            TextColumn::make('type')
                ->sortable()
                ->searchable()
                ->label('Type'),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
