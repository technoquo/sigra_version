<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Video;
use App\Models\Member;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\CheckboxList;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\MemberResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MemberResource\Pages\EditMember;
use App\Filament\Resources\MemberResource\RelationManagers;
use App\Filament\Resources\MemberResource\Pages\ListMembers;
use App\Filament\Resources\MemberResource\Pages\CreateMember;

class MemberResource extends Resource
{
    protected static ?string $model = Member::class;

   // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

   protected static ?string $navigationGroup = 'Vidéothèque';
   protected static ?string $navigationLabel = 'Membres';
   protected static ?string $label = 'Membres';

   protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Adhésions')
                ->schema([
                    Select::make('users_id')
                        ->label('Email')
                        ->relationship('users', 'email')
                        ->searchable()
                        ->required(),
                    Select::make('subscriptions_id')
                        ->label('Plan')
                        ->relationship('subscriptions', 'title')
                        ->required(),
                    Toggle::make('status')
                        ->label('Visibilité')
                        ->helperText('Activer ou désactiver Adhésion')
                        ->default(true),
                    CheckboxList::make('videos_id')
                        ->label('Videos')
                        ->options(function () {
                            return \App\Models\Video::where('type', 'privé')->pluck('name', 'id');
                        })->columns(4)
                        ->bulkToggleable()
                        ->searchable()


                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('users.name')
                    ->label('Nom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('users.email')
                    ->label('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subscriptions.title')
                    ->label('Plan')
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->toggleable()
                    ->sortable()
                    ->boolean()
                    ->label('Statut'),
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
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }
}
