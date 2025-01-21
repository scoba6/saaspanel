<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Garantie;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\GarantieResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GarantieResource\RelationManagers;
use Filament\Tables\Columns\IconColumn;

class GarantieResource extends Resource
{
    protected static ?string $model = Garantie::class;
    protected ?string $maxContentWidth = 'full';
    protected static ?string $navigationGroup = 'PARAMETRES IARD';
    protected static ?string $navigationLabel = 'Garanties';
    protected static ?string $recordTitleAttribute = 'libgar';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('libgar')->label('LIBELLE'),
                TextInput::make('desgar')->label('DESCRIPTION'),
                Toggle::make('active')->label('ACTIF')->default(true)
                    ->onColor('success')
                    ->offColor('danger'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('libgar')->label('LIBELLE')->searchable()->sortable(),
                TextColumn::make('desgar')->label('DESCRIPTION')->searchable()->sortable(),
                IconColumn::make('active')->label('ACTIF')->boolean(),
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
            'index' => Pages\ListGaranties::route('/'),
            'create' => Pages\CreateGarantie::route('/create'),
            'edit' => Pages\EditGarantie::route('/{record}/edit'),
        ];
    }
}
