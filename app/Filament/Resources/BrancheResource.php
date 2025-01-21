<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Branche;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BrancheResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BrancheResource\RelationManagers;

class BrancheResource extends Resource
{
    protected static ?string $model = Branche::class;
    protected ?string $maxContentWidth = 'full';
    protected static ?string $navigationGroup = 'PARAMETRES GENERAUX';
    protected static ?string $navigationLabel = 'Branches & Categories';
    protected static ?string $recordTitleAttribute = 'libbra';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('codbra')->required()->label('CODE BRANCHE')->unique(ignoreRecord: true),
                TextInput::make('libbra')->required()->label('LIBELLE BRANCHE')->unique(ignoreRecord: true),
                Textarea::make('desbra')->label('DESCRIPTION BRANCHE')->unique(ignoreRecord: true)->columnSpanFull(),
                Toggle::make('active')->label('ACTIF')->default(true)
                    ->onColor('success')
                    ->offColor('danger'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('codbra')->label('CODE BRANCHE')->searchable()->sortable(),
                TextColumn::make('libbra')->label('LIBELLE BRANCHE')->searchable()->sortable(),
                TextColumn::make('desbra')->label('DESCRIPTION BRANCHE'),
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
            'index' => Pages\ListBranches::route('/'),
            'create' => Pages\CreateBranche::route('/create'),
            'edit' => Pages\EditBranche::route('/{record}/edit'),
        ];
    }
}
