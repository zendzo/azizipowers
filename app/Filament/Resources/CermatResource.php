<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CermatResource\Pages;
use App\Filament\Resources\CermatResource\RelationManagers;
use App\Models\Cermat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CermatResource extends Resource
{
    protected static ?string $model = Cermat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make([
                  Forms\Components\Select::make('project_id')
                      ->relationship(name: 'project', titleAttribute: 'name')
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
            'index' => Pages\ListCermats::route('/'),
            'create' => Pages\CreateCermat::route('/create'),
            'edit' => Pages\EditCermat::route('/{record}/edit'),
        ];
    }
}
