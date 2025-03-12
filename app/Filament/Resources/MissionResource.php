<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Mission;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\MissionResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MissionResource\RelationManagers;

class MissionResource extends Resource
{
    protected static ?string $model = Mission::class;

    protected static ?string $navigationGroup = 'Premier groupe';

    protected static ?int $navigationSort = 1;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make([
                            TextInput::make('title')
                                ->label('Titre')
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                    if ($operation !== 'create') {
                                        return;
                                    }

                                    $set('slug', Str::slug($state));
                                }),

                            TextInput::make('slug')
                                ->disabled()
                                ->required()
                                ->dehydrated(),
                            Toggle::make('status')
                                ->label('Visibilité')
                                ->helperText('Activer ou désactiver la visibilité des missions')
                                ->default(true),
                        ])->columns(2),
                        Section::make([
                            MarkdownEditor::make('description')
                                ->label('Description')
                                ->required()
                                ->columnSpan('full')
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
                        ])->collapsible(),
                        Section::make([
                            TextInput::make('alt')
                                ->label('Texte Alternatif')
                                ->required()
                        ]),

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                ImageColumn::make('image'),
                TextColumn::make('alt')
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
            'index' => Pages\ListMissions::route('/'),
            'create' => Pages\CreateMission::route('/create'),
            'edit' => Pages\EditMission::route('/{record}/edit'),
        ];
    }
}