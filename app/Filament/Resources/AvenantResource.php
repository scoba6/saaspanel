<?php

namespace App\Filament\Resources;

use App\Enums\GroupeAvenant;
use Filament\Forms;
use Filament\Tables;
use App\Models\Avenant;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AvenantResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AvenantResource\RelationManagers;
use Filament\Forms\Components\Select;

class AvenantResource extends Resource
{
    protected static ?string $model = Avenant::class;
    protected ?string $maxContentWidth = 'full';
    protected static ?string $navigationGroup = 'PARAMETRES IARD';
    protected static ?string $navigationLabel = 'Nature des contarts';
    protected static ?string $recordTitleAttribute = 'libavn';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('ordavn')->label('ORD AVN'),
                Select::make('grpavn')->label('GROUPE AVN')->options(GroupeAvenant::class),
                TextInput::make('libavn')->label('LIBELLE')->columnSpanFull(),
                RichEditor::make('txtavn')->label('TEXTE')->columnSpanFull(),
                Toggle::make('active')->label('ACTIF')->default(true)
                    ->onColor('success')
                    ->offColor('danger'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ordavn')->label('ORD AVN')->searchable()->sortable(),
                TextColumn::make('libavn')->label('LIBELLE')->searchable()->sortable(),
                TextColumn::make('grpavn')->label('GROUPE AVN')->searchable()->sortable(),
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
            'index' => Pages\ListAvenants::route('/'),
            'create' => Pages\CreateAvenant::route('/create'),
            'edit' => Pages\EditAvenant::route('/{record}/edit'),
        ];
    }
}
