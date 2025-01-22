<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParametresIardResource\Pages;
use App\Filament\Resources\ParametresIardResource\RelationManagers;
use App\Models\ParametresIard;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ParametresIardResource extends Resource
{
    protected static ?string $model = ParametresIard::class;
    protected ?string $maxContentWidth = 'full';
    protected static ?string $navigationGroup = 'PARAMETRES IARD';
    protected static ?string $navigationLabel = 'Autres paramètres';
    //protected static ?string $recordTitleAttribute = 'libgar';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
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
            'index' => Pages\ListParametresIards::route('/'),
            'create' => Pages\CreateParametresIard::route('/create'),
            'edit' => Pages\EditParametresIard::route('/{record}/edit'),
        ];
    }
}
